<!--
  1. Executing Queries
-->
<?php
  require_once 'dbconfig.php';
  // activating report
  // MYSQLI_REPORT_OFF	Turns reporting off (the default)
  // MYSQLI_REPORT_ERROR	Report errors from mysqli function calls
  // MYSQLI_REPORT_STRICT	Throw mysqli_sql_exception for errors instead of warnings
  // MYSQLI_REPORT_INDEX	Report if no index or bad index was used in a query
  // MYSQLI_REPORT_ALL	Set all options (report all)
  mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);

  $mysqli = new mysqli($host, $user, $pass, $db);

  // Buffered result sets
  // 명령문 실행 후 결과를 한 번에 모두 검색하거나 서버에서 행별로 읽을 수 있음
  // 클라이언트 측 result set buffering은 서버가 명령문의 결과와 관련된 리소스를 최대한 빨리 해제할 수 있도록 함.
  // 일반적으로 client는 result sets을 느리게 소비
  // 그러므로 버퍼링된 results set을 사용하는 것이 좋다.
  // mysqli::query()는 명령문 실행과 result set 버퍼링을 결합함
  $mysqli->query("DROP TABLE IF EXISTS test");
  $mysqli->query("CREATE TABLE test(id INT)");
?>