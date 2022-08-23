## About Laravel

It's translation system with still growing database, that includes a translated countries and states in many languages. If you want translation in your language, let us check if we have that already.

States translation is in test version not as job as country translation - only as artisan command (states:translate).

## Usage

Put your language in url as array and feel free to take your translation.

## Installation

 - composer install
 - composer update
 - php artisan key:generate
 - php artisan storage:link
 - php artisan migrate
 - php artisan countries:fetch
 - php artisan types:fetch
 - php artisan states:fetch
