# GitHub Upload Guide: Module 3, Bash Scripting Essentials

This guide takes the package in this zip and publishes it in your `Cybersecurity` repository. Follow the parts in order. The whole job takes about 20 minutes.

## What is in this zip

```
GITHUB-UPLOAD-GUIDE.md          <- this guide, do not upload it
3-bash-scripting-essentials/
├── README.md                   <- concept notes for the module
└── 3.1-africahackon-base64-automation-scripts/
    ├── report.md               <- the full report, screenshots embedded
    ├── screenshots/            <- 15 cleaned and cropped screenshots
    ├── sample-data/            <- passwords.txt and encoded.txt
    └── test-data/              <- the messy inputs, with a short README
```

The two scripts, `encode_base64.sh` and `decode_base64.sh`, are not in the zip on purpose. They must be your exact tested files from Kali, so you will add them in Part 3.

## Before you start

1. **Check the module number.** The folders are named with module number 3, because modules 1, 2 and 4 already exist in your repository. If 3 is already taken, rename the folders before uploading. Change the `3` in `3-bash-scripting-essentials` and in `3.1-africahackon-base64-automation-scripts`, then open the module `README.md` and fix the one link near the bottom that contains the folder name.
2. **Check the logo.** The README and the report show your logo from `assets/logo.png` at the top of your repository, the same file your other modules use. If your repository has no such file, delete the small logo block at the top of each of the two files.
3. **Have your GitHub login ready**, with the repository open in your browser.

## Part 1: Extract the zip

1. On your computer, right click the zip and choose Extract All.
2. Open the extracted folder. You should see this guide and the folder `3-bash-scripting-essentials`.

## Part 2: Upload the module folder

1. Open your repository on GitHub, on the main page of the repository.
2. Click **Add file**, then **Upload files**.
3. Drag the whole `3-bash-scripting-essentials` folder from your computer into the upload area. Drag the folder itself, not its contents, and leave this guide behind.
4. Wait until every file in the list shows as uploaded. You should see the README, the report, 15 screenshots, 2 sample data files, and 5 test data files plus the test data README.
5. In the box called Commit changes, type this message:

   `Add module 3: Bash scripting essentials (3.1 Base64 automation scripts)`

6. Leave **Commit directly to the main branch** selected, then click **Commit changes**.

**If the folders come out flat.** Some browsers drop the folder structure when dragging. If you see files sitting at the top of the repository instead of inside folders, do this instead:

1. Click **Add file**, then **Create new file**.
2. In the name box, type `3-bash-scripting-essentials/README.md`. Typing the slash creates the folder.
3. Paste the contents of the README from your computer, and commit.
4. Open the new folder on GitHub, click **Add file**, then **Upload files**, and upload the folder `3.1-africahackon-base64-automation-scripts` the same way.
5. If that is flattened too, repeat the idea one level down: create the folder with a new file, enter it, then upload the files that belong inside.

Delete any stray files that landed in the wrong place with the three dots menu next to the file, then Delete file.

## Part 3: Add your two scripts

The scripts live in Kali, in `~/bash-package`. We copy them as text so they arrive exactly as tested.

### Step 3a: Prepare the copy tool in Kali

```
sudo apt install -y xclip
cd ~/bash-package
```

### Step 3b: Find out where you can paste

Run this in Kali:

```
xclip -selection clipboard < encode_base64.sh
```

Now try to paste with Ctrl+V into Notepad on your main computer.

* **If the script text appears**, your clipboard is shared with Kali. Do the next steps in your normal browser on your main computer.
* **If nothing appears**, the clipboard is not shared. Do the next steps in Firefox inside Kali instead, and log in to GitHub there. Log out when you finish.

### Step 3c: Add encode_base64.sh

1. On GitHub, open the folder `3-bash-scripting-essentials`, then `3.1-africahackon-base64-automation-scripts`.
2. Click **Add file**, then **Create new file**.
3. In the name box, type `encode_base64.sh`.
4. Click inside the big editor and paste with Ctrl+V.
5. Check the very top of the editor. The first line must be `#!/bin/bash` with nothing above it. No blank line.
6. Scroll down. For the commit message type `Add encode_base64.sh`, keep **Commit directly to the main branch**, and click **Commit new file**.

### Step 3d: Add decode_base64.sh

1. Back in Kali, copy the second script:

   ```
   xclip -selection clipboard < decode_base64.sh
   ```

2. Repeat Step 3c with the name `decode_base64.sh` and the commit message `Add decode_base64.sh`.

## Part 4: Add the module to your main README

1. Go to the top level of your repository and open `README.md`.
2. Click the pencil icon to edit it.
3. Find the list of modules. Add a line for module 3, copying the style of the lines already there. A simple version looks like this:

   `* [Module 3: Bash Scripting Essentials](3-bash-scripting-essentials/)`

   Put it between module 2 and module 4 so the order makes sense.
4. Click **Commit changes**, using the message `Add module 3 to the main README`.

## Part 5: Check that it all works

Open each item on GitHub and tick it off:

* The module `README.md` opens, the logo shows, and the contents links jump to the right sections.
* The table at the bottom of the module README links to the report.
* The report opens and all 15 screenshots display inside the text. Broken images mean a folder name or a capital letter is wrong.
* In the report, the links to `encode_base64.sh` and `decode_base64.sh` open the scripts.
* In each script, line 1 reads `#!/bin/bash`.
* The folders `sample-data` and `test-data` open and show their files.

## Part 6 (optional): Prove the published scripts match your tested ones

This takes two minutes and is a real security habit: checking that what you published is identical to what you tested. In Kali, replace `YOUR-USERNAME` and `YOUR-REPO` with your own details, and `main` if your branch has a different name:

```
cd ~/bash-package
BASE=https://raw.githubusercontent.com/YOUR-USERNAME/YOUR-REPO/main/3-bash-scripting-essentials/3.1-africahackon-base64-automation-scripts
curl -s $BASE/encode_base64.sh | diff - encode_base64.sh && echo "encoder identical"
curl -s $BASE/decode_base64.sh | diff - decode_base64.sh && echo "decoder identical"
```

You should see `encoder identical` and `decoder identical`. If `diff` prints a line mentioning "No newline at end of file", that is only a missing final line break and is harmless. Any other difference means something changed during pasting, so open the script on GitHub and compare it with your original.

## If something goes wrong

| Problem | What to do |
|---|---|
| Images show as broken | Check the folder is named exactly `screenshots` and the file names are unchanged, including capital and small letters |
| The logo is missing | Your repository needs `assets/logo.png` at the top level, or delete the logo block from the two files |
| The script has a blank first line on GitHub | Edit the file with the pencil icon, delete the blank line so `#!/bin/bash` is line 1, and commit |
| The script will not run after downloading | Files created on GitHub lose the run permission. Run `chmod +x encode_base64.sh decode_base64.sh` after downloading |
| Pasting into the GitHub editor looks strange | Copy again with `xclip`, and paste into a fresh Create new file page |
| Files landed in the wrong folder | Delete them with the three dots menu, Delete file, and upload again into the right folder |

## Finish

When everything is live, open the report on GitHub and read it from top to bottom, as a recruiter would. Then send your repository link to Claude so you can review how it reads together.
