# Mon Junior Web Developer Technical Exam - CRM Client Management Module

## Overview

This is a Laravel project i created as part of the Junior Web Developer technical exam.  
It demonstrates my knowledge of Laravel structure, Eloquent ORM, routing, validation, and the repository pattern.

**Note:** This repository contains **Part 1** and **Part 2** of the exam.

---

## Requirements

Before running this project, ensure your machine has the following installed:

- **PHP 8+**

```bash
php -v
```

- **Composer**

```bash
composer -v
```

- **Node.js & npm**

```bash
node -v
npm -v
```

- **PHPMySQL**
- **Laravel** (via Composer global install)

```bash
laravel -v
```

---

## Project Setup – Part 1

Follow these steps to set up and run the project PART 1 locally:
My answers in Part 1 will be found in web.php in part 1.

1. **Clone the repository**

```bash
git clone https://github.com/SimplyMon/EDM-task.git
cd EDM-task/part-1
```

2. **Install PHP & Node dependencies**

```bash
npm install
composer install
```

3. **Run migrations (make sure xampp Apache & MYSQL is running)**

```bash
php artisan migrate
```

4. **Running the Application**

```bash
php artisan serve:dev
```

**Go to**
**http://127.0.0.1:8000/ OR http://localhost:8000**

Wait Until the App is Running Refresh if needed.:

---

## Project Setup – Part 2

Follow these steps to set up and run the project PART 2 locally:

1. **Clone the repository**

```bash
git clone https://github.com/SimplyMon/EDM-task.git
cd EDM-task/part-2
```

2. **Install PHP & Node dependencies**

```bash
npm install
composer install
```

3. **Rollback Migrations**

   You might need to rollback the old migrations from part 1:

```bash
php artisan migrate:rollback
```

4. **Run migrations (make sure xampp Apache & MYSQL is running)**

```bash
php artisan migrate
```

5. **Running the Application**

```bash
php artisan serve:dev
```

**Go to**
**http://127.0.0.1:8000/ OR http://localhost:8000**

Wait Until the App is Running Refresh if needed.:

---

_Created by Simon Pasag_
