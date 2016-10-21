<?php
// connect to database
require_once("../dbconfig.php");

// retreive info
if (isset($_POST) == true && empty($_POST) == false) {
  $item = $_POST['item'];
  $size = $_POST['size'];
  $amount = $_POST['quantity'];
  $date = date('Y-m-d H:i:s');  # get current datetime
}

if (!$amount) {
  echo "<script>alert(\" 수량을 입력해주세요! \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

?>
<script>
  location.replace("./cafe_main.php");
</script>
