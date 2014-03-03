<?php
$pageTitle = 'Качени файлове';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';


?>

<body> 


<?php

$directory = 'C:\UwAmp\www\Telerik\Second Homework\files';
$dirContents = scandir($directory, SCANDIR_SORT_NONE); //вторият параметър задава PHP да не подрежда по никакъв начин файловете в папката

foreach ($dirContents as $list) {
	echo '<a download href="/Telerik/Second Homework/files/'.$list.'">'.$list .'</a>'.'<br/>';
}
?>
<button onClick="location.reload();"> презареди</button> <br/>
<a href="vhod.php"> Вход </a> <br/>
<a href="upload.php"> Качи файл </a> <br/>	
</body>

<?php 

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';

?>

