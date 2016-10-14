<?php
  require_once("../dbconfig.php");
  $bNo = $_GET['nno'];

  $sql = 'SELECT n_title, n_text, n_date, n_hit, name FROM notice WHERE n_no = ' . $nNo;
  $result = $db->query($sql);
  $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>공지사항</title>
  <link rel="stylesheet" href="../css/board.css" />
</head>
<body>
  <article>
  <h3>자유게시판 글쓰기</h3>
  <div>
    <h4><?php echo $row['n_title']?></h4>
    <div id="content_info">
      <span class="thread_meta">작성자: <?php echo $row['name']?></span>
      <span class="thread_meta">작성일: <?php echo $row['n_date']?></span>
      <span class="thread_meta">조회: <?php echo $row['n_hit']?></span>
    </div>
    <div id="content_box"><?php echo $row['n_text']?></div>
  </div>
  </article>
  <div class="btnSet">
    <a class="button_href" href="./write.php?bno=<?php echo $nNo?>">수정</a>
    <a class="button_href" href="./delete.php?bno=<?php echo $nNo?>">삭제</a>
    <a class="button_href" href="./">list</a>
  </div>
</body>
</html>
