PageUpdater {#pageupdater}
===========

This document provides an overview of the usage of PageUpdater and DerivedPageDataUpdater.

## `PageUpdater`
`PageUpdater` is the canonical way to create page revisions, that is, to perform edits.

`PageUpdater` is a stateful, handle-like object that allows new revisions to be created on a given wiki page using the `saveRevision()` method. `PageUpdater` provides setters for defining the new revision's content as well as meta-data such as change tags. `saveRevision()` stores the new revision's primary content and metadata, and triggers the necessary updates to derived secondary data and cached artifacts e.g. in the `ParserCache` and the CDN layer, using a `DerivedPageDataUpdater`.

`PageUpdater` instances follow the below life cycle, defined by a number of methods:

                            +----------------------------+
                            |                            |
                            |             new            |
                            |                            |
                            +------|--------------|------+
                                   |              |
              grabParentRevision()-|              |
              or hasEditConflict()-|              |
                                   |              |
                          +--------v-------+      |
                          |                |      |
                          |  parent known  |      |
                          |                |      |
    Enables---------------+--------|-------+      |
      safe operations based on     |              |-saveRevision()
      the parent revision, e.g.    |              |
      section replacement or       |              |
      edit conflict resolution.    |              |
                                   |              |
                    saveRevision()-|              |
                                   |              |
                            +------v--------------v------+
                            |                            |
                            |      creation committed    |
                            |                            |
    Enables-----------------+----------------------------+
      wasSuccess()
      isUnchanged()
      isNew()
      getState()
      getNewRevision()
      etc.

The stateful nature of `PageUpdater` allows it to be used to safely perform transformations that depend on the new revision's parent revision, such as replacing sections or applying 3-way conflict resolution, while protecting against race conditions using a compare-and-swap (CAS) mechanism: after calling code used the `grabParentRevision()` method to access the edit's logical parent, `PageUpdater` remembers that revision, and ensure that that revision is still the page's current revision when performing the atomic database update for the revision's primary meta-data when `saveRevision()` is called. If another revision was created concurrently, `saveRevision()` will fail, indicating the problem with the "edit-conflict" code in the status object.

Typical usage for programmatic revision creation (with `$page` being a WikiPage as of 1.32, to be replaced by a repository service later):

```php
$updater = $page->newPageUpdater( $user );
$updater->setContent( SlotRecord::MAIN, $content );
$updater->setRcPatrolStatus( RecentChange::PRC_PATROLLED );
$newRev = $updater->saveRevision( $comment );
```

Usage with content depending on the parent revision

```php
$updater = $page->newPageUpdater( $user );
$parent = $updater->grabParentRevision();
$content = $parent->getContent( SlotRecord::MAIN )->replaceSection( $section, $sectionContent );
$updater->setContent( SlotRecord::MAIN, $content );
$newRev = $updater->saveRevision( $comment, EDIT_UPDATE );
```

In both cases, all secondary updates will be triggered automatically.

# `DerivedPageDataUpdater`
`DerivedPageDataUpdater` is a stateful, handle-like object that caches derived data representing a revision, and can trigger updates of cached copies of that data, e.g. in the links tables, `page_props`, the `ParserCache`, and the CDN layer.

`DerivedPageDataUpdater` is used by `PageUpdater` when creating new revisions, but can also be used independently when performing meta data updates during undeletion, import, or when puring a page. It's a stepping stone on the way to a more complete refactoring of WikiPage.

**NOTE**: Avoid direct usage of `DerivedPageDataUpdater`. In the future, we want to define interfaces for the different use cases of `DerivedPageDataUpdater`, particularly providing access to post-PST content and `ParserOutput` to callbacks during revision creation, which currently use `WikiPage::prepareContentForEdit`, and allowing updates to be triggered on purge, import, and undeletion, which currently use `WikiPage::doEditUpdates()` and `Content::getSecondaryDataUpdates()`.

The primary reason for `DerivedPageDataUpdater` to be stateful is internal caching of state that avoids the re-generation of `ParserOutput` and re-application of pre-save-transformations (PST).

`DerivedPageDataUpdater` instances follow the below life cycle, defined by a number of methods:

                         +---------------------------------------------------------------------+
                         |                                                                     |
                         |                                 new                                 |
                         |                                                                     |
                         +---------------|------------------|------------------|---------------+
                                         |                  |                  |
                   grabCurrentRevision()-|                  |                  |
                                         |                  |                  |
                             +-----------v----------+       |                  |
                             |                      |       |-prepareContent() |
                             |    knows current     |       |                  |
                             |                      |       |                  |
    Enables------------------+-----|-----|----------+       |                  |
      pageExisted()                |     |                  |                  |
      wasRedirect()                |     |-prepareContent() |                  |-prepareUpdate()
                                   |     |                  |                  |
                                   |     |    +-------------v------------+     |
                                   |     |    |                          |     |
                                   |     +---->        has content       |     |
                                   |          |                          |     |
    Enables------------------------|----------+--------------------------+     |
      isChange()                   |                              |            |
      isCreation()                 |-prepareUpdate()              |            |
      getSlots()                   |              prepareUpdate()-|            |
      getTouchedSlotRoles()        |                              |            |
      getCanonicalParserOutput()   |                  +-----------v------------v-----------------+
                                   |                  |                                          |
                                   +------------------>                 has revision             |
                                                      |                                          |
    Enables-------------------------------------------+------------------------|-----------------+
      updateParserCache()                                                      |
      runSecondaryDataUpdates()                                                |-doUpdates()
                                                                               |
                                                                   +-----------v---------+
                                                                   |                     |
                                                                   |     updates done    |
                                                                   |                     |
                                                                   +---------------------+


- `grabCurrentRevision()` returns the logical parent revision of the target revision. It is guaranteed to always return the same revision for a given `DerivedPageDataUpdater` instance. If called before `prepareUpdate()`, this fixates the logical parent to be the page's current revision. If called for the first time after `prepareUpdate()`, it returns the revision passed as the 'oldrevision' option to `prepareUpdate()`, or, if that wasn't given, the parent of $revision parameter passed to `prepareUpdate()`.

- `prepareContent()` is called before the new revision is created, to apply pre-save-transformation (PST) and allow subsequent access to the canonical `ParserOutput` of the revision. `getSlots()` and `getCanonicalParserOutput()` as well as `getSecondaryDataUpdates()` may be used after `prepareContent()` was called. Calling `prepareContent()` with the same parameters again has no effect. Calling it again with mismatching parameters, or calling it after `prepareUpdate()` was called, triggers a `LogicException`.

- `prepareUpdate()` is called after the new revision has been created. This may happen right after the revision was created, on the same instance on which `prepareContent()` was called, or later (possibly much later), on a fresh instance in a different process, due to deferred or asynchronous updates, or during import, undeletion, purging, etc. `prepareUpdate()` is required before a call to `doUpdates()`, and it also enables calls to `getSlots()` and `getCanonicalParserOutput()` as well as `getSecondaryDataUpdates()`. Calling `prepareUpdate()` with the same parameters again has no effect. Calling it again with mismatching parameters, or calling it with parameters mismatching the ones `prepareContent()` was called with, triggers a `LogicException`.

- `getSecondaryDataUpdates()` returns `DataUpdates` that represent derived data for the revision. These may be used to update such data, e.g. in `ApiPurge`, `RefreshLinksJob`, and the `refreshLinks` script.

- `doUpdates()` triggers the updates defined by `getSecondaryDataUpdates()`, and also causes updates to cached artifacts in the `ParserCache`, the CDN layer, etc. This is primarily used by PageUpdater, but also by `UndeletePage` during undeletion, and when importing revisions from XML. `doUpdates()` can only be called after `prepareUpdate()` was used to initialize the `DerivedPageDataUpdater` instance for a specific revision. Calling it before `prepareUpdate()` is called raises a `LogicException`.

A `DerivedPageDataUpdater` instance is intended to be re-used during different stages of complex update operations that often involve callbacks to extension code via
MediaWiki's hook mechanism, or deferred or even asynchronous execution of Jobs and `DeferredUpdates`. Since these mechanisms typically do not provide a way to pass a
`DerivedPageDataUpdater` directly, `WikiPage::getDerivedDataUpdater()` has to be used to obtain a `DerivedPageDataUpdater` for the update currently in progress - re-using the same `DerivedPageDataUpdater` if possible avoids re-generation of `ParserOutput` objects
and other expensively derived artifacts.

This mechanism for re-using a `DerivedPageDataUpdater` instance without passing it directly requires a way to ensure that a given `DerivedPageDataUpdater` instance can actually be used in the calling code's context. For this purpose, `WikiPage::getDerivedDataUpdater()` calls the `isReusableFor()` method on `DerivedPageDataUpdater`, which ensures that the given instance is applicable to the given parameters. In other words, `isReusableFor()` predicts whether calling `prepareContent()` or `prepareUpdate()` with a given set of parameters will trigger a `LogicException`. In that case, `WikiPage::getDerivedDataUpdater()` creates a fresh `DerivedPageDataUpdater` instance.
