<?php

include 'includes' . DIRECTORY_SEPARATOR . 'functions.php';
include 'includes' . DIRECTORY_SEPARATOR . 'types.php';

$pageTitle = 'Данни';
$pageStyle = 'css/style.css';
include 'templates' . DIRECTORY_SEPARATOR . 'header.php';

include 'includes' . DIRECTORY_SEPARATOR . 'get_expense.php';

include 'templates' . DIRECTORY_SEPARATOR . 'index.php';

include 'templates' . DIRECTORY_SEPARATOR . 'table_head.php';

include 'includes' . DIRECTORY_SEPARATOR . 'displayTable.php';

include 'templates' . DIRECTORY_SEPARATOR . 'footer.php';


//В страницата index трябва да се визуализират всички въведени до момента разходи, 
//препоръчително в табличен вид. 

//TO DO:
//
//показването на таблицата с информация от файла data.txt
    // Вместо echo '<tr><td>...' е редно таблицата да се направи с template, в който да има логиката за изграждането й.

//$_GET with OOP
//Обект за работа с файлове: 
   // http://php.net/manual/en/class.splfileobject.php