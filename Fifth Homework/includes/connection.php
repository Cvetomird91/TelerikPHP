<?php 
$connection = mysqli_connect ('localhost', 'Cvetomird91', 'iwillsucceed', 'books homework');
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
      echo 'database error';
  }

?>
