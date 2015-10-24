<?php
session_start();
ob_start();

require_once "controllers/Controller.php";
require_once "controllers/TableController.php";

require_once "db_work/Main.php";
require_once "db_work/Couriers.php";
require_once "db_work/Regions.php";
require_once "db_work/Timetable.php";

require_once 'vendor/autoload.php';
require_once 'classes/redirect/redirect.php';

// Подключение к БД
require_once "config.php";


// Если запрошен любой URI, отличный от корня сайта.
if ($_SERVER['REQUEST_URI'] != '/') {
    // Для того, что бы через виртуальные адреса можно было также передавать параметры
    // через QUERY_STRING (т.е. через "знак вопроса" - ?param=value),
    // необходимо получить компонент пути - path без QUERY_STRING.
    // Данные, переданные через QUERY_STRING, также как и раньше будут содержаться в
    // суперглобальных массивах $_GET и $_REQUEST.
    $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // Разбиваем виртуальный URL по символу "/"
    $uri_parts = explode('/', trim($url_path, ' /'));

    switch ($uri_parts[0]) {

        case 'push':
            $form = new TableController();
            $form->actionIndex();
            break;

        case 'check':
            $form = new TableController();
            $form->actionCheck();
            break;

        case 'update':
            $form = new TableController();
            $form->actionUpdate();
            break;

        case 'add':
            $form = new TableController();
            $form->actionAdd();
            break;

        default:
            header('HTTP/1.0 404 Not Found');
            die();
            break;
    }
}
else {
    $form = new TableController();
    $form->actionView();
}
mysql_close($dbh);
ob_flush();



