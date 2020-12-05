# Assignment - Smarty Streets


This module stores the information of the user including
user's address verified by Smarty Streets Platform.

This is the codebase for the module, which has one interface:

## Getting started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

Here's a basic setup:

* Apache2
* PHP 7 - All the code has been tested against PHP 7.4.3
* Mysql (5.x), running locally
* Composer 2.0.8

* The module is written in the [Laravel](https://laravel.com/), and 
uses the [Blade](https://laravel.com/docs/8.x/blade) templating system.

 
### Installing

1. Clone the repository:
    ```shell script
    git clone https://github.com/armashfankar/assignment_smartystreets.git

    ```

2. Install the requirements for the repository using the `composer`:
   ```shell script
    cd assignment_smartystreets/
    composer install
    
    ```

3. Copy `.env.example` to create `.env` file:
    ```shell script
    cp .env.example .env
    
    ```

4. Configure Database, SMTP and Smarty Streets Keys inside `.env` file:
    1. Database
    ```
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=assignment
    DB_USERNAME=root
    DB_PASSWORD=
    ```
    2. SMTP
    ```
    MAIL_MAILER=smtp
    MAIL_HOST=smtp.mailtrap.io
    MAIL_PORT=2525
    MAIL_USERNAME=null
    MAIL_PASSWORD=null
    MAIL_ENCRYPTION=null
    ```
    3. Smarty Street
    ```
    SMARTYSTREETS_AUTH_ID=
    SMARTYSTREETS_AUTH_TOKEN=
    SMARTYSTREETS_KEY=
    ```

5. Create MySQL Database:
     ```shell script
    mysql -u root -p

    create database assignment;
    
    ```

6. Generate key for `.env` file:
    ```shell script
    php artisan key:generate
    
    ```

7. Migrate database:
    ```shell script
    php artisan migrate
    
    ```

8. Run / Execute:
    ```shell script
    php artisan serve
    
    ```

9. Open browser:
    ```
    http://localhost:8000
    ````
   
    