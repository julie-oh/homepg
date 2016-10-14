<?php
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
              $sql = 'select * from board_free order by b_no desc';
              $result = $db->query($sql);
              # loop until the end of query result's rows
              while($row = $result->fetch_assoc())
              {
                $datetime = explode(' ', $row['b_date']);
                $date = $datetime[0];
                $time = $datetime[1];
                if ($date == Date('Y-m-d'))
                  $row['b_date'] = $time;
                else
                  $row['b_date'] = $date;
              ?>
              <tr>
                <td class="no"><?php echo $row['b_no']?></td>
                <td class="title">
                  <?php
                  $bno = $row['b_no'];
                  $view_url = './view.php?bno=' . $bno;
                  echo '<a href="' . $view_url . '">';
                  ?>
                    <?php echo $row['b_title']?>
                    </a>
                </td>
                <td class="author"><?php echo $row['b_id']?></td>
                <td class="date"><?php echo $row['b_date']?></td>
                <td class="hit"><?php echo $row['b_hit']?></td>
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
