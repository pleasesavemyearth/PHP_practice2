<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Toy1-Membership Mng.</title>
</head>
<body>
  <h1>Toy Project 1. Membership Management</h1>
  <h4>Edited by swcodingschool, Dec. 2021</h4>
  <hr>
  이 모의 프로젝트는 PHP와 MySQL을 이용 회원 관리 애플리케이션을 구현한다.<br>
  PHP와 MySQL 인터페이스는 <b>MySQLi Object-Oriented</b> 방법을 사용한다.<br>

  <h2>기능 리스트</h2>
  <ol>
    <li>사용자에 의한 회원 가입</li>
    <li>사용자 로그인</li>
    <li>사용자에 의한 회원 정보 수정</li>
    <li>사용자에 의한 회원 탈퇴(삭제)</li>
    <li>관리자에 의한 회원 등록</li>
    <li>관리자에 의한 회원 리스트 확인</li>
    <li>관리자에 의한 회원 상세 정보 확인</li>
    <li>관리자에 의한 회원 정보 수정 - 활동 정지</li>
    <li>관리자에 의한 회원 정보 삭제</li>
  </ol>
   
  <h2>작업 단계</h2>
  <p style="color:red;font-size:1.2em;">
  먼저, oo_int_createdb.php, adbconfig.php 2개 파일을 오픈하여 앞 부분의 $toyappname을 임의의 값으로 입력한다.<br>
  초기값은 toyproj라고 되어있으나 입력하는대로 데이터베이스이름 및 사용자 계정을 생성할 수 있다.<br>
  단, 두 개 파일모두 같은 값이어야 한다.<br>
  </p>
  <ol>
    <li>데이터베이스생성(oo_init_createdb.php 파일 참조) </li>
        DBMS 시스템과의 연결, Database(toymembership) 생성하는 시스템 초기화 기능. 
        <a href="oo_init_createdb.php">실행</a>
    <li>테이블생성(oo_init_createtbl.php 파일 참조)</li>
        id, username(사용자계정), password(비밀번호), cpassword(비밀번호확인), cellphone(전화번호), email(이메일), registdate(등록일), lastdate(마지막로그인날짜), status(활동상태) 등의 속성 정보로 구성한다.
        <a href="oo_init_createtbl.php">실행</a>
    <li>회원가입 화면만들기(oo_user_registform.html 파일 참조) </li>
        사용자 가입 화면으로, username(사용자계정), password(비밀번호), cpassword(비밀번호확인), cellphone(전화번호), email(이메일) 등을 직접 입력할 수 있는 폼화면으로 구성.
        <a href="oo_user_registform.html">실행</a>
    <li>회원가입 처리(user_registproess.php)</li>
    <li>사용자 로그인 화면(user_loginform.html></li>
        <a href="oo_user_loginform.html">실행</a>
    <li>로그인 처리(oo_user_loginproess.php)</li>
    <li>로그인 성공 페이지(oo_user_loginsuccess.php)
        사용자 목록 확인
        <a href="oo_user_loginsuccess.php">실행</a>
    <li>사용자 상세 정보 화면(oo_userdetailview.php)</li>
    <li>사용자 정보 수정 화면(user_update.html) </li>
    <li>사용자 정보 수정 처리(user_updateprocess.php)</li>
    <li>사용자 정보 삭제 처리(user_deleteprocess.php)</li>
  </ol>
</body>
</html>