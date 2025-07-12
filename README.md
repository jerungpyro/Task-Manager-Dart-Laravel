# 📋 Task Manager - Flutter & Laravel

A modern task management application with **Flutter** mobile app and **Laravel** backend.

![Flutter](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

## ✨ Features

- 📱 **Cross-platform mobile app** (Android, iOS, Web)
- 🌐 **Web dashboard** for task management
- ✅ **Full CRUD operations** - Create, read, update, delete tasks
- 🎯 **Priority levels** - High, Medium, Low with color coding
- 📅 **Due date tracking** with overdue indicators
- � **Task filtering** - All, Pending, Completed
- � **RESTful API** backend

## 🛠️ Tech Stack

- **Frontend**: Flutter, Provider, Material Design
- **Backend**: Laravel 11, MySQL, Bootstrap 5
- **Tools**: Laragon, Composer, NPM

## 🚀 Quick Start

### Prerequisites
- Flutter SDK (3.8.1+)
- PHP (8.4+) & Composer
- MySQL & Node.js

### Installation

1. **Clone the repository**
```bash
git clone https://github.com/jerungpyro/Task-Manager-Dart-Laravel.git
cd Task-Manager-Dart-Laravel
```

2. **Backend Setup**
```bash
cd backend
composer install
cp .env.example .env
# Configure database in .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=TaskSeeder
php artisan serve --host=0.0.0.0 --port=8000
```

3. **Frontend Setup**
```bash
cd ../task_manager_app
flutter pub get
flutter run
```

## 📡 API Endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/tasks` | Get all tasks |
| POST | `/api/tasks` | Create task |
| GET | `/api/tasks/{id}` | Get task |
| PUT | `/api/tasks/{id}` | Update task |
| DELETE | `/api/tasks/{id}` | Delete task |
| PATCH | `/api/tasks/{id}/toggle` | Toggle completion |

## 🏗️ Project Structure

```
Task-Manager-Dart-Laravel/
├── backend/                    # Laravel Backend
│   ├── app/Http/Controllers/   # API & Web Controllers
│   ├── app/Models/            # Task Model
│   ├── database/migrations/   # Database Schema
│   ├── resources/views/       # Web Interface
│   └── routes/               # API & Web Routes
└── task_manager_app/          # Flutter Frontend
    ├── lib/models/           # Data Models
    ├── lib/providers/        # State Management
    ├── lib/screens/          # App Screens
    ├── lib/services/         # API Services
    └── lib/widgets/          # UI Components
```

## 🎨 Screenshots

### Mobile App
- Task list with priority indicators
- Add/Edit task forms
- About section

### Web Dashboard
- Task statistics overview
- Responsive design
- Full task management

## 🔧 Configuration

The app automatically uses the correct API endpoint:
- **Android Emulator**: `http://10.0.2.2:8000/api`
- **iOS Simulator**: `http://127.0.0.1:8000/api`
- **Web**: `http://127.0.0.1:8000/api`

## ‍💻 Author

**Your Name**
- GitHub: [@jerungpyro](https://github.com/jerungpyro)

## � License

MIT License - feel free to use this project for learning and development.

---

⭐ **Star this repo if you found it helpful!**
