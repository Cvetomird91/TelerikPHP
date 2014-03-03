<?php
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
echo '<table border="1"><tr><td>Книга</td><td>Автори</td></tr>';
foreach ($result as $row) {
    echo '<tr><td>' . $row['book_title'] . '</td>
        <td>';
    $ar = array();
    foreach ($row['authors'] as $k => $va) {
        $ar[] = '<a href="index.php?author_id=' . $k . '">' . $va . '</a>';
    }
    echo implode(' , ', $ar) . '</td></tr>';
}
echo '</table>';
?>
