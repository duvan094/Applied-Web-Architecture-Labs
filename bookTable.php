<?php
  echo '<table id="bookList">';
  echo '<tr><td><b>Title</b></td> <td><b>Author</b></td> <td><b>Reserve</b></td></tr>';
  foreach ($database as $book) {
    $title = $book['title'];
    $author = $book['author'];
    echo "<tr>";
    echo "<td> $title </td><td> $author </td>";
    echo '<td><a href="reserve.php?reservation=' . urlencode($title) . '"> Reserve </a></td>';
    echo "</tr>";
  }
  echo "</table>";

?>
