<?php
  session_start();
  // isset : 변수가 설정되었는지 확인해주는 함수
  if(isset($_SESSION['username'])) {
    $chk_login = TRUE;
  }else { 
    $chk_login = FALSE;
  }
?>