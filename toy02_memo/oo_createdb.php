<?php
// toy project의 이름을 먼저 정의한다.
// adbconfig.php 파일에도 같은 이름으로 입력한다.
//============================
$toyappname = 'toyproj';
//=============================
$dbservername = 'localhost'; // 개발 및 테스트 환경에서는 localhost를 전제로 한다.
$dbusername = 'root';  // 현재 DBMS에 root계정을 이용하여 접속한다. !! 사용자명과 비밀번호가 다르게 들어간다 (adbconfig.php)
$dbpassword = '';  // 현재 DBMS root 계정의 패스워드를 적는다.
$dbname = $toyappname; // toy project의 이름으로 db와 사용자를 생성하도록 한다.

require_once "asysconfig.php"; // 메시지, 유틸리티 함수 등을 include 한다.

// create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword);

// check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
if ($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :" . $conn->connect_error);
} else {
  if (DBG) echo outmsg(DBCONN_SUCCESS);
}

// 데이터베이스가 있으면 삭제하고 새롭게 생성
$sql = "DROP DATABASE IF EXISTS ".$dbname.";";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(DROPDB_SUCCESS);
}
$sql = "DROP USER IF EXISTS ".$dbname.";";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(DROPUSER_SUCCESS);
}

// 애플리케이션이 사용할 계정을 생성하고 동일한 이름의  데이터베이스를 생성한다. 
$sql = "CREATE USER IF NOT EXISTS '".$dbname."'@'%' IDENTIFIED BY '".$dbname."'";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(CREATEUSER_SUCCESS);
} else {
  echo outmsg(CREATEUSER_FAIL);
}

$sql = "GRANT USAGE ON *.* TO '".$dbname."'@'%' REQUIRE NONE WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(LIMITRSC_SUCCESS);
} else {
  echo outmsg(LIMITRSC_FAIL);
}

$sql = "CREATE DATABASE IF NOT EXISTS `".$dbname."`";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(CREATEDB_SUCCESS);
} else {
  echo outmsg(CREATEDB_FAIL);
}

$sql = "GRANT ALL PRIVILEGES ON `".$dbname."`.* TO '".$dbname."'@'%';  ";
if ($conn->query($sql) == TRUE) {
  if (DBG) echo outmsg(GRANTUSER_SUCCESS);
} else {
  echo outmsg(GRANTUSER_FAIL);
}

// 데이터베이스 연결 인터페이스 리소스를 반납한다.
$conn->close();

// 코드 완료 메시지 출력
if(DBG) echo outmsg(COMMIT_CODE);

// 프로세스 플로우를 인덱스 페이지로 돌려준다.
// header('Location: index.php');
// 작업 실행 단계별 메시지 확인을 위해 Confrim and return to back하도록 수정함!!
// 백그라운드로 처리되도록 할 경우 위의 원 코드로 대체 할 것!!
echo "<a href='./index.php'>Confirm and Return to back</a>";

?>