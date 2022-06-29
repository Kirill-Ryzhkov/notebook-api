Развертка проекта

1. git clone https://github.com/Kirill-Ryzhkov/notebook-api.git
2. cd notebook-api
3. composer update
4. Копируем файл .env.example и вставляем в корень сайта, переименовываем в .env
5. php artisan migrate
6. ./vendor/bin/sail up

В проекте есть возможность аутентификации по уникальному Bearer токену, но swagger не хотел работать с ним и поэтому сделал без аутентификации.

Для тестов пользовался программой Postman

