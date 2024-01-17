Poster - Laravel блог на blade шаблонах(без javascript). 
Функционал: Можно создавать посты с прикреплением изображения,комментарии и ответы на комментарии(дочерние). 
Есть очереди с отправкой уведомлений на почту(отправляются в файл log).

![](https://github.com/IgorOlikov/Poster/blob/main/readme-files/poster.gif)

Установка:

1) docker compose up -d
2) docker compose run --rm php-cli php artisan migrate
3) docker compose run --rm php-cli php artisan db:seed
4) Адрес сайта localhost:80

![](https://github.com/IgorOlikov/Poster/blob/main/readme-files/Screenshot%20from%202024-01-17%2013-23-05.png)

![](https://github.com/IgorOlikov/Poster/blob/main/readme-files/poster2.gif)

![](https://github.com/IgorOlikov/Poster/blob/main/readme-files/Screenshot%20from%202024-01-17%2013-24-24.png)






