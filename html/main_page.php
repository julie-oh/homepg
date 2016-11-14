<?php
// 로그인 세션이 정상적으로 시작되었는지 체크.
// 세션 없으면 로그인 페이지로 바로 접속함
require_once('dbconfig.php');
require_once('session.php');

header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Korea Security Company</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- CSS 파일들 -->
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main_page.css" />
<!--   <link rel="stylesheet" type="text/css" href="css/board.css" /> -->
  <link rel='stylesheet' type='text/css' href='css/fullcalendar.css' />
  <link rel='stylesheet' type='text/css' href='css/chat.css' />
<!--   <link rel='stylesheet' type='text/css' href='css/food.css' /> -->

  <!-- Script dependencies - jquery & bootstrap -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <script type='text/javascript'>
  $(function () {
    $('#nav_bar').load("navigation.php #navigation_container");
    $('#left_side').load("left_side.php #aside1");
    $('#article5').load("weather.html #weather_section");
    $('#article4').load("food.php #food_menu_template");
  });
  </script>

  <!-- 채팅창 -->
  <script type='text/javascript' src='chat/chat.js'></script>
  <!-- 날씨 -->
  <script type='text/javascript' src='js/weather.js'></script>
  <!-- 달력 -->
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-1.10.2.min.js'></script>
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-ui-1.10.3.custom.min.js'></script>
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/fullcalendar/fullcalendar.min.js'></script>
  <script type='text/javascript' src='js/calendar.js'></script>

</head>

<body>
<!-- header -->
<header>
  <div><a href="main_page.php"><img src="images/logo.png" alt="logo" /></a></div>
</header>

<!-- navigation bar -->
<nav id="nav_bar" class="navbar navbar-fixed-top"></nav>

<!-- left side bar -->
<div id="left_side"></div>

<!-- section -->
<section id="section1">
<!-- 게시판 -->
  <section id="subsection1">
    <article id="article1">
    <div class="inbox-head">
        <h3>Notice</h3>
        <span><a href="notice/notice.html">more</a></span>
    </div>
    <div class="inbox-body" style="padding:0;">
        <table class="table table-inbox table-hover">
        <colgroup>
        <col style="width:25%;">
        <col style="width:50%;">
        <col style="width:25%;">
        </colgroup>
          <tbody>
            <tr class="">
                <td class="view-message dont-show">PHPClass</td>
                <td class="view-message">Added a new class: Login Class Fast Site</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Google Webmaster </td>
                <td class="view-message">Improve the search presence of WebSite</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">JW Player</td>
                <td class="view-message">Last Chance: Upgrade to Pro for </td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Tim Reid, S P N</td>
                <td class="view-message">Boost Your Website Traffic</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Freelancer.com</td>
                <td class="view-message">Stop wasting your visitors </td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">WOW Slider </td>
                <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">LinkedIn Pulse</td>
                <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Drupal Community</td>
                <td class="view-message view-message">Welcome to the Drupal Community</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Facebook</td>
                <td class="view-message view-message">Somebody requested a new password </td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Skype</td>
                <td class="view-message view-message">Password successfully changed</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
        </tbody>
        </table>
    </div>
    </article>

    <article id="article2">
    <div class="inbox-head" style="background:#5bc0de;">
        <h3>News</h3>
        <span><a href="">more</a></span>
    </div>
    <div class="inbox-body" style="padding:0;">
        <table class="table table-inbox table-hover">
        <colgroup>
        <col style="width:25%;">
        <col style="width:50%;">
        <col style="width:25%;">
        </colgroup>
          <tbody>
            <tr class="">
                <td class="view-message dont-show">PHPClass</td>
                <td class="view-message">Added a new class: Login Class Fast Site</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Google Webmaster </td>
                <td class="view-message">Improve the search presence of WebSite</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">JW Player</td>
                <td class="view-message">Last Chance: Upgrade to Pro for </td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Tim Reid, S P N</td>
                <td class="view-message">Boost Your Website Traffic</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Freelancer.com</td>
                <td class="view-message">Stop wasting your visitors </td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">WOW Slider </td>
                <td class="view-message">New WOW Slider v7.8 - 67% off</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">LinkedIn Pulse</td>
                <td class="view-message">The One Sign Your Co-Worker Will Stab</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Drupal Community</td>
                <td class="view-message view-message">Welcome to the Drupal Community</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Facebook</td>
                <td class="view-message view-message">Somebody requested a new password </td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
            <tr class="">
                <td class="view-message dont-show">Skype</td>
                <td class="view-message view-message">Password successfully changed</td>
                <td class="view-message text-right">2016.10.10 18:09</td>
            </tr>
        </tbody>
        </table>
    </div>
    </article>
  </section>
<!-- //게시판 -->

<!-- 위젯 -->
  <section id="subsection2">
    <article id="article3">
      <div id="calendar" style="margin: 0; font-size: 13px; background-color:white;"></div>
    </article>

    <!-- 식단표 -->
    <article id="article4" style="background: #fff;"></article>

    <!-- 날씨 -->
    <article id="article5"></arctile>

  </section>
</section>
<!-- //위젯 -->

<!-- 우측 chat -->
<aside id="aside2"></aside>

</body>
</html>
