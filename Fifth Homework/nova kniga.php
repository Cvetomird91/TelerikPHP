<?php 
session_start();
$pageTitle = 'Нова книга';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';
include 'includes'.DIRECTORY_SEPARATOR.'functions.php';

$authors = getAuthors($connection);
if ($authors===false) {
    echo 'Грешка';
}

 if ($_SESSION['isLogged']==0) {
        echo '<p><a href=index.php>Влезте</a> в системата, за да можете да въведете книга или се <a href=register.php>регистрирайте!</a></p>';
    }

?>

<form method="post" action="nova%20kniga.php">
   <div> <label for="book">Въведете заглавието на книгата:</label> </div>
     <div> <input type="text" name="book"/> </div>
    
    <label for="author">Изберете автор на книгата:</label> <br/>
    
    <select name="author[]" multiple="multiple" class="authors">
  <?php

  foreach ($authors as $row) {
      echo '<option value="'.$row['author_id'].'">'.$row['author_name'].'</option>';
  }
  
  ?>
    </select> <br/>
    <input type="submit" value="Добави"/> <br/>
    
</form>

<a href="avtori.php"/>Добави нов автор </a> <br/>
<a href="all%20books.php"/>Списък с книги и коментари към тях</a> <br/>

<button name="exit" onClick="window.open('logout.php');">Изход</button> <br/>

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
    } else if ($_SESSION['isLogged']==true)
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
    
    if ($_SESSION['isLogged']==0) {
        echo '<p>Не сте влезнали в профила си!</p>';
    }
}
// ТО DO: да направя така, че PHP да проверява дали и зададеният автор отговаря на книга, която вече е въведена и тогава
// системата да извежда съобщение, че книгата присъства в базата данни.
include 'includes'.DIRECTORY_SEPARATOR.'footer.php';
    
?>


