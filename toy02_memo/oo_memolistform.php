<?php
// 또 빼먹음;
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
    <h1>메모 목록</h1>
    <from>
            <?php
                $sql = "SELECT * FROM users";
                $resultset = $conn -> query($sql);

                if($resultset->num_rows > 0) {
                    echo "<table>
                          <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>내용</th>
                            <th>작성자</th>
                            <th>작성일</th>
                          </tr>";
                    while($row = $resultset->fetch_assoc()) {
                        echo "<tr>
                                <td>".$row['id']."</td>
                                <td><a href='oo_memoform.php'>".$row['title']."</a></td>
                                <td>".$row['content']."</td>
                                <td>".$row['userid']."</td>
                                <td>".$row['registdate']."</td>
                              </tr>";
                    }
                    echo "</table>";
                }

                $conn->close();
            ?>

        <br>
        <input type="button" value="글쓰기" onclick="location.href='oo_registmemo.html'"/> 
        <input type="button" value="로그아웃"/> 
    </from>
</body>
</html>