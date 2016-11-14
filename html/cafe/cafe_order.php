<?php
header('Content-type text/html; charset=utf-8');
// connect to database
require_once '../dbconfig.php';
require_once '../session.php';

date_default_timezone_set('Asia/Seoul');

// retreive info
if (isset($_POST) == true && empty($_POST) == false) {
  $item = $_POST['item'];
  $size = $_POST['size'];
  $amount = $_POST['quantity'];
  $date = date('Y-m-d H:i:s');  # get current datetime
}
$price = 4000;

if (!$amount) {
  echo "<script>alert(\" 수량을 꼭 입력해주세요! \")</script>";
  echo "<script>history.back()</script>";
  exit;
} else {
  $cafequery = "select * from user where prodID=" . $prodID;
  $caferesult = mysqli_query($db, $cafequery);
}

// insert the order information
if(mysqli_num_rows($caferesult) == 1){
  $query =
  "INSERT INTO cafe VALUES
  ('" . $item . "', '" . $price . "', " . $prodID . ", " . $prodID . ", '" . $date . "')";
  $result = $db->query($query);
  echo "<script>alert(\"주문이 완료되었습니다 ^^ 소요시간은 10분입니다.\")</script>";
} else if(mysqli_num_rows($result)==0) {
  echo "<script>alert(\" 주문 실패하셨습니다! 다시 시도해주세요 ^^\")</script>";
}

?>
<script>
  location.replace("./cafe_main.html");
</script>
