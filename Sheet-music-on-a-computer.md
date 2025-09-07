MusicXML is the standard format for sheet music. However, it is too verbose to write by hand.

LilyPond notation is useful for writing simple sheet music. It can be converted to MusicXML using python-ly, but the support is very limited.

row.ly:

```lilypond
\layout {
  indent = 0
  line-width = 120
}

\relative c' {
  \time 6/8
  \autoBreaksOff
  c4. c4. | c4 d8 e4. | e4 d8 e4 f8 | g2. | \break
  c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] | g'4 f8 e4 d8 | c2. \bar "|."
}
```

Convert to SVG:

```sh
lilypond --svg -dcrop row.ly
```

Set the background color to white:

```sh
rsvg-convert -b white -f svg -o row.cropped.svg row.cropped.svg
```

![Sheet music for "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/efd112de-9199-47e8-a3d0-0f3513a06f9c)

Convert to MusicXML:

```sh
ly musicxml row.ly > row.musicxml
```

Convert to FLAC:

```sh
mscore -o row.flac row.musicxml
```

Convert to WebM:

```sh
ffmpeg -i row.flac -c:a libopus -b:a 96k row.webm
```

["Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/51ee7351-5555-4a18-9f2e-d9587a8ce325)
