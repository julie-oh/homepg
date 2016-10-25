<?php
require_once("../dbconfig.php");

// retreive info
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$dep = $_POST['dep'];
$position = $_POST['position'];
$phoneNumber = $_POST['phoneNumber'];
$mail = $_POST['mail'];
$deskNumber = $_POST['deskNumber'];

if (!$id || !$password || !$dep || !$position || !$phoneNumber
    || !$mail || !$deskNumber || !$name) {
  echo "<script>alert(\" 회원 정보를 모두 입력해주세요 \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

$sql =
"INSERT INTO user
(prodID, name, dep, position, phoneNumber, deskNumber, mail, pwd)
VALUES
(" . $id . ", '" . $name . "', '" . $dep . "', '" . $position . "', '" . $phoneNumber . "'
, '" . $deskNumber . "', '" . $mail . "', password(" . $password . "))";
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
