<?php 
    error_reporting(0);
    
    session_start();
    require_once '../config/database_connect.php'; //Подключение к БД
    if(isset($_SESSION['user']) && $_SESSION['user']){
        $nameTable = $_POST['nameTable'];
        switch($nameTable){
            case 'adminka':
                $otdel = $_POST['otdelAdminka'];
                $category = $_POST['categoryAdminka'];
                $inventory = $_POST['inventoryAdminka'];
                $title = $_POST['titleAdminka'];
                $status = $_POST['statusAdminka'];

                $sql = "INSERT INTO `technic` (`id`, `departament`, `category`, `inventory`, `status_technic`, `title`) VALUES (NULL, '$otdel', '$category', '$inventory', '$status', '$title')";
                break;
            case 'otdel':
                $otdel = $_POST['Otdel'];
                $sql = "INSERT INTO `departament` (`id_departament`, `nameDepartament`) VALUES (NULL, '$otdel')";
                break;
            case 'category':
                $category = $_POST['Category'];
                $sql = "INSERT INTO `category` (`id_category`, `nameCategory`) VALUES (NULL, '$category')";
                break;
            default:
                $responce = [
                    "status" => false,
                    "message" => "Таблица не найдена!",
                ];
                echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                die();
        }
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
    } else {
        $responce = [
            "status" => false,
            "message" => "Доступ запрещен",
        ];
    }
    $connect->close();
    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
?>