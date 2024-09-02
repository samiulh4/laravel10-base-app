
# The goal is this app laravel 10 starter application


# PHP-8.2.0

# Composer-2.7.7

# laravel10-base-app

#php artisan make:module hello-world

laravel-project/
    app/
    └── Modules/
        └── HelloWorld
            ├── Events
            │   └── HelloWorld.php
            ├── Http
            │   ├── Controllers
            │   │   └── HelloWorldController.php
            │   ├── Requests
            │   │   └── HelloWorld.php
            │   └── Resources
            │       └── HelloWorld.php
            ├── Jobs
            │   └── HelloWorld.php
            ├── Listeners
            │   └── HelloWorld.php
            ├── Mail
            │   └── HelloWorld.php
            ├── Models
            │   └── HelloWorld.php
            ├── Notifications
            │   └── HelloWorld.php
            ├── Observers
            │   └── HelloWorld.php
            ├── Rules
            │   └── HelloWorld.php
            ├── config.php
            ├── database
            │   ├── factories
            │   │   └── HelloWorldFactory.php
            │   ├── migrations
            │   │   └── 2020_04_19_111656_create_foo_bars_table.php
            │   └── seeds
            │       └── HelloWorldSeeder.php
            ├── helpers.php
            ├── resources
            │   ├── lang
            │   │   └── en.php
            │   └── views
            │       └── welcome.blade.php
            └── routes
                ├── api.php
                └── web.php
