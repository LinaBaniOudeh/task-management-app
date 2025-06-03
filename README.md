# ✅ Task Management App

A simple, clean Laravel 10+ task management application using Blade, Bootstrap 5, and PostgreSQL.  
Easily add, edit, complete, and manage your tasks in a professional UI.

---

## 🚀 Features

- Create, update, delete tasks
- Mark tasks as completed or uncompleted
- Filter and search tasks by keyword
- Clean UI using Bootstrap 5
- Responsive layout
- Blade components for reuse (`alert`, `task-filter`, etc.)
- Form validation using FormRequest classes
- Eloquent ORM with clear MVC structure
- Git-tracked and easy to deploy

---

## 🛠️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/YOUR_USERNAME/task-management-app.git
cd task-management-app
```

### 2. Install Dependencies

```bash
composer install
npm install
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Set Up PostgreSQL Database

Update your `.env` file with your database settings:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_management
DB_USERNAME=laraveluser
DB_PASSWORD=yourpassword
```

Then run migrations:

```bash
php artisan migrate
```

---

### 5. Run the App

```bash
php artisan serve
```

Visit your app at `http://localhost:8000`.

---

## 📦 Optional: Compile Front-End Assets

```bash
npm run dev
```

This step is only needed if you modify JS or CSS files via Vite.

---

## ✅ Requirements

- PHP >= 8.1
- Composer
- Node.js + npm
- PostgreSQL

---

## 🙋 Author

Made with 💻 by [Leena Baniodeh](https://github.com/YOUR_USERNAME)
