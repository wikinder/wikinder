MusicXML is the standard format for sheet music. However, it is too verbose to write by hand.

LilyPond notation is useful for writing simple sheet music. Very simple LilyPond files can be converted to MusicXML using python-ly.

row-your-boat.ly:

```lilypond
\relative c' {
  \time 6/8
  c4. c4. | c4 d8 e4. |
  e4 d8 e4 f8 | g2. |
  c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] |
  g'4 f8 e4 d8 | c2.
}
```

```sh
ly musicxml foo.ly > foo.musicxml
```

```sh
mscore -o foo.flac foo.musicxml
```

```sh
ffmpeg -i foo.flac -c:a libopus -b:a 96k foo.webm
```
