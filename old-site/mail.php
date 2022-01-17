<?php

    $header="Content-type: text/html; charset=\"utf-8\"\r\n";
    $header.="From: info@ukrman.ua\r\n"; 
    $header.="Content-type: text/html; charset=\"utf-8\"\r\n";

    $text = "Форма обратной связи UKRMAN.UA<br>
             Страница: ".addslashes($_POST['page'])."<br>
             Имя: ".addslashes($_POST['name'])."<br>
             Почта: ".addslashes($_POST['mail'])."<br><br>
             Текст: ".addslashes($_POST['text'])."
    ";

    mail("dimid22@narod.ru, maestro19@ukr.net, ukrmanpicture@i.ua, vadimgvozd416@gmail.com", "Форма обратной связи UKRMAN.UA", $text, $header);  
    echo "ok";
?>
