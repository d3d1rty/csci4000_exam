<?php
  // Richard Davis
  // CSCI4000
  // 4 May 2016
  // Final Exam

  // gets number of coordinate sets to enter
  $num_sets = filter_input(INPUT_POST, 'values', FILTER_VALIDATE_INT);
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
      <form action="richard_davis_dynamic_process.php" method="post">
        <!-- iterates through number of coord sets, building form -->
        <?php for ($i = 1; $i < $num_sets+1; $i++) {
          echo "<label class=\"coordinate\">(x".$i.": </label>";
          echo "<input type=\"text\" name=\"x[".($i-1)."]\">";
          echo "<label class=\"coordinate\">, y".$i.": </label>";
          echo "<input type=\"text\" name=\"y[".($i-1)."]\">";
          echo "<label class=\"coordinate\">, z".$i.": </label>";
          echo "<input type=\"text\" name=\"z[".($i-1)."]\">";
          echo "<label class=\"coordinate\">) </label>";
          echo "<br>";
         } ?>
        <input type="submit" value="submit">
      </form>
    <br>
    </section>
    <footer>
    <p>&copy; <?php echo date("Y"); ?> Richard Davis Kung Fu School</p>
    </footer>
  </body>
</html>
