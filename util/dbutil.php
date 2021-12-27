<?php
namespace loginex;
use mysqli;

    $HOSTNAME = 'localhost';
    $USERNAME = 'webapp';
    $PASSWORD = 'webapp';
    $DATABASENAME = 'webdb';
    // create a connection (DB connection setting)
    $dbconn = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASENAME);
    
    if($dbconn) {
        echo "db연결이 성공하였습니다";
     } else {
            die("db연결에 실패하였습니다" . mysqli_connect_error());
        }
   

?>