<?php
error_reporting(0);
/*require_once '../Classes/PHPMailer-6.8.1/src/PHPMailer.php';
require_once '../Classes/PHPMailer-6.8.1/src/Exception.php';
require_once '../Classes/PHPMailer-6.8.1/src/PHPMailer.php';
require_once '../Classes/PHPMailer-6.8.1/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer;
$mail->setFrom('vinokuroff555@gmail.com', 'Отправитель');
$mail->addAddress('vinokuroff555@gmail.com', 'Получатель');
$mail->Subject = $fullname.' / '.$phone;
$mail->Body = 'Текст сообщения';

if ($mail->send()) {
    echo "Сообщение успешно отправлено.";
} else {
    echo "Ошибка при отправке сообщения: " . $mail->ErrorInfo;
}
echo 'завершено';
die();*/

$fullname = trim($_POST['fullname']);
$phone = trim($_POST['phone']);
$message = trim($_POST['messageProblem']);

    $from = trim("vinokuroff555@gmail.com"); 
    $to = trim("daniil24022002@gmail.com");
    $subject = $fullname.' / '.$phone; 
    $messageOriginal = $message; 
    $headers = "From:" . $from;
    $res = mail($to, $subject, $message, $headers);
    //echo $res;
    //die();
    if ($res) {
        $resText = 'Сообщение успешно отправлено!';
        $responce = [
            "status" => true,
            "message" => $resText,
        ];
        mail($to, $subject, $message, $headers);
    } else {
        $resText = 'Возникла ошибка при отправке!';
        $responce = [
            "status" => false,
            "message" => $resText,
        ];
    }
echo json_encode($responce, JSON_UNESCAPED_UNICODE);
die();

?>