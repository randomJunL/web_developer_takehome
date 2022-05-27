## Codebase
The codebase is a simple MVC and consists of `controller.php`, `model.php`, `view.php`, and `db.php`
### db.php
The class `Database` in this file manages PDO connections. It supports `sqlite3` for fast concept of proof. It also supports `mysql`.
It serves as the parent class of `Requester` class in `model.php`
### controller.php
The `RequesterController` class manages HTTP requests.  It detects request methods, and decide if it needs to show existing data with `index()` method, or if it needs to add inputs to database and show existing data with `addEntry()`.
It also sanitizes user inputs to prevent potential SQL injections.
### model.php
The `Requester` class is a child class of `Database` in `db.php`. It applies actual operations on database, such as `getAllEntries()` to fetch existing data from database, and `addEntry()` to insert user input into the table
### view.php
The `Html` class in `view.php` is responsible for rendering data fetched by the model, `Requester`, into HTML markups. Currently, it only generates the form for user inputs and the table listing existing and newly added data.

## Database schema
`src/sql/schema.sql` creates the table of `REQUESTER` and insert a sample entry.

## Sample Database
`db/database.db` is a sample database for the codebase to run without further configuration.

## HTML Layout
The `index.php` contains layout offered by IU Rivet Design System, https://rivet.iu.edu/

## How to run
1. In terminal, create a new folder and name it, say, `sph_task`
2. Get into the newly created folder in terminal by ` cd sph_task`
3. Clone this repo by `git clone `
4. Get into the cloned folder in terminal
5. Start php development server by `php -S localhost:8000`
6. Start a browser and visit `localhost:8000`
