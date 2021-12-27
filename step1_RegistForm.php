<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body><!-- html로 회원가입 뼈대만듬 -->
  <h3>회원가입</h3>
  <form action="step1_RegistProcess.php" method="POST">
  <label>사용자명 : </label>
  <input type="text" name="username" placeholder="유저명을 입력해주세요"><br>
  <label>비밀번호 : </label>  
  <input type="text" name="password" placeholder="비밀번호를 입력해주세요"><br>
  <input type="submit" value="저장">
  </form>
</body>
</html>