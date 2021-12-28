<?php
//1. Get value from variable, POST method
$username = $_POST['username'];
$password = $_POST['password'];

//2.  Form validation 
if(empty($username) || empty($password)){
    header('Location: RegistForm.php');
  }

//3. DB connection
$hostname = 'localhost';
$user = 'admin';
$pass = 'admin';
$db = 'webdb';

$dbconn =  mysqli_connect($hostname, $user, $pass, $db);

//4. 
$sql = "SELECT * FROM jh_user WHERE userid='". $username."' ";

// 5.
$resultset = mysqli_query($dbconn, $sql); 
$number = mysqli_num_rows($resultset); //resultset안에 몇개의 레코드가 있는 지 숫자로 반환

//6.1 
if ($number > 0) {
    header('Location: RegistForm.php');
  } else {

//7. sql 구성
$sql = "INSERT INTO jh_user(userid, userpwd) VALUES('". $username . "','". $password ."')";

//8. 
$result = mysqli_query($dbconn, $sql);

// 9.
if ($result) {
    header('Location: LoginForm.php');
  } 

  } 
// !! 회원가입을 누르면 자꾸 loginsuccess.php로 넘어가는 이유 : registform의 form태그의 action을 loginprocess로 받아주고 있었음..;;
?>