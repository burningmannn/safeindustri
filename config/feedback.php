<?php 
    error_reporting(0);
    session_start();
    require_once '../config/database_connect.php'; //Подключение к БД
    $fullname = trim($_POST['fullname']);
    $phone = trim($_POST['phone']);
    $message = trim($_POST['messageProblem']);
    $sql = "INSERT INTO `feedback` (`id`, `fio`, `phone`, `message`) VALUES (NULL, '$fullname', '$phone', '$message')";
    
    $result = mysqli_query($connect, $sql);
    
    if (!$result) {
        $error_message = "Код ошибки: " . mysqli_errno($connect). " Текст ошибки: " .  mysqli_error($connect);
        switch (mysqli_errno($connect)){
            case 1062:
                $error_message = "Такая запись уже существует, введите другие данные";
            break;
            case 1265 || 1366:
                $error_message = "Ввод не корректный";
            break;
        }
        $responce = [ 
            "status" => false,
            "message" => $error_message,
        ];
    } else  { 
        $responce = [
            "status" => true,
            "message" => "Данные успешно добавлены",
        ];
    }
    $connect->close();
    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
?>