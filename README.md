# Reckless Task Manager

## Prerequisites

Install the following

- php >= 8.2
- composer 2
- nodejs >= 20.15.1
  - npm >= 10.7.0

## Initial Setup

Run the following commands to install dependencies

```
composer install
npm install
```

Copy the sample environment file

```
cp .env.example .env
```

And fill in your database details found between lines 24-29

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=reckless_task_manager
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations

```
php artisan migrate
```

Set the application key

```
php artisan key:generate
```

And build frontend assets

```
npm run build
```

## Run Development Server

Run `php artisan serve` to start a development server. This command will output the url and port that the server is running on (default: http:127.0.0.1:8000).
