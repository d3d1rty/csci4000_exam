<?php
  // Richard Davis
  // CSCI4000
  // 4 May 2016
  // Final Exam

  // connects to the db
  require_once('richard_davis_database.php');

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
      <h2>The following coordinates are retrieved from the database table:</h2>
      <!-- iterates through coordinate3d table, printing rows -->
      <?php
        foreach ($coordinate_sets as $s) {
          echo "<p>x".$s['number']." = ".$s['x'].", y".$s['number']." = ".$s['y'].", z".$s['number']." = ".$s['z'].";</p>";
        }
      ?>
    <br>
      <h2>The following function is applied to the coordinates:</h2>
      <h2><i>f</i>(xi, yi, zi) = (xi)<sup>3</sup> + (yi)<sup>2</sup> + (zi)<sup>2</sup></h2>
      <!-- iterates through coordinate3d table, performing calculation and displaying results -->
      <?php
        foreach ($coordinate_sets as $s) {
          // aliases fields to reduce verbosity
          $i = $s['number'];
          $x = $s['x'];
          $y = $s['y'];
          $z = $s['z'];
          // performs function on coordinate set
          $calc = (pow($x, 3)) + (pow($y, 2)) + (pow($z, 2));
          $calc_formatted = number_format($calc, 2, '.', ',');
          // displays results
          echo "<i>f</i>(x".$i.", y".$i.", z".$i.") 
            = (x".$i.")<sup>3</sup> + (y".$i.")<sup>2</sup> + (z".$i.")<sup>2</sup> 
            = ".$x."<sup>3</sup> + ".$y."<sup>2</sup> + ".$z."<sup>2</sup> 
            = ".$calc_formatted."</p>";
        }
      ?>
      <a href="index.php">Return to home page</a>
    </section>
    <footer>
    <p>&copy; <?php echo date("Y"); ?> Richard Davis Kung Fu School</p>
    </footer>
  </body>
</html>
