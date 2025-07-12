# 📋 Task Manager - Flutter & Laravel

A modern, full-stack task management application built with **Flutter** for mobile and **Laravel** for the backend API and web interface.

![Task Manager](https://img.shields.io/badge/Flutter-02569B?style=for-the-badge&logo=flutter&logoColor=white)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-00000F?style=for-the-badge&logo=mysql&logoColor=white)

## 🚀 Features

### 📱 Flutter Mobile App
- ✅ **Task Management**: Create, read, update, and delete tasks
- 🎯 **Priority Levels**: High, Medium, Low with color-coded indicators
- 📅 **Due Date Tracking**: Visual indicators for overdue and today's tasks
- 📊 **Task Filtering**: View All, Pending, or Completed tasks
- 🎨 **Material Design**: Beautiful, modern UI following Google's Material Design
- ℹ️ **About Section**: Information about the app and developer
- 📱 **Cross-Platform**: Works on Android, iOS, and Web

### 🌐 Laravel Web Interface
- 📈 **Dashboard**: Overview with task statistics and progress tracking
- 🔄 **Full CRUD Operations**: Complete task management via web interface
- 🎨 **Responsive Design**: Bootstrap-powered UI that works on all devices
- 📊 **Task Analytics**: Visual representation of task completion progress
- 🔍 **Task Details**: Detailed view with creation and update timestamps
- 🎯 **Priority Management**: Color-coded priority system
- ⚡ **Real-time Updates**: Instant task status changes

### 🔧 Backend Features
- 🚀 **RESTful API**: Well-structured API endpoints
- 🔒 **Data Validation**: Comprehensive input validation
- 💾 **MySQL Database**: Reliable data storage
- 🌍 **CORS Support**: Cross-origin resource sharing for mobile app
- 📝 **Migration System**: Easy database setup and updates

## 🛠️ Tech Stack

### Frontend (Flutter)
- **Flutter SDK** - Cross-platform mobile development
- **Provider** - State management
- **HTTP** - API communication
- **Material Design** - UI components

### Backend (Laravel)
- **Laravel 11** - PHP framework
- **MySQL** - Database
- **Laravel UI** - Frontend scaffolding
- **Bootstrap 5** - CSS framework

### Development Tools
- **Laragon** - Local development environment
- **Composer** - PHP dependency management
- **NPM** - Node.js package management

## 📋 Prerequisites

Before you begin, ensure you have the following installed:

- **Flutter SDK** (3.8.1 or higher)
- **PHP** (8.4 or higher)
- **Composer**
- **Node.js & NPM**
- **MySQL**
- **Laragon** (recommended for Windows)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/jerungpyro/Task-Manager-Dart-Laravel.git
cd Task-Manager-Dart-Laravel
```

### 2. Backend Setup (Laravel)

#### Navigate to backend directory
```bash
cd backend
```

#### Install PHP dependencies
```bash
composer install
```

#### Setup environment file
```bash
cp .env.example .env
```

#### Configure database in `.env`
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=
```

#### Generate application key
```bash
php artisan key:generate
```

#### Create database
```sql
CREATE DATABASE task_manager;
```

#### Run migrations
```bash
php artisan migrate
```

#### Seed sample data (optional)
```bash
php artisan db:seed --class=TaskSeeder
```

#### Install frontend dependencies
```bash
npm install
```

#### Start the Laravel server
```bash
php artisan serve --host=0.0.0.0 --port=8000
```

### 3. Frontend Setup (Flutter)

#### Navigate to Flutter app directory
```bash
cd ../task_manager_app
```

#### Install Flutter dependencies
```bash
flutter pub get
```

#### Run the Flutter app
```bash
flutter run
```

## 🌐 API Endpoints

The Laravel backend provides the following API endpoints:

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/tasks` | Get all tasks |
| POST | `/api/tasks` | Create a new task |
| GET | `/api/tasks/{id}` | Get a specific task |
| PUT | `/api/tasks/{id}` | Update a task |
| DELETE | `/api/tasks/{id}` | Delete a task |
| PATCH | `/api/tasks/{id}/toggle` | Toggle task completion |

### Example API Usage

#### Create a Task
```bash
curl -X POST http://127.0.0.1:8000/api/tasks \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Complete project",
    "description": "Finish the task manager app",
    "priority": "high",
    "due_date": "2025-07-15"
  }'
