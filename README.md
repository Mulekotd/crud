# CRUD with PHP

## Overview

The project is a basic CRUD (Create, Read, Update, Delete) application developed in PHP. It allows users to interact with a PostgreSQL database to perform common database operations: creating, reading, updating, and deleting records.

## Features

* Create: Users can add new records to the database by providing a name, email, and age.

* Read: The application displays a table listing all records in the database. Users can view existing records.

* Update: Users can edit the information of existing records, including the name, email, and age.

* Delete: Records can be deleted from the database, removing them permanently.

## Requirements

Before using this project, ensure that you have the following software installed in your development environment:

* **PHP (7.4 or later):** You can download PHP from [the official PHP website.](https://www.php.net/downloads.php)

![php](https://seeklogo.com/images/E/elephpant-mascot-php-logo-4C78D1AC4E-seeklogo.com.png?v=638245916460000000)

* **Composer:** Install Composer by following [the Composer download instructions.](https://getcomposer.org/download/)

![composer](https://www.magenteiro.com/blog/wp-content/uploads/2017/07/Logo-composer-transparent.png)

* **PostgreSQL:** Download and install PostgreSQL from [the official PostgreSQL website.](https://www.postgresql.org/download/)

![postgres](https://miro.medium.com/v2/resize:fit:610/1*mMq3Bem9r8ASAn1YwcTbEw.png)

* **Apache HTTP Server:** Obtain and install Apache HTTP Server by following [the official Apache download instructions.](https://httpd.apache.org/download.cgi).

![apache](https://upload.wikimedia.org/wikipedia/commons/thumb/1/10/Apache_HTTP_server_logo_%282019-present%29.svg/2560px-Apache_HTTP_server_logo_%282019-present%29.svg.png)

## Installation and Setup

**1 - Clone or Download the Repository:**

Clone this repository to your local development environment or download the source code.

```bash
git clone https://github.com/Mulekotd/php-crud.git

cd php-crud
```

**2 - Install Dependencies with Composer:**

Open a terminal and run the composer install command to set up all project dependencies.

**3 - Configure the PostgreSQL Database Connection:**

Open the includes/db_connection.php file and configure the PostgreSQL database connection. You can update the host, username, password, and database name as needed.

Example .env file:

```.env
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USER=your_user
DB_PASSWORD=your_password
```

**4 - Import the SQL File into the Database:**

Use a database administration tool such as psql or a graphical client like pgadmin to import the sql/database.sql file into your PostgreSQL database. This will create the necessary tables and structures for the application to function.

Example using the psql command:

```psql
psql -U your_user -d your_database_name -a -f sql/database.sql
```

## Usage

1. Start your web server.

2. Access the project via a web browser.

3. Use the provided web interface to create, read, update, and delete records in the database.

## Screenshots

* **Main Screen:**

![main-screen](https://snipboard.io/QxLz2H.jpg)

* **Create Records:**

![create](https://snipboard.io/zHdEeu.jpg)

* **Read Record:**

![read](https://snipboard.io/t0RrHk.jpg)

* **Update Record:**

![update](https://snipboard.io/rWIOR1.jpg)

* **Delete Record:**

![delete](https://snipboard.io/R0dUtH.jpg)

## License

This project is open-source and is provided under the MIT License. You are free to use and modify it as needed. Feel free to contribute to the project or report any issues on the GitHub repository.

![mit](https://upload.wikimedia.org/wikipedia/commons/thumb/0/0c/MIT_logo.svg/1920px-MIT_logo.svg.png)

## Feedback and Contributions

We welcome feedback, suggestions, and contributions from the community. If you have ideas for improvements or encounter any issues, please don't hesitate to [open an issue](https://github.com/Mulekotd/php-crud/issues) on GitHub.
