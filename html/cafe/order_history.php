<?php
  require_once '../dbconfig.php';
  require_once '../session.php';

  date_default_timezone_set('Asia/Seoul');
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Korea Security Company | 카페주문내역</title>
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

<section id="section1">
  <div class="cafe_menu">
    <div class="cafe_header">
      <h1>Order_history</h1>
    </div>
    <div class="cafe_body">
      <div class="area">
        <table>
          <caption>Order History</caption>
          <!-- table header -->
          <thead>
            <tr>
              <th scope="col">menu</th>
              <th scope="col">size</th>
              <th scope="col">status</th>
              <th scope="col">quantity</th>
              <th scope="col">price</th>
              <th scope="col">date</th>
            </tr>
          </thead>
          <!-- table body -->
          <tbody>
            <?php
            $sql = "select * from cafe where user_prodID="
            . $prodID . " order by orderTime desc";
            $result = $db->query($sql);

            // loop and display all history
            while ($row = $result->fetch_assoc()) {
              $datetime = explode(' ', $row['orderTime']);
              $date = $datetime[0];  // display only the date
              $row['orderTime'] = $date;
            ?>
            <!-- insert table rows -->
            <tr>
              <td><?php echo $row['history-menu']; ?></td>
              <td>large</td>
              <td>완료</td>
              <td>1</td>
              <td><?php echo $row['history-price']; ?></td>
              <td><?php echo $row['orderTime']; ?></td>
            </tr>
            <?php
            } // while loop end
           ?>
          </tbody>
        </table>

        <div class="button-container">
          <button type="button" class="buttons" onclick="location.href='cafe_main.html'">
            주문하기
          </button>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- 우측 chat -->
<aside id="aside2"></aside>
<!-- // chat -->
</body>
</html>
