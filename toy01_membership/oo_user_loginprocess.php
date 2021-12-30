<!-- 
  파일명 : oo_user_loginprocess.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  oo_user_registform.html 회원가입화면에서 입력된 값을 받아, validation 후
  users 테이블에 사용자 가입 데이터를 추가한다.
-->

<?php
  // db연결 준비
  require "./adbconfig.php";

  // 데이터베이스 작업 전, 회원가입화면으로 부터 값을 전달 받고
  $username = $_POST['username'];
  $passwd = $_POST['passwd'];
    
  // create connection
  // get connection 하는 코드를 adbconfig로 이동하며... 
  // 아래 코드는 일단 코멘트 처리함. 2021-12-29 by swcodingschool
  //================  여기부터 ============================================
  // $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

  // // check connection : 연결 확인, 오류가 있으면 메시지 출력 후 프로세스 정료
  // if($conn->connect_error) {
  //   echo outmsg(DBCONN_FAIL);
  //   die("연결실패 :".$conn->connect_error);
  // }else {
  //   if(DBG) echo outmsg(DBCONN_SUCCESS);
  // }
  //================  여기까지 ============================================
  
  // 사용자 계정 존재 여부 확인을 위한 질의 구성
  $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? and passwd = sha2(?,256)");
  $stmt->bind_param("ss", $username,$passwd);

  $stmt->execute();
  $result = $stmt->get_result();
  $row = mysqli_fetch_array($result);
  
  if(!empty($row['username'])){
    echo outmsg(LOGIN_SUCCESS);
    $conn->close();
    header('Location: oo_user_loginsuccess.php');
  }else{
    echo outmsg(LOGIN_FAIL);
    $conn->close();
    header('Location: index.php');
  }
  
  
?>