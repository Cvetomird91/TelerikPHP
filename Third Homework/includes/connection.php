<?php

$connection = mysqli_connect('localhost', 'Cvetomird91', 'iwillsucceed', 'messages');
mysqli_set_charset($connection, 'utf8');

if (!$connection) {
    echo 'Error';
}