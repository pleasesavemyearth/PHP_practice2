<?php
//1. Get value from variable, POST method
$userid = $_POST['userid'];
$password = $_POST['userpwd'];
$username = $_POST['username'];
$useremail = $_POST['useremail'];
$usercellphone = $_POST['usercellphone'];

//2.  Form validation 
if(empty($userid) || empty($password)){
    header('Location: RegistForm.php');
  }

//3. DB connection
$hostname = 'localhost';
$user = 'admin';
$pass = 'admin';
$db = 'webdb';

$dbconn =  mysqli_connect($hostname, $user, $pass, $db);

//4. 중복체크를 위한 질의 구성
$sql = "SELECT * FROM jh_user WHERE userid='". $userid . "' ";

// 5. 중복체크를 위한 질의 실행
$resultset = mysqli_query($dbconn, $sql); 
$number = mysqli_num_rows($resultset); //resultset안에 몇개의 레코드가 있는 지 숫자로 반환

//6.1 중복 계정이 있으면 회원가입 폼으로 이동
if ($number > 0) {
    header('Location: RegistForm.php');
  } else {

// 6.2 없으면 다음 단계로 진행

//7. sql 구성 !반점 하나 빠져서 db등록이 안됬었음..
// $sql = "INSERT INTO jh_user(userid, userpwd, username, useremail, usercellphone) VALUES('". $userid . "','". $password ."', '". $username . "', '" . $useremail . "', '" . $usercellphone . "')"; 기본
//$sql = $dbconn -> stmt_init();
$sql = $dbconn -> prepare("INSERT INTO jh_user(userid, userpwd, username, useremail, usercellphone) VALUES(?, sha2(?,256), ?, ?, ?)");
//$sql = "INSERT INTO jh_user (userid, userpwd, username, useremail, usercellphone) VALUES('".$userid."', sha2('".$password."', 256),'". $username . "', '" . $useremail . "', '" . $usercellphone . "')"; 
$sql->bind_param("sssss", $userid, $password, $username, $useremail, $usercellphone);
$sql->execute();

//8. 질의어 실행 !!! $mysql_stmt를 추가하면 한번은 되는데 다음부턴 또 안됨
$result = mysqli_query($dbconn, $sql);

// 9. login폼으로 이동
if ($result) {
    header('Location: LoginForm.php');
  } 

  } 
// !! 회원가입을 누르면 자꾸 loginsuccess.php로 넘어가는 이유 : registform의 form태그의 action을 loginprocess로 받아주고 있었음..;;

// 문제 정리 : 회원가입정보 입력후 클릭하면 db에 정보는 등록이 되지만 LoginForm으로 넘어가지 못하고 에러가 뜸

?>