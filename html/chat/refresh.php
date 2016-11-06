<?php
  session_start();
  require_once("chatClass.php");

  $id = $_SESSION['user_id'];
  if (!isset($id) || $id == "") {
    exit;
  }
  $chatroomID = intval($_GET['chatroomID']);
  $lastTimeID = intval($_GET['lastTimeID']);
  $jsonData = chatClass::getRestChatLines($id, $chatroomID, $lastTimeID);
  print $jsonData;
?>
