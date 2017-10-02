<?php include 'header.php'; ?>

    <main id="browsePage">
      <h1>Browse Books</h1>
      <form action="browse.php" method="POST">
        <input type="text" placeholder="Search By Title." name="titleSearch">
        <br>
        <input type="text" placeholder="Search By Author." name="authorSearch">
        <br>
        <input type="submit" value="Search">
      </form>
      <?php include "search.php" ?>

  </main>

<?php include 'footer.php'; ?>
