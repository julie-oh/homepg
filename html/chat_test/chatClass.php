<?php
  date_default_timezone_set('Asia/Seoul');

  class chatClass
  {
    public static function getRestChatLines($id, $chatroomID)
    {
      require_once("../dbconfig.php");
      $arr = array();
      $jsonData = '{"results":[';
      $id = 1;
      $chatroomId = 3;

      $db->query("SET NAMES 'UTF8'");
      $statement = $db->prepare(
      "SELECT * FROM chat
        WHERE chatroomID=? and time >= DATE_SUB(NOW(), INTERVAL 10 HOUR)");
      $statement->bind_param('i', $chatroomID);
      $statement->execute();
      $statement->bind_result($sender, $chattext, $chattime, $chatroomID, $chatID);

      $line = new stdClass;
      while ($statement->fetch()) {
        $line->sender = $sender;
        $line->chatID = $chatID;
        $line->chatroomID = $chatroomID;
        $line->chattext = $chattext;
        $line->chattime = date('H:i:s', strtotime($chattime));
        $arr[] = json_encode($line);  // encode the row into json format
      }
      $statement->close();
      $db->close();

      $jsonData .= implode(",", $arr);
      $jsonData .= ']}';
      return $jsonData;
    }

    // inserts the chat text into the database
    public static function setChatLines($chattext, $usrname, $chatroomID) {
      require_once("../dbconfig.php");
      $date = date('Y-m-d H:i:s');  # get current datetime
      $db->query("SET NAMES 'UTF8'");
      $statement = $db->prepare(
      "INSERT INTO chat VALUES (?, ?, ?, ?, null)");
      $statement->bind_param('issi', $usrname, $chattext, $date, $chatroomID);
      $statement->execute();
      $statement->close();
      $db->close();
    }
  }
?>
