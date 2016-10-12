<?php
  require_once("../dbconfig.php");

  # only if 'bno' is set
  if (isset($_GET['bno'])) {
    $bNo = $_GET['bno'];
  }

  if (isset($bNo)) {
    $sql = 'SELECT b_title, b_content, b_date, b_hit, b_id FROM board_free WHERE b_no = ' . $bNo;
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title>자유게시판 글쓰기</title>
  <link rel="stylesheet" href="../css/board.css" />
</head>
<body>
  <article>
    <h3>자유게시판 글쓰기</h3>
    <div>
      <!-- Form that calls post method and adds filled info to db -->
      <form action="./write_update.php" method="post">
        <?php
          if (isset($bNo)) {
            echo '<input type="hidden", name="bno", value="' . $bNo . '">';
          }
        ?>
        <table>
          <caption class="readHide">Write</caption>
          <tbody>
            <tr>
              <th scope="row"><label for="bID">id</label></th>
              <td>
                <?php
                if (isset($bNo)) {
                  echo $row['b_id'];
                } else {
                ?>
                  <input type="text" name="bID" id="bID">
                <?php
                }
                ?>
              </td>
            </tr>
            <tr>
              <th scope="row"><label for="bPassword">passwd</label></th>
              <td><input type="text" name="bPassword" id="bPassword"></td>
            </tr>
            <tr>
              <th scope="row"><label for="bTitle">제목</label></th>
              <?php
              if (isset($bNo)) {
                echo '<td class="title"><input type="text" name="bTitle" id="bTitle" value="' . $row['b_title'] . '"></td>';
              } else {
               ?>
                <td class="title"><input type="text" name="bTitle" id="bTitle"></td>
              <?php
              }
              ?>
            </tr>
            <tr>
              <th scope="row"><label for="bContent">내용</label></th>
              <?php
              if (isset($bNo)) {
                echo '<td class="content"><textarea name="bContent" id="bContent" value="' . $row['b_content'] . '"></textarea></td>';
              } else {
               ?>
                <td class="content"><textarea name="bContent" id="bContent"></textarea></td>
              <?php
              }
              ?>
            </tr>
          </tbody>
        </table>
        <div class="btnSet">
          <button type="submit" class="button_href">
            <?php echo isset($bNo)?'수정':'작성'?>
          </button>
          <div class="button_href">
            <a href="index.php">List</a>
          </div>
        </div>
      </form>
    </div>
  </article>
</body>
</html>
