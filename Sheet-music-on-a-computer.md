MusicXML is the standard format for sheet music. However, it is too verbose to write by hand.

LilyPond notation is useful for expressing simple sheet music. Simple LilyPond files can be converted to MusicXML using python-ly.

foo.ly:

```lilypond
\relative c' {
  c d e f g a b c
}
```

```bash
ly musicxml foo.ly > foo.musicxml

mscore -o foo.flac foo.musicxml

ffmpeg -i foo.flac -c:a libopus -b:a 96k foo.webm
```
