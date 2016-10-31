<?php
  require_once("../dbconfig.php");

  session_start();
  if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
    echo "<script>alert(\" 세션이 없슴다. \")</script>";
    echo "<script>window.location.replace(\" login/login.html \");</script>";
    exit;
  }
  $prodID = $_SESSION['user_id'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cafe Order History</title>
  </head>
  <body>
    <!-- This is the previous history of your orders -->
    <div>
      <table>
        <caption>Order History</caption>
        <!-- table header -->
        <thead>
          <tr>
            <th scope="col">date</th>
            <th scope="col">item</th>
            <th scope="col">size</th>
            <th scope="col">price</th>
          </tr>
        </thead>
        <!-- table body -->
        <tbody>
          <?php
          $sql = "select * from cafe where user_prodID="
          . $prodID . " order by orderTime desc";
          $result = $db->query($sql);

          // loop and display all history
          while ($row = $result->fetch_assoc()) {
            $datetime = explode(' ', $row['orderTime']);
            $date = $datetime[0];  // display only the date
            $row['orderTime'] = $date;
          ?>
          <!-- insert table rows -->
          <tr>
            <td><?php echo $row['orderTime']; ?></td>
            <td><?php echo $row['history-menu']; ?></td>
            <td><?php echo $row['history-price']; ?></td>
          </tr>
          <?php
          } // while loop end
         ?>
        </tbody>
      </table>
      <button type="button" onclick="location.href='cafe_main.html'">
        주문하기
      </button>
    </div>
  </body>
</html>
