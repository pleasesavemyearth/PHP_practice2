<?php
// 프로젝트 시작 전 toyappname을 정한다.
// oo_init_createdb에도 같은 이름으로 입력한다.
//============================
$toyappname = 'toyproj';
//============================

$dbservername = 'localhost'; // 개발 및 테스트 환경에서는 localhost를 전제로 한다.
$dbusername = $toyappname;  // 현재 DBMS에 root계정을 이용하여 접속한다.
$dbpassword = $toyappname;  // 현재 DBMS root 계정의 패스워드를 적는다.
$dbname = $toyappname;

require_once "asysconfig.php"; // 시스템 관리를 위한 각종 환경 변수 및 메시지 처리

// get connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 종료
if($conn->connect_error) {
  echo outmsg(DBCONN_FAIL);
  die("연결실패 :".$conn->connect_error);
}else {
  if(DBG) echo outmsg(DBCONN_SUCCESS);
}

?>