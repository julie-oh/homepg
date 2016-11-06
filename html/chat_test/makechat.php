<?php
require_once("../dbconfig.php");
$senderID = $_POST['sender'];
$receiverID = $_POST['receiver'];

// Check if any of the input spaces are empty.
if (!isset($senderID) || $senderID == "" || !isset($receiverID) || $receiverID == "") {
  echo "<script>alert(\"Wrong input\")</script>";
  echo "<script>history.back()</script>";
  exit;
}

// create a new chatroom
$sql = "insert into chatroom values (null)";
$db->query($sql);

// get the chatroom ID
$sql = "select max(chatroomID) from chatroom";
$result = $db->query($sql);
$row = $result->fetch_assoc();
$chatroomID = $row['max(chatroomID)'];

// insert sender's ID into chatlist
$sql = "insert into chatlist values (null, " . $senderID . ", " . $chatroomID . ")";
$db->query($sql);

// insert receiver's ID into chatlist
$sql = "insert into chatlist values (null, " . $receiverID . ", " . $chatroomID . ")";
$db->query($sql);

$db->close();
 ?>
