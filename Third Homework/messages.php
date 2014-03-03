<?php
session_start();
$pageTitle = 'Съобщения';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';

echo '<pre>' . print_r ($_SESSION, true) . '</pre>';

?>

<body>


<a href="new%20message.php"> Ново съобщение </a><br/>

<?php
$q = mysqli_query ($connection, 'SELECT * FROM messages AS m
    LEFT JOIN users AS u 
    ON m.user_id=u.user_id');



if (!$q) {
	echo 'error';
}

echo '<table>';

echo '<tr><td>Дата</td><td>Потребител</td></td><td>Заглавие</td><td>Съобщение</td></tr>';
	while ($row = $q-> fetch_assoc()) {
	echo '<tr><td>'.$row ['msg_data'].'</td><td>'.$row ['user_name'].'
	</td></td><td>'.$row ['msg_header'].'</td><td>'.$row ['msg_data'].'</td></tr>';
	}

echo '</table>';

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';

?>