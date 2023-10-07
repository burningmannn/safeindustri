<?php
    //Объявляем переменные БД
    define('DB_HOST', 'localhost'); //Название хоста
    define('DB_USER', 'root'); //Название пользователя
    define('DB_PASS', ''); //Пароль БД
    define('DB_NAME', 'prom'); //Название БД
    
    //Устанавливаем соединение с БД
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Проверка на успешное соединение с БД
    if(!$connect){
        die('Проблема с подключением к базе данных');
    }
?>
