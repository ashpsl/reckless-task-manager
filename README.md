# Reckless Task Manager

## Approach

### Frontend

As this is my first ever Laravel project, the approach I took was to spend most of the weekend on the Laravel docs following it as closely as possible to hopefully stick to best practices for the framework.

With experience in other frameworks like Symfony and completely custom-built MVC frameworks, this wasn't too difficult. However, this method seemed to fall apart as it come to build the api routes.

### API

I found following the docs for the Laravel Sanctum package to be a bit confusing and couldn't get past the authentication part.

I come across an issue that I couldn't get past where it seemed like any post request I made to any api route I tried to make just returned the homepage/welcome page. I created a get route to test and that works fine, I even tried following an online article to see how they were doing it and got the same result.

### Testing

Unfortunately, with my limited timeframe I didn't get around to making any tests for this code.

### Stretch Goals

I also, unfortunately, didn't get around to working on any of the stretch goals.

#### Background Job Processing

As well as a CRON to clear out tasks that were completed longer than 30 days ago, I'd also add into the service class to only get tasks where completed === null or within the last 30 days using the php function `date('Y-m-d H:i:s', strtotime('-30 days'))`.

#### Localization

Unless I've missed 1 or 2, all the text in my blade templates are wrapped in translation functions ready for this to be implemented. The work I've done in Magento involved a lot of multi-language websites so this does come second nature as I've also done this for a client in WordPress.

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
