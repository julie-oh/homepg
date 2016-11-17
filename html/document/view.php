<?php

  if(isset($_POST["submitFinsh"])){
      if (isset($_POST["dTitle"])=="" || isset($_POST["dText"])==""){
        echo "<script>alert(\"작성칸 모두 작성해 주세요\n 결재는 장난이 아닙니다\")</script>";
      }
  }
die();
  require_once("../dbconfig.php");
  $bNo = $_GET['bno'];

  $sql = 'SELECT a_title, a_text, a_date, a_hit, user_prodID FROM aboard WHERE a_no = ' . $bNo;
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
    <h4><?php echo $row['a_title']?></h4>
    <div id="content_info">
      <span class="thread_meta">작성자: <?php echo $row['user_prodID']?></span>
      <span class="thread_meta">작성일: <?php echo $row['a_date']?></span>
      <span class="thread_meta">조회: <?php echo $row['a_hit']?></span>
    </div>
    <div id="content_box"><?php echo $row['a_text']?></div>
  </div>
  </article>
  <div class="btnSet">
    <a class="button_href" href="./write.php?bno=<?php echo $bNo?>">modify</a>
    <a class="button_href" href="./delete.php?bno=<?php echo $bNo?>">delete</a>
    <a class="button_href" href="./">list</a>
  </div>
</body>
</html>
