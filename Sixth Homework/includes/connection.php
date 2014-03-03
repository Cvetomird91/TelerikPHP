<?php
$connection = mysqli_connect ('localhost', '', '', 'books');
mysqli_set_charset($connection, 'utf8');
if (!$connection) {
      echo 'database error';
  }
