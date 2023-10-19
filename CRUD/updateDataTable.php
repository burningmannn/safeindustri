<?php 
    error_reporting(0);
    
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user']){
        $nameTable = $_POST['nameTable'];
        switch($nameTable){
            case 'adminka':    
                $id = $_POST['idRecord'];
                $otdel = $_POST['otdel'];
                $category = $_POST['category'];
                $inventory = $_POST['inventory'];
                $title = $_POST['title'];
                $status = $_POST['status'];

                $sql = "UPDATE technic SET departament = '$otdel', category = '$category', inventory = '$inventory', status_technic = '$status', title = '$title' WHERE technic.id = '$id'";
                break;

            case 'otdel':
                $id = $_POST['iddRecord'];
                $otdel = $_POST['otdell'];
                $sql = "UPDATE `departament` SET `nameDepartament` = '$otdel' WHERE `departament`.`id_departament` = '$id'";
                break;
            case 'category':
                $id = $_POST['idddRecord'];
                $category = $_POST['categoryy'];
                $sql = "UPDATE `category` SET `nameCategory` = '$category' WHERE `category`.`id_category` = '$id'";
                break;
            default:
                $responce = [
                    "status" => false,
                    "message" => "Таблица не найдена!",
                ];
                echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                die();
                
            }
        require_once '../config/database_connect.php'; //Подключение к БД
        $result = mysqli_query($connect, $sql);
        $connect->close();
        if (!$result) {
            $responce = [
                "status" => false,
                "message" => "Ошибка выполнения запроса",
            ];
        } else  { 
            $responce = [
                "status" => true,
                "message" => "Данные успешно изменены",
            ];
        }
    } else {
        $responce = [
            "status" => false,
            "message" => "Доступ запрещен",
        ];
    }
    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
?>