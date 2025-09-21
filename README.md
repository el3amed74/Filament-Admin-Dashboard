# 🚀 Filament Admin Dashboard

A powerful **Admin Dashboard** built with [Laravel](https://laravel.com/) and [Filament 3](https://filamentphp.com/).  
This project demonstrates how to quickly build a **production-ready admin panel** with modern tools, clean architecture, and responsive design.  

---

## 🛠️ Tech Stack
- **Laravel 12** – Robust PHP framework for backend  
- **Filament 3** – Elegant admin panel & CRUD builder  
- **Livewire** – Reactive UI without writing JavaScript  
- **SQLite** – Lightweight database for simplicity  
- **Vite** – Next-gen frontend tooling  
- **TailwindCSS** (via Filament) – Clean & modern UI  

---

## ✨ Features
- 👥 **Employee Management System** – Add, update, delete, and manage employees  
- 🌍 **Hierarchical Location Management** – Countries → States → Cities  
- 🏢 **Department Organization** – Manage departments and assignments  
- 📱 **Responsive UI** – Mobile-friendly and modern design  
- ✅ **Advanced CRUD Operations** – With validation & error handling  
- 🔗 **Seamless Data Relationships** – Easily manage related models  

---

## 🚀 Getting Started

### 1. Clone the Repository
```
git clone https://github.com/el3amed74/Filament-Admin-Dashboard.git
cd Filament-Admin-Dashboard
```
2. Install Dependencies
```
composer install
npm install && npm run build
```
3. Environment Setup

Copy .env.example and configure:
```
cp .env.example .env
php artisan key:generate
```
4. Run Migrations & Seeders
```
php artisan migrate --seed
```
5. Start the Development Server
```
php artisan serve
```

👤 Admin Access

Default login credentials (after seeding):

Email: admin@example.com

Password: password


