# Simple PHP API

A lightweight PHP REST API framework.

## Structure

- `index.php` - Main entry point with route definitions
- `Router.php` - Simple routing class
- `config/database.php` - Database configuration
- `.htaccess` - URL rewriting rules

## Setup

1. Update database credentials in `config/database.php`
2. Place in your web server's document root or configure virtual host
3. Ensure Apache mod_rewrite is enabled

## Usage

Access the API at: `http://localhost/php-api/api/health`

## Example Endpoints

- `GET /api/health` - Health check
- `GET /api/users` - Get all users
- `POST /api/users` - Create a user
