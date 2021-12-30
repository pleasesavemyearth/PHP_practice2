<!--
    oo_registmemo.html 메모 작성 화면에서 입력된 값을 받아(등록 클릭 시) users 테이블에 제목, 내용 데이터를 추가한다.
-->


<?php
// $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// 메모 작성 화면으로 부터 값을 전달 받음
$title = $_POST['title'];
$content = $_POST['content'];

// url을 index.php 로 
$URL = './index.php';  

// db에 삽입
$sql = "INSERT INTO board (title, content) values('" . $title . "', '" . $content ."')";
$result = $conn->query($sql);

// 등록되면 등록됨, 되지 않으면 실패 스크립트창
if ($result) {
?> <script>
        alert("<?php echo "게시글이 등록되었습니다." ?>");
        location.replace("<?php echo $URL ?>");
    </script>
<?php
} else {
    echo "게시글 등록에 실패하였습니다.";
}

// db 연결 리소스 반납
$conn->close();

?>