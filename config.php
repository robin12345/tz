<?php

/** Имя базы данных */
$db_name = 'timetable';
/** Имя пользователя  */
$db_login = 'root';
/** Пароль к базе данных */
$db_password = '';
/** Имя сервера  */
$db_host = 'localhost';
/** Кодировка базы данных для создания таблиц. */
$db_charset = 'utf8';

// Устанавливаем соединение
$dbh = mysql_connect($db_host, $db_login, $db_password) or die("Can't connect to MySQL.");
mysql_select_db($db_name) or die("Can't connect to Base.");

//Исправление кодировки
mysql_query("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
mysql_query("SET CHARACTER SET 'utf8'");