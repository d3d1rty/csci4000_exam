<?php
  // Richard Davis
  // CSCI4000
  // 4 May 2016
  // Final Exam

  // connects to the db
  require_once('richard_davis_database.php');

  // helper function to insert the coordinate sets into table
  function enter_coordinates() {
    global $db;
    // iterates through post array using for loop
    for ($i = 0; $i < count($_POST['x']); $i++) {
      // gets values for coordinate set
      $x = $_POST['x'][$i];
      $y = $_POST['y'][$i];
      $z = $_POST['z'][$i];

      // creates query
      $query = 'INSERT INTO coordinate3d
                  (number, x, y, z)
                VALUES
                  (:number, :x, :y, :z)';
      // prepares query
      $statement = $db->prepare($query);
      // binds values in query
      $statement->bindValue(':number', $i+1);
      $statement->bindValue(':x', $x);
      $statement->bindValue(':y', $y);
      $statement->bindValue(':z', $z);
      // executes statement
      $success = $statement->execute();
      // ends PDO action
      $statement->closeCursor();
    }
  }

  // helper function to get sets as an array
  function get_sets() {
    global $db;
    $query = "SELECT * FROM coordinate3d";
    $statement = $db->prepare($query);
    $statement->execute();
    $sets = $statement->fetchAll();
    $statement->closeCursor();
    return $sets;
  }

  enter_coordinates();
  $coordinate_sets = get_sets();
?>
<!DOCTYPE html>
  <head>
    <meta charset="UTF-8">
    <title>Richard Davis' Secret Calculator</title>
    <link rel="stylesheet" type="text/css" href="main.css">
  </head>
  <body>
    <header>
      <h1>Richard Davis' Secret Calculator<h1>
    </header>
    <section id="main">
      <h2>The following coordinates are saved to the database table:</h2>
      <!-- iterates through coordinate3d table, printing rows in tabular format -->
      <?php
        foreach ($coordinate_sets as $s) {
          echo "<p>x".$s['number']." = ".$s['x'].", y".$s['number']." = ".$s['y'].", z".$s['number']." = ".$s['z'].";</p>";
        }
      ?>
    <br>
      <h2>Click on the link below to retrieve coordinates from the database table for calculation</h2>
      <a href="richard_davis_calculate.php">Retrieve records for calculation</a>
    </section>
    <footer>
    <p>&copy; <?php echo date("Y"); ?> Richard Davis Kung Fu School</p>
    </footer>
  </body>
</html>
