Развертка проекта

1. git clone https://github.com/Kirill-Ryzhkov/notebook-api.git
2. cd notebook-api
3. composer update
4. Копируем файл .env.example и вставляем в корень сайта, переименовываем в .env или в терминале cp .env.example .env
5. ./vendor/bin/sail up
В новом терминале
6. docker ps
7. Копируем id контейнера "start-container"
8. docker exec -it <id container> bash
9. php artisan migrate

Swagger - http://localhost/api/documentation

В проекте есть возможность аутентификации по уникальному Bearer токену, но swagger не хотел работать с ним и поэтому сделал без аутентификации.

Для тестов пользовался программой Postman

