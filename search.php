<?php


$searchtitle = "";
$searchauthor = "";

#check if the GET/POST has been used, meaning if the Submit button has been pressed.
if (isset($_POST) && !empty($_POST)) {
# Get data from form

    #first trim the search, so no white spaces appear prior to the text entered
    $searchtitle = trim($_POST['titleSearch']);
    $searchauthor = trim($_POST['authorSearch']);
    $searchtitle = addslashes($searchtitle);
    $searchauthor = addslashes($searchauthor);
}

# Open the database
@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);


$searchauthor = htmlentities($searchauthor);
$searchtitle = htmlentities($searchtitle);
mysqli_real_escape_string($db, $searchauthor);/*Making the input fields injection proof*/
mysqli_real_escape_string($db, $searchtitle);


/*Check for connection error*/
if ($db->connect_error) {
    echo "could not connect: " . $db->connect_error;
    printf("<br><a href=index.php>Return to home page </a>");
    exit();
}

$query = " select * from books";
if ($searchtitle && !$searchauthor) { // Title search only
    $query = $query . " where title like '%" . $searchtitle . "%'";
}
if (!$searchtitle && $searchauthor) { // Author search only
    $query = $query . " where author like '%" . $searchauthor . "%'";
}
if ($searchtitle && $searchauthor) { // Title and Author search
    $query = $query . " where title like '%" . $searchtitle . "%' and author like '%" . $searchauthor . "%'"; // unfinished
}


# Here's the query using bound result parameters
    // echo "we are now using bound result parameters <br/>";
    $stmt = $db->prepare($query);
    $stmt->bind_result($isbn, $title, $author, $noOfPages, $edition, $publicationYear, $publisher,$reserved);
    $stmt->execute();

    echo '<table id="bookList">';
    echo '<tr><td><b>Title</b></td> <td><b>Author</b></td> <td><b>Reserved</b></td> <td><b>Reserve</b></td> </b> </tr>';
    while ($stmt->fetch()) {
        echo "<tr>";
        echo "<td> $title </td><td> $author </td> <td> $reserved </td>";
        echo '<td><a href="reserveBook.php?isbn=' . urlencode($isbn) . '"> Reserve </a></td>';
        echo "</tr>";
    }
    echo "</table>";

?>
