<?php
  session_start();
  require_once("chatClass.php");

  $chattext = htmlspecialchars( $_GET['chattext'] );
  $senderID = $_SESSION['user_id'];
  $chatroomID = $_GET['chatroomID'];
  chatClass::setChatLines($chattext, $senderID, $chatroomID);
?>
