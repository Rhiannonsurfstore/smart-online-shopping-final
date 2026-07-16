# Smart Online Shopping System

## E-Commerce Web Application Project Report

**Author:** Abayisenga Ziripa
**Project Repository:** https://github.com/Rhiannonsurfstore/smart-online-shopping-final
**Live Website:** https://smart-online-shopping-final.onrender.com

---

# 1. Introduction

Smart Online Shopping System is a web-based e-commerce application developed to allow customers to purchase products online easily and efficiently. The system provides an online platform where users can browse available products, search for items, add products to a shopping cart, place orders, and manage their purchases.

The project was developed to demonstrate the implementation of a complete e-commerce solution using modern web technologies, database management, deployment, containerization, and continuous integration practices.

---

# 2. Problem Statement

Traditional shopping requires customers to physically visit stores to find products and complete purchases. This process can consume time and limits customers who need convenient access to products.

The Smart Online Shopping System solves this problem by providing an online shopping platform where customers can access products anytime, view product information, and complete purchases through a digital platform.

---

# 3. Project Objectives

The main objectives of this project are:

* To develop an online shopping platform for customers.
* To allow users to register and securely log in.
* To provide product browsing and searching functionality.
* To implement shopping cart and checkout processes.
* To manage customer orders.
* To create a database system for storing users, products, and transactions.
* To deploy the application online.
* To apply CI/CD and Docker technologies.

---

# 4. System Features

## Customer Features

The system provides customers with:

* User registration
* User login and authentication
* Product browsing
* Product category filtering
* Product search
* Product details viewing
* Shopping cart management
* Checkout process
* Order placement
* Product reviews

## Admin Features

Administrators can:

* Manage products
* Manage product categories
* Monitor customer orders
* Update order status

---

# 5. Technologies Used

## Frontend Technologies

* HTML
* CSS
* Bootstrap 5
* JavaScript

## Backend Technologies

* PHP 8.2

## Database

* MySQL
* TiDB Cloud Database

## Development Tools

* Visual Studio Code
* Git and GitHub
* XAMPP

## Deployment and DevOps Tools

* Render Cloud Platform
* Docker
* Docker Compose
* GitHub Actions CI/CD

---

# 6. System Architecture

The system follows a three-layer architecture:

```
User Browser
      |
      |
Frontend Interface
      |
      |
PHP Backend Application
      |
      |
Database Server
```

The user interacts with the website through the browser. PHP processes user requests and communicates with the database to store and retrieve information.

---

# 7. Database Design

The application uses a relational database called:

```
smart_online_shop
```

Main tables include:

## Users Table

Stores customer and administrator information.

Fields:

* user_id
* full_name
* email
* password
* role

## Products Table

Stores available products.

Fields:

* product_id
* product_name
* description
* price
* image
* category_id

## Categories Table

Stores product categories such as:

* Women Fashion
* Men Fashion
* Beauty Products
* Accessories

## Orders Table

Stores customer orders.

## Order Items Table

Stores products included in each order.

## Reviews Table

Stores customer ratings and comments.

---

# 8. Deployment

The application was deployed using Render cloud hosting.

Live Application:

https://smart-online-shopping-final.onrender.com

The deployed system connects to the cloud database and allows users to access the application online.

---

# 9. CI/CD Implementation

GitHub Actions was implemented to automate project checking whenever new code is pushed.

The CI pipeline performs:

1. Code checkout from GitHub
2. PHP environment setup
3. PHP syntax validation
4. Workflow execution confirmation

Workflow process:

```
Developer Push Code
        |
        |
GitHub Actions
        |
        |
PHP Validation
        |
        |
Successful Build Check
```

The workflow status is successfully passing on GitHub Actions.

---

# 10. Docker Implementation

Docker was used to package the application and make it run consistently in different environments.

The project contains:

## Dockerfile

Used to create the PHP Apache application container.

## Docker Compose

Used to run multiple services together:

### Web Container

Contains:

* PHP 8.2
* Apache Server
* Application files

### Database Container

Contains:

* MySQL 8.0 Database

Docker commands used:

```
docker compose build
```

Creates the application image.

```
docker compose up
```

Runs the application containers.

The application successfully runs locally using:

```
http://localhost:8080
```

---

# 11. Security Implementation

The system includes several security practices:

## Password Hashing

User passwords are stored using secure hashing instead of plain text.

## Prepared Statements

Database queries use prepared statements to reduce SQL injection risks.

## User Authentication

Only registered users can access protected features.

## Input Validation

User inputs are validated before processing.

---

# 12. Challenges Encountered

During development, several challenges were solved:

* Configuring database connections between local and cloud environments.
* Fixing PHP header redirect issues.
* Deploying PHP application on Render.
* Configuring Docker networking between PHP and MySQL containers.
* Setting up GitHub Actions workflow.

---

# 13. Future Improvements

Possible future improvements include:

* Mobile Money payment integration
* AI-based product recommendations
* Email notifications
* Advanced analytics dashboard
* Mobile application version
* Real-time order tracking

---

# 14. Conclusion

The Smart Online Shopping System successfully provides an online platform for customers to browse products, manage shopping carts, and place orders.

The project demonstrates full-stack web development skills including frontend design, backend programming, database management, deployment, CI/CD automation, and Docker containerization.

The system is available online and documented through GitHub.
