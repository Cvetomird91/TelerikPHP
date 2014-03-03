<?php
$connection = mysqli_connect ('localhost', 'Cvetomird91', 'iwillsucceed', 'books');
mysqli_set_charset($connection, 'utf8');

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


?>