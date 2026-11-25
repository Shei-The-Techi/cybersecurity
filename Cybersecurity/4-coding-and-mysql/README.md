# Module 4: Coding and MySQL Integration

Almost every website and business application stores its information in a database. This module is about how code talks to a database, and how to do it safely. It starts with Class 1, which covers object oriented programming, APIs and MySQL integration, and its first hands on lab is a small student records application.

## Projects in this module

| Project | What it is |
|---|---|
| [4.1 Student Records Manager](4.1-student-records-crud/report.md) | A PHP and MySQL application that shows, updates and deletes student records, with the full build documented step by step |

More projects will be added here as I complete them.

## The key ideas is?

**Database.** A database is an organized store of information, like a very well structured spreadsheet that many programs can use at the same time.

**Table, row and column.** Inside a database, information lives in tables. A table has columns, which are the types of detail such as name or email, and rows, which are the individual entries, one per person or item.

**SQL.** SQL is the language used to talk to a database. Short instructions such as CREATE, INSERT, SELECT, UPDATE and DELETE tell the database what to do.

**CRUD.** Create, Read, Update and Delete are the four things nearly every application does with data. Once CRUD makes sense, the core of most business software makes sense too.

**Web server and PHP.** A web server delivers pages to your browser. PHP is a programming language that runs on the server. When you open a PHP page, the server runs the code first, asks the database for what it needs, and then sends you the finished page.

**How the pieces work together.**

1. You open a page in your browser.
2. The web server, Apache, hands the request to PHP.
3. PHP asks the database for the information it needs, or tells it to make a change.
4. The database answers.
5. PHP builds the page and sends it back to you.

**MySQL and MariaDB.** XAMPP, the free package used in this module, includes MariaDB. MariaDB was created from MySQL and speaks the same language, so the SQL and PHP code in this module works the same way on both.

## Security basics

Connecting code to a database is also where many real attacks happen, so safe habits start with the very first project.

* **SQL injection** is when an attacker types database instructions into a form field to trick an application. Prepared statements prevent it by keeping the instructions and the user's data separate.
* **Cross site scripting (XSS)** is when an attacker gets a page to run harmful code in someone else's browser. Escaping all output, so special symbols are shown as plain text, prevents it.
* **Safer deletes.** Actions that change data should be sent as form submissions, not plain links, so they cannot be triggered by accident or by another website.
* **Protecting credentials.** Database passwords never belong in a public repository.

## Tools used

XAMPP (Apache, MariaDB, PHP and phpMyAdmin), Visual Studio Code, Microsoft Edge, and Windows 11 running in a virtual machine.
