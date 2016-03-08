<?php
/**
 * TODO: что происходит с сесиями
 */
if (ini_get('session.save_handler') == "files") {
    ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
}
session_start();

function session($key = null, $default = null)
{
    if (is_array($key)) {
        foreach ($key as $index => $item) {
            $_SESSION[$index] = $item;
        }

        return true;
    }

    if (!isset($_SESSION[$key])) {
        return $default;
    }

    return $_SESSION[$key];
}

$app = require __DIR__.'/../bootstrap/app.php';
$app->run();
