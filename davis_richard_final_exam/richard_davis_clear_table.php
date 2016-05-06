<?php
  // Richard Davis
  // CSCI4000
  // 5 May 2016
  // Final Exam

  // connects to db
  require_once('richard_davis_database.php');

  // returns a count of records in table
  $query = 'SELECT COUNT(*) FROM coordinate3d';
  $statement = $db->prepare($query);
  $success = $statement->execute();
  $count = $statement->fetchColumn();
  $statement->closeCursor();

  // deletes all records from table
  $query = 'DELETE FROM coordinate3d';
  $statement = $db->prepare($query);
  $success = $statement->execute();
  $statement->closeCursor();

?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Richard Davis' Secret Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>
    <header>
      <h1>Richard Davis' Secret Calculator</h1>
    </header>
    <section id="main">
      <p><span style="font: 165% Arial, Helvetica, sans-serif;">
        <?php echo $count; ?></span> records are removed from the database table.</p>
      <a href="index.php">Return to homepage</a>
    </section>
    <footer>
    <p>&copy; <?php echo date("Y"); ?> Richard Davis Kung Fu School</p>
    </footer>
  </body>
</html>
