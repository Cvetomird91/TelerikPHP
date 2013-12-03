
<a href="expence.php">Добави стока </a>

<form method="get" action="index.php">
<select name="group">
   <?php
   foreach ($types as $key=>$value) {
    echo '<option value="' . $key . '">' . $value . '</option>';
}

   ?>
    
</select>
    
<input type="submit" value="Филтрирай!" /> <br/>

</form>