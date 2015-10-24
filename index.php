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

// ����������� � ��
require_once "config.php";


// ���� �������� ����� URI, �������� �� ����� �����.
if ($_SERVER['REQUEST_URI'] != '/') {
    // ��� ����, ��� �� ����� ����������� ������ ����� ���� ����� ���������� ���������
    // ����� QUERY_STRING (�.�. ����� "���� �������" - ?param=value),
    // ���������� �������� ��������� ���� - path ��� QUERY_STRING.
    // ������, ���������� ����� QUERY_STRING, ����� ��� � ������ ����� ����������� �
    // ��������������� �������� $_GET � $_REQUEST.
    $url_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    // ��������� ����������� URL �� ������� "/"
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



