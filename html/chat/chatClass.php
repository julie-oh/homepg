<?php
  date_default_timezone_set('Asia/Seoul');

  class chatClass
  {
    // Gets the chatting list where current user is participating in.
    public static function getChatList($id) {
      require_once("../dbconfig.php");
      $arr = array();
      $jsonData = '{"results":[';

      $db->query("SET NAMES 'UTF8'");
      $statement = $db->prepare(
      "SELECT * FROM chatlist
        WHERE prodID=? order by last_active desc");
      $statement->bind_param('i', $id);
      $statement->execute();
      $statement->bind_result($regID, $id, $chatroomID, $last_active);

      $line = new stdClass;
      while ($statement->fetch()) {
        $active_datetime = explode(' ', $last_active);
        if ($active_datetime[0] != Date('Y-m-d')) {
          $last_active = $active_datetime[0];
        } else {
          $last_active = $active_datetime[1];
        }
        $line->regID = $regID;
        $line->id = $id;
        $line->chatroomID = $chatroomID;
        $line->last_active = $last_active;
        $arr[] = json_encode($line);  // encode the row into json format
      }
      $statement->close();
      $db->close();

      $jsonData .= implode(",", $arr);
      $jsonData .= ']}';
      return $jsonData;
    }

    // Look up the conversations from the database and add only
    // not yet displayed items.
    public static function getRestChatLines($id, $chatroomID, $lastTimeID)
    {
      require_once("../dbconfig.php");
      $arr = array();
      $jsonData = '{"results":[';

      $db->query("SET NAMES 'UTF8'");
      // get undisplayed conversation from the last 1 hour
      $statement = $db->prepare(
      "SELECT * FROM chat
        WHERE chatroomID=? AND chatID > ? AND
        time >= DATE_SUB(NOW(), INTERVAL 10 HOUR)");
      $statement->bind_param('ii', $chatroomID, $lastTimeID);
      $statement->execute();
      $statement->bind_result($sender, $chattext, $chattime, $chatroomID, $chatID);

      $line = new stdClass;
      while ($statement->fetch()) {
        // see if sender equals the user's id
        if ($sender == $id) {
          $isSender = True;
        } else {
          $isSender = False;
        }
        $line->isSender = $isSender;
        $line->sender = $sender;
        $line->chatID = $chatID;
        $line->chatroomID = $chatroomID;
        $line->chattext = $chattext;
        $line->chattime = date('H:i:s', strtotime($chattime));
        $arr[] = json_encode($line);  // encode the row into json format
      }
      $statement->close();
      $db->close();

      // make it into JSON format
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
