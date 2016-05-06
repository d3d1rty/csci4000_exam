<?php
  // Richard Davis
  // CSCI4000
  // 05 May 2016
  // Final Exam

  $dsn = 'mysql:host=localhost;dbname=richard_davis_exam_db';
  $username = 'richardfinal';
  $password = 'richardbread';
  try {
    $db = new PDO($dsn, $username, $password);
  } catch (PDOException $e) {
      $error_message = $e->getMessage();
      include('richard_davis_database_error.php');
      exit();
  }

?>

