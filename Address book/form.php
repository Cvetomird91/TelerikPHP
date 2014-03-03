<?php

include 'header.php';

?> 

            <title>Рaзход</title>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">
    </head>
    <body style="background-color:black; color: white;">
       <?php 
 
    $date = date ('d/m/Y/');
    
    if($_POST)
{
    $ware=trim($_POST['ware']);
    $ware=  str_replace('!', '', $ware);
    $cost=trim($_POST['cost']);
    $selectedType=(int)$_POST['type'];
    $error=false;
    
    if(mb_strlen($ware)<2)
        {
        echo '<p>Името на стоката е прекалено късо!</p>';
        $error=true;
        }
    
    if($cost<0)
        {
        echo '<p>невалидна цена</p>';
        $error=true;
        }    
      
    if($cost == 0) {
        echo '<p>невалидна цена</p>';
        $error=true;
    }
       
    if(!array_key_exists($selectedType, $type))
        {
        echo '<p>невалидна група</p>';
        $error=true;
        }
        
    if(!$error)
    {
        $result=$ware.'!'.$cost.'лв'.'!'.$selectedType.'!'.$date."\n";
        if(file_put_contents('data.txt', $result,FILE_APPEND))
        {
            echo 'Записът е успешен';
        }
    }
} 
        ?>
        
    <a href="danni.php"> Списък </a> <br/>
    <form method="post" action="form.php">
    Име: <input type="text" name="ware"/> <br/>
    Сума: <input type="text" name="cost"/> лв <br/>
    Вид: <select name="type">
           <?php
           foreach ($type as $key=>$value)
           {
               echo '<option value="'.$key.'">' . $value . '</option>';
           }
           ?>
         </select> <br/>

   <input type="submit" name="enter" value="Въведи"/>
    </form>
          
</body>
</html>