1. Установите зависимости `composer install`
2. Создайте .env из .env.example `cp .env.example .env`
3. Соберите контейнер `docker-compose up -d --build`
4. Зайдите в контейнер php `docker-compose exec -it php`
5. Запустите миграции `php bin/console doctrine:migrations:migrate`
6. Если ругается, что бд не существует, то создайте бд `php bin/console doctrine:database:create` и повторите пункт 4
7. Приложение откроется по адресу http://localhost:8080 если не меняли порт в .env
8. Настройка докера по ссылке https://habr.com/ru/post/712670/ переменные можно посмотреть или поменять в .env