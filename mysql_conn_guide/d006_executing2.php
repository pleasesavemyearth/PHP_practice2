<!--
  2. Navigation through buffered results
-->
<?php
  require_once 'dbconfig.php';
  // activating report
  //mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
  $mysqli = new mysqli($host, $user, $pass, $db);
  
  $mysqli->query("DROP TABLE IF EXISTS test");
  $mysqli->query("CREATE TABLE test(id INT)");
  $mysqli->query("INSERT INTO test(id) VALUES (1), (2), (3)");

  $result = $mysqli->query("SELECT id FROM test ORDER BY id ASC");
  echo "Reverse order...<br>";
  for($row_no = $result->num_rows - 1; $row_no >=0; $row_no--){
    $result->data_seek($row_no);
    $row = $result->fetch_assoc();
    echo "id = " . $row['id'] . "<br>";
  }

  echo "Result set order... <br>";
  foreach($result as $row) {
    echo "id = " . $row['id'] . "<br>";
  }
?>