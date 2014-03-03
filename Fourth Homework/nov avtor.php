<?php 
$pageTitle = 'Нов автор';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';
include 'includes'.DIRECTORY_SEPARATOR.'functions.php';
?>

<div><a href="nova%20kniga.php">Книги</a> </div>

<div>

<form method="post" action="nov%20avtor.php">
<label for="author">Нов автор</label>
<input type="text" name="author"/> <br/>
<input type="submit" value="Въведи"/>
</form>
    
</div>




<?php

if ($_POST) {
    $author_name = trim ($_POST['author']);
    $check = 'SELECT * FROM authors WHERE author_name= "'. mysqli_real_escape_string($connection, $author_name) .'" ';
    $rs = mysqli_query ($connection, $check);
    $data = mysqli_fetch_array($rs, MYSQLI_NUM);
    
    
    if ($data[0] > 0) {
        echo '<p>Авторът вече фигурира в базата данни.</p>';
    } else if (mb_strlen($author_name) > 3) {
        $q = 'INSERT INTO authors(author_name) VALUES ("'.mysqli_real_escape_string($connection, $author_name).'")';
        mysqli_query($connection, $q);
        
        
        if (mysqli_error($connection)) {
            echo 'Database error';
        } else {
            echo '<p>Авторът е въведен в базата данни успешно.</p>';
        }
        
    }
    
    if (mb_strlen($author_name) <= 3 ) {
        echo '<p>Името на автора е твърде кратко</p>';
    }
}

$authors = getAuthors($connection);
if ($authors ===false) {
    echo 'database error';
}

echo '<table>';
foreach ($authors as $row) {
    echo '<tr><td>'.$row['author_name'].'</td></tr>';
}
echo '<table>';

//TO DO: Имената а авторите са линкове,които водят към страницата със списък на всички книги за даден автор

  

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';
?>

