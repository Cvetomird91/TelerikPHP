<?php

$filter = $_GET['group'];
	$sum = 0;	
        $result = file('data.txt');

foreach ($result as $value) {	
    
		$columns= explode ('!', $value);
			if (($filter !=0) && ($filter != (trim($columns[3])))) {
			   continue;
			  }
                          
                 include 'templates' . DIRECTORY_SEPARATOR . 'tableContent.php';
                }				
	include 'templates' . DIRECTORY_SEPARATOR . 'table_footer.php';