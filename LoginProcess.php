<?php
// 1. Get the value from variable
$userid = $_POST['userid']; 
$password = $_POST['userpwd'];
//$php의 변수 = $_POST['html의 변수'] (LoginForm의 input태그의 name)


// 2. 아이디 또는 비밀번호 중 하나라도 입력하지 않으면 LoginForm으로 redirection
if(empty($userid) || empty($password) ) {
    header('Location: LoginSuccess.php'); 
}


// 3. DB connection
$host = 'localhost';
$user = 'admin';
$pass = 'admin';
$db = 'webdb';

$dbconn = mysqli_connect($host, $user, $pass, $db);
if(is_null($dbconn)) {
    echo "DB connection error";
}


// 4. SQL structure
$sql = "SELECT userpwd FROM jh_user WHERE userid = '".$userid."'";


// 5. running and return result !!db에 레코드 등록하고 로그인 하는데 성공페이지로 안넘어간다 해결..2번의 location위치 오타나서 안됐었음;
// 비밀번호가 틀렸습니다 안뜸, loginprocess로 넘어감
// 그냥 로그인 눌러도 로그인이 성공함
$resultset = mysqli_query($dbconn, $sql);

while($row = mysqli_fetch_array($resultset)) {
    if ($password == $row['userpwd']) {
        header('Location: LoginSuccess.php');
    } else {
        echo '비밀번호가 틀렸습니다.';
        header('Location: LoginForm.php');
    }
}


?>