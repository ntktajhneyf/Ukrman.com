<?php

    $header = "Content-type: text/html; charset=\"windows-1251\"\r\n";

    $html = "<b>���������� ukrman.ua</b><br><br>�����: ".addslashes(iconv("utf-8", "windows-1251", $_POST['item']))."<br>";
    $html .= "ֳ��: ".addslashes(iconv("utf-8", "windows-1251", $_POST['price']))."<br>";
    $html .= "������� �� ��'�: ".addslashes(iconv("utf-8", "windows-1251", $_POST['name']))."<br>";
    $html .= "�������: ".addslashes(iconv("utf-8", "windows-1251", $_POST['phone']))."<br>";
    $html .= "��������, ����, �����: ".addslashes(iconv("utf-8", "windows-1251", $_POST['comment']))."<br>";

    mail( " maestro19@ukr.net, ukrmanpicture@i.ua, vadimgvozd416@gmail.com, dimid22@narod.ru", "���������� ukrman.ua", $html, $header);
?>