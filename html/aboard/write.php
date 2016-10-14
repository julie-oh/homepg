<?php
  require_once("../dbconfig.php");

  # only if 'bno' is set
  if (isset($_GET['nno'])) {
    $bNo = $_GET['nno'];
  }

  if (isset($bNo)) {
    $sql = 'SELECT n_title, n_text, n_date, n_hit, name FROM notice WHERE n_no = ' . $nNo;
    $result = $db->query($sql);
    $row = $result->fetch_assoc();
  }
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
    <h3>공지사항</h3>
    <div>
      <!-- Form that calls post method and adds filled info to db -->
      <form action="./write_update.php" method="post">
        <?php
          if (isset($nNo)) {
            echo '<input type="hidden", name="nno", value="' . $nNo . '">';
          }
        ?>
        <table>
          <caption class="readHide">Write</caption>
          <tbody>
            <tr>
              <th scope="row"><label for="bID">id</label></th>
              <td>
                <?php
                if (isset($nNo)) {
                  echo $row['n_id'];
                } else {
                ?>
                  <input type="text" name="nID" id="nID">
                <?php
                }
                ?>
              </td>
            </tr>
            <tr>
              <th scope="row"><label for="nPassword">passwd</label></th>
              <td><input type="text" name="nPassword" id="nPassword"></td>
            </tr>
            <tr>
              <th scope="row"><label for="nTitle">제목</label></th>
              <?php
              if (isset($nNo)) {
                echo '<td class="title"><input type="text" name="nTitle" id="nTitle" value="' . $row['n_title'] . '"></td>';
              } else {
               ?>
                <td class="title"><input type="text" name="nTitle" id="nTitle"></td>
              <?php
              }
              ?>
            </tr>
            <tr>
              <th scope="row"><label for="nContent">내용</label></th>
              <?php
              if (isset($bNo)) {
                echo '<td class="content"><textarea name="nContent" id="nContent" value="' . $row['n_content'] . '"></textarea></td>';
              } else {
               ?>
                <td class="content"><textarea name="nContent" id="nContent"></textarea></td>
              <?php
              }
              ?>
            </tr>
          </tbody>
        </table>
        <div class="btnSet">
          <button type="submit" class="button_href">
            <?php echo isset($nNo)?'수정':'작성'?>
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
