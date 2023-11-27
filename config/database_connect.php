<?php
    //Объявляем переменные БД
    define('DB_HOST', 'localhost'); //Название хоста
    define('DB_USER', 'id21336994_root'); //Название пользователя
    define('DB_PASS', 'DanyaS3330!'); //Пароль БД
    define('DB_NAME', 'id21336994_root'); //Название БД
    
    //Устанавливаем соединение с БД
    $connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    //Проверка на успешное соединение с БД
    if(!$connect){
        die('Проблема с подключением к базе данных');
    }
?>
