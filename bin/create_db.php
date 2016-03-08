<?php
echo "Start create database \n";

$config = realpath(__DIR__ . '/..') . '/.env';

if (!is_readable($config)) {
    echo "Not open config file .env \n";
    exit();
}

/*
 * TODO: брать настройки из конфигурации
require_once __DIR__.'/../vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

var_dump(require_once __DIR__.'/../vendor/autoload.php');
exit();

 * Dotenv::load(base_path());

Здесь я говорю dotenv загрузить файл из корневой директории моего Laravel-приложения. Вы точно также можете положить его куда-либо ещё, только убедитесь, что передаёте путь к директории в качестве параметра метода load.

Далее я хочу убедиться, что некоторые переменные доступны в файле .env.

Dotenv::required(array('DB_HOST', 'DB_DATABASE', 'DB_USERNAME', 'DB_PASSWORD'));

DB::getConnection()->statement('CREATE DATABASE :schema', ['schema' => $schemaName]);
 */

/**
 * Подключение к базе данных ODBC, используя вызов драйвера
 */
$dsn = 'mysql:dbname=mysql;host=127.0.0.1';
$user = 'admin';
$password = '123';
$dbname = 'parser_avito';

try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connect error: ' . $e->getMessage();
}

$sql = sprintf("CREATE DATABASE IF NOT EXISTS %s", $dbname);

try {
    $dbh->exec($sql);
} catch (PDOException $e) {
    echo 'Create base error: ' . $e->getMessage();
}

$dbs = $dbh->query('SHOW DATABASES');

while(($db = $dbs->fetchColumn(0)) !== false ) {
    echo $db . "\n";
}


