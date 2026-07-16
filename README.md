# Smart Online Shopping System

![Project](https://img.shields.io/badge/Project-E--Commerce-blue)
![PHP](https://img.shields.io/badge/Backend-PHP%208.2-purple)
![Docker](https://img.shields.io/badge/Container-Docker-blue)
![Database](https://img.shields.io/badge/Database-TiDB%20Cloud-orange)
![CI/CD](https://img.shields.io/badge/CI/CD-GitHub%20Actions-green)

---

# Live Application

🌐 **Website URL**

https://smart-online-shopping-final.onrender.com

---

# Project Overview

Smart Online Shopping System is a full-stack e-commerce web application developed to provide customers with a simple, secure, and convenient way to purchase products online.

The system allows customers to register, login, browse products, search products, add items to a shopping cart, complete checkout, and manage their orders.

The project demonstrates practical implementation of:

* Web application development
* Database management
* Cloud deployment
* Docker containerization
* Continuous Integration using GitHub Actions

---

# Project Objectives

The objectives of this project are:

* To develop an online shopping platform.
* To provide customers with easy access to products.
* To implement user authentication.
* To manage products and orders efficiently.
* To store information using a relational database.
* To deploy the application on a cloud platform.
* To apply DevOps practices using Docker and CI/CD.

---

# System Features

## Customer Features

Customers can:

* Create an account
* Login and logout
* Browse products
* Search products
* Filter products by category
* View product details
* Add products to cart
* Update cart items
* Checkout orders
* View order history
* Submit product reviews

## Administrator Features

Administrators can:

* Login to admin dashboard
* Manage products
* Add products
* Update products
* Delete products
* Manage categories
* View customer orders
* Update order status

---

# Technologies Used

## Frontend

* HTML5
* CSS3
* Bootstrap 5
* JavaScript

## Backend

* PHP 8.2

## Database

Development:

* MySQL / MariaDB using XAMPP

Production:

* TiDB Cloud (MySQL compatible)

## Server

* Apache

## Deployment

* Render Cloud Platform

## DevOps Tools

* Git
* GitHub
* GitHub Actions
* Docker
* Docker Compose

---

# System Architecture

The application follows a three-layer architecture:

```
User Browser
      |
      |
Frontend Interface
      |
      |
PHP Backend
      |
      |
Database Server
```

Deployment architecture:

```
Developer
    |
    |
GitHub Repository
    |
    |
GitHub Actions CI
    |
    |
Render Deployment
    |
    |
Live Website
```

Docker architecture:

```
PHP Apache Container
          |
          |
MySQL Database Container
```

---

# Database Design

Database Name:

```
smart_online_shop
```

Main tables:

| Table       | Description                                   |
| ----------- | --------------------------------------------- |
| users       | Stores customer and administrator information |
| categories  | Stores product categories                     |
| products    | Stores available products                     |
| orders      | Stores customer orders                        |
| order_items | Stores products inside orders                 |
| reviews     | Stores customer reviews                       |

Database relationships:

* One category contains many products.
* One user can create many orders.
* One order contains many order items.
* Users can review products.

---

# Project Structure

```
smart-online-shopping/

│
├── assets/
│   └── images/
│
├── config/
│   └── database.php
│
├── includes/
│   ├── header.php
│   ├── Navbar.php
│   └── footer.php
│
├── admin/
│
├── index.php
├── login.php
├── register.php
├── products.php
├── product_details.php
├── cart.php
├── checkout.php
│
├── Dockerfile
├── docker-compose.yml
├── README.md
└── PROJECT_REPORT.md
```

---

# Application Screenshots

## Homepage

The homepage contains:

* Website banner
* Product categories
* Featured products

![Homepage](screenshots/homepage.png)

## Products Page

Features:

* Product browsing
* Product search
* Category filtering

![Products](screenshots/products.png)

## Product Details

Displays:

* Product information
* Price
* Description
* Add to cart option

![Product Details](screenshots/product-details.png)

## Shopping Cart

Customers can:

* View selected products
* Manage cart items
* View total price

![Cart](screenshots/cart.png)

## Checkout

Customers can complete orders.

![Checkout](screenshots/checkout.png)

## Login System

The system provides:

* Registration
* Authentication
* Secure login

![Login](screenshots/login.png)

---

# Local Installation

## Requirements

Install:

* XAMPP
* PHP 8.2+
* MySQL
* Web Browser

## Steps

Clone repository:

```bash
git clone https://github.com/Rhiannonsurfstore/smart-online-shopping-final.git
```

Move project into:

```
C:\xampp\htdocs\
```

Start XAMPP:

```
Apache
MySQL
```

Create database:

```
smart_online_shop
```

Import database SQL file.

Open:

```
http://localhost/smart-online-shopping
```

---

# Docker Implementation

The project is containerized using Docker.

## Docker Components

### Web Container

Contains:

* PHP 8.2
* Apache Server
* Application files

### Database Container

Contains:

* MySQL 8.0 Database

## Docker Commands

Build image:

```bash
docker compose build
```

Run containers:

```bash
docker compose up
```

Application runs locally at:

```
http://localhost:8080
```

---

# CI/CD Pipeline

GitHub Actions is used for Continuous Integration.

Whenever code is pushed to the main branch, the pipeline automatically:

1. Downloads the project code.
2. Installs PHP environment.
3. Checks PHP files.
4. Validates project code.

Workflow file:

```
.github/workflows/ci.yml
```

Pipeline:

```
Code Push
    |
    |
GitHub Actions
    |
    |
PHP Validation
    |
    |
Successful Build
```

Status:

✅ Smart Online Shopping CI Successful

---

# Cloud Deployment

The application is deployed using:

## Hosting Platform

Render Web Service

Website:

```
https://smart-online-shopping-final.onrender.com
```

## Production Database

TiDB Cloud

Database connection uses environment variables:

```
DB_HOST
DB_PORT
DB_USER
DB_PASSWORD
DB_NAME
```

The application connects securely using SSL/TLS.

---

# Security Implementation

Implemented security features:

* Password hashing
* Prepared SQL statements
* Input validation
* Protected database credentials
* Secure database connection
* User authentication system

---

# Testing

The following tests were completed:

✅ User registration

✅ Login authentication

✅ Product display

✅ Product search

✅ Shopping cart

✅ Checkout process

✅ Order creation

✅ Database connection

✅ Cloud deployment

✅ Docker deployment

✅ CI/CD workflow

---

# Project Report

A detailed project report is available here:

[Open Project Report](PROJECT_REPORT.md)

The report contains:

* Introduction
* Problem statement
* Objectives
* Architecture
* Database design
* Deployment
* CI/CD implementation
* Docker implementation
* Challenges
* Future improvements

---

# Future Improvements

Possible future features:

* Mobile Money payment integration
* AI product recommendations
* Email notifications
* Mobile application
* Advanced analytics dashboard
* Real-time order tracking

---

# Author

**Abayisenga Ziripa**

Software Engineering Student

E-Commerce and Web Application Project

Academic Year: 2025/2026

---

# Acknowledgement

This project was developed as part of the E-Commerce and Web Application course.

It demonstrates practical skills in:

* Full-stack web development
* Database management
* Cloud deployment
* Docker containerization
* GitHub version control
* CI/CD automation
