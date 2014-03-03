<?php 
$pageTitle = 'Нова книга';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';
include 'includes'.DIRECTORY_SEPARATOR.'functions.php';
//тук ще извикаме функцията getAuthors преди да изведеме въведените автори в drop down менюто,
//за да го направим с функции
$authors = getAuthors($connection);
if ($authors===false) {
    echo 'Грешка';
}

?>

<form method="post" action="nova%20kniga.php">
   
    
    <label for="author">Изберете автор на книгата:</label> <br/>
    
    <select name="author[]" multiple="multiple">
  <?php

  foreach ($authors as $row) {
      echo '<option value="'.$row['author_id'].'">'.$row['author_name'].'</option>';
  }
  
  ?>
    </select> <br/>
    
     <div> <label for="book">Въведете заглавието на книгата:</label> </div>
     <div> <input type="text" name="book"/> </div>
    
    
    <input type="submit" value="Добави"/>
    
</form>

<a href="nov%20avtor.php"/>Добави нов автор </a> <br/>
<a href="index(1).php"/>Списък с книги </a> <br/>
<?php

if ($_POST) {
    $book = trim ($_POST['book']);
    $check = 'SELECT * FROM books WHERE book_title="' . mysqli_real_escape_string($connection, $book)  .'"';
    $qq = mysqli_query ($connection, $check);
    $data = mysqli_fetch_array($qq, MYSQLI_NUM);
    
    if (!isset($_POST['author'])) {
        $_POST['author']='';
    }
    
    $author = $_POST['author'];
    $er=array();
    
    if (mb_strlen($book) <= 3) {
        $er[] = '<p>Името на книгата е твърде кратко</p>';
    }
    
    if (!is_array ($author) || count($author) == 0) {
       $er[] = '<p>Въведете автор.</p>';
    }
    
    if (!authorIdExists($connection, $author)) {
        $er[] = '<p>Няма връзка с базата данни</p>';
    }
    
    if ($data[0] > 0) {
        $er[] = '<p>Книгата вече е въведена</p>';
    }
    
    if (count($er) > 0) {
        foreach ($er as $v) {
            echo $v;
        }
    } else 
        {
        mysqli_query ($connection, 'INSERT INTO books (book_title) VALUES("'. mysqli_real_escape_string($connection, $book) . '")');
        if (mysqli_error($connection)) {
            echo mysqli_error($connection);
        }
        
        $id = mysqli_insert_id($connection);
        
        foreach ($author as $authorId) {
            mysqli_query($connection, 'INSERT INTO books_authors (book_id, author_id) VALUES (' . $id . ',' . $authorId.')');
            if (mysqli_error($connection)) {
                echo '<p>Error!</p>';
                echo mysqli_error ($connection);
            }
        }
        echo '<p>Книгата е въведена успешно</p>';
    }
}

include 'includes'.DIRECTORY_SEPARATOR.'footer.php';
    
?>

