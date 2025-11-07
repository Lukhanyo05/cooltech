# CoolTech Blog

A modern, responsive blog platform built with Laravel for sharing technology news, reviews, and insights.

## 🚀 Features

- **Latest Articles** - Home page displays 5 most recent articles
- **Article Categories** - Tech News, Software Reviews, Hardware Reviews, Opinion Pieces
- **Tagging System** - Articles can be tagged with relevant topics
- **Responsive Design** - Built with Tailwind CSS for all devices
- **Search Functionality** - Search articles by ID, category, or tag
- **Professional UI** - Clean, modern interface with navigation

## 🛠️ Tech Stack

- **Backend**: Laravel 10
- **Frontend**: Tailwind CSS, Blade Templates
- **Database**: SQLite (development) / MySQL (production)
- **Authentication**: Laravel Sanctum (ready for implementation)

## 📋 Requirements

- PHP 8.1+
- Composer
- SQLite or MySQL

## 🏃‍♂️ Quick Start

### Installation

1. **Clone the repository**
   \\\ash
   git clone <repository-url>
   cd cooltech
   \\\

2. **Install dependencies**
   \\\ash
   composer install
   \\\

3. **Setup environment**
   \\\ash
   cp .env.example .env
   php artisan key:generate
   \\\

4. **Configure database** (in .env file)
   \\\env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database.sqlite
   \\\

5. **Create database file**
   \\\ash
   touch database/database.sqlite
   \\\

6. **Run migrations and seeders**
   \\\ash
   php artisan migrate --seed
   \\\

7. **Start development server**
   \\\ash
   php artisan serve
   \\\

8. **Visit the application**
   Open http://localhost:8000 in your browser

## 🗃️ Database Schema

The application uses the following database structure:

### Tables
- **articles** - Stores blog articles with title, content, and category
- **categories** - Article categories (Tech News, Software Reviews, etc.)
- **tags** - Article tags (AI, Programming, Web Development, etc.)
- **article_tag** - Many-to-many relationship between articles and tags

### Relationships
- Articles belong to Categories (one-to-many)
- Articles belong to many Tags (many-to-many)
- Categories have many Articles
- Tags belong to many Articles

See \DATABASE_ERD.md\ for detailed database documentation.

## 🎯 Project Structure

\\\
cooltech/
├── app/
│   ├── Models/
│   │   ├── Article.php
│   │   ├── Category.php
│   │   └── Tag.php
│   └── Http/Controllers/
│       └── ArticleController.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/views/
│   ├── layouts/
│   │   └── app.blade.php
│   ├── home.blade.php
│   ├── articles/
│   │   └── show.blade.php
│   └── [other views]
└── routes/web.php
\\\

## 📄 Available Routes

- \GET /\ - Home page with latest articles
- \GET /article/{id}\ - Individual article page
- \GET /category/{slug}\ - Articles by category
- \GET /tag/{slug}\ - Articles by tag
- \GET /search\ - Search page
- \GET /about\ - About page
- \GET /contact\ - Contact page
- \GET /legal\ - Legal page

## 🌟 Key Features Implemented

### For Users
- Browse latest articles on home page
- Read full article content
- Filter articles by category or tag
- Search functionality
- Responsive mobile-friendly design

### For Development
- Proper database relationships
- Laravel Eloquent models
- Blade templates with layouts
- Tailwind CSS styling
- SQLite database for development

## 🗂️ Sample Data

The database seeder includes:
- 4 article categories
- 6 tags
- 20 sample articles with proper relationships

## 🔧 Development

### Running Tests
\\\ash
php artisan test
\\\

### Clearing Cache
\\\ash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
\\\

### Database Reset
\\\ash
php artisan migrate:fresh --seed
\\\

## 📝 License

This project is for educational purposes as part of the HyperionDev Capstone Project.

## 👨‍💻 Developer

Lukhanyo - HyperionDev Student

---

**Built with ❤️ using Laravel and Tailwind CSS**
