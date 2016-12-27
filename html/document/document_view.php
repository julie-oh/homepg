<!DOCTYPE html>
<?php
include '../dbconfig.php';
require_once '../session.php';
?>
<html>
<head>
    <php? include '../session.php'; ?>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Korea Security Company|품의/제안서 확인하기</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" type="text/css" href="../css/main_page.css" />
    <!-- CSS 파일들 -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/main_page.css" />
    <link rel='stylesheet' type='text/css' href='/css/fullcalendar.css' />
    <link rel='stylesheet' type='text/css' href='/css/chat.css' />

    <!-- Script dependencies - jquery & bootstrap -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script type='text/javascript'>
$(function () {
  $('#nav_bar').load("/navigation.php #navigation_container");
  $('#left_side').load("/left_side.php #aside1");
  //$('#article5').load("/weather.html #weather_section");
  //$('#article4').load("/food.php #food_menu_template");
});
</script>
<!-- 채팅창 -->
<script type='text/javascript' src='/chat/chat.js'></script>
</head>

<body>

<!-- header -->
<header>
  <div><a href="main_page.php"><img src="../images/logo.png" alt="logo" /></a></div>
</header>
<!-- //header -->

<!-- navigation bar -->
<nav id="nav_bar" class="navbar navbar-fixed-top"></nav>

<!-- left side bar -->
<div id="left_side"></div>

<!-- section -->
  <section id="section1">
        <form action="view.php" method="post">
  <div class="document_form">
    <div><img src="../images/form_logo.png" alt="KSC" /></div>

      <table>
      <caption>품의/제안서 문서 확인하기</caption>
        <tbody>
          <tr><td class="head">문서상태</td><td class="color">결재대기</td><td rowspan="" class="head">과장</td><td rowspan="" class="head">전무</td><td rowspan="" class="head">대표이사</td></tr>
          <tr><td class="head">문서번호</td><td>5</td><td rowspan="4"><span>최수진</span></td><td rowspan="4"><span>최수진</span></td><td rowspan="4"><span>최수진</span></td></tr>
          <tr><td class="head">작성일자</td><td>2016.10.14</td></tr>
          <tr><td class="head">작성부서</td><td><?php echo $user_dep ?></td></tr>
          <tr><td class="head">작성자</td><td><?php echo $user_name ?></td></tr>
          <tr><td class="head">제목</td><td colspan="4"></td></tr>
          <tr><td class="head">첨부파일</td><td colspan="4"><input type="file" /></td></tr>
          <tr><td colspan="5" class="head"></td></tr>
          <tr><td colspan="5" class="text_contents"></td></tr>
        </tbody>
      </table>
    <div class="register">
      <button class="button" type="button" onclick="location.href=''">List</button>
    </div>
</form>
  </div>

  </section>

<!-- 우측 chat -->
<aside id="aside2"></aside>

</body>
</html>
