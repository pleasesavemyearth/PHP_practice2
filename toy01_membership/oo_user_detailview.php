<!-- 
  파일명 : oo_user_detailview.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  id를 GET방식으로 넘겨받아, 해당 id 레코드 정보를 검색,
  화면에 상세 정보를 뿌려준다.
-->
<?php
  // db연결 준비
  require "./adbconfig.php";

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
  //================  여기부터 ============================================
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>회원정보 상세페이지</h1>
  <br>
  <?php

    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id = ".$id;
    $resultset = $conn->query($sql);

    if($resultset->num_rows > 0) {
      echo "<table><tr><th>ID</th><th>USERNAME</th><th>CellPhone</th><th>E-Mail</th><th>Regist Date</th><th>Last Login</th><th>Status</th><th>수정</th><th>삭제</th></tr>";
      //echo "<table><tr><th>ID</th><th>USERNAME</th></tr>";
      // out data of each row
      // while( $row = $resultset->fetch_assoc() ) {
      //   echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['cellphone']."</td><td>".$row['email']."</td><td>".$row['registdate']."</td><td>".$row['lastdate']."</td><td>".$row['status']."</td><td><a href='oo_user_update.html?id=".$row['id']."'>수정</a></td><td><a href='oo_user_deleteprocess.php?id=".$row['id']."'>삭제</a></td></tr>";
      // }
      $row = $resultset->fetch_assoc();
      echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['cellphone']."</td><td>".$row['email']."</td><td>".$row['registdate']."</td><td>".$row['lastdate']."</td><td>".$row['status']."</td><td><a href='oo_user_update.php?id=".$row['id']."'>수정</a></td><td><a href='oo_user_deleteprocess.php?id=".$row['id']."'>삭제</a></td></tr>";
      echo "</table>";
    }
  ?>
  <br>
    <a href="oo_user_loginsuccess.php">목록보기</a>
</body>
</html>