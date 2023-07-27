!/bin/bash

php artisan config:clear
php artisan config:cache

composer install
composer require laravel/passport
composer --ignore-platform-req=php install
composer --ignore-platform-req=php update

php artisan migrate
php artisan db:seed
php artisan passport:install
php artisan key:generate
echo "run..."
