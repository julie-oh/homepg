<?php
header('Content-type text/html; charset=utf-8');
// session_start();
// session_destroy();
// get database
require_once('../dbconfig.php');

// if (!isset($_POST['prodID']) || !isset($_POST['pwd'])) {
//   echo "<script>alert(\" ID 와 비밀번호를 모두 입력해주세요 \")</script>";
//   echo "<script>history.back()</script>";
//   exit;
// }

$prodID = $_POST['prodID'];
$pwd = $_POST['pwd'];

  if ($prodID == "") {
    echo "<script>alert(\"아이디를 입력해주세요\")</script>";
    echo "<script>history.back()</script>";
    exit;
  } else if ($pwd == "") {
    echo "<script>alert(\"비밀번호를 입력해주세요\")</script>";
    echo "<script>history.back()</script>";
    exit;
  }

$sql = "SELECT * FROM user WHERE prodID=" . $prodID . " AND pwd=" .$pwd. "";
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
$_SESSION['user_pw'] = $row['pwd'];

?>
<meta http-equiv='refresh' content='0;url=../main_page.php'>
