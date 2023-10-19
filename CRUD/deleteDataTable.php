<?php
    error_reporting(0);
    
    session_start();
    if(isset($_SESSION['user']) && $_SESSION['user']){
        require_once '../config/database_connect.php'; //Подключение к БД
        $delNameTable = $_POST['delNameTable'];
        $id = $_POST['IdRecord'];
        switch($delNameTable){
            case 'delAdminka':    
                //$id = $_POST['IdRecord'];

                //Проверка на существования такого ID
                $sql="SELECT COUNT(*) AS count FROM technic WHERE `technic`.`id` = '$id'";
                $result = mysqli_query($connect, $sql);
                $result = mysqli_fetch_assoc($result);
                if ($result['count'] == 0) {
                    $responce = [ "status" => false, "message" => "Данная запись отсутствтует в БД" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }

                /* Удаляем записи из БД */
                $sql = "DELETE FROM technic WHERE `technic`.`id` = '$id'";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    $responce = [ "status" => false, "message" => "Не удалось удалить запись" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }

                $sql = "SELECT max(`id`) as maximum FROM `technic`";
                $result = mysqli_query($connect, $sql);
                $idMax = mysqli_fetch_assoc($result);
                $idMax = $idMax['maximum'];
                if (!$idMax) {
                    $responce = [ "status" => false, "message" => "Ошибка выполнения запроса №1" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }
                
                //Удаление со смещением
                if($id != $idMax){
                    for($i = $id + 1; $i <= $idMax; $i++){
                        $sql = "UPDATE `technic` SET `id` = $i-1 WHERE `technic`.`id`= $i";
                        $result = mysqli_query($connect, $sql);
                        if (!$result) {
                            $responce = [ "status" => false, "message" => "Ошибка выполнения запроса №2" ];
                            echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                            die();
                        }
                    }
                }

                /* AUTO_INCREMENT */
                $sql = "SELECT COUNT(*) as count FROM `technic`";
                $result = mysqli_query($connect, $sql);
                $result = mysqli_fetch_assoc($result);
                if (!$result) {
                    $responce = [ "status" => false, "message" => "Ошибка выполнения запроса №3" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }

                $result = $result['count'];
                $sql = "ALTER TABLE `technic` AUTO_INCREMENT = $result";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    $responce = [ "status" => false, "message" => "Ошибка выполнения запроса №4" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }
                $connect->close();
                break;
            case 'delOtdel':
                $sql = "SELECT DISTINCT count(*) AS count FROM technic tec left join departament dep on tec.departament = dep.id_departament where tec.departament = $id;";
                $result = mysqli_query($connect, $sql);
                $result = mysqli_fetch_assoc($result);
                if ($result['count'] > 0) {
                    $responce = [ "status" => false, "message" => "Данную запись невозможно удалить так как используется в таблице" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }
                $sql = "DELETE FROM departament WHERE departament.id_departament = $id";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    $responce = [ "status" => false, "message" => "Не удалось удалить запись" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }
                break;
            case 'delCategory':
                $sql = "SELECT DISTINCT count(*) as count FROM technic tec left join category cat on tec.category = cat.id_category WHERE tec.category = $id;";
                $result = mysqli_query($connect, $sql);
                $result = mysqli_fetch_assoc($result);
                if ($result['count'] > 0) {
                    $responce = [ "status" => false, "message" => "Данную запись невозможно удалить так как используется в таблице" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }
                $sql = "DELETE FROM category WHERE `category`.`id_category` = $id";
                $result = mysqli_query($connect, $sql);
                if (!$result) {
                    $responce = [ "status" => false, "message" => "Не удалось удалить запись" ];
                    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                    die();
                }
                break;
            default:
                $responce = [ "status" => false, "message" => "Таблица не найдена!" ];
                echo json_encode($responce, JSON_UNESCAPED_UNICODE);
                die();
        }
        $responce = [ "status" => true, "message" => "Запись успешно удалена" ];
    } else {
        $responce = [ "status" => false, "message" => "Доступ запрещен" ];
    }
    echo json_encode($responce, JSON_UNESCAPED_UNICODE);
?>