<?php
$pageTitle = 'Главна страница';
include 'includes'.DIRECTORY_SEPARATOR.'header.php';
include 'includes'.DIRECTORY_SEPARATOR.'connection.php';
include 'includes'.DIRECTORY_SEPARATOR.'functions.php';

//$authors = getAuthors($connection);
?>

<a href="nova%20kniga.php"/> Добави книга </a> <br/>
<a href="nov%20avtor.php"/> Добави автор </a> <br/>

<?php
/*
 * По този начин PHP не показваше всички автори на книгите, които имат повече от един автор
 * if (isset($_GET['author_id'])) {
    $author_id = (int) $_GET['author_id'];
    $q = mysqli_query($connection, 'SELECT * FROM authors as a LEFT JOIN 
    books_authors as ba ON a.author_id=ba.author_id LEFT JOIN books as b
     ON b.book_id=ba.book_id WHERE a.author_id='.$author_id);
} else {
    $q = mysqli_query($connection, 'SELECT * FROM books as b INNER JOIN 
    books_authors as ba ON b.book_id=ba.book_id INNER JOIN authors as a
     ON a.author_id=ba.author_id');
} */

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
}
echo '<table><tr><td>Книга</td><td>Автор</td></tr>';
foreach ($result as $row) {
    echo '<tr><td>' . $row['book_title'] . '</td>
        <td>';
    $ar = array();
    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="index.php?author_id=' . $k . '">' . $va . '</a>';
    }
    echo implode(' , ', $ar) . '</td></tr>';
}
//echo '<tr><td colspan = 2><a href=http://localhost/Telerik/Fourth%20Homework/index(1).php>Всички автори </a> </td></tr>';
echo '</table>';
?>

<button onClick =  "window.open('index.php', '_self', false)"> Всички автори </button>

<?php 

include 'includes' .DIRECTORY_SEPARATOR . 'footer.php';
?> 
