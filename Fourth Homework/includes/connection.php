<?php 
$connection = mysqli_connect ('localhost', 'Cvetomird91', 'iwillsucceed', 'books');
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
      echo 'database error';
  }

?>