# Test data

These small files are the inputs I used to test the two scripts. Each one is built to trigger a specific situation.

| File | What it contains | What it tests |
|---|---|---|
| `blank_lines.txt` | Two lines with empty lines between them | Empty lines must be skipped and the order kept |
| `no_final_newline.txt` | Two lines, with no line break after the last one | The last line must not be lost |
| `windows_style.txt` | Two lines ending the Windows way | Hidden carriage return characters must be removed |
| `special_chars.txt` | Spaces, a dollar sign, quotes and a backslash | Special characters must survive exactly as typed |
| `bad_base64.txt` | Valid Base64 mixed with broken lines | The decoder must flag bad lines and carry on |

All values are made up for practice. None of them are real credentials.
