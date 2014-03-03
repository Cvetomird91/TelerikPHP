<?php

$authors = getAuthors($connection);

?>
<a href="index.php"> Списък </a> <br/>

<form method="post">
    <label for="book_name"> Книга: </label>
    <input type="text" name="book_name"/> <br/>
    <label for="authors[]"> Автор: </label>
    
    <select name="authors[]" multiple="multiple" >
       <?php
       foreach ($authors as $row) {
           echo '<option value="' . $row['author_id'] .'">' . $row['author_name'] . "</option>";
       }
       
       ?>
    </select>
    
    <input type="submit" value="Въведи!"/> 
    
</form>