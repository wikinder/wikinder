[[#yuuki|yuuki]]

MusicXML is an interchange format for sheet music. However, it is too verbose to write by hand. MuseScore is a practical application that supports it.

LilyPond notation is useful for writing simple scores. It is less interchangeable, although python-ly provides limited support for converting to MusicXML.

Below are LilyPond fragments for nursery rhymes. See [#How to convert LilyPond scores](#how-to-convert-lilypond-scores) for instructions. All files are available in [my repo](https://github.com/yuukiarchive/sheetmusic).

## Row, Row, Row Your Boat

```lilypond
\relative c' {
  \time 6/8
  c4. c4. | c4 d8 e4. | e4 d8 e4 f8 | g2. |
  c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] | g'4 f8 e4 d8 | c2. \fine
}
```

![Sheet music for "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/fcc2eaa1-01cd-4c4f-b5d7-1efc7838a46c)

[Play "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/662457d0-92e3-4e5e-bfb0-7c229551abf1)

## Twinkle, Twinkle, Little Star

```lilypond
\relative c' {
  \time 4/4
  c4 c4 g'4 g4 | a4 a4 g2 | f4 f4 e4 e4 | d4 d4 c2 |
  g'4 g4 f4 f4 | e4 e4 d2 | g4 g4 f4 f4 | e4 e4 d2 |
  c4 c4 g'4 g4 | a4 a4 g2 | f4 f4 e4 e4 | d4 d4 c2 \fine
}
```

![Sheet music for "Twinkle, Twinkle, Little Star"](https://github.com/user-attachments/assets/24440c64-272d-45c8-97dd-d40b44c73982)

[Play "Twinkle, Twinkle, Little Star"](https://github.com/user-attachments/assets/c616135f-fb58-47f9-bdf4-c6450ab10917)

## How to convert LilyPond scores

Prerequisites:

- lilypond
- librsvg
- fluidsynth
- [FluidR3_GM.sf2](https://github.com/pianobooster/fluid-soundfont/releases)
- ffmpeg
- python
- python-ly

Example of the full LilyPond score for "[Row, Row, Row Your Boat](#row-row-row-your-boat)" (row.ly):

```lilypond
\version "2.24.4"

\paper {
  indent = #0
  line-width = #120
}

\header {
  title = "Row, Row, Row Your Boat"
}

\score {
  <<
  \chords {
    c,2.*4 |
    c,2.*2 | g,2. | c,2.
  }
  \relative c' {
    \time 6/8
    c4. c4. | c4 d8 e4. | e4 d8 e4 f8 | g2. | \break
    c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] | g'4 f8 e4 d8 | c2. \fine
  }
  >>

  \layout {
    \autoBreaksOff
    \numericTimeSignature
  }

  \midi {
    \tempo 4. = 120
  }
}
```

Convert LilyPond to SVG and MIDI:

```sh
lilypond --svg -dcrop -dmidi-extension=mid row.ly
```

Set the SVG background to white:

```sh
rsvg-convert -b white -f svg -o row.cropped.svg row.cropped.svg
```

Convert MIDI to WAV:

```sh
fluidsynth -ni /path/to/FluidR3_GM.sf2 row.mid -F row.wav
```

Convert WAV to WebM:

```sh
ffmpeg -f lavfi -i 'color=c=black:s=320x180' -i row.wav -c:v libvpx-vp9 -c:a libopus -af 'silenceremove=stop_periods=1:stop_threshold=-50dB' -shortest -pix_fmt yuv420p row.webm
```

Convert LilyPond to MusicXML (extracting only the `\relative` block):

```sh
python3 -c 'import re, sys; print(re.search(r"\\relative.*?{.*?}", open(sys.argv[1]).read(), re.DOTALL).group(0))' row.ly \
| ly musicxml -o row.musicxml
```
