<?php
header('Content-type text/html; charset=utf-8');
// get database
require_once('../dbconfig.php');

if (!isset($_POST['prodID']) || !isset($_POST['password'])) {
  echo "<script>alert(\" ID 와 비밀번호를 모두 입력해주세요 \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

$prodID = $_POST['prodID'];
$pwd = $_POST['pwd'];

$sql = "SELECT * FROM user WHERE prodID=" . $id . " AND pwd=password(" . $passwd . ")";

$result = $db->query($sql);

if (!$result || mysqli_num_rows($result) == 0) {
  echo "<script>alert(\" 로그인 정보가 틀렸습니다 \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

$row = $result->fetch_assoc();

// start the session with retreived login information
session_start();
$_SESSION['user_id'] = $row['prodID'];
$_SESSION['user_name'] = $row['name'];

?>
<meta http-equiv='refresh' content='0;url=./../main_page.php'>