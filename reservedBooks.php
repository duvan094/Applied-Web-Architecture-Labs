<?php
include ("config.php");

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

/*Check for connection error*/
if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$query = "select title,author,reserved,isbn from books where reserved = \"Yes\"";

# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($title, $author, $reserved, $isbn);
    $stmt->execute();

    echo '<table id="bookList">';
    echo '<tr><td><b>Title</b></td> <td><b>Author</b></td> <td><b>Reserved</b></td> <td><b>Return</b></td> </b> </tr>';
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td> $title </td><td> $author </td><td> $reserved </td>";
        echo '<td><a href="returnBook.php?isbn=' . urlencode($isbn) . '">Return</a></td>';
        echo "</tr>";

    }
    echo "</table>";

?>
