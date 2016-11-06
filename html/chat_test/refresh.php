<?php
  require_once("chatClass.php");
  $id = intval($_GET['userID']);
  $chatroomID = intval($_GET['chatroomID']);
  //$jsonData = chatClass::getRestChatLines($id, $chatroomID);
  $jsonData = chatClass::getRestChatLines(1, 3);
  print $jsonData;
?>
