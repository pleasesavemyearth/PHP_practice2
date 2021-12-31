<?php
require './adbconfig.php';
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
            <?php
                // db에서 데이터 가져오기 
                // 메모의 번호 받아와 만족하는 db의 데이터들을 가져온다
                $id = $_GET['id']; // !undefined array key "id"!
                $sql = "SELECT * FROM users WHERE id='".$id."'"; 
                $resultset = $conn -> query($sql);

                if($resultset->num_rows > 0) {
                    echo "<table>
                          <tr>
                            <th>제목</th>
                            <th>내용</th>
                            <th>작성일</th>
                          </tr>";
                    while($row = $resultset->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['title']."</td>
                                <td>".$row['content']."</td>
                                <td>".$row['registdate']."</td>
                              </tr>";
                    }
                    echo "</table>";
                }

                $conn->close();
            ?>

    <!-- input type submit / button 주의 -->
    <input type="button" value="수정" onclick="location.href='oo_updatememoform.html'"/>
    <input type="button" value="삭제" onclick="location.href='oo_deletememo.php'"/>
    <input type="button" value="목록" onclick="location.href='oo_memolistform.php'"/>

</body>
</html>