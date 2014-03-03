<?php
session_start();
$pageTitle = 'Клиентски вход';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
/*if ($_SESSION['isLogged']=true) {
	echo '<p>Потребителят е влезнал</p>';
} else { */
	if ($_POST) {
		$username = trim($_POST['username']);
		$password = trim($_POST['pass']);
		
		if ($username =='user' && $password=='qwerty') {
			$_SESSION['isLogged']=true;
			echo '<p>Потребителят е влезнал</p>';
			header ('Location: upload.php');
			exit;
		} 
				else {
				echo '<p>Грешни данни</p>';
				}
				
		}
	/*} */ 
	
	
	
?>



<body>
<br/><a href="upload.php"> Качете файл </a> <br/>
<a href="failove.php">Качените файлове до сега </a>
	<form method="POST" action="vhod.php" enctype="multipart/form-data">
	
	<div>Потребител:<input type="text" name="username"/> </div>
	<div>Парола: <input type="password" name="pass"/> </div>
	<input type="submit" value="Влез!"/> <br/>
	
	
	</form>

<a href="destroy.php"> Излез </a> <br/>
	
	
<?php

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';

?>