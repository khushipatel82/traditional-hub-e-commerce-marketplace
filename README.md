# 🛍️ Traditional Hub — E-Commerce Marketplace

> A full-stack PHP e-commerce platform dedicated to showcasing and selling India's traditional clothing — Sarees, Kurtis, and more.

![PHP](https://img.shields.io/badge/PHP-8.x-4F5D95?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-MariaDB-336791?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-4-563d7c?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-gold?style=for-the-badge)
![Version](https://img.shields.io/badge/Version-1.0.0-orange?style=for-the-badge)

---

## 📖 About

**Traditional Hub** is a complete e-commerce web application built with PHP and MySQL. It allows customers to browse, search, and purchase traditional Indian clothing like Sarees and Kurtis. The platform includes a secure admin panel to manage products, categories, and orders.

---

## ✨ Features

### 🛒 Customer Side
- User Registration & Login
- Browse Products by Category
- Product Detail Page with Image Gallery (Lightbox)
- Shopping Cart (Session-based)
- Checkout & Order Placement
- Contact Us Form

### ⚙️ Admin Panel
- Secure Admin Login
- Dashboard Overview
- Add / Edit / Delete Products
- Add / Edit / Delete Categories
- View All Orders
- View Contact Messages
- Product Image Upload

### 🎨 Frontend
- Responsive Bootstrap 4 UI
- Owl Carousel for Homepage Banner
- Lightbox for Product Images
- Poppins Font (Google Fonts)

---

## 🗂️ Project Structure

```
traditional-hub-e-commerce-marketplace/
│
├── index.php               ← Homepage with carousel
├── about.php               ← About page
├── products.php            ← Product listing
├── single-product.php      ← Product detail page
├── cart.php                ← Shopping cart
├── checkout.php            ← Order checkout
├── login.php               ← Customer login
├── signup.php              ← Customer registration
├── logout.php              ← Session destroy
├── contact.php             ← Contact form
├── header.php              ← Shared header/navbar
├── footer.php              ← Shared footer
├── dbconn.php              ← Database connection
├── traditional_hub.sql     ← Database schema & seed data
│
└── admin/
    ├── adminlogin.php      ← Admin authentication
    ├── dashbord.php        ← Admin dashboard
    ├── product.php         ← Product manager
    ├── addproduct.php      ← Add new product
    ├── updateproduct.php   ← Edit product
    ├── category.php        ← Category list
    ├── addcategory.php     ← Add category
    ├── updatecategory.php  ← Edit category
    ├── order.php           ← View all orders
    ├── contact.php         ← View contact messages
    ├── header.php          ← Admin navbar
    └── logout.php          ← Admin logout
```

---

## 🗄️ Database Schema

Database name: `traditional_hub`

| Table      | Fields |
|------------|--------|
| `admin`    | admin_id, admin_email, admin_pass |
| `category` | category_id, category_name, category_date |
| `product`  | product_id, product_name, product_detail, product_price, product_img, category_id |
| `cust`     | c_id, c_name, c_email, c_pass |
| `orders`   | order_id, name, email, address, phone, item, quantity, price, date |
| `contact`  | co_id, co_name, co_email, co_content |

---

## 🚀 Installation Guide

### Prerequisites
- XAMPP or WAMP (Apache + MySQL + PHP)
- phpMyAdmin
- Web Browser

### Steps

**1. Clone the Repository**
```bash
git clone https://github.com/your-username/traditional-hub-e-commerce-marketplace.git
```

**2. Move to Server Root**

Place the project folder inside your server's web root:
- XAMPP → `C:/xampp/htdocs/`
- WAMP → `C:/wamp64/www/`

**3. Import the Database**

- Open `phpMyAdmin` → `http://localhost/phpmyadmin`
- Create a new database named `traditional_hub`
- Click **Import** and select `traditional_hub.sql`

**4. Configure Database Connection**

Open `dbconn.php` and update if needed:

```php
$servername = "localhost";
$username   = "root";
$password   = "";           // Change if your MySQL has a password
$dbname     = "traditional_hub";
```

**5. Run the Project**

Open your browser and go to:
```
http://localhost/traditional-hub-e-commerce-marketplace-main/
```

---

## 🔑 Default Login Credentials

| Role      | Email               | Password   | URL |
|-----------|---------------------|------------|-----|
| 👤 Admin    | admin@gmail.com     | admin123   | `/admin/adminlogin.php` |
| 🛍️ Customer | sona@gmail.com      | 123        | `/login.php` |

> ⚠️ **Security Notice:** Change all default passwords before deploying to any public or production environment.

---

## 🛠️ Tech Stack

| Layer      | Technology |
|------------|------------|
| Backend    | PHP 8.x (mysqli) |
| Database   | MySQL / MariaDB 10.4 |
| Frontend   | HTML5, CSS3, Bootstrap 4 |
| Libraries  | Owl Carousel, Lightbox, Font Awesome |
| Font       | Poppins (Google Fonts) |
| Dev Tools  | XAMPP, phpMyAdmin |

---

## 📸 Pages Overview

| Page | Description |
|------|-------------|
| `/index.php` | Homepage with banner carousel and featured products |
| `/products.php` | Full product listing with category filter |
| `/single-product.php` | Product detail with image lightbox |
| `/cart.php` | Session-based shopping cart |
| `/checkout.php` | Order form with name, address, phone |
| `/login.php` | Customer login |
| `/signup.php` | New customer registration |
| `/about.php` | About the platform |
| `/contact.php` | Contact form |
| `/admin/dashbord.php` | Admin dashboard |

---

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

---

## 🙌 Contributing

Pull requests are welcome! For major changes, please open an issue first to discuss what you would like to change.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

---

<div align="center">

Made with ❤️ &nbsp;·&nbsp; PHP &nbsp;·&nbsp; MySQL &nbsp;·&nbsp; Bootstrap

⭐ Star this repo if you found it helpful!

</div>
