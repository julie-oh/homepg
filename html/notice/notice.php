<?php
  require '../session.php';
  require '../dbconfig.php';

  date_default_timezone_set('Asia/Seoul');
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/main_page.css" />
  <!-- Script dependencies -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<!-- section -->
<section id="section1">
  <!-- 공지사항 게시판 -->
  <div class="notice">
    <div class="inbox-head">
      <h3>Notice</h3>
      <button class="buttons" type="button" onclick="location.href='notice_write.php'">write</button>
    </div>
    <div class="inbox-body" style="padding:0;">
      <table class="table table-inbox table-hover">
        <caption>공지사항 게시판</caption>
        <colgroup>
          <col style="width:10%;">
          <col style="width:50%;">
          <col style="width:15%;">
          <col style="width:15%;">
          <col style="width:10%;">
        </colgroup>
        <thead>
          <tr>
            <th>번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>작성일</th>
            <th>조회</th>
          </tr>
        </thead>
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
          <form action="notice_view.php" method="GET">
            <form action="notice_modify.php" method="GET">
              <tr>
                <td class=""><?php echo $row['n_no']?></td>
                <td class="view-massage">
                  <?php
                  $nNo = $row['n_no'];
                  $view_url = './notice_view.php?nno='.$nNo;
                  echo '<a href="'. $view_url . '">';
                  echo $row['n_title'];
                  echo '</a>';
                  ?>
                </td>
                <td class="view-message dont-show"><?php echo $row['user_prodID']?></td>
                <td class="view-message text-right"><?php echo $row['n_date']?></td>
                <td class=""><?php echo $row['n_hit']?></td>
              </tr>
            <?php
            }
            ?>
            </form>
          </form>
        </tbody>
      </table>
    </div>
    <div class="page">
      <ol>
        <li><a href="">◀</a></li>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li><a href="">5</a></li>
        <li><a href="">▶</a></li>
      </ol>
    </div>
  <!-- / /공지사항 게시판 -->
  </section>
<!-- // section -->
</body>
</html>
