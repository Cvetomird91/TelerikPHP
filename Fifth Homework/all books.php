<?php
session_start();
$pageTitle = 'Главна страница';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';
include 'includes'.DIRECTORY_SEPARATOR.'functions.php';


$allbooks = getBooks($connection);

if ($_SESSION['isLogged']==0) {
    include 'templates' . DIRECTORY_SEPARATOR . 'login_warning.php';
}
?>

<a href="nova%20kniga.php"/> Добави книга </a> <br/>
<a href="avtori.php"/> Добави автор </a> <br/>

<div class="form">
<form method="post" >
  <label for="comment"> Вашия коментар: </label> <br/>
     <textarea name="comment"></textarea>
     <select name="book">
 <?php
 
 foreach ($allbooks as $row_books) {
  echo '<option value="'.$row_books['book_id'].'">'.$row_books['book_title'].'</option>'; }
 
 ?>    
     </select> <br/>
 <input type="submit" value="Въведи коментар"/> <br/>
 
</form> </div><br/>

<?php 

if (isset($_POST['comment'])) {
    $comment = trim ($_POST['comment']);
    $book_id = (int) $_POST['book'];
    $user_id = $_SESSION['user_id'];
    $error=[];
    if (mb_strlen($comment) < 5) {
        $error = 'Коментарът е твърде кратък!';
    }

    if (mb_strlen($comment) > 5 && $_SESSION['isLogged']==true) {
        $sql = 'INSERT INTO comments (comment_id, book_id, comment, user_id) VALUES (NULL,
            "' . $book_id . '", "' . mysqli_real_escape_string($connection, $comment) . '",
            "' . $user_id . '")';
        mysqli_query($connection, $sql);
        if (!mysqli_error($connection)) {
               mysqli_query($connection, 'UPDATE users SET comments_count = comments_count +1 WHERE user_id=' . $user_id);
               mysqli_query($connection, 'UPDATE books SET comments_count = comments_count +1 WHERE book_id=' . $book_id);
        }
      
    echo 'Успешен запис';
    }
    else if ($_SESSION['isLogged'] != true) {
        echo 'Моля влезте в профила си или се регистрирайте!';
    }
    
    
}
?>
<br/><div><button onClick = "window.open('all%20books.php', '_self', false);"> Всички автори </button> </div>

<?php 

include 'templates' . DIRECTORY_SEPARATOR . 'show_comments.php';

if (isset($_GET['author_id'])) {
   
    //the display of books by a certain author
    $author_id = (int) $_GET['author_id'];
    $q = mysqli_query($connection, 'SELECT * FROM books_authors as ba 
        INNER JOIN books as b ON ba.book_id=b.book_id
        INNER JOIN books_authors bba ON bba.book_id=ba.book_id 
        INNER JOIN authors as a ON bba.author_id=a.author_id
        WHERE ba.author_id='. $author_id);
    } else {
        $q = mysqli_query($connection, 'SELECT * FROM books as b 
            INNER JOIN books_authors as ba ON b.book_id=ba.book_id 
            INNER JOIN authors as a ON a.author_id=ba.author_id');
    }
    



$result = [];
while ($row = mysqli_fetch_assoc($q)) {
    $result[$row['book_id']]['book_title'] = $row['book_title'];
    $result[$row['book_id']]['authors'][$row['author_id']] = $row['author_name'];
    $result[$row['book_id']]['book_id'] = $row['book_id'];
}

echo '<table><tr><td>Книга</td><td>Автор</td></tr>';
    foreach ($result as $row) {
    echo '<tr><td><a href="all%20books.php?book_id=' . $row['book_id'] .'">' . $row['book_title'] . '</a></td>
        
        <td>';
    $ar = array();
    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="all%20books.php?author_id=' . $k . '">' . $va . '</a>';
    }
   
         echo implode(' , ', $ar) . '</td>';

   }
   
   echo '</table>';
   
   // ТО DO: да извежда коментар само за определена книга.
if ($_SESSION['isLogged']==true && isset($_GET['book_id'])) {
    
   $get_book = $_GET['book_id'];
   $comments = mysqli_query($connection, 'SELECT * 
FROM comments
LEFT JOIN users ON comments.user_id = users.user_id
LEFT JOIN books ON comments.book_id = books.book_id');
   
    echo $table_start;
   
 while ($row_com = mysqli_fetch_assoc($comments)) {
     echo '<tr><td>' . $row_com['user_name'] . '</td><td>'. $row_com['book_title'] . '</td><td>'. $row_com['comment'] . '</td></br>';
 }
 
 
 echo '</table>';
}

include 'templates' . DIRECTORY_SEPARATOR . 'jsbutton.php';


include 'includes' .DIRECTORY_SEPARATOR . 'footer.php';
?> 