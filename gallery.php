<?php include "sessionHijacking.php" /*Included to prevent someone from stealing our session*/?>

<?php include "header.php" ?>

<main id="galleryPage">
  <h1>Gallery</h1>

  <ul id="imgList">
    <?php
    /*Added a loop that iterates through the img folder, and adds each element into the img list*/
    $dir = new DirectoryIterator("uploadedFiles");
    foreach ($dir as $fileinfo) {
        if (!$fileinfo->isDot()) {//checks if a entry is a "." or ".." and will in that case not include it.
          echo "<li><img src=\"uploadedFiles/" . $fileinfo->getFilename() . "\"></li>";
        }
    }
    ?>
  </ul>

  <?php

  /*
   * To change this license header, choose License Headers in Project Properties.
   * To change this template file, choose Tools | Templates
   * and open the template in the editor.
   */

  #this function is for older PHP versions that use Magic Quotes.
  #
  //    function escapestring($input) {
  //    if (get_magic_quotes_gpc()) {
  //    $input = stripslashes($input);
  //    }
  //
  //    @ $db = new mysqli('localhost', 'root', '', 'testinguser');
  //
  //
  //    return mysqli_real_escape_string($db, $input);
  //
  //    }

  @ $db = new mysqli($dbserver, $dbuser, $dbpass, $dbname);

  if ($db->connect_error) {
      echo "could not connect: " . $db->connect_error;
      printf("<br><a href=index.php>Return to home page </a>");
      exit();
  }

      #the mysqli_real_espace_string function helps us solve the SQL Injection
      #it adds forward-slashes in front of chars that we can't store in the username/pass
      #in order to excecute a SQL Injection you need to use a ' (apostrophe)
      #Basically we want to output something like \' in front, so it is ignored by code and processed as text

  if (isset($_POST['username'], $_POST['password'])) {
      #with statement under we're making it SQL Injection-proof
      $uname = htmlentities($_POST['username']);
      $uname = mysqli_real_escape_string($db, $uname);

      #without function, so here you can try to implement the SQL injection
      #various types to do it, either add ' -- to the end of a username, which will comment out
      #or simply use
      #' OR '1'='1' #
      #$uname = $_POST['username'];

      #here we hash the password, and we want to have it hashed in the database as well
      #optimally when you create a user (through code) you simply send a hash
      #hasing can be done using different methods, MD5, SHA1 etc.

      $upass = htmlentities($_POST['password']);
      $upass = mysqli_real_escape_string($db, $upass);
      $upass = sha1($upass);

      #just to see what we are selecting, and we can use it to test in phpmyadmin/heidisql

      echo "SELECT * FROM users WHERE username = \"" . $uname . "\" AND password = \"" . $upass . "\"";

      $query = ("SELECT * FROM users WHERE username = \"" . $uname . "\" AND password = \"" . $upass . "\"");


      $stmt = $db->prepare($query);
      $stmt->execute();
      $stmt->store_result();

      #here we create a new variable 'totalcount' just to check if there's at least
      #one user with the right combination. If there is, we later on print out "access granted"
      $totalcount = $stmt->num_rows();

  }
  ?>




  <?php

  if (isset($totalcount)) {
      if ($totalcount == 0) {
          echo '<h2>You got it wrong. Can\'t break in here!</h2>';
      } else {
          //echo '<h2>Welcome! Correct password.</h2>';
          //Jump to the file upload page if the username and password matches
          echo '<meta http-equiv="refresh" content= "0; URL=fileUpload.php">';
          exit;
      }
  }
  ?>

  <form method="POST" action="" id="loginField">
      <h3>Login to upload pictures</h3><br>
      <input type="text" name="username">
      <input type="password" name="password">
      <input type="submit" value="Go">
  </form>

</main>


<?php include "footer.php" ?>
