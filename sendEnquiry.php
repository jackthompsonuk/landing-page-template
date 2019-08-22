<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

$clientEmail = 'email@example.com';
$websiteDomain = 'example.com';

$formName = $_POST['__formName'];
$fields = [];
foreach($_POST as $key => $value) {
    if(substr($key, 0, 2) !== '__' ) {
        $fields[$key] = htmlspecialchars($value);
    }
}

if($fields['name']) {

    $result = [];
    $mail = new PHPMailer(true); // Passing `true` enables exceptions
    try {
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.mailtrap.io';
        $mail->Username = 'username';
        $mail->Password = 'password';
        $mail->Port = 2525;

        //Recipients
        $mail->setFrom('noreply@'.$websiteDomain, 'From Your Website');
        $mail->addAddress($clientEmail);
        if(isset($fields['email'])){
            $mail->addReplyTo($fields['email'], $fields['name']);
        }

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'You have a new '.$formName;
        $mail->Body    = emailBody($fields);

        $mail->send();

        $result = [
            'status' => "success",
            'message' => "Your $formName has been sent!"
        ];

    } catch (Exception $e) {

        $result = [
            'status' => "error",
            'message' => "Message could not be sent. Mailer Error: $mail->ErrorInfo"
        ];
        
    }

} else {

    $result = [
        'status' => "error",
        'message' => "Please fill in all the required fields!"
    ];

}

echo json_encode($result);

function emailBody($fields) {

    $output = '';
    foreach($fields as $key => $value) {
        $output .= ucfirst($key).': '.$value.'<br/>';
    }

    return $output;

}