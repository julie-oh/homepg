<?php
// 로그인 세션이 정상적으로 시작되었는지 체크.
// 세션 없으면 로그인 페이지로 바로 접속함
require_once('dbconfig.php');
require_once('session.php');

date_default_timezone_set('Asia/Seoul');
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
  <link rel="stylesheet" type="text/css" href="/css/main_page.css" />
<!--   <link rel="stylesheet" type="text/css" href="css/board.css" /> -->
  <link rel='stylesheet' type='text/css' href='/css/fullcalendar.css' />
  <link rel='stylesheet' type='text/css' href='/css/chat.css' />
<!--   <link rel='stylesheet' type='text/css' href='css/food.css' /> -->

  <!-- Script dependencies - jquery & bootstrap -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <script type='text/javascript'>
  $(function () {
    $('#nav_bar').load("/navigation.php #navigation_container");
    $('#left_side').load("/left_side.php #aside1");
    $('#article5').load("/weather.html #weather_section");
    $('#article4').load("/food.php #food_menu_template");
  });
  </script>

  <!-- 채팅창 -->
  <script type='text/javascript' src='/chat/chat.js'></script>
  <!-- 날씨 -->
  <script type='text/javascript' src='/js/weather.js'></script>
  <!-- 달력 -->
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-1.10.2.min.js'></script>
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/jquery/jquery-ui-1.10.3.custom.min.js'></script>
  <script type='text/javascript' src='http://arshaw.com/js/fullcalendar-1.6.3/fullcalendar/fullcalendar.min.js'></script>
  <script type='text/javascript' src='/js/calendar.js'></script>

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
  <!-- 공지사항 subsection 버전 -->
  <section id="subsection1">
    <article id="article1">
    <div class="inbox-head">
      <h3>Notice</h3>
      <span><a href="/notice/notice.php">more</a></span>
    </div>
    <div class="inbox-body" style="padding:0;">
      <table class="table table-inbox table-hover">
        <colgroup>
          <col style="width:25%;">
          <col style="width:50%;">
          <col style="width:25%;">
        </colgroup>
        <tbody>
          <?php
          $sql = 'select * from notice order by n_no desc';
          $result = mysqli_query($db, $sql);

          while ($row = $result->fetch_assoc()) {
            $datetime = explode(" ", $row['n_date']);
            $date = $datetime[0];
            $time = $datetime[1];

            if ($date == Date('Y-m-d')) {
              $row['n_date'] = $time;
            } else {
              $row['n_date'] = $date;
            }
            ?>
            <tr>
              <td class="view-message dont-show"><?php echo $row['user_prodID']?></td>
              <td class="view-massage">
                <?php
                $nNo = $row['n_no'];
                $view_url = '/notice/notice_view.php?nno='.$nNo;
                echo '<a href="'. $view_url . '">';
                echo $row['n_title'];
                echo '</a>';
                ?>
              </td>
              <td class="view-message text-right"><?php echo $row['n_date']?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
    </article>
    <!-- // 공지사항 subsection 버전 -->

    <!-- 뉴스 (네이버 뉴스 api) -->
    <article id="article2">
      <div class="inbox-head" style="background:#5bc0de;">
        <h3>News</h3>
        <span><a href="http://news.naver.com/">more</a></span>
      </div>
      <div class="inbox-body" style="padding:0;">
        <table class="table table-inbox table-hover">
        <colgroup>
          <col style="width:75%;">
          <col style="width:25%;">
        </colgroup>
          <tbody>
            <?php
            $client_id = "Nc5_d1WjNf8PzHCxyCqm";
            $client_secret = "D1arqHt0tf";
            $encText = urlencode("보안 기술");  // encodes this in utf-8
            $url = "https://openapi.naver.com/v1/search/news.xml?query=";
            $url .= $encText;
            $url .= "&sort=sim";
            $url .= "&display=15";
            $is_post = false;  // we are using GET request

            // cURL
            $ch = curl_init();
            // set options
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, $is_post);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            // add custom request headers
            $headers = array();
            $headers[] = "X-Naver-Client-Id: " .$client_id;
            $headers[] = "X-Naver-Client-Secret: " .$client_secret;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            // execute curl
            $response = curl_exec ($ch);
            $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close ($ch);

            // HTTP 요청 코드가 OK(200)가 아닐 경우 처리
            if ($status_code =! 200) {
              echo "<script>alert(\"뉴스 정보 불러오기 오류 : " .$status_code ."\")</script>";
            }

            // parse XML into separate items
            // channel은 결과를 포함하는 컨테이너, item은 개별 검색 결과
            $xml = simplexml_load_string($response) or die("xml Parse Error");
            $items = $xml->channel->item;
            if (!empty($items)) {
              foreach ($items as $item) {
                // 1: 날짜 2: 월 3: 연도 4: 시간
                $datetime = explode(' ', $item->pubDate);
                // 0: 시간 1: 분 2: 초
                $hour_min = explode(':', $datetime[4]);
                ?>
            <!-- foreach문 내부 -->
            <tr class="">
              <!-- 제목과 링크  -->
              <td class="view-message">
                <a href="<?= $item->link ?>">
                <?= $item->title ?>
                </a>
              </td>
              <!-- 날짜와 시간 -->
              <td class="view-message text-right">
                <?= $datetime[2] ." " .$datetime[1] .", " .$hour_min[0] .":" .$hour_min[1] ?>
              </td>
            </tr>
            <!-- foreach문 끝 -->
                <?php
              }
            }
             ?>
          </tbody>
        </table>
      </div>
    </article>
    <!-- // 뉴스 -->
  </section>
<!-- // 게시판 -->

<!-- 위젯 -->
  <section id="subsection2">
    <article id="article3">
      <div id="calendar" style="margin: 0; font-size: 13px; background-color:white;"></div>
    </article>

    <!-- 식단표 -->
    <article id="article4"></article>

    <!-- 날씨 -->
    <article id="article5"></arctile>

  </section>
</section>
<!-- //위젯 -->

<!-- 우측 chat -->
<aside id="aside2"></aside>

</body>
</html>
