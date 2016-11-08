<?php
session_start();

$prodID = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
$pw = $_SESSION['user_pw'];

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  echo "<script>alert(\" 어허! 로그인부터 하고오셈. \")</script>";
  echo "<script>window.location.replace(\" login/login.html \");</script>";
  exit;
}

?>
