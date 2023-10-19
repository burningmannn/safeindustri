<?php 
    error_reporting(0);
    
    session_start();
    require_once '../config/database_connect.php'; //Подключение к БД
    if (isset($_SESSION['user']) && $_SESSION['user']) {
        $nameModal = $_GET['nameModal'];
        $nameTable = $_GET['nameTable'];
        $id = $_GET['id'];
        switch($nameModal){
            case 'editModal':
                switch($nameTable){
                    case 'adminka':
                        $sql = "SELECT `departament` as departament, `category`, `inventory`, `status_technic`, `title` FROM `technic` WHERE id = '$id';";
                        $res_mas = mysqli_query($connect, $sql);
                        $data = mysqli_fetch_assoc($res_mas);
                        if (empty($data)) {
                            $responce = [
                                "status" => false,
                                "message" => "Данные не найдены!",
                            ];
                            echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                            exit();
                        }

                        $sql = "SELECT `id_departament` as id_departament, `nameDepartament` as nameDepartament FROM `departament`";
                        $res_mas = mysqli_query($connect, $sql);
                        $departament = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);

                        $sql = "SELECT `id_category`, `nameCategory` FROM `category`;";
                        $res_mas = mysqli_query($connect, $sql);
                        $category = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);

                        $sql = "SELECT `id` as id_status, `name` as nameStatus FROM `status`";
                        $res_mas = mysqli_query($connect, $sql);
                        $status_technic = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);

                        $responce = [
                            "status" => true,
                            "message" => "ПОЛУЧАЙ ДАННЫЕ",
                            "data" => $data,
                            "departament" => $departament,
                            "category" => $category,
                            "status_technic" => $status_technic,
                        ];
                    break;
                    case 'otdel':
                        $sql = "SELECT `nameDepartament` as nameOtd FROM `departament` WHERE `id_departament` = '$id';";
                        $res_mas = mysqli_query($connect, $sql);
                        $departament = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);
                        if (empty($departament)) {
                            $responce = [
                                "status" => false,
                                "message" => "Данные не найдены!",
                            ];
                            echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                            exit();
                        }
                        $responce = [
                            "status" => true,
                            "message" => "ПОЛУЧАЙ ДАННЫЕ",
                            "departament" => $departament,
                        ];
                    break;
                    case 'category':
                        $sql = "SELECT `nameCategory` AS nameCat FROM `category` WHERE `id_category` = '$id';";
                        $res_mas = mysqli_query($connect, $sql);
                        $category = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);
                        if (empty($category)) {
                            $responce = [
                                "status" => false,
                                "message" => "Данные не найдены!",
                            ];
                            echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                            exit();
                        }
                        $responce = [
                            "status" => true,
                            "message" => "ПОЛУЧАЙ ДАННЫЕ",
                            "category" => $category,
                        ];
                    break;
                    default:
                }
            break;
            case 'addModal':
                $sql = "SELECT `id_departament` as id_departament, `nameDepartament` as nameDepartament FROM `departament`";
                $res_mas = mysqli_query($connect, $sql);
                $departament = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);

                $sql = "SELECT `id_category`, `nameCategory` FROM `category`;";
                $res_mas = mysqli_query($connect, $sql);
                $category = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);

                $sql = "SELECT `id` as id_status, `name` as nameStatus FROM `status`";
                $res_mas = mysqli_query($connect, $sql);
                $status_technic = mysqli_fetch_all($res_mas, MYSQLI_ASSOC);

                $responce = [
                    "status" => true,
                    "message" => "ПОЛУЧАЙ ДАННЫЕ",
                    "departament" => $departament,
                    "category" => $category,
                    "status_technic" => $status_technic,
                ];
            break;
            default:
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