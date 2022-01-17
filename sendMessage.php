<?php

    $to  = 'ukrmansale@gmail.com,maestro19@ukr.net';
    $subject = 'Нове замовлення з UKRMAN.UA';

    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $message = isset($_POST['message']) ? $_POST['message'] : '';
    $shipping_type = isset($_POST['shipping_type']) ? $_POST['shipping_type'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $post_office = isset($_POST['post_office']) ? $_POST['post_office'] : '';

    $message =
        "Ім'я: " . $name . '<br />' . $phone . '<br />' . $email . '<br />' .
        'Коментар клієнта: ' . $message . '<br />' . 'Cпосіб доставки: ' . $shipping_type . '<br />' .
        'Адреса доставки: ' . $address . '<br />' .
        'Офіс Нової Пошти: ' . $post_office;

    print_r($message);


    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-Type:text/html;charset=utf-8';

    
    $headers .= 'To: Anatoliy <maestro19@ukr.net>' . "\r\n";
    $headers .= 'From: '  . $_POST['name'] . '<' . $_POST['email'] . '>' . "\r\n";

    mail($to, $subject, $message, $headers);

?>