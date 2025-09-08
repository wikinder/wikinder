MusicXML is an interchange format for music scores. However, it is too verbose to write by hand. MuseScore supports it and is suitable for practical use.

LilyPond notation is useful for writing simple scores. It is less interchangeable; only python-ly has limited support for converting to MusicXML.

Below, you'll find LilyPond fragments for various nursery rhymes. For the full source code and conversion instructions, see [#How to convert LilyPond files](#how-to-convert-lilypond-files). All files are available in [my repo](https://github.com/yuukiarchive/sheetmusic).

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

## How to convert LilyPond files

Prerequisites:

* lilypond
* librsvg
* fluidsynth
    * FluidR3_GM.sf2
* ffmpeg
* python-ly

Example of the full source code for "[Row, Row, Row Your Boat](#row-row-row-your-boat)" (row.ly):

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

Set the SVG background color to white:

```sh
rsvg-convert -b white -f svg -o row.cropped.svg row.cropped.svg
```

Convert MIDI to WAV:

```sh
fluidsynth -ni FluidR3_GM.sf2 -F row.wav row.mid
```

Convert WAV to WebM:

```sh
ffmpeg -i row.wav -c:a libopus row.webm
```

Convert LilyPond to MusicXML:

```sh
ly musicxml row.ly > row.musicxml
```
