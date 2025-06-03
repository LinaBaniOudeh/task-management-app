# 📝 Task Management App

A Laravel 10+ Task Management App built with Blade, Bootstrap 5, and PostgreSQL. Easily create, update, filter, and manage your tasks in a clean UI.

---

## 🚀 Features

- ✅ Add, edit, delete tasks
- 🔍 Search and filter by title or date
- 📅 Sort tasks
- 💾 PostgreSQL support
- ✅ Validations with FormRequest
- 🎨 Blade + Bootstrap UI

---

## ⚙️ Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/LinaBaniOudeh/task-management-app.git
cd task-management-app
```

### 2. Install Dependencies

```bash
composer install
```

If you're using frontend assets:

```bash
npm install && npm run build
```

### 3. Configure Environment

Copy the example environment file:

```bash
cp .env.example .env
php artisan key:generate
```

Then edit `.env` and set your PostgreSQL DB details:

```
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=task_management_app
DB_USERNAME=laraveluser
DB_PASSWORD=secret123  # use your own password
```

### 4. Run Migrations

```bash
php artisan migrate
```

### 5. Serve the App

```bash
php artisan serve
```

Go to: [http://localhost:8000](http://localhost:8000)

---

## 🐘 PostgreSQL Quick Setup (Optional)

If you don't already have a database set up:

```bash
# PostgreSQL (Ubuntu/macOS)
createdb task_management_app
```

Or use pgAdmin / Docker / ElephantSQL for remote DB.

---

## 📁 Environment Files

- `.env` → your personal/local settings (**not committed**)
- `.env.example` → template others can copy


---
