<?php

function getAuthors($connection) {    
    $que = mysqli_query($connection, 'SELECT * FROM authors');
    if (mysqli_error($connection)) {
        return false;
    }
    $ret=[];
    while ($row = mysqli_fetch_assoc($que)){
        $ret[] = $row;
    }
    return $ret;
}



function authorIdExists ($connection, $id) {
    
    if (!is_array($id)) {
        return false;
    }
   
    $query = mysqli_query($connection, 'SELECT * FROM authors WHERE author_id IN ('. implode(',', $id) . ')');
    if (mysqli_error($connection)) {
        return false;
    }
    
    if (mysqli_num_rows($query) == count ($id)) {
        return true;
    }
    return false;
}

function getBooks ($connection) {
    $sql = mysqli_query($connection, 'SELECT * FROM books');
    if (mysqli_error($connection)) {
        return false;
    }
    $ret2 = [];
    while ($row_books = mysqli_fetch_assoc($sql)) {
        $ret2[] = $row_books;
    }
    return $ret2;
}

function displayBooks ($connection) {
    $author_id = $_GET['author_id'];
if (isset($author_id)) {
      $author_id = $_GET['author_id'];
      mysqli_query ($connection, 'SELECT * FROM books as b
          LEFT JOIN books_authors as ba ON b.book_id=ba.book_id 
          LEFT JOIN authors AS a ON a.author_id=ba.author_id
          WHERE a.author_id=' . $author_id);
  } 
  else {
  mysqli_query ($connection,'SELECT * FROM books as b
        INNER JOIN books_authors AS ba 
        ON b.book_id=ba.book_id
        INNER JOIN authors as a
        ON a.author_id=ba.author_id');
  }

}

function render ($name) {
    include 'templates' . DIRECTORY_SEPARATOR . 'header.php';
   
    include $name;
    include 'templates' . DIRECTORY_SEPARATOR . 'footer.php';
}

function isAuthorIdExists($db, $ids) {
    if (!is_array($ids)) {
        return false;
    }
    $q = mysqli_query($db, 'SELECT * FROM authors WHERE 
        author_id IN(' . implode(',', $ids) . ')');
    if (mysqli_error($db)) {
        return false;
    }
    
    if (mysqli_num_rows($q) == count($ids)) {
        return true;
    }
    return false;
}
