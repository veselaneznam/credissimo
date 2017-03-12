#!/bin/bash

echo "Hello Credissimo"

rm -rf vendor/
composer install

php bin/console cache:clear
php bin/console assets:install
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console server:start --forse

php bin/console fos:user:create admin admin@admin admin --super-admin=1
php bin/console fos:user:create user user@user user

echo "Bye!