```

## 📱 App Screenshots

### Mobile App (Flutter)
- **Home Screen**: Task list with filtering options
- **Add Task**: Form to create new tasks
- **Task Details**: View and edit individual tasks
- **About Section**: App information and credits

### Web Interface (Laravel)
- **Dashboard**: Statistics and task overview
- **Task Management**: Create, edit, and delete tasks
- **Responsive Design**: Works on desktop and mobile browsers

## 🏗️ Project Structure

```
Task-Manager-Dart-Laravel/
├── backend/                    # Laravel Backend
│   ├── app/
│   │   ├── Http/Controllers/   # API & Web Controllers
│   │   └── Models/            # Eloquent Models
│   ├── database/
│   │   ├── migrations/        # Database Migrations
│   │   └── seeders/          # Database Seeders
│   ├── resources/views/       # Blade Templates
│   └── routes/               # Route Definitions
│
└── task_manager_app/          # Flutter Frontend
    ├── lib/
    │   ├── models/           # Data Models
    │   ├── providers/        # State Management
    │   ├── screens/          # App Screens
    │   ├── services/         # API Services
    │   └── widgets/          # Reusable Widgets
    └── android/              # Android Configuration
```

## 🎨 Design Decisions

### Color Scheme
- **Primary**: Blue (#0d6efd) - Professional and trustworthy
- **High Priority**: Red (#dc3545) - Urgent attention
- **Medium Priority**: Orange (#fd7e14) - Important but not urgent
- **Low Priority**: Green (#198754) - Can be done later
- **Success**: Green - Completed tasks
- **Warning**: Orange - Due today

### User Experience
- **Intuitive Navigation**: Easy-to-use interface
- **Visual Feedback**: Color-coded priorities and status indicators
- **Responsive Design**: Works seamlessly across all devices
- **Consistent Styling**: Unified design language across platforms

## 🔧 Configuration

### Network Configuration
The Flutter app automatically detects the platform and uses appropriate API endpoints:

- **Android Emulator**: `http://10.0.2.2:8000/api`
- **iOS Simulator**: `http://127.0.0.1:8000/api`
- **Web**: `http://127.0.0.1:8000/api`

### CORS Configuration
The Laravel backend is configured to accept requests from mobile applications with proper CORS headers.

## 🧪 Testing

### API Testing
Test the API endpoints using tools like Postman or curl:

```bash
# Get all tasks
curl http://127.0.0.1:8000/api/tasks

# Create a task
curl -X POST http://127.0.0.1:8000/api/tasks \
  -H "Content-Type: application/json" \
  -d '{"title":"Test Task","priority":"medium"}'
```

### Flutter Testing
```bash
cd task_manager_app
flutter test
```

## 🚀 Deployment

### Backend Deployment
1. Set up a production server with PHP and MySQL
2. Configure environment variables for production
3. Run migrations on production database
4. Set up proper web server configuration (Apache/Nginx)

### Mobile App Deployment
1. **Android**: Build APK or upload to Google Play Store
2. **iOS**: Build IPA and upload to App Store
3. **Web**: Deploy to Firebase Hosting or similar platform

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Your Name**
- GitHub: [@jerungpyro](https://github.com/jerungpyro)
- Email: your.email@example.com

## 🙏 Acknowledgments

- Flutter team for the amazing framework
- Laravel team for the robust PHP framework
- Bootstrap team for the excellent CSS framework
- Font Awesome for the beautiful icons

## 📞 Support

If you have any questions or need help getting started, please:

1. Check the [Issues](https://github.com/jerungpyro/Task-Manager-Dart-Laravel/issues) page
2. Create a new issue if your question isn't already answered
3. Contact the developer directly

---

⭐ **If you found this project helpful, please give it a star!** ⭐
