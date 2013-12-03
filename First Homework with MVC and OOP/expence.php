<?php

include 'includes' . DIRECTORY_SEPARATOR . 'functions.php';
include 'includes' . DIRECTORY_SEPARATOR . 'types.php';
include 'includes' . DIRECTORY_SEPARATOR . 'get_types.php';

$pageTitle = 'Нов разход';
$pageStyle = 'css/style.css';
include 'templates' . DIRECTORY_SEPARATOR . 'header.php';

include 'templates' . DIRECTORY_SEPARATOR . 'expence.php';

include 'includes' . DIRECTORY_SEPARATOR . 'add_expence.php';

include 'includes' . DIRECTORY_SEPARATOR . 'submit.php';

//include 'js' . DIRECTORY_SEPARATOR . 'reload_button.php';

include 'templates' . DIRECTORY_SEPARATOR . 'footer.php';

//TO DO:
//$_POST in OOP
//http://php.net/manual/en/class.splfileobject.php - working with files in OOP
//Alarm when the ware name is too short (OOP - throw, catch, try)
