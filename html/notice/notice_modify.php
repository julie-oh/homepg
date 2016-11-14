<?php
  require '../session.php';
  require '../dbconfig.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Korea Security Company | 공지사항 글수정하기</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/main_page.css" />
  <link rel='stylesheet' type='text/css' href='/css/fullcalendar.css' />
  <link rel='stylesheet' type='text/css' href='/css/chat.css' />
  <!-- Script dependencies -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <!-- 채팅창 -->
  <script type='text/javascript' src='/chat/chat.js'></script>
  <!-- 모듈화된 네비게이션바 / 날씨 등등 로딩 -->
  <script type='text/javascript'>
  $(function () {
    $('#nav_bar').load("/navigation.php #navigation_container");
    $('#left_side').load("/left_side.php #aside1");
  });
  </script>
</head>

<body>
<!-- header -->
<header>
  <div><a href="/main_page.php"><img src="/images/logo.png" alt="logo" /></a></div>
</header>

<!-- navigation bar -->
<nav id="nav_bar" class="navbar navbar-fixed-top"></nav>

<!-- left side bar -->
<div id="left_side"></div>

<!-- section -->
<section id="section1">
  <!-- 공지사항 게시판 글수정하기 -->
  <div class="notice">
   <form action="notice_modify.php" method="post">
    <div class="inbox-head">
      <h3>Notice_modify</h3>
      <input class="buttons modify" type="submit" name="modifyB2" value="modify">
    </div>
    <div class="document_form">
      <table>
        <caption>공지사항 게시판 글수정</caption>
        <input type="hidden" name="nno" value="<?= $_GET["nno"] ?>">
        <colgroup>
          <col style="width:25%;">
          <col style="width:75%;">
        </colgroup>
          <?php
          if(isset($_GET["modifyB1"]) || isset($_POST["modifyB2"])) {
            if(isset($_GET['nno'])) {
              $nNo = $_GET['nno'];
            } else if (isset($_POST['nno'])) {
              $nNo = $_POST['nno'];
            }

            $sql = 'select n_title, n_text, n_date, n_hit, prodID from notice where n_no =' . $nNo ;
            $result = mysqli_query($db, $sql);
            $row = $result->fetch_assoc();
          }
          ?>
        <tbody>
            <input type="hidden" name="nno" value="<?= $_GET["nno"] ?>">
            <input type="hidden" name="modifyB1" value="">
            <tr><td class="head">ID</td><td><?=$prodID?></td></tr>
            <tr><td class="head">Password</td><td><input type="password" name="writePW" placeholder="사원의 비밀번호를 입력하세요"/></td></tr>
            <tr><td class="head" name="n_title">제목</td><td><input type="text" name=ntitle class="title" value="<?=$row['n_title']?>"/></td></tr>
            <tr><td class="head">첨부파일</td><td><input type="file" /></td></tr>
            <tr><td colspan="2" class="head">내용</td></tr>
            <tr><td colspan="2" ><textarea name="ntext"><?=$row["n_text"]?></textarea></td></tr>
        </tbody>
        <?php
        if(isset($_POST["modifyB2"])) {
          if($_POST["writePW"] == $_SESSION["user_pw"]) {
            $write=true;
          } else {
            die("안맞음");
          }

          if ($write==true) {
            $ntitle = $_POST["ntitle"];
            $ntext = $_POST["ntext"];

            $sql = 'update notice set n_title="'.$ntitle.'", n_text="'.$ntext.'" where n_no='.$nNo;
            $result = mysqli_query($db,$sql);

            if($result) {
              echo "<script>alert(\"게시물 수정에 성공하였습니다\")</script>";
              echo "<meta http-equiv='refresh' content='0; url=notice.php'>";
            } else {
              print $result;
            }
          }
        }
        ?>
      </table>
    </div>
   </form>
  </div>
  <!-- / /공지사항 게시판 -->
</section>
<!-- // section -->

<!-- 우측 chat -->
<aside id="aside2"></aside>
<!-- // chat -->
</body>
</html>
