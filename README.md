# What is this?
This is an API made for an imaginary blog post to showcase my ability to create an API from scratch for a system with Laravel.

# How to run it?
Just like any application, you need a server and a database. Assuming you already got that covered, Follow these steps:

1. Clone the application to your local machine using the `git clone` command.
2. Download the vendor packages using `composer install`.
3. Create a new database and add your credentials to the `.env` file.
4. Run `php artisan migrate` to setup the tables specified in the migrations.
5. Run the application using `php artisan serve` to start a local development server.
6. That's it.

# What are the URIs of the API?
Well, You can check those out in `routes/api.php` file.

Even better, there's a postman collection file included with the project. Just import it into postman and you'll have access to all routes in an easy organized fashion.

# Extras
1. The postman collection includes a `TOKEN` variable that is used to store the api_token generated from the server automatically when you login or register to facilitate sending requests that require authorization (which is basically every request except registration and login).

To create such a variable, you have to create an envrionment in postman and then add a `TOKEN` variable to that environment. Google is your best friend if you don't know how to.

2. You're free to use this how you see fit but please drop some credits my way if you do :)

# Contact
Feel free to contact me if you have any questions, concerns or to report a bug.

<a href="mailto:michaelyousrie@gmail.com">My Email</a>

## That's it :)
