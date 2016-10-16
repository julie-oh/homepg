<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>KSC confirm logout</title>
</head>
<body>
  <p>성공적으로 로그아웃하셨습니다.</p>
  <button type="button" name="button" onclick="location.href='login.html'">
    확인
  </button>
</body>
