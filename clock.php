<!DOCTYPE html>
<html>

<?php

# some useful funcitons: getdate, strftime, printf and explode

date_default_timezone_set('Europe/Sofia');

if ($_GET) {

$request = array_keys ($_GET);

$get = explode (':', $request[0]);

# TO DO:  check if the quantities of $font-color and $background match 
# the colors which can be assigned to HTML elements with CSS
# with words

} 

?>

<head>

<title> 

<?php

if ($get[0] == 'comp') {

	echo 'Computer Date/Time';

} else if ($get[0] == 'compact') {

	echo 'Compact Date/Time';

} else if ($get[0] == 'eng' || $get[0]='') {

	echo 'Current Time in English';

}

?>

</title>

	<style>
	body {
		color: <?= $get[1] ?>;
		background-color: <?= $get[2] ?>;
	}
	</style>

</head>

<body>

<?php

$date = getdate();

if ($get[0] == 'comp' || $get[0] == '') {
	
	echo 'Current Time: ' . strftime("%a %h %d %T %G");

} 

if ($get[0] == 'compact') {

	echo $date['year'] . $date ['mon'] . $date ['mday'] . $date['hours'] . $date['minutes'] . $date ['seconds'];

} 

if ($get[0] == 'eng') {

	echo "The current time is " . strftime ('%A') . ", " . strftime ("%B %e") . ", " . strftime ("%I:%M %p") . ", " . strftime ("%Y ") ;

}

?>

</body>
</html>
