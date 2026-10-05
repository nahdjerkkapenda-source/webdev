# Library Inventory System

## Requirements

Before running the project, make sure you have:

* PHP
* Composer
* Laravel
* XAMPP (for MySQL/MariaDB)
* Git

## Installation

### 1. Clone the repository

```bash
git clone <repository-url>
cd webdev
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Create the environment file

Copy the `.env.example` file and rename the copy to:

```text
.env
```

Then configure the database settings in `.env`.

Example for a local database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webdev
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Generate the application key

```bash
php artisan key:generate
```

### 5. Create the database

Start **MySQL** in XAMPP.

Open the MySQL command line. If `mysql` is not recognized in PowerShell, use the XAMPP MySQL executable:

```powershell
C:\xampp\mysql\bin\mysql.exe -u root -p
```

Then create the database:

```sql
CREATE DATABASE webdev;
```

Exit MySQL:

```sql
exit;
```

### 6. Run the migrations

```bash
php artisan migrate
```

This creates the tables required by the application.

### 7. Start the Laravel development server

```bash
php artisan serve
```

## Updating the Project

When pulling new changes from GitHub:

```bash
git pull
```

Then install any new dependencies if necessary:

```bash
composer install
```

If new database migrations were added:

```bash
php artisan migrate
```

## Important

**Do not run:**

```bash
php artisan migrate:fresh
```

unless you intentionally want to delete all existing database tables and recreate them.

`migrate:fresh` will delete the existing tables and their data.
