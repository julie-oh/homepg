<?php
// get database
require_once('../dbconfig.php');

if (!isset($_POST['id']) || !isset($_POST['password'])) {
  echo "<script>alert(\" ID 와 비밀번호를 모두 입력해주세요 \")</script>";
  echo "<script>history.back()</script>";
  exit;
}

$id = $_POST['id'];
$passwd = $_POST['password'];

$sql = "SELECT * FROM user WHERE prodID=" . $id . " AND password=password(" . $passwd . ")";
$result = $db->query($sql);

if (!$result) {
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
