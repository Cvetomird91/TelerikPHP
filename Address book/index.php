<?php

$type = array ('1'=>'�����', '2'=>'���� �����������', '3'=>'����������� �������', 
          '4'=>'�����', '5'=>'��������', '6'=>'���������', '7'=>'�����', '8'=>'������');
date_default_timezone_set('UTC');
mb_internal_encoding('UTF-8');
?> 

<!Doctype html>
<html>
    <head>
<title> Index</title>
<META http-equiv="Content-Type" content="text/html; charset=utf-8">


    </head>
    <body style="background-color:black; color: white;">
        
        <a href="form.php"> �������� ��� ������</a> <br/>
        <form>
            <select size="1" name="filter">
                <?php 
                
                
                
        $filter=null;
                if(isset($_POST['filter'])){
                        $filter=$_POST['filter'];				
                }
                foreach($type as $key=>$value){
                        if($key==$filter){
                                $selected='selected';
                        }
                        else{
                                $selected='';
                        }
                        echo '<option value="'.$key.'"'.$selected.'>'.$value.'</option>';
                }		
				
                ?>
            </select> <br/>
            
            <input type="submit" value="���������!" name="filterbutton"/>
        </form> 
        
        
        <table border="1">
            <tr>
                <td>�����</td>
                <td>����</td>
                <td>���</td>
                <td>����</td>
            </tr>
           
      <?php 
        $total=0;
        if (file_exists('data.txt'))
            {
            $result = file('data.txt');
            foreach ($result as $value)
                {
                $columns = explode('!', $value);              
                if ($_POST)
                    {
                    $filter = (int) $_POST['filter'];
                    $error = false; 
                    if (!array_key_exists($filter, $type))
                        {
                        echo '<p>��������� �����</p>';
                        $error = true;
                        } 
                    if (!$error)
                        {
                         if ($filter == 0 ||
                                ($filter == 1 && $type[trim($columns[3])] == '�����') ||
                                ($filter == 2 && $type[trim($columns[3])] == '���� �����������') ||
                                ($filter == 3 && $type[trim($columns[3])] == '����������� �������') ||
                                ($filter == 4 && $type[trim($columns[3])] == '�����') ||
                                ($filter == 5 && $type[trim($columns[3])] == '��������') ||
                                ($filter == 6 && $type[trim($columns[3])] == '���������') ||
                                ($filter == 7 && $type[trim($columns[3])] == '�����'))
                             {
                            echo '<tr>
                <td>' . $columns[0] . '</td>
                <td>' . $columns[1] . '</td>             
                <td>' . $columns[2] . '</td>
                <td>' . $type[trim($columns[3])] . '</td>
                </tr>';
                        $total += $columns[2];                       
                        }
                    }
 
                else
                    {
                    echo '<tr>
                <td>' . $columns[0] . '</td>
                <td>' . $columns[1] . '</td>
                <td>' . $columns[2] . '</td>
                <td>' . $type[trim($columns[3])] . '</td> 
                </tr>';
                    $total += $columns[2];
                    }
                }
 
            echo '<tr><td colspan="4"><b>����: ' . $total . '<b></td></tr>';
            } 
            
                    }
?>
            
        </table> 
        
</body>
