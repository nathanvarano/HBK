# HBK example app

## Dependencies
- PHP
- Mysql
- Node
- NPM
- Composer

## Setup instructions

Create mysql database and call it HBK_example. 

Copy and paste env.example and rename it .env. Update database connection if required.

### Commands
```
git clone https://github.com/nathanvarano/HBK.git
composer install
npm install
php artisan migrate
php artisan serve
*open new terminal*
npm run dev
*open http://127.0.0.1:8000/*
```
