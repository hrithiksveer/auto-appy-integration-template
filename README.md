# Auto Appy Integration Template

This is a template for integrating with Auto Appy. Follow the steps below to set up the project on your local machine after cloning.

## Getting Started

### Prerequisites

- PHP >= 8.0
- Composer
- Git

### Installation

1. **Clone the repository:**

git clone https://github.com/hrithiksveer/auto-appy-integration-template.git

Navigate to the project directory:

cd auto-appy-integration-template

Install dependencies:
Make sure you have Composer installed. Then, run the following command:

composer install
Set up the environment file:

If you're facing issues with caching, you can clear the caches:

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

Run the application:
Start the Laravel development server:

php artisan serve
