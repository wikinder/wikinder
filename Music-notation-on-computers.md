MusicXML is an interchange format for music scores. However, it is too verbose to write by hand. MuseScore supports it and is suitable for practical use.

LilyPond notation is useful for writing simple scores. It is less interchangeable, although python-ly provides limited support for converting to MusicXML.

Below, you'll find LilyPond fragments for nursery rhymes. For the full code and instructions, see [#How to convert LilyPond files](#how-to-convert-lilypond-files). All files are available in [my repo](https://github.com/yuukiarchive/sheetmusic).

## Row, Row, Row Your Boat

```lilypond
\relative c' {
  \time 6/8
  c4. c4. | c4 d8 e4. | e4 d8 e4 f8 | g2. |
  c8[ c8 c8] g8[ g8 g8] | e8[ e8 e8] c8[ c8 c8] | g'4 f8 e4 d8 | c2. \fine
}
```

![Sheet music for "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/4c65b571-0107-4efe-9ceb-c95033cafd2d)

[Play "Row, Row, Row Your Boat"](https://github.com/user-attachments/assets/775c080b-f99c-4b4c-8d81-ee06e0ccbb49)

## Twinkle, Twinkle, Little Star

## How to convert LilyPond files

Prerequisites:

* lilypond
* librsvg
* fluidsynth
* [FluidR3_GM.sf2](https://github.com/pianobooster/fluid-soundfont/releases)
* ffmpeg
* python-ly

Example of the full LilyPond code for "[Row, Row, Row Your Boat](#row-row-row-your-boat)" (row.ly):

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
ffmpeg -i row.wav -c:a libopus row.webm
```

Convert LilyPond to MusicXML (extracting only the `\relative` block):

```sh
python3 -c 'import re, sys; print(re.search(r"\\relative.*?{.*?}", open(sys.argv[1]).read(), re.DOTALL).group(0))' row.ly \
| ly musicxml > row.musicxml
```
