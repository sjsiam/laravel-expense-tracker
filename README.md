# Laravel Expense Tracker

A modern, feature-rich expense tracking application built with Laravel 12, designed to help users manage their personal finances efficiently.

## 🌟 Live Demo

**Live Application:** [https://expense-tracker.sjsiam.com/](https://expense-tracker.sjsiam.com/)

**Test Credentials:**

- **Email:** test@example.com
- **Password:** 12345678

## ✨ Features

### 🔐 Authentication & User Management

- User registration and login system
- Secure password hashing
- Session-based authentication
- User-specific data isolation

### 💰 Expense Management

- **CRUD Operations:** Create, Read, Update, Delete expenses
- **Categorization:** Organize expenses by predefined categories
- **Amount Tracking:** Precise decimal amount handling
- **Date Management:** Track expenses by specific dates
- **User Authorization:** Users can only manage their own expenses

### 📊 Dashboard & Analytics

- **Overview Statistics:** Total expenses, current month, today's spending
- **Recent Expenses:** Latest 5 expense entries
- **Visual Insights:** Quick financial overview

### 📈 Reporting System

- **Monthly Reports:** Detailed expense breakdown by month
- **Category Analysis:** Spending patterns by expense category
- **Chart Visualization:** Visual representation of spending data
- **Filterable Data:** Select specific months for analysis

### 🎨 User Interface

- **Responsive Design:** Mobile-friendly Bootstrap-based interface
- **Modern UI:** Clean, intuitive user experience
- **Font Awesome Icons:** Visual enhancement for better UX
- **Sidebar Navigation:** Easy access to all features

## 🛠️ Technology Stack

### Backend

- **Framework:** Laravel 12.x
- **PHP Version:** 8.2+
- **Database:** MySQL
- **Authentication:** Laravel's built-in auth system

### Frontend

- **CSS Framework:** Bootstrap 5.3.0
- **Icons:** Font Awesome 6.0.0
- **Build Tool:** Vite 7.x

### Development Tools

- **Testing:** Pest PHP
- **Code Quality:** Laravel Pint
- **Package Manager:** Composer
- **Node Package Manager:** npm

## 📁 Project Structure

```plaintext
laravel-expense-tracker/
├── app/
│   ├── Http/Controllers/          # Application controllers
│   │   ├── Auth/                 # Authentication controllers
│   │   ├── DashboardController   # Dashboard logic
│   │   ├── ExpenseController     # Expense CRUD operations
│   │   └── ReportController      # Reporting functionality
│   ├── Models/                   # Eloquent models
│   │   ├── User.php             # User model with expenses relationship
│   │   ├── Expense.php          # Expense model with validation
│   │   └── Category.php         # Category model for expense organization
│   └── Policies/                 # Authorization policies
├── database/
│   ├── migrations/               # Database schema
│   └── seeders/                  # Initial data population
├── resources/
│   └── views/                    # Blade templates
│       ├── auth/                 # Authentication views
│       ├── dashboard/            # Dashboard interface
│       ├── expenses/             # Expense management views
│       └── reports/              # Reporting interface
└── routes/
    └── web.php                   # Web application routes
```

## 🚀 Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & npm
- Database (MySQL)

### Step-by-Step Setup

1. **Clone the repository**

   ```bash
   git clone <repository-url>
   cd laravel-expense-tracker
   ```

2. **Install PHP dependencies**

   ```bash
   composer install
   ```

3. **Install Node.js dependencies**

   ```bash
   npm install
   ```

4. **Environment configuration**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database setup**

   ```bash
   # Configure database in .env file
   php artisan migrate
   php artisan db:seed
   ```

6. **Build assets**

   ```bash
   npm run build
   ```

7. **Start the application**

   ```bash
   php artisan serve
   ```

### Quick Development Setup

```bash
composer run dev  # Starts server, queue, and Vite simultaneously
```

## 📊 Database Schema

### Users Table

- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `email_verified_at` - Email verification timestamp
- `remember_token` - Remember me token
- `created_at`, `updated_at` - Timestamps

### Categories Table

- `id` - Primary key
- `name` - Category name (Food, Transport, Shopping, Others)
- `color` - Hex color code for UI representation
- `created_at`, `updated_at` - Timestamps

### Expenses Table

- `id` - Primary key
- `user_id` - Foreign key to users table
- `category_id` - Foreign key to categories table
- `title` - Expense description
- `amount` - Decimal amount (10,2 precision)
- `date` - Expense date
- `created_at`, `updated_at` - Timestamps

## 🔐 Authentication & Authorization

### User Registration

- Email and password validation
- Automatic login after successful registration
- Password confirmation requirement

### User Login

- Email/password authentication
- Remember me functionality
- Session-based authentication

### Authorization Policies

- Users can only view/edit/delete their own expenses
- Category access is public (read-only)
- Dashboard data is user-specific

## 📱 API Endpoints

### Public Routes

- `GET /` - Home page
- `GET /register` - Registration form
- `POST /register` - User registration
- `GET /login` - Login form
- `POST /login` - User authentication

### Protected Routes (Require Authentication)

- `GET /dashboard` - User dashboard
- `GET /expenses` - List user expenses
- `GET /expenses/create` - Create expense form
- `POST /expenses` - Store new expense
- `GET /expenses/{id}/edit` - Edit expense form
- `PUT /expenses/{id}` - Update expense
- `GET /expenses/{id}` - View expense details
- `DELETE /expenses/{id}` - Delete expense
- `GET /reports/monthly` - Monthly expense report
- `POST /logout` - User logout

## 🎯 Key Features Explained

### Expense Categorization

The application comes with predefined expense categories:

- **Food** - Daily meals and groceries
- **Transport** - Public transport, fuel, parking
- **Shopping** - Retail purchases, online shopping
- **Others** - Miscellaneous expenses

Each category has a unique color for visual identification in reports and charts.

### Dashboard Analytics

The dashboard provides quick insights:

- Total number of expenses
- Current month's total spending
- Today's expenses
- Recent expense entries

### Monthly Reports

Comprehensive monthly analysis including:

- Total spending by month
- Category-wise breakdown
- Visual chart representation
- Expense count per category

## 🧪 Testing

The application uses Pest PHP for testing:

```bash
# Run all tests
composer run test

# Run tests with coverage
php artisan test --coverage
```

## 🚀 Deployment

### Production Build

```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Environment Variables

Ensure these are set in production:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL` - Your production URL
- Database credentials
- `APP_KEY` - Application encryption key

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🙏 Acknowledgments

- Built with [Laravel](https://laravel.com/) - The PHP framework for web artisans
- Styled with [Bootstrap](https://getbootstrap.com/) - The world's most popular CSS framework
- Icons by [Font Awesome](https://fontawesome.com/) - The web's most popular icon set

## 📞 Support

For support, please open an issue in the GitHub repository or contact the development team.

---

**Built with ❤️ using Laravel**

