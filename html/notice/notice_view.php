<?php
  require '../session.php';
  require_once("../dbconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Korea Security Company | 공지사항 글보기</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="/css/main_page.css" />
  <link rel='stylesheet' type='text/css' href='/css/chat.css' />

  <!-- Script dependencies -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <!-- 채팅창 -->
  <script type='text/javascript' src='/chat/chat.js'></script>
  <!-- 날씨 -->
  <script type='text/javascript' src='/js/weather.js'></script>
  <!-- 달력 -->
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-1.10.2.min.js'></script>
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-ui-1.10.3.custom.min.js'></script>
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/fullcalendar/fullcalendar.min.js'></script>
  <script type='text/javascript' src='/js/calendar.js'></script>
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
  <!-- 공지사항 게시판 글보기 -->
  <div class="notice">
    <div class="inbox-head">
      <h3>Notice_view</h3>
      <form action="notice_view.php" method="GET">
        <input class="buttons delete" type="submit" name="deleteB" value="delete">
        <input type="hidden" name="nno" value="<?= $_GET["nno"] ?>">
      </form>
      <form action="notice_modify.php" method="GET">
        <input class="buttons modify" type="submit" name="modifyB1" value="modify">
        <input type="hidden" name="nno" value="<?= $_GET["nno"] ?>">
      </form>
    </div>
    <div class="document_form">
      <?php
        $nNo = $_GET['nno'];

        $sql = 'update notice set n_hit = n_hit + 1 where n_no = ' . $nNo;
        $result = mysqli_query($db, $sql);

        $sql = 'select n_title, n_text, n_date, n_hit, prodID from notice where n_no = ' . $nNo ;
        $result = mysqli_query($db, $sql);
        $row = $result->fetch_assoc();

        if (isset($_GET["deleteB"])) {
          if ($_SESSION["user_id"]==$row["prodID"]) {
            $sql = 'delete from notice where n_no ='.$nNo;
            $result = mysqli_query($db,$sql);
            echo "<meta http-equiv='refresh' content='0; url=notice.php'>";
          } else {
            echo "<script>alert(\"게시물 삭제에 실패했습니다\")</script>";
            echo "<meta http-equiv='refresh' content='0; url=notice.php'>";
          }
        }
      ?>
      <table>
        <caption>공지사항 게시판 글보기</caption>
        <colgroup>
          <col style="width:25%;">
          <col style="width:75%;">
        </colgroup>
        <tbody>
          <tr><td class="head">ID</td><td><?php echo $row["prodID"]?></td></tr>
          <tr><td class="head">제목</td><td><?php echo $row["n_title"]?></td></tr>
          <tr><td class="head">첨부파일</td><td></td></tr>
          <tr><td colspan="2" class="head">내용</td></tr>
          <tr>
            <td colspan="2" class="text_contents">
            <?php
             $row["n_text"] = str_replace("\n","<br>",$row["n_text"]);
             echo $row["n_text"];
             ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- / /공지사항 게시판 -->
</section>
<!-- // section -->

<!-- 우측 chat -->
<aside id="aside2"></aside>
<!-- // chat -->
</body>
</html>
