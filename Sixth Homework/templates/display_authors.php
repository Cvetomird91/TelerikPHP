<table border='1'>
    <tr><th>Автор</th></tr>

    <?php
    foreach ($authors as $row) {
        echo '<tr><td>' . $row['author_name'] . '</td></tr>';
    }
    ?>


</table>