<?php
session_start();
include 'dbconfig.php';

$prodID = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
$pw = $_SESSION['user_pw'];
$dep = $_SESSION['user_dep'];

$query = "SELECT * FROM user WHERE prodID=".$_SESSION['user_id']."";
$result = $db->query($query);
$row = $result->fetch_assoc();
$user_name = $row['name'];
$user_id = $row['prodID'];
$user_dep = $row['dep'];

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  echo "<script>alert(\" 어허! 로그인부터 하고오셈. \")</script>";
  echo "<script>window.location.replace(\" login/login.html \");</script>";
  exit;
}

?>
