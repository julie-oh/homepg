<?php
  require_once("../dbconfig.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Board</title>
    <link rel="stylesheet"
          href="../css/board.css" />
</head>

<body>
  <article class="boardArticle">
    <h3>Free Board</h3>
    <div id="table-container">
      <table>
        <caption class="readHide">공지사항</caption>
        <thead>
          <tr>
            <!-- Header row -->
            <th scope="col" class="no">번호</th>
            <th scope="col" class="title"><a href>제목</a></th>
            <th scope="col" class="date">작성일</th>
            <th scope="col" class="hit">조회</th>
          </tr>
        </thead>
        <tbody>
            <?php
              $sql = 'select * from notice order by n_no desc';
              $result = $db->query($sql);
              # loop until the end of query result's rows
              while($row = $result->fetch_assoc())
              {
                $datetime = explode(' ', $row['n_date']);
                $date = $datetime[0];
                $time = $datetime[1];
                if ($date == Date('Y-m-d'))
                  $row['n_date'] = $time;
                else
                  $row['n_date'] = $date;
              ?>
              <tr>
                <td class="no"><?php echo $row['n_no']?></td>
                <td class="title">
                  <?php
                  $nno = $row['n_no'];
                  $view_url = './view.php?nno=' . $nno;
                  echo '<a href="' . $view_url . '">';
                  ?>
                    <?php echo $row['n_title']?>
                    </a>
                </td>
                <td class="author"><?php echo $row['n_id']?></td>
                <td class="date"><?php echo $row['n_date']?></td>
                <td class="hit"><?php echo $row['n_hit']?></td>
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
