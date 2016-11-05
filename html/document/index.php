<?php
// 로그인 세션이 정상적으로 시작되었는지 체크.
// 세션 없으면 로그인 페이지로 바로 접속함
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  echo "<script>alert(\" 어허! 로그인부터 하고오셈. \")</script>";
  echo "<script>window.location.replace(\" login/login.html \");</script>";
  exit;
}

// import database object
require_once("../dbconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Board</title>
    <link rel="stylesheet" href="../css/board.css" />
</head>

<body>
  <article class="boardArticle">
    <h3>Free Board</h3>
    <div id="table-container">
      <table>
        <caption class="readHide">자유게시판</caption>
        <thead>
          <tr>
            <!-- Header row -->
            <th scope="col" class="no">번호</th>
            <th scope="col" class="title"><a href>제목</a></th>
            <th scope="col" class="author">작성자</th>
            <th scope="col" class="date">작성일</th>
            <th scope="col" class="hit">조회</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $sql = 'select * from aboard order by a_no desc';
              $result = $db->query($sql);
              # loop until the end of query result's rows
              while($row = $result->fetch_assoc())
              {
                $datetime = explode(' ', $row['a_date']);
                $date = $datetime[0];
                $time = $datetime[1];
                if ($date == Date('Y-m-d'))
                  $row['a_date'] = $time;
                else
                  $row['a_date'] = $date;
              ?>
              <tr>
                <td class="no"><?php echo $row['a_no']?></td>
                <td class="title">
                  <?php
                  $bno = $row['a_no'];
                  $view_url = './view.php?bno=' . $bno;
                  echo '<a href="' . $view_url . '">';
                  ?>
                    <?php echo $row['a_title']?>
                    </a>
                </td>
                <td class="author"><?php echo $row['user_prodID']?></td>
                <td class="date"><?php echo $row['a_date']?></td>
                <td class="hit"><?php echo $row['a_hit']?></td>
              </tr>
              <?php
              }
            ?>
        </tbody>
      </table>
    </div>
    <div class="btnSet">
      <a class="button_href" href="./write.php">글쓰기</a>
    </div>
  </article>
</body>
</html>
