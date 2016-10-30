<?php
require_once("../dbconfig.php");

// retreive info
$prodID = $_POST['prodID'];
$name = $_POST['name'];
$pwd = $_POST['pwd'];
$dep = $_POST['dep'];
$position = $_POST['position'];
$phoneNumber = $_POST['phoneNumber'];
$mail = $_POST['mail'];
$deskNumber = $_POST['deskNumber'];

if (!$prodID || !$pwd || !$dep || !$position || !$phoneNumber
    || !$mail || !$deskNumber || !$name) {
  echo "<script>alert(\" 회원 정보를 모두 입력해주세요 \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

$sql =
"INSERT INTO user
(prodID, name, dep, position, phoneNumber, deskNumber, mail, pwd)
VALUES
(" . $prodID . ", '" . $name . "', '" . $dep . "', '" . $position . "', '" . $phoneNumber . "'
, '" . $deskNumber . "', '" . $mail . "', password(" . $pwd . "))";
$result = $db->query($sql);

if (!$result) {
  echo "<script>alert(\" 회원가입 실패 \")</script>";
  echo "<script>history.back()</script>";
  exit;
} else {
  echo "<script>alert(\" 회원가입 성공\n 다시 로그인해주세요. \")</script>";
}

?>
<meta http-equiv='refresh' content='0;url=login.html'>
