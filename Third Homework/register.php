<?php
session_start();
$pageTitle = 'Регистрация';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';

echo '<pre>' . print_r ($_SESSION, true) . '</pre>';

?>

<form method="post"> 
Потребител: <input type="text" name="username" placeholder="Потребител"/> <br/>
Парола: <input type="password" name="password" placeholder="Парола"/> <br/>
Повторете паролата: <input type="password" name="password2" placeholder="Повторете въведената парола" size="35"/> <br/>
<input type="submit" value="Регистрация"/> <br/>
</form>
<p>Изисква се паролата и името да са по-дълги от 5 символа.</p>

<a href="index.php"/>Вход за регистрирани </a> <br/>

<?php

if ($_POST) {
    $username = trim ($_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    
    $check = 'SELECT * FROM users WHERE user_name="' . mysqli_real_escape_string($connection, $username) .'"';
    $rs = mysqli_query($connection, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    $error=[];
    
     if ($password != $password2) {
        $error='Паролите не съвпадат<br/>';
    }
    
    if (mb_strlen($password) <5 ) {
        $error = 'Паролата е твърде кратка<br/>';
    }
    
    if (mb_strlen($username) <= 5) {
        $error = 'Потребителското име е твърде кратко.<br/>';
    }
    
    if ($data[0] > 0) {
        $error = '<p>Има вече потребител със същото име</p>';
    } 
    
        if (count($error) == 0 && $_SESSION['isLogged']!=true) {
        $q = 'INSERT INTO users (user_name, password) VALUES("' . mysqli_real_escape_string($connection, $username) .'",
            "' . mysqli_real_escape_string($connection, md5($password)) . '")';
        mysqli_query ($connection, $q);
        
        if (!mysqli_error($connection)) {
        header ('Location: index.php');
        exit;
        }
            }
            
       else {
           echo $error;
       }
       
       if ($_SESSION['isLogged']==true) {
           echo 'Вие вече сте регистриран!';
       }
}

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';

?>