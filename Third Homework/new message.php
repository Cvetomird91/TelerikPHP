<?php
session_start();
$pageTitle = 'Потребителски вход';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';

if ($_SESSION['isLogged']==0) {
    echo 'Влезте в профила си или се регистрирайте!<br/>';
}

echo '<pre>' . print_r ($_SESSION, true) . '</pre>';

?>

<body>

<form method="POST">
Заглавие:
<div><input type="text" size="50" maxlength="50" name="header" /> </div>
Съобщение:
<textarea name="message" size="50" maxlength="250"></textarea>
<input type="submit"/> 
</form>
<button onClick="location.reload();"> Презареди! </button><br/>


<?php
if ($_POST) {
	$msg_header = trim ($_POST ['header']);
	$msg = trim ($_POST['message']);
        $user_id = $_SESSION['user_id'];
        
        if ($_SESSION['isLogged']==true && mb_strlen($msg_header) > 1 && mb_strlen($msg) > 1) {
	$sql = 'INSERT INTO messages (msg_data, msg_header, user_id) VALUES("'. mysqli_real_escape_string($connection, $msg) .'",
            "'.mysqli_real_escape_string($connection, $msg_header).'", "' . $user_id .'")';
        mysqli_query($connection, $sql);
        echo 'Съобщението е изпратено';
	
        } else {
		echo 'Грешка! Твърде кратко съобщение или заглавие. ';
		echo mysqli_error ($connection); 
	}

}
include 'includes'.DIRECTORY_SEPARATOR.'footer.php';

?>
<!-- тази страница е налична само за потребители с валидна сесия -->