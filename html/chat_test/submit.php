<?php
  session_start();
  require_once("chatClass.php");

  $chattext = htmlspecialchars( $_GET['chattext'] );
  $senderID = $_GET['userID'];
  $chatroomID = $_GET['chatroomID'];
  chatClass::setChatLines($chattext, $senderID, $chatroomID);
?>
