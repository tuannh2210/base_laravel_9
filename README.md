Follow me on github [https://github.com/nguyentrongmanh](https://github.com/nguyentrongmanh)

## Required enviroiment version

$ php >= 8.0.x

## Installation

``` bash
# install app's dependencies
$ composer install
# generate laravel APP_KEY
$ php artisan key:generate
# run database migration and seed
$ php artisan migrate --seed
# generate jwt secret key 
$ php artisan jwt:secret
# generate api docs
$ php artisan lrd:generate
# generate symbolic link
$ php artisan storage:link
```
## Usage

``` bash
# start local server
$ php artisan serve
```

## Format code

``` bash
# Run the first
$ composer require --working-dir=tools/php-cs-fixer friendsofphp/php-cs-fixer

# lint php
$ tools/php-cs-fixer/vendor/bin/php-cs-fixer fix

