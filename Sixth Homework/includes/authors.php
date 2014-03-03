<?php
if ($_POST) {
    $author_name = trim($_POST['author_name']);
    if (mb_strlen($author_name) < 2) {
        echo '<p>Невалидно име</p>';
    } else {
        $author_esc = mysqli_real_escape_string($connection, $author_name);
        $q = mysqli_query($connection, 'SELECT * FROM authors WHERE
        author_name="' . $author_esc . '"');
        if (mysqli_error($connection)) {
            echo 'Грешка';
        }

        if (mysqli_num_rows($q) > 0) {
            echo 'Има такъв автор';
        } else {
            mysqli_query($connection, 'INSERT INTO authors (author_name)
            VALUES("' . $author_esc . '")');
            if (mysqli_error($connection)) {
                echo 'Грешка';
            } else {
                echo 'Успешен запис';
            }
        }
    }
}
$authors = getAuthors($connection);
if ($authors===false) {
    echo 'Грешка';
}
?>