# Auto Appy Integration Template

This is a template for integrating with Auto Appy. Follow the steps below to set up the project on your local machine after cloning.

## Getting Started

### Prerequisites

- PHP >= 8.0
- Composer
- MySQL or any other supported database
- Git

### Installation

1. **Clone the repository:**

   ```
   git clone https://github.com/hrithiksveer/auto-appy-integration-template.git

   Navigate to the project directory:



cd auto-appy-integration-template
Install dependencies:

Make sure you have Composer installed. Then, run the following command:

composer install
Set up the environment file:

Copy the .env shared with you:

cp .env.example .env
Generate application key:

Generate the Laravel application key used for encryption:

php artisan key:generate
Configure environment variables:

Open the .env file and update the following settings:

APP_NAME
APP_URL
Database configuration (DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)
Run database migrations:

If the project uses a database, run the following command to create the necessary tables:

php artisan migrate
Set folder permissions:

Ensure that the necessary directories have the correct permissions:

sudo chmod -R 775 storage
sudo chmod -R 775 bootstrap/cache
Clear Laravel caches (optional):

If you're facing issues with caching, you can clear the caches:

php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
Run the application:

Start the Laravel development server:

php artisan serve
