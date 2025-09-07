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
