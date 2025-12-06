# 🚀 Hey Job - Your Ultimate Jobseeker Platform

![Hey Job Banner](public/images/bg.jpg)

> "Your Next Career Move Starts Here" - Connecting talent with opportunities in the digital age.

[![Laravel](https://img.shields.io/badge/Laravel-12.x-red.svg)](https://laravel.com)
[![Livewire](https://img.shields.io/badge/Livewire-3.x-green.svg)](https://livewire.laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-yellow.svg)](LICENSE)

## 🌟 What is Hey Job?

Hey Job is a comprehensive, modern jobseeker platform built with Laravel that revolutionizes the way job seekers, companies, and alumni connect. Whether you're a fresh graduate hunting for your first job, an experienced professional seeking new challenges, or a company looking for top talent, Hey Job provides the perfect ecosystem for career growth and recruitment success.

### ✨ Key Features

#### 🎯 For Job Seekers
- **Smart Job Search**: Advanced search with filters by location, category, and job type
- **Personalized Dashboard**: Track applications, saved jobs, and career progress
- **Alumni Network**: Connect with fellow alumni for mentorship and opportunities
- **Skill Development**: Access to courses and learning materials
- **Forum Discussions**: Engage in career-related discussions and Q&A

#### 🏢 For Companies
- **Talent Pool Access**: Browse through thousands of qualified candidates
- **Job Posting Management**: Create, edit, and manage job listings with ease
- **Matching Algorithm**: Get matched with the most suitable candidates
- **Company Profile**: Showcase your company culture and values
- **Analytics Dashboard**: Track application metrics and hiring success

#### 🎓 For Alumni
- **Networking Hub**: Connect with alumni from various industries
- **Career Resources**: Access exclusive job opportunities and career advice
- **Success Stories**: Share and learn from alumni achievements
- **Mentorship Program**: Give back by mentoring juniors

### 🛠️ Tech Stack

- **Backend**: Laravel 12.x - The PHP framework for web artisans
- **Frontend**: Livewire 3.x - Dynamic interfaces without leaving PHP
- **Authentication**: Laravel Fortify - Robust authentication system
- **Database**: MySQL/PostgreSQL with Eloquent ORM
- **Styling**: Tailwind CSS with custom components
- **Build Tool**: Vite for fast development and building
- **Testing**: PHPUnit for comprehensive test coverage

### 📊 Platform Statistics

- **10K+** Active Jobs
- **5K+** Partner Companies
- **50K+** Registered Job Seekers
- **25+** Job Categories
- **1000+** Companies Trust Us

## 🚀 Quick Start

### Prerequisites

Before you begin, ensure you have the following installed:
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or PostgreSQL database

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/hey-job.git
   cd hey-job
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**
   - Update your `.env` file with database credentials
   - Run migrations and seeders
   ```bash
   php artisan migrate --seed
   ```

6. **Build Assets**
   ```bash
   npm run build
   ```

7. **Start the Development Server**
   ```bash
   php artisan serve
   ```

   In another terminal:
   ```bash
   npm run dev
   ```

8. **Access the Application**
   Open your browser and navigate to `http://localhost:8000`

### 🏃‍♂️ Alternative Quick Setup

For a streamlined setup, use the built-in setup script:
```bash
composer run setup
```

This will handle environment setup, key generation, database migration, and asset building in one go!

## 📖 Usage Guide

### For Job Seekers
1. **Create Account**: Sign up as an alumni or general user
2. **Complete Profile**: Add your skills, experience, and preferences
3. **Search Jobs**: Use the advanced search with filters
4. **Apply**: Submit applications directly through the platform
5. **Track Progress**: Monitor your application status in the dashboard

### For Companies
1. **Register Company**: Create a company account
2. **Post Jobs**: Create detailed job listings with requirements
3. **Review Applications**: Browse and evaluate candidate profiles
4. **Schedule Interviews**: Use the built-in communication tools

### For Administrators
1. **Manage Users**: Oversee user accounts and roles
2. **Content Moderation**: Monitor forums and announcements
3. **Analytics**: View platform statistics and reports

## 🏗️ Project Structure

```
hey-job/
├── app/
│   ├── Actions/          # Custom actions
│   ├── Http/
│   │   ├── Controllers/  # HTTP controllers
│   │   └── Middleware/   # Custom middleware
│   ├── Livewire/         # Livewire components
│   ├── Models/           # Eloquent models
│   └── Providers/        # Service providers
├── database/
│   ├── migrations/       # Database migrations
│   └── seeders/          # Database seeders
├── public/               # Public assets
├── resources/
│   ├── css/             # Stylesheets
│   ├── js/              # JavaScript files
│   └── views/           # Blade templates
├── routes/               # Route definitions
└── tests/                # Test files
```

## 🧪 Testing

Run the test suite to ensure everything is working correctly:
```bash
php artisan test
```

## 🤝 Contributing

We welcome contributions! Please see our [Contributing Guide](CONTRIBUTING.md) for details.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Laravel Framework - The foundation of our application
- Livewire - For seamless reactive components
- Tailwind CSS - For beautiful, responsive design
- All our contributors and the open-source community

## 📞 Support

Need help? Reach out to us:
- 📧 Email: support@heyjob.com
- 💬 Discord: [Join our community](https://discord.gg/heyjob)
- 📖 Documentation: [docs.heyjob.com](https://docs.heyjob.com)

---

<p align="center">
  Made with ❤️ by the Hey Job Team
  <br>
  <strong>Empowering careers, one connection at a time.</strong>
</p>

<div align="center">
  <img src="https://img.shields.io/github/stars/ab1dal/hey-job?style=social" alt="GitHub stars">
  <img src="https://img.shields.io/github/forks/ab1dal/hey-job?style=social" alt="GitHub forks">
  <img src="https://img.shields.io/github/issues/ab1dal/hey-job?style=social" alt="GitHub issues">
</div>
