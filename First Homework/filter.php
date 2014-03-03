<?php

include 'header.php';
$type = array ('1' => 'Храна', '2'=>'Транспорт', '3'=>'Офис Консумативи', '4'=>'Дрехи', '5'=>'Козметика',
			'6'=>'Медицина', '7'=>'Други');
?>

	<title>Данни </title>
</head>

<body>
<a href="razhod.php">Добави стока </a>

<form method="get">
<select name="group">
<option value="0"> Всички </option>
<?php
foreach ($type as $key=>$vid){
echo '<option';
/*if (isset($_GET['group']) && (int)$_GET['group']==$key ){
echo 'selected';
} */
echo 'value="'.$key.'">'.$vid.'</option>';
	}
?>

</select>
<input type="button" value="Филтрирай!"/>
</form>

<table>
<tr> 
	<td>Стока </td>
	<td>Цена </td>
	<td> Дата </td>
	<td> Тип </td>
	</tr>
	<?php
	
	if (file_exists('data.txt')) {
	$result = file('data.txt');
	$sum = 0;
	foreach ($result as $value) {
		$columns= explode ('!', $value); 
		/*	if (isset ($_GET['group']) && $_GET['group']>0 && (int)$_GET['group']!=(int)$columns[3]) {
			continue;
			} */
		echo '<tr>
		<td>'.$columns[0].'</td>
		<td>'.$columns[1].'</td>
		<td>'.$columns[2].'</td>
		<td>'.$type[trim($columns[3])].'</td>	
		</tr>';		
			}
			$sum += $columns[1];
		echo '<tr>
		<td></td>
		<td>Сума:'.$sum.' лв</td>
		<td></td>
		</tr>';
	
}
	?>

</table>
<button onClick="location.reload();"> Презареди! </button>
</body>
</html>