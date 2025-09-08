MusicXML is an interchange format for musical scores. However, it is too verbose to write by hand.

LilyPond notation is useful for writing simple scores. It can be converted to MusicXML using python-ly, although support is limited.

This article shows rough LilyPond notation for several nursery rhymes. See the [How to convert it](#how-to-convert-it) section for the full source code. See [my repo](https://github.com/yuukiarchive/sheetmusic) for all files.

## Row, Row, Row Your Boat

```lilypond
\relative c' {
  \time 6/8
  c4. c4. | c4 d8 e4. | e4 d8 e4 f8 | g2. |
  c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] | g'4 f8 e4 d8 | c2. \bar "|."
}
```

![Sheet music for "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/f7885323-ab42-4ac4-9210-7989245f0823)

[Play "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/8b48be04-c256-4d81-b155-5661b63c21ba)

## Twinkle, Twinkle, Little Star

## How to convert it

<details>
<summary>[show]</summary>

row.ly:

```lilypond
\version "2.24.4"

\score {
  \relative c' {
    \time 6/8
    c4. c4. | c4 d8 e4. | e4 d8 e4 f8 | g2. | \break
    c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] | g'4 f8 e4 d8 | c2. \bar "|."
  }

  \layout {
    \autoBreaksOff
    indent = #0
    line-width = #120
  }

  \midi {
    \tempo 4. = 108
  }
}
```

Convert to SVG and MIDI:

```sh
lilypond --svg -dcrop -dmidi-extension=mid row.ly
```

Set the background color to white:

```sh
rsvg-convert -b white -f svg -o row.cropped.svg row.cropped.svg
```

Convert to WAV:

```sh
fluidsynth -ni FluidR3_GM.sf2 -F row.wav row.mid
```

Convert to WebM:

```sh
ffmpeg -i row.wav -c:a libopus row.webm
```

Convert to MusicXML:

```sh
ly musicxml row.ly > row.musicxml
```

</details>
