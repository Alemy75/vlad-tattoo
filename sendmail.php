<?php
    use PHPmailer\PHPMailer\PHPMailer;
    use PHPmailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('ru', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->setFrom('vldtto@fls.ru', 'Клиент');

    $mail->addAddress('alemax75962@gmail.com');

    $mail->Subject = 'Консультация';

    //  $hand = "Правая";
    //  if ($_POST['hand'] == "left") {
    //      $hand = 'Левая';
    //  }

    $body = '<h1>Письмо с сайта</h1>';

    if(trim(!empty($_POST['name']))){
        $body.='Имя: '.$_POST['name'].'<br>'; 
    }
    if(trim(!empty($_POST['lastName']))){
        $body.='Фамилия: '.$_POST['lastName'].'<br>'; 
    }
    if(trim(!empty($_POST['phone']))){
        $body.='Телефон: '.$_POST['phone'].'<br>' ;
    }

    $mail->Body = $body;

    if (!$mail->send()) {
        $message = 'Ошибка';
    } else {
        $message = 'Данные отправлены';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);


