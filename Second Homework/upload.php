<?php
$pageTitle = 'Качване на файлове';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';


?>


<form method="POST" enctype="multipart/form-data">
		<input type="file" name="upload"/><br/>
		<input type="submit" name="button"/> <br/>

</form>

<?php
if ($_POST) {

	if (count($_FILES)>0) {
		if(move_uploaded_file($_FILES['upload']['tmp_name'], 'files'.DIRECTORY_SEPARATOR.$_FILES['upload']['name'])) {
		echo 'Файлът е качен успешно!'.'<br/>';
		} else {
		echo 'Файлът не е качен успещно'.'<br/>'; 	
	  }

	}
}
?>
<a href="failove.php"> Списък файлове </a> <br/>
<a href="vhod.php"> Вход </a> <br/>

<?php

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';

?> 