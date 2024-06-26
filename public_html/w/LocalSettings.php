<?php
# This file was automatically generated by the MediaWiki 1.39.7
# installer. If you make manual changes, please keep track in case you
# need to recreate them later.
#
# See docs/Configuration.md for all configurable settings
# and their default values, but don't forget to make changes in _this_
# file, not there.
#
# Further documentation for configuration settings may be found at:
# https://www.mediawiki.org/wiki/Manual:Configuration_settings

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}


# https://www.mediawiki.org/wiki/Manual:Securing_database_passwords
require_once "/virtual/wikinder/.htdbpasswd";

## Uncomment this to disable output compression
# $wgDisableOutputCompression = true;

$wgSitename = "Wikinder";

## The URL base path to the directory containing the wiki;
## defaults for all runtime URL paths are based off of this.
## For more information on customizing the URLs
## (like /w/index.php/Page_title to /wiki/Page_title) please see:
## https://www.mediawiki.org/wiki/Manual:Short_URL
$wgScriptPath = "/w";
$wgArticlePath = "/wiki/$1";

## The protocol and server name to use in fully-qualified URLs
$wgServer = "https://wikinder.org";

## The URL path to static resources (images, scripts, etc.)
$wgResourceBasePath = $wgScriptPath;

## The URL paths to the logo.  Make sure you change this from the default,
## or else you'll overwrite your logo when you upgrade!
$wgLogos = [
	'wordmark' => [
		'src' => "$wgResourceBasePath/resources/assets/logo/logo.png",
		'width' => 290,
		'height' => 50,
	],
];

## UPO means: this is also a user preference option

$wgEnableEmail = true;
$wgEnableUserEmail = false; # UPO

$wgEmergencyContact = "bear@wikinder.org";
$wgPasswordSender = $wgEmergencyContact;

$wgEnotifUserTalk = false; # UPO
$wgEnotifWatchlist = true; # UPO
$wgEmailAuthentication = true;

# MySQL specific settings
$wgDBprefix = "";

# MySQL table options to use during installation or update
$wgDBTableOptions = "ENGINE=InnoDB, DEFAULT CHARSET=binary";

# Shared database table
# This has no effect unless $wgSharedDB is also set.
$wgSharedTables[] = "actor";

## Shared memory settings
$wgMainCacheType = CACHE_ACCEL;
$wgMemCachedServers = [];

## To enable image uploads, make sure the 'images' directory
## is writable, then set this to true:
$wgEnableUploads = true;
$wgUseImageMagick = true;
$wgImageMagickConvertCommand = "/usr/bin/convert";

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = true;

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = true;

# Site language code, should be one of the list in ./includes/languages/data/Names.php
$wgLanguageCode = "mul";

# Time zone
$wgLocaltimezone = "UTC";

## Set $wgCacheDirectory to a writable directory on the web server
## to make your wiki go slightly faster. The directory should not
## be publicly accessible from the web.
$wgCacheDirectory = "$IP/cache";

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

## For attaching licensing metadata to pages, and displaying an
## appropriate copyright notice / icon. GNU Free Documentation
## License and Creative Commons licenses are supported so far.
$wgRightsPage = ""; # Set to the title of a wiki page that describes your license/copyright
$wgRightsUrl = "https://creativecommons.org/licenses/by-sa/4.0/";
$wgRightsText = "Creative Commons Attribution-ShareAlike";
$wgRightsIcon = "$wgResourceBasePath/resources/assets/licenses/cc-by-sa.png";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

## Default skin: you can change the default skin. Use the internal symbolic
## names, e.g. 'vector' or 'monobook':
$wgDefaultSkin = "minerva";

# Enabled skins.
# The following skins were automatically enabled:
wfLoadSkin( 'MinervaNeue' );


# End of automatically generated settings.
# Add more configuration options below.

wfLoadExtensions([ 'ConfirmEdit', 'ConfirmEdit/ReCaptchaNoCaptcha' ]);
wfLoadExtension( 'InputBox' );
# wfLoadExtension( 'Math' );
wfLoadExtension( 'MultimediaViewer' );
# wfLoadExtension( 'OATHAuth' );
wfLoadExtension( 'PageImages' );
wfLoadExtension( 'ParserFunctions' );
# wfLoadExtension( 'Scribunto' );
wfLoadExtension( 'SyntaxHighlight_GeSHi' );
wfLoadExtension( 'TemplateData' );
wfLoadExtension( 'TextExtracts' );
# wfLoadExtension( 'TwitterCards' );
wfLoadExtension( 'VisualEditor' );
wfLoadExtension( 'WikiEditor' );

# PageImages
$wgPageImagesOpenGraphFallbackImage = "$wgResourceBasePath/resources/assets/logo/icon.png";

# Scribunto
# $wgScribuntoDefaultEngine = "luastandalone";
# $wgScribuntoEngineConf['luastandalone']['luaPath'] = "/virtual/wikinder/lua-5.1.5/bin/lua-5.1.5";
# $wgScribuntoEngineConf['luastandalone']['errorFile'] = "/virtual/wikinder/public_html/w/extensions/Scribunto/errorfile.log";
# $wgScribuntoUseGeSHi = true;
# $wgScribuntoUseCodeEditor = true;

$wgAllowSiteCSSOnRestrictedPages = true;

$wgDefaultUserOptions['enotifwatchlistpages'] = 0;
$wgDefaultUserOptions['uselivepreview'] = 1;
$wgDefaultUserOptions['watchcreations'] = 0;
$wgDefaultUserOptions['watchdefault'] = 0;
$wgDefaultUserOptions['watchuploads'] = 0;

$wgEnableCanonicalServerLink = true;

$wgHiddenPrefs = [
	# User profile
	'realname',
	'gender',
	'nickname',
	'fancysig',

	# Appearance
	'skin',
	'skin-responsive',
	'imagesize',
	'thumbsize',
	'diffonly',
	'norollbackdiff',
	'underline',
	'showhiddencats',
	'multimediaviewer-enable',
	'math',

	# Editing
	'editsectiononrightclick',
	'editondblclick',
	'editfont',
	'minordefault',

	# Recent changes
	'usenewrc',
	'hideminor',
];

$wgNamespaceProtection[NS_PROJECT] = ['editinterface'];
$wgNamespaceProtection[NS_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_USER_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_PROJECT_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_FILE_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_MEDIAWIKI_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_TEMPLATE_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_HELP_TALK] = ['editinterface'];
$wgNamespaceProtection[NS_CATEGORY_TALK] = ['editinterface'];

$wgNamespacesWithSubpages[NS_MAIN] = true;

$wgRestrictDisplayTitle = false;

# https://stackoverflow.com/a/75599934
function add_html_to_head(&$out, &$skin) {
    $out->addHeadItem('my_html_code', '<!--nobanner-->');
}
$wgHooks['BeforePageDisplay'][] = 'add_html_to_head';

# $wgShowExceptionDetails = true;
