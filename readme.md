<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Quiz Game

A quiz game where you have to answer 10 questions. 
Each question gives you exactly 20 seconds to answer it. 
The highest scorer gets email notification and alse gets notified when someone else has scored a new high score. 
The timer is server based timer. Disabling any JS won't stop the timer of questions.

Setup Mailtrap account. Place your credentials in .env like this:

MAIL_DRIVER=smtp

MAIL_HOST=smtp.mailtrap.io

MAIL_PORT=2525

MAIL_USERNAME=GIVEN_USERNAME

MAIL_PASSWORD=GIVEN_PASSWORD

MAIL_ENCRYPTION=null

Create and confgure in .env a new Database named "Quiz". 

Do not forget to run 'php artisan migrate'.

Also do not forget to run 'php artisan db:seed'.

Also add a vendor folder of Laravel.
