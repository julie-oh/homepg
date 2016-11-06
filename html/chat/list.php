<?php
  session_start();
  require_once("chatClass.php");

  $id = $_SESSION['user_id'];
  if (!isset($id) || $id == "") {
    exit;
  }
  
  $jsonData = chatClass::getChatList($id);
  print $jsonData;
 ?>
