<?php
include ("config.php");

$isbn = trim($_GET['isbn']);
echo '<INPUT type="hidden" name="isbn" value=' . $isbn . '>';

$isbn = trim($_GET['isbn']);      // From the hidden field
$isbn = addslashes($isbn);

@ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

    if ($db->connect_error) {
        echo "could not connect: " . $db->connect_error;
        printf("<br><a href=index.php>Return to home page </a>");
        exit();
    }

   echo $isbn;

  // Prepare an update statement and execute it
  $stmt = $db->prepare("UPDATE books SET reserved=\"No\" WHERE isbn = ?");
  $stmt->bind_param('s', $isbn);
  $stmt->execute();

  printf("<br>Succesfully returned!");
  printf("<br><a href=browse.php>Search and Book more Books </a>");
  printf("<br><a href=myBooks.php>Return to Reserved Books </a>");
  printf("<br><a href=index.php>Return to home page </a>");
  exit;

?>
