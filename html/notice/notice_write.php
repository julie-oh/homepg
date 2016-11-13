<?php
  include '../session.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
  <title>Korea Security Company | 공지사항 글쓰기</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/main_page.css" />
  <!-- Script dependencies -->
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>

<!-- section -->
<section id="section1">
  <!-- 공지사항 게시판 글쓰기 -->
  <div class="notice">
    <div class="inbox-head">
      <h3>Notice_write</h3>
    </div>
    <div class="document_form">
      <table>
        <caption>공지사항 게시판 글쓰기</caption>
        <colgroup>
          <col style="width:25%;">
          <col style="width:75%;">
        </colgroup>
        <tbody>
          <form action="notice_write2.php" method="POST">
            <tr>
              <td class="head">사원 이름</td><td><?php echo $_SESSION['user_name']?></td>
            </tr>
            <tr>
              <td class="head">Password</td><td><input type="password" name="writePW" placeholder="사원의 비밀번호를 입력하세요"/></td>
            </tr>
            <tr>
              <td class="head">제목</td><td><input type="text" class="title" placeholder="제목을 입력하세요" name="n_title" /></td>
            </tr>
            <tr>
              <td class="head">첨부파일</td><td><input type="file" /></td>
            </tr>
            <tr>
              <td colspan="2" class="head" >내용</td>
            </tr>
            <tr>
              <td colspan="2"><textarea placeholder="내용을 입력하세요" name="n_text" ></textarea></td>
            </tr>
            <input class="buttons" type="submit" name="notice_b" value="register"></input>
          </form>
        </tbody>
      </table>
    </div>
  </div>
  <!-- / /공지사항 게시판 -->
</section>
<!-- // section -->

</body>
</html>
