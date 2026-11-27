<p align="center">
  <img src="../assets/logo.png" alt="Repository logo" width="140">
</p>

# Module 3: Bash Scripting Essentials

This module is about teaching the computer to do repetitive work for me. Instead of typing the same commands again and again, I write them once in a Bash script and run that script whenever I need it. The notes below are in my own words. The hands on work is in the project listed at the end.

## Contents

1. [What Bash is](#what-bash-is)
2. [Why scripts matter in security work](#why-scripts-matter-in-security-work)
3. [The building blocks](#the-building-blocks)
4. [Base64 in plain language](#base64-in-plain-language)
5. [Habits of a careful scripter](#habits-of-a-careful-scripter)
6. [Command quick reference](#command-quick-reference)
7. [Projects in this module](#projects-in-this-module)

## What Bash is

Bash is the program that reads the commands I type into a Linux terminal and carries them out. A script is simply a text file containing those commands, written in order. When I run the file, Bash performs them one after another, exactly the same way every time.

## Why scripts matter in security work

Security work is full of small, repeated jobs: checking logs, converting data, running updates, repeating a test on many files. A script makes those jobs faster, but just as important, it makes them consistent and documented. A script is a written record of exactly what was done, which anyone can read, rerun and check.

## The building blocks

**The shebang.** The first line of a script is `#!/bin/bash`. It tells the system to run the file with Bash. The `#!` must be the very first two characters in the file. A blank line above it breaks it, and I learned that the hard way in project 3.1.

**Comments.** Any line starting with `#` is ignored by Bash. Comments explain what the script is for and how to use it.

**Variables.** A variable is a labelled box that holds a value. I create one with `name="value"` and read it back with `"$name"`. Wrapping it in double quotes keeps spaces and special characters safe.

**Reading input.** `read -r -p "Question: " answer` shows a question and stores what the user types in the variable `answer`.

**Decisions.** An `if` statement runs commands only when a test is true. The tests I used most:

| Test | Meaning |
|---|---|
| `-e file` | The file exists |
| `-f file` | The file exists and is a regular file, not a folder |
| `-r file` | The file can be read |
| `-n "$text"` | The text is not empty |
| `-z "$text"` | The text is empty |
| `a -ef b` | Both names point to the very same file |

**Loops.** A `for` loop repeats commands for each item in a list. A `while read` loop repeats them for each line of a file.

**Functions.** A function groups commands under a name so they can be reused. In project 3.1, a small function called `die` prints an error message and stops the script.

**Exit codes.** Every command finishes with a number. Zero means success and anything else means failure. `echo $?` shows the number from the last command, and `exit 1` stops a script with a failure code. Other programs and scripts rely on this number to know whether something worked.

**Redirection and pipes.** These move data around:

| Symbol | What it does |
|---|---|
| `>` | Sends output into a file, replacing what was there |
| `>>` | Adds output to the end of a file |
| `2>&1` | Sends error messages to the same place as normal output |
| `/dev/null` | A black hole that throws away anything sent to it |
| the pipe symbol | Hands the output of one command to the next command |

**Quoting and printing.** `echo` adds a hidden line break at the end of what it prints. `printf '%s'` does not. That small difference matters when the exact characters count, as they do in Base64.

**Making a script runnable.**

```
nano myscript.sh        # write the script
chmod +x myscript.sh    # give it permission to run
./myscript.sh           # run it
```

A small example putting several blocks together:

```bash
#!/bin/bash
# Greets the user and counts to three
name="Sam"
echo "Hello, $name"
for i in 1 2 3; do
    echo "Count: $i"
done
```

## Base64 in plain language

Base64 rewrites any data using only 64 ordinary characters: capital letters, small letters, digits, plus and slash. It exists so that data can travel safely through systems that only handle plain text. Three input bytes become four output characters, so the result is about one third bigger. Equals signs at the end fill any gaps, and the length is always a multiple of four.

It helps to compare three ideas that people often mix up:

| Idea | Purpose | Can it be reversed? |
|---|---|---|
| Encoding (Base64) | Change the format so data travels safely | Yes, by anyone, with no key |
| Encryption | Keep data secret | Yes, but only with the right key |
| Hashing | Create a fingerprint of data | No, it only goes one way |

Base64 is encoding. It does not protect anything. It appears all over real systems, for example inside the header of a basic authentication login on the web and inside the text parts of many login tokens. Being able to spot Base64 and decode it is a basic analyst skill, and finding a password stored as Base64 is a security finding, because it is effectively stored in plain sight.

## Habits of a careful scripter

* Comment the script, including how to run it.
* Check every input before doing any work.
* Fail loudly. Print a clear message and exit with a non zero code. Never report success when something went wrong.
* Never write into a file you are still reading from.
* Do not trust a tool to validate data for you. Check the rules yourself.
* Use functions so that code is reused and easy to read.
* Run a linter such as ShellCheck and fix what it reports.
* Test with messy input on purpose, not only tidy input.
* Practise with sample or made up data, never real credentials.

## Command quick reference

| Command | What it does |
|---|---|
| `nano file` | Opens a simple text editor inside the terminal |
| `chmod +x file` | Gives a file permission to run as a program |
| `./file` | Runs a script that is in the current folder |
| `cat file` | Prints a file on screen |
| `cat -A file` | Prints a file and makes hidden characters visible: `$` marks a line end and `^M` marks a Windows carriage return |
| `head -n 10 file` | Shows the first ten lines of a file |
| `wc -c file` | Counts the bytes in a file |
| `diff a b` | Compares two files and prints the differences, or nothing if they match |
| `printf 'text\n'` | Prints text exactly as written |
| `bash -n script` | Checks the grammar of a script without running it |
| `bash -x script` | Runs a script in debug mode and shows each step |
| `shellcheck script` | Reads a script and warns about likely mistakes |
| `command -v tool` | Tells me whether a tool exists on this system |
| `find ~ -name '*.png'` | Searches my home folder for files by name |
| `echo $?` | Shows the exit code of the last command |

## Projects in this module

| Project | Summary |
|---|---|
| [3.1 Base64 automation scripts](5.1-africahackon-base64-automation-scripts/report.md) | An encoder and a decoder written in Bash, tested with messy input, error cases and simulated systems, with three real problems found and fixed along the way |
