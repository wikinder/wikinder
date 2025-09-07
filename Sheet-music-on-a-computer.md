MusicXML is the standard format for sheet music. However, it is too verbose to write by hand.

LilyPond notation is useful for writing simple sheet music. Very simple LilyPond files can be converted to MusicXML using python-ly.

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

```sh
lilypond --svg -dcrop row.ly
```

```sh
rsvg-convert -b white -f svg -o row.cropped.svg row.cropped.svg
```

![Sheet music for "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/efd112de-9199-47e8-a3d0-0f3513a06f9c)

![row cropped](https://github.com/user-attachments/assets/7c610af6-aba8-4832-977c-1f7e1ad95270)

```sh
ly musicxml foo.ly > foo.musicxml
```

```sh
mscore -o foo.flac foo.musicxml
```

```sh
ffmpeg -i foo.flac -c:a libopus -b:a 96k foo.webm
```
