<?php

    $header = "Content-type: text/html; charset=\"windows-1251\"\r\n";

    $html = "<b>Замовлення ukrman.ua</b><br><br>Товар: ".addslashes(iconv("utf-8", "windows-1251", $_POST['item']))."<br>";
    $html .= "Ціна: ".addslashes(iconv("utf-8", "windows-1251", $_POST['price']))."<br>";
    $html .= "Прізвище та ім'я: ".addslashes(iconv("utf-8", "windows-1251", $_POST['name']))."<br>";
    $html .= "Телефон: ".addslashes(iconv("utf-8", "windows-1251", $_POST['phone']))."<br>";
    $html .= "Коментар, колір, розмір: ".addslashes(iconv("utf-8", "windows-1251", $_POST['comment']))."<br>";

    mail( " maestro19@ukr.net, ukrmanpicture@i.ua, vadimgvozd416@gmail.com, dimid22@narod.ru", "Замовлення ukrman.ua", $html, $header);
?>