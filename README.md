<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

---

# 📘 PostManager – Laravel Post Management App

**PostManager** is a robust, full-featured web application built with Laravel 12 that enables users to manage posts with ease. Designed with a modern UI and following best practices in backend architecture, it provides a complete CRUD experience enhanced with advanced features like caching, task scheduling, queue jobs, and email notifications.

---

## 🧠 Project Overview

This project serves as a real-world implementation of several core Laravel features. It supports two types of users – **Admin** and **Standard Users** – each with their own capabilities. Admins can view all posts, manage users, and control content, while regular users can create, edit, and manage their own posts.

The frontend uses Laravel Blade with Vite and Flowbite UI for a clean, responsive design. The app also demonstrates real-world usage of Laravel’s ecosystem including authentication, queues, email services, and more.

---
## ✨ Core Functionalities (Key Features)

- 🔐 **Authentication & Authorization**
  - User registration, login, logout
  - Role-based access control (Admin/User)
  - Middleware for route protection
  - Laravel Policy used for Post authorization (PostPolicy)

- 📝 **Post Management**
  - Create, edit, delete posts
  - View all posts with pagination
  - View full post details
  - File/image upload with validation

- 🧩 **Data Relationships**
  - Eloquent relationships (User → Posts, etc.)
  - Efficient use of model binding and eager loading

- ⚡ **Performance & Background Tasks**
  - Caching implemented for performance
  - Queue jobs for background processing
  - Task Scheduling with Laravel Scheduler

- 📬 **Notifications**
  - Email notifications triggered on key events (e.g., post creation)

- 🧑‍💼 **Admin Dashboard**
  - Centralized view for managing all posts and users

---

## 🛠 Tech Stack

| Layer         | Tools/Frameworks                          |
|---------------|-------------------------------------------|
| **Backend**   | Laravel 12, PHP 8.2, Artisan, Tinker       |
| **Frontend**  | Blade Templating, Laravel Vite, Flowbite   |
| **Database**  | MySQL                                     |
| **Dev Tools** | Composer, npm, Laravel Queue, .env config |

---

## 📁 Folder Highlights

- `routes/web.php` – Handles web routes  
- `resources/views` – Blade view templates  
- `app/Models` – Eloquent models  
- `database/migrations` – Database table definitions  
- `app/Http/Controllers` – Application logic  

---

## 🙋‍♂️ About the Developer

**Suman Singh**  
A Laravel enthusiast focused on building scalable, maintainable web apps with real-world use cases.  
- 🧑‍💻 [GitHub: sumansingh21](https://github.com/sumansingh21)  
- 💼 [LinkedIn: suman790](https://www.linkedin.com/in/suman790/)

---

## 📄 License

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).
