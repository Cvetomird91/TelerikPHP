<?php

include 'header.php';

$pageTitle = 'Разходи';
?>


<title> <?= $pageTitle; ?> </title>
</head>

<body> 

<?php
$date = date ('d/m/Y');

if ($_POST) {
	$ware = trim($_POST['ware']);
	$value = (float) ($_POST['value']);
	$value = trim($_POST['value']);
	$ware = str_replace('!', '', $ware);
	$selectedType=($_POST['type']);
	$error = false;
	
	if (mb_strlen($ware) < 3) {
		echo '<p>Името на стоката е прекалено късо!</p>';
		$error = true;
	}
	
	
	if ($value <= 0) {
		echo '<p>Невалидна цена!</p>';
		$error = true;
	}

	
	if (!$error) {
		$result = $ware.'!'.$value.'лв!'.$date.'!'.$selectedType."\n";
		if(file_put_contents('data.txt', $result, FILE_APPEND))
		{
			echo 'Записът е успешен';
		}
	}
	
}
?>
<a href="index.php"> Списък</a> <br/>
<a href="data.txt"> База Данни </a> <br/>
	<form method="POST" action="razhod.php">
	<label for="ware">Стока:</label>
		<div><input id="ware" type="text" name="ware"/> </div>
		<label for="value">Цена:</label>
		<div> <input type="text" name="value"/> лв </div>
		<br/>
		
		<select size="1" name="type">
		<?php
		foreach ($type as $key=>$option) {
			echo '<option value="'.$key.'">'.$option.'</option>';
		}
		?>
		</select> <br/>
		<div><input type="submit" value="Въведи!"/> </div>
	</form>
	<button onClick="location.reload();"> Презареди! </button>
</body>
</html>