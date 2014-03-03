<?php
session_start();

$pageTitle = 'Потребителски вход';
include 'includes' . DIRECTORY_SEPARATOR . 'header.php';
include 'includes' . DIRECTORY_SEPARATOR . 'connection.php';

if (!$_POST) {
    $_SESSION['isLogged']=0;
}
echo '<pre>' . print_r ($_SESSION, true) . '</pre>';
?>

<form method="post"> 
<label for="username">Потребител: </label>
<input type="text" name="username" placeholder="Потребител"/> <br/>

<label for="password">парола:</label>
<input type="password" name="password" placeholder="Парола"/> <br/>

<input type="submit" value="Вход"/> <br/>
</form>


<a href="register.php">Регистрация</a> <br/>

<?php

if ($_POST) {
   
    $username = trim ($_POST['username']);
    $password = trim ($_POST['password']);
    $u = mysqli_real_escape_string ($connection, $username);
    $p = mysqli_real_escape_string($connection, md5($password));
    
    if (empty($password)) {
        echo 'Въведете парола!<br/>';
    } 
    
   if (isset($password) && isset($username)) {
        $q = 'SELECT * FROM users WHERE user_name="' . $u . '" AND password="' . md5($p) . '"';
        $result = mysqli_query($connection, $q);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION['isLogged']=true;
            header('Location: avtori.php');
            exit;
    } else {
        echo 'Името на паролата и потребителя не съвпадат.<br/>';
    } 
} 

   
}

include 'includes' . DIRECTORY_SEPARATOR . 'footer.php';

?>