## FAQ
### Установка
В консоли нужно выполнить команды
composer global require "laravel/installer"
composer create-project --prefer-dist laravel/laravel .
mkdir git
cd git
git clone https://github.com/lauraSev/diplom .
cp -r ./* ../
cp -r ./.git ../
cd ..
rm -rf ./git
composer update
указать доступы СУБД в .env 
php artisan  migrate:fresh 
php artisan   db:seed    

### Работа приложения
По умолчанию в системе создается только один реальный пользователь с правами 
администратора (admin:admin), через db:seed база заполняется тестовыми данными.

В системе сделаны 2 роли, пользователь и админ, все операции для админа происходят по URL начинающимуся с /admin/*
