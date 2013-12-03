<?php
$date = date ('d/m/Y');

if ($_POST) {
    $ware = trim ($_POST['ware']);
    $value = (float) ($_POST['value']);
    $value = trim ($_POST['value']);
    $ware = str_replace('!', '', $ware);
    $selectedType=($_POST['type']);

    $enter = new AddExpence();
 
    //try {
        $enter-> enterWare ($ware, $value, $date, $selectedType, 'data.txt');
    /*} catch (InvalidValue $exc) {
            $error =  $exc->getMessage();
    } catch (FileNonExistant $er) {
       $error = $er->getMessage();
    } catch (Exception $er2) {
        $error = $er2->getMessage();
        foreach ($error as $er) {
            echo $er;
        }
    } */
}

?>