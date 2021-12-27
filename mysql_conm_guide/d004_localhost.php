<!-- 
  MySQL 서버는 연결을 위해 다른 전송 계층의 사용을 지원한다.
  Connections는  TCP/IP, Unix 도메인 소켓 또는 Windows 명명된 파이프를 사용한다. 
  호스트 이름 localhost에는 특별한 의미가 있다. 
  이것은 Unix 도메인 소켓을 사용해야 한다. 
  localhost에 대한 TCP/IP 연결을 열려면 호스트 이름 localhost 대신 127.0.0.1을 사용해야 한다. 
-->
<?php
  $mysqli = new mysqli("localhost", "webapp", "webapp", "webdb");
  echo $mysqli->host_info .'<br>';
  
  $mysqli = new mysqli("127.0.0.1", "webapp", "webapp", "webdb", 3306);
  echo $mysqli->host_info . '<br>';
?>