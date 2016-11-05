<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
  echo "<script>alert(\" 어허! 로그인부터 하고오셈. \")</script>";
  echo "<script>window.location.replace(\" login/login.html \");</script>";
  exit;
}
$prodID = $_SESSION['user_id'];

header('Content-type: text/html; charset=utf-8');
?>
