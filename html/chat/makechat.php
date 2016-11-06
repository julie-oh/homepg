<?php
date_default_timezone_set('Asia/Seoul');
session_start();
require_once("../dbconfig.php");
$senderID = $_SESSION['user_id'];
$receiverID = intval($_GET['receiver']);

// Check if any of the input spaces are empty.
if (!isset($senderID) || $senderID == "" || !isset($receiverID) || $receiverID == "") {
  echo "<script>alert(\"Wrong input\")</script>";
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

$date = date('Y-m-d H:i:s');  # get current datetime
// insert sender's ID into chatlist
$sql = "insert into chatlist values (null, " . $senderID . ", " . $chatroomID . ", '" . $date . "')";
$db->query($sql);

// insert receiver's ID into chatlist
$sql = "insert into chatlist values (null, " . $receiverID . ", " . $chatroomID . ", '" . $date . "')";
$db->query($sql);

$db->close();
 ?>
