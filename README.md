# School Lunch Boxes Multan 🍱

## Project Overview

School Lunch Boxes Multan is a comprehensive web application designed to revolutionize school meal services in Multan. Our platform provides a user-friendly solution for parents, schools, and lunch box providers to manage and order nutritious, high-quality meal packages.

## Key Features

### User Features
- 🥪 **Product Exploration**
  - Browse a wide range of lunch box options
  - View detailed service descriptions and meal packages
  - Check comprehensive pricing information

- 📞 **Contact & Support**
  - Easy-to-use contact form for inquiries
  - Direct communication channel with the lunch box service provider

- 🛒 **Ordering System**
  - Seamless online ordering process
  - Customize lunch box selections

### Administrator Features
- 🔒 **Complete Service Management**
  - Create new lunch box services
  - Update existing service details
  - Delete outdated or discontinued services
  - Manage service pricing and availability

## Technology Stack
- **Backend:** Laravel PHP Framework
- **Frontend:** Blade Templates
- **Authentication:** Laravel Breeze
- **Database:** MySQL
- **Package Management:** Composer, npm

## Target Audience
- Parents looking for convenient school lunch solutions
- Schools interested in outsourcing meal services
- Lunch box service providers in Multan

## Mission Statement
Our goal is to provide convenient, nutritious, and high-quality lunch box solutions that make meal planning easier for parents while ensuring children receive balanced, delicious meals.


## Prerequisites

Ensure the following software is installed on your system before proceeding:

1. **XAMPP**  
   Download and install from [https://www.apachefriends.org/](https://www.apachefriends.org/).  
   Start **Apache** and **MySQL** services using the XAMPP Control Panel.

2. **Composer**  
   Download and install from [https://getcomposer.org/](https://getcomposer.org/).

3. **Node.js**  
   Download and install from [https://nodejs.org/](https://nodejs.org/).

## Installation Steps

### 1. Install Laravel
Use Composer to globally install Laravel:
```bash
composer global require laravel/installer
```

### 2. Create a New Laravel Project
Run the following command to create a new Laravel project named Assignment3:
```bash
laravel new assignment3
```
During the process, select Breeze for authentication scaffolding, choose Blade as the front-end, and enable PHPUnit for testing.

### 3. Clone the Repository
Clone this repository to your local machine:
```bash
git clone https://github.com/school-lunch-boxes.git
```
Replace the files in the newly created Laravel project with the files from the cloned repository:
```bash
cp -r path/to/school-lunch-boxes/* path/to/assignment3/
```

### 4. Install Dependencies
Navigate to the project directory and run the following commands:
```bash
cd assignment3
composer install
npm install
npm run dev
```

### 5. Run Migrations
Run migrations to set up database tables:
```bash
php artisan migrate
```

### 6. Seed the Database
Populate the database with sample data:
```bash
php artisan db:seed
```

## Launching the Project
Start the development server:
```bash
php artisan serve
```
Access the project at http://localhost:8000.
