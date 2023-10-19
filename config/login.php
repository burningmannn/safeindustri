<?php
    error_reporting(0);
    
    session_start();
    if(isset($_POST['username']) && $_POST['username'] && isset($_POST['password']) && $_POST['password']){
        // Подключение к базе данных
        require_once 'database_connect.php';

        // Получение данных из POST-запроса
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Запрос на проверку имени пользователя и пароля
        $query = "SELECT * FROM `users` WHERE `login` = '$username' AND `pass` = '$password'";
        $result = $connect->query($query);

        if ($result->num_rows == 1) {
            $_SESSION['user'] = "ADMIN";
            $responce =[
                "status" => true,
                "message" => "Пользователь найден",
            ];
        } else {
            $responce = [
                "status" => false,
                "message" => "Пользователь не найден",
            ];
        }
        $connect->close();

    } else {
        $responce = [
            "status" => false,
            "message" => "Неудачная попытка авторизации",
        ];
    }
    
    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
    exit();
?>