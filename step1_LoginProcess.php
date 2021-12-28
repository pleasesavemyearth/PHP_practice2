<?php
//Pseudo Code : 처리과정을 일상의 언어로 적어가는 것
/*
  1. POST방식으로 전달된 값을 취한다. get the value from $변수 = $_POST[name];
  2. Form validation 진행 
    여기서는 전달된 값이 공백이면 다시 값을 입력하라고 요청한다.
  3. 데이터베이스 연결하고
  4. 질의어를 구성한다. 
  5. 구성된 질의어를 실행시키고 (MySQL에 질의실행 요청한다.) 결과를 돌려받는다.
  6.1 실행 결과를 확인하고 ... 레코드가 존재하면 로그인 성공 ... 페이지로 이동
  6.2                                   존재하지 않으면 로그인 실패... 폼화면으로 재이동
*/

//1.
$username = $_POST['username'];
$password = $_POST['password'];

//$username :php의 변수  'username' : html

//2.
// 사용자명 또는 비밀번호 중 하나라도 입력하지 않았으면 
// 다시 LoginForm 화면으로 돌려보낸다.
if(empty($username) || empty($password) ) {
  echo "<script>alert('사용자명 또는 비밀번호를 확인해주세요.');</script>";
  header('Location: step1_LoginForm.php');
  // empty와 null 차이 
}

//3 데이터베이스 연결
$host = 'localhost';
$user = 'webapp';
$pass = 'webapp';
$db = 'webdb';
//$dbconn = mysqli_connect(호스트명, 사용자명, 비밀번호, 데이터베이스명)
  $dbconn = mysqli_connect($host, $user, $pass, $db);
  if(is_null($dbconn)) {
    echo "데이터베이스 연결에 문제가 있습니다.";
  }

//4. sql 구성 
$sql = "SELECT userpwd FROM users WHERE username ='".$username."'" ;

// double quote : sql 구문의 string구성에 주는 역할  
// single quote : username ='hong' 처럼 값을 나타내주는 역할
// 테이블안에 있는 필드명이 password로 설정하면 password라는 단어 자체가 키워드가 적용이 되어 져서 불편함

// 5. 실행하고 결과돌려받기
$resultset = mysqli_query ($dbconn, $sql);

while($row = mysqli_fetch_array($resultset)) {
  if ( $password == $row['userpwd']) { //6.1
    header('Location: step1_LoginSuccess.php');
  } else { //6.2
    echo '비밀번호가 틀렸습니다.';
    header('Location: step1_LoginForm.php');
  }
}

?>