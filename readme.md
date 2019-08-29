<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. 

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## The Service Features


- User signup => the following data is required (name, password, email and image).
- User login => the following data is required (password, email).
- User create tweet => the following data is required (tweet text maximum 140 character).
- User delete tweet.
- User follow another user.
- User time line => the time line should return all the tweets of the followed users paginated.

## API Documentations 
 [postman](https://www.getpostman.com/collections/3bafabb9368fa8f905b3) 
 
## Important commands 
  - ``php artisan storage:link``
  - ``php artisan passport:install`` You need to make a request to /oauth/token to generate a token based on the data which will appear after you run this command as shown in the postman in collection folder Auth/Get token for sign up when get the token you can sign up then use the token of the user you registered with.
  - For Arabic just send header with key X-localization and value ar for Arabic or en for English (default).
  


