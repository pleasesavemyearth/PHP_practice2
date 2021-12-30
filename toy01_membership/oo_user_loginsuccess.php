<!-- 
  파일명 : oo_user_loginsuccess.php
  최초작업자 : swcodingschool
  최초작성일자 : 2021-12-28
  업데이트일자 : 2021-12-28
  
  기능: 
  로그인 성공했을 때, success 메시지 간단히 출력하고...
  여기에서는 사용자 목록 리스팅 기능을 수행하도록 구성함.
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
  //================  여기까지 ============================================
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
  <h6>로그인 성공!!</h6>
  <h1>사용자 목록</h1>
  <br><br>
  <?php
    $sql = "SELECT * FROM users";
    $resultset = $conn->query($sql);

    if($resultset->num_rows > 0) {
      // echo "<table><tr><th>ID</th><th>USERNAME</th><th>CellPhone</th><th>E-Mail</th><th>Regist Date</th><th>Last Login</th><th>Status</th></tr>";
      echo "<table><tr><th>ID</th><th>USERNAME</th><th>작업내용</th></tr>";
      // out data of each row
      while( $row = $resultset->fetch_assoc() ) {
        // echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td>".$row['cellphone']."</td><td>".$row['email']."</td><td>".$row['registdate']."</td><td>".$row['lastdate']."</td><td>".$row['status']."</td><td><a href='oo_user_detailview.html?id=".$row['id']."'>상세정보확인</a></tr>";
        echo "<tr><td>".$row['id']."</td><td>".$row['username']."</td><td><a href='oo_user_detailview.php?id=".$row['id']."'>상세정보확인</a></td></tr>";
      }
      echo "</table>";
    }
  ?>
  <a href="./index.php">인덱스페이지로</a>
</body>
</html>