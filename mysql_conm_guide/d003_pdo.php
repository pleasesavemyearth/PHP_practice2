<?php
  require_once 'dbconfig.php';

  try {
    $conn = new PDO("mysql:host=localhost:3306;dbname=webdb", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
  } catch(PDOException $e) {
    echo 'Connection failed : ' . $e->getMessage();
  }
?>