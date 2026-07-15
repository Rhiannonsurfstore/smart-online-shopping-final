# Smart Online Shopping System

![Smart Online Shopping](https://img.shields.io/badge/Project-E--Commerce-blue)
![PHP](https://img.shields.io/badge/Backend-PHP%208.2-purple)
![Docker](https://img.shields.io/badge/Container-Docker-blue)
![Database](https://img.shields.io/badge/Database-TiDB%20Cloud-orange)

## Live Demo

🌐 Application URL:

https://smart-online-shopping-final.onrender.com


## Project Description

Smart Online Shopping System is a web-based e-commerce application developed to provide customers with an easy and secure way to browse products, manage shopping carts, place orders, and track purchases online.

The system provides two main users:

- Customers who can register, login, browse products, add products to cart, place orders, and review products.
- Administrators who can manage products, categories, users, and orders through an admin dashboard.

The project demonstrates the development, containerization, database management, and cloud deployment of a complete e-commerce web application.


---

# Project Objectives

The main objectives of this project are:

- To develop an online shopping platform for customers.
- To provide efficient product management.
- To simplify online ordering processes.
- To store and manage customer and product information securely.
- To deploy a PHP web application using modern cloud technologies.


---

# Main Features

## Customer Features

- User registration
- User authentication and login
- Product browsing
- Product categories
- Product details viewing
- Product search
- Add products to shopping cart
- Checkout process
- Order placement
- View order history
- Submit product reviews


## Administrator Features

- Admin login
- Admin dashboard
- Manage products
- Add, update, and delete products
- Manage product categories
- View customer orders
- Update order status
- Manage customer information


---

# System Technologies

## Frontend

- HTML5
- CSS3
- Bootstrap 5
- JavaScript


## Backend

- PHP 8.2


## Database

Development Database:
- MySQL / MariaDB (XAMPP)

Production Database:
- TiDB Cloud (MySQL compatible)


## Web Server

- Apache


## Containerization

- Docker
- Docker Compose


## Cloud Deployment

Application Hosting:

- Render Web Service


Database Hosting:

- TiDB Cloud


---

# Database Design

The system uses a relational database called:

```
smart_online_shop
```

Main database tables:

| Table | Description |
|---|---|
| users | Stores customer and admin information |
| categories | Stores product categories |
| products | Stores available products |
| orders | Stores customer orders |
| order_items | Stores products inside orders |
| reviews | Stores customer product reviews |


Database relationships:

- One category can contain many products.
- One user can create many orders.
- One order can contain many products.
- Users can submit reviews for products.


---

# Project Structure

```
smart-online-shopping/

│
├── admin/
│   └── Admin dashboard files
│
├── config/
│   └── database.php
│
├── css/
│   └── Style files
│
├── images/
│   └── Product images
│
├── js/
│   └── JavaScript files
│
├── uploads/
│
├── index.php
├── login.php
├── register.php
├── cart.php
├── checkout.php
├── products.php
├── Dockerfile
├── docker-compose.yml
└── README.md
```


---

# Local Installation Guide

## Requirements

Install:

- XAMPP
- PHP 8.2+
- MySQL
- Web Browser


## Steps

### 1. Clone Repository

```bash
git clone https://github.com/Rhiannonsurfstore/smart-online-shopping-final.git
```


### 2. Move Project

Copy project into:

```
C:\xampp\htdocs\
```


### 3. Start XAMPP

Start:

- Apache
- MySQL


### 4. Import Database

Open phpMyAdmin:

```
http://localhost/phpmyadmin
```

Create database:

```
smart_online_shop
```

Import the provided SQL file.


### 5. Run Application

Open:

```
http://localhost/smart-online-shopping
```


---

# Docker Deployment

The application is containerized using Docker.

## Docker Image Creation

Build Docker image:

```bash
docker build -t smart-online-shopping .
```


## Run Using Docker Compose

```bash
docker compose up
```


Application runs on:

```
http://localhost:8080
```


---

# Cloud Deployment

## Application Deployment

The application is deployed on:

Render Web Service

Live URL:

```
https://smart-online-shopping-final.onrender.com
```


## Database Deployment

The production database is deployed using:

TiDB Cloud


Database:

```
smart_online_shop
```


Connection is configured using environment variables:

```
DB_HOST
DB_PORT
DB_USER
DB_PASSWORD
DB_NAME
```


The PHP application connects securely using SSL/TLS.


---

# Version Control

The project uses Git and GitHub for source code management.

Repository:

```
https://github.com/Rhiannonsurfstore/smart-online-shopping-final
```


Git workflow used:

```bash
git add .
git commit -m "Update project"
git push
```


---

# Security Considerations

Implemented security practices:

- Password hashing using PHP password hashing functions
- Protected database credentials using environment variables
- Secure database connection using SSL
- Input validation
- Prepared SQL queries to reduce SQL injection risks


---

# Testing

The following tests were performed:

✅ User registration test

✅ Login authentication test

✅ Product display test

✅ Shopping cart test

✅ Checkout test

✅ Order creation test

✅ Admin dashboard test

✅ Cloud deployment test

✅ Database connection test


---

# Future Improvements

Possible improvements:

- Online payment integration
- Product recommendation system
- Mobile application version
- Email notifications
- Advanced analytics dashboard
- AI-powered shopping assistant


---

# Author

**Abayisenga Ziripa**

Software Engineering Student

E-Commerce and Web Application Project

Academic Year: 2025/2026


---

# Acknowledgement

This project was developed as part of the E-Commerce and Web Application course.

The project demonstrates practical skills in:

- Web development
- Database management
- Docker containerization
- Cloud deployment
- Version control using GitHub
