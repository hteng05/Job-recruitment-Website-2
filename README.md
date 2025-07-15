# Job Recruitment Website – Assignment 2

This project is a dynamic job recruitment website built using **PHP** and **MySQL**, developed for **Assignment 2** of the unit **COS10026 – Computing Technology Inquiry Project** (Semester 2, 2023) at Swinburne University of Technology. It extends the static site from Assignment 1 by adding full server-side functionality for job applications and administrative management.

---

## About the Unit

**COS10026 – Computing Technology Inquiry Project** introduces foundational web technologies such as HTML, CSS, PHP, and MySQL. Students work on individual and group projects to build simple web applications and acquire practical experience in designing, implementing, and managing real-world systems.

---

## Project Overview

This system simulates a real-world job recruitment platform, supporting:

- A dynamic application form that stores applicant data in a database
- Server-side input validation and sanitisation
- Database management portal for HR to view, filter, update, and delete EOIs
- Modular structure using PHP includes
- A `.sql` script to automatically generate the required database and table

---

## How to Run Locally

Follow the steps below to set up and test the project on your machine.

### 1. Prerequisites

Make sure the following software is installed:

- A local web server environment (e.g., [XAMPP](https://www.apachefriends.org/))
- PHP 7 or higher
- MySQL or MariaDB
- A web browser (e.g., Chrome)

### 2. Project Setup

1. **Clone or download** this repository.
2. Place the entire folder (e.g., `Job-recruitment-Website-2`) into your local server's web root:
   - XAMPP default: `C:\xampp\htdocs\assign2`
   - MAMP default: `/Applications/MAMP/htdocs/assign2`
3. Keep the folder structure intact.

### 3. Database Setup

#### Option A – Using phpMyAdmin

1. Start **Apache** and **MySQL** in your XAMPP or MAMP control panel.
2. Go to `http://localhost/phpmyadmin`
3. Click **Import** and upload `database.sql` (included in this repo).
4. This will create a database and the required `eoi` table.

#### Option B – Using MySQL CLI

```bash
mysql -u root -p
CREATE DATABASE assign2_db;
USE assign2_db;
SOURCE path/to/database.sql;
```

### 4. Configure Database Connection

Edit the file `settings.php` and update the credentials:

```php
<?php
$host = "localhost";
$user = "root";           // default for XAMPP
$pwd = "";                // empty by default
$sql_db = "assign2_db";   // match the imported DB name
?>
```

### 5. Launch the Application

Open your browser and go to:

```
http://localhost/assign2/index.php
```

From there, you can:
- Navigate the job listings
- Submit applications
- Access the HR portal at `manage.php` to view and manage EOIs

---

## Application Features

### Job Application Form (`apply.php`)
- Server-side form handling and validation
- Auto-generates `EOInumber`
- Submits data to the `eoi` table
- Displays confirmation message on success

### EOI Management Portal (`manage.php`)
- Lists all job applications
- Filter EOIs by:
  - Job reference number
  - Applicant’s name
- Update EOI status (New, Current, Final)
- Delete EOIs by job reference

### Modular Includes
- `header.inc`, `menu.inc`, `footer.inc` for layout consistency

### PHP Enhancements
- Server-side creation of table if missing
- Input sanitisation and error handling
- Prevents direct access to processing page (`processEOI.php`)

---

## Author

**Duong Ha Tien Le (@hteng05)**  
Swinburne University of Technology  
Bachelor of Computer Science  
Unit: COS10026 – Computing Technology Inquiry Project (2023, Semester 2)

---

## Reference

Refer to the file `assignment2_brief.pdf` in the repository for full project requirements and specifications.
