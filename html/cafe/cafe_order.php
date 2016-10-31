<?php
// connect to database
require_once("../dbconfig.php");
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  echo "<script>alert(\" 세션이 없슴다. \")</script>";
  echo "<script>window.location.replace(\" login/login.html \");</script>";
  exit;
}
$prodID = $_SESSION['user_id'];

// retreive info
if (isset($_POST) == true && empty($_POST) == false) {
  $item = $_POST['item'];
  $size = $_POST['size'];
  $amount = $_POST['quantity'];
  $date = date('Y-m-d H:i:s');  # get current datetime
}
$price = 4000;

if (!$amount) {
  echo "<script>alert(\" 수량을 입력해주세요! \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

// insert the order information
$query =
"INSERT INTO cafe VALUES
('" . $item . "', '" . $price . "', " . $prodID . ", " . $prodID . ", '" . $date . "')";

$result = $db->query($query);

if (!$result) {
  echo "<script>alert(\" 주문 실패! \")</script>";
}

?>
<script>
  location.replace("./cafe_main.html");
</script>
