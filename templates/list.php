<?php
require_once __DIR__ . '/_header.php';
?>


<!-- start table for displaying DVD details -->
<h2>Lists of movies and their average votes</h2>

<table>
    <tr>
        <th> ID </th>
        <th> title </th>
        <th> price </th>
    </tr>

    <?php
        foreach($movies as $movie):
    ?>

        <tr>
            <td><?= $movie['id'] ?></td>
            <td><?= $movie['title'] ?></td>
            <td>&euro; <?= $movie['price'] ?></td>
        </tr>

    <?php
        endforeach;
    ?>

</table>

<?php
require_once __DIR__ . '/_footer.php';
?>