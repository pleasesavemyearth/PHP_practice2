<?php
//회원가입시 저장버튼 클릭했을 때 동작...
//폼에서 입력받은 username, password를 db에 저장할 것이다. 
//Pseudo Code : 처리과정을 일상의 언어로 적어가는 것
/*
  1. POST방식으로 전달된 값을 취한다. $변수 = $_POST[name];
  2. Form validation 
  3. 데이터베이스 연결
  4. 중복체크를 위한 질의/쿼리 구성
  5. 중복체크를 위한 질의/쿼리 실행
  6.1 중복계정이 있으면 중복메세지 출력 후 회원가입폼으로 이동
  6.2 중복계정이 없으면 다음단계진행
  7. 질의어를 (insert 구문)구성한다. 
  8. 구성된 질의어를 실행시키고 (MySQL에 질의실행 요청한다.)
  9. login 화면으로 이동시킨다. 
*/
//질의/쿼리란 데이터베이스에 정보를 요청하는 것

//1.
$username = $_POST['username'];
$password = $_POST['password'];

//2. 
if(empty($username) || empty($password)){
  echo "<script>alert('사용사명 또는 비밀번호를 확인해주세요.');</script>";
  header('Location: step1_RegistForm.php');
}

//3. 
$hostname = 'localhost';
$user = 'webapp';
$pass = 'webapp';
$db = 'webdb';
$dbconn =  mysqli_connect($hostname, $user, $pass, $db);

//4. 
$sql = "SELECT * FROM users WHERE username='". $username."' ";

//5. 
$resultset = mysqli_query($dbconn, $sql); //그렇게 연결된 dbconn데이터베이스에 $sql질의어를 실행해라 
$number = mysqli_num_rows($resultset); //resultset안에 몇개의 레코드가 있는 지 숫자로 반환

//6.1 
if ($number > 0) {
  header('Location: step1_RegistForm.php');
} else {

//6.2 다음 단계로 진행 fsef

//7. sql 구성
$sql = "INSERT INTO users(username, userpwd) VALUES('". $username . "','". $password ."')";
//prepared statement
// $mysqli->prepare("INSERT INTO users(username, userpwd) VALUES(?,?)");
// $sql->bind_param("ss", $username, $password); 
// ss: string string is: integer string

//8. 
$result = mysqli_query($dbconn, $sql);

// 9.
if ($result) {
  header('Location: step1_LoginForm.php');
} 
}