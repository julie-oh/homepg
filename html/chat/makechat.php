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

if ($senderID == $receiverID) {
  echo "<script>alert(\"자기 자신과 대화할 수 없습니다.\")</script>";
  exit;
}

// check whether the chatroom with other side already exists
$sql = "SELECT * FROM
(SELECT A.prodID as a_id, B.prodID as b_id, A.chatroomID
  FROM chatlist A INNER JOIN chatlist B ON A.chatroomID = B.chatroomID) chats
  WHERE a_id=" .$senderID ." AND b_id=" .$receiverID;
$result = $db->query($sql);
if (isset($result) || $result) {
  // if exists, no need to create
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
