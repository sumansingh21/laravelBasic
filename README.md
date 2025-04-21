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

## ✨ Core Functionalities

- **Authentication & Authorization**
  - User registration, login, logout
  - Role-based access control (Admin/User)
  - Admin dashboard for centralized control

- **Post Management**
  - Create, edit, delete posts with file/image upload
  - View all posts with clean pagination
  - Post detail pages with full content

- **Performance Enhancements**
  - Use of Laravel Cache for optimization
  - Background job processing using Laravel Queues
  - Scheduled tasks via Laravel Scheduler 

- **Communication**
  - Email notifications (e.g., on post creation)

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
