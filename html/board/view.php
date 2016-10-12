<?php
  require_once("../dbconfig.php");
  $bNo = $_GET['bno'];

  $sql = 'SELECT b_title, b_content, b_date, b_hit, b_id FROM board_free WHERE b_no = ' . $bNo;
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>Board</title>
  <link rel="stylesheet" href="../css/board.css" />
</head>
<body>
  <article>
  <h3>자유게시판 글쓰기</h3>
  <div>
    <h4><?php echo $row['b_title']?></h4>
    <div id="content_info">
      <span class="thread_meta">작성자: <?php echo $row['b_id']?></span>
      <span class="thread_meta">작성일: <?php echo $row['b_date']?></span>
      <span class="thread_meta">조회: <?php echo $row['b_hit']?></span>
    </div>
    <div id="content_box"><?php echo $row['b_content']?></div>
  </div>
  </article>
  <div class="btnSet">
    <a class="button_href" href="./write.php?bno=<?php echo $bNo?>">modify</a>
    <a class="button_href" href="./delete.php">delete</a>
    <a class="button_href" href="./">list</a>
  </div>
</body>
</html>
