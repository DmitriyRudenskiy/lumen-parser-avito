Устанавливаем базу данных
=========================

Запускаем скрипт создания базы данных
$ cd <project>
$ php bin/create_db.php


Starting The Scheduler
======================
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1


Команды
=======
php artisan parser:avito:page загрузка страниц