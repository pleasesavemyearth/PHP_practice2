<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="LoginProcess.php" method="POST">
        <label>아이디 : </label><input type="text" name="userid" placeholder="아이디" /><br>
        <label>비밀번호 : </label><input type="password" name="userpwd" placeholder="비밀번호" /><br>
        <input type="submit" value="로그인">
        <a href="RegistForm.php">회원가입</a>
    </form>
</body>
</html>