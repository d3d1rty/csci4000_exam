<?php
  // Richard Davis
  // CSCI4000
  // 4 May 2016
  // Final Exam
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
      <section id="first_option">
        <h2>Choose value <i>n</i> (1 to 20) to enter coordinates</h2>
        <form action="richard_davis_dynamic_textbox.php" method="post">
          <label>value <i>n</i>:&nbsp;</label>
          <select name="values">
          <?php
            // iterates through a for loop adding options 1 - 20
            for($i=1; $i <= 20; $i++)
            {
              echo "<option value=".$i.">".$i."</option>";
            }
          ?>
          </select>
          <input type="submit" value="submit">
        </form>
      </section>
      <br>
      <section id="second_option">
        <h2>OR click on the link below to clean up the database table</h3>
        <a href="richard_davis_clear_table.php">Remove old records</a>
      </section>
    </section>
    <footer>
    <p>&copy; <?php echo date("Y"); ?> Richard Davis Kung Fu School</p>
    </footer>
  </body>
</html>
