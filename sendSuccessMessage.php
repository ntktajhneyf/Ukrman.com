<?php

    //$to  = 'ivpr.lapa@gmail.com';
    $subject = 'Покупка коміксу Укрмен. Початок';

    $name = isset($_POST['name']) ? $_POST['name'] : '';

    $email = isset($_POST['email']) ? $_POST['email'] : '';

    $to = $email;

    $message =
        $name . '<br />' .
        'Дякуємо за Ваше передзамовлення!' . '<br />' .
        'Щойно нам доставлять комікс з друкарні, ми з вами зв’яжемось.';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type:text/html;charset=utf-8';


    $headers .= 'To: ' . $email . "\r\n";
    $headers .= 'From: '  . 'УКРМЕН. Початок' . '<' . 'ukrmansale@gmail.com' . '>' . "\r\n";

    mail($to, $subject, $message, $headers);

?>