<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

//PHPMailer Object``$mail = new PHPMailer(true); //Argument true in constructor enables exceptions`

//From email address and name
$mail->From = "vanya@gmail.com";
$mail->FromName = "vanyapolice";

//To address and name
$mail->addAddress("vanyamyasnikov2206@gmail.com", "vanyapolicai");
//Recipient name is optional

if (trim(!empty($_POST['name']))) {
    $body .= '<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}
if (trim(!empty($_POST['email']))) {
    $body .= '<p><strong>Email:</strong> ' . $_POST['email'] . '</p>';
}
if (trim(!empty($_POST['message']))) {
    $body .= '<p><strong>Имя:</strong> ' . $_POST['message'] . '</p>';
}

//Send HTML or Plain Text email
$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = "This is the plain text version of the email content";

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправленны!';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>