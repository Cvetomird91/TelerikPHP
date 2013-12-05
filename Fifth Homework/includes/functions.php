<?php

if (!$connection) {
      echo 'database error';
  }

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
?>