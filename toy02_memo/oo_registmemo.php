<?php
// !! db연결 위해 넣어준다
// 이걸 빼먹었었음 
require './adbconfig.php';

// 메모 작성 화면으로 부터 값을 전달 받음
$title = $_POST['title'];
$content = $_POST['content'];
// $userid = $_POST['userid'];
 
// // 콘텐트 내용이 넘어갔는지 확인하기 위해 입력한다
// echo outmsg($content); 

// db에 삽입 !! 테이블명 항상주의
$stmt = $conn->prepare("INSERT INTO users (title, content) VALUES (?, ?)");  
// $sql = "INSERT INTO users (title, content) values('" . $title . "', '" . $content ."')";
$stmt->bind_param("ss", $title, $content);
$stmt->execute();

// db 연결 리소스 반납
$conn->close();

// redireciton / !!등록이 되었을때, 되지 않았을 때 알림 수정
header('Location: oo_memolistform.php');
?>

