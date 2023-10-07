<?php
    error_reporting(0);
    
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user']){
        session_destroy();
        unset($_SESSION['user']);
        $responce = [
            "status" => true,
            "message" => "Выход из системы",
        ];
    }else{
        $responce = [
            "status" => false,
            "message" => "Пользователь не был авторизован",
        ];
    }
    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
    exit();
?>