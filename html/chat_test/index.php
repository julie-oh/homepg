<?php

require_once("../dbconfig.php");
$user_id = 1;

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Chat Room Test</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js" ></script>
    <script src="chat.js"></script>
    <link rel="stylesheet" href="chat.css" />
  </head>
  <body>
    <div class="" id="chatListBox">
      <form class="" action="makechat.php" method="post">
        <input type="text" name="sender" value="" placeholder="sender">
        <input type="text" name="receiver" value="" placeholder="receiver">
        <button type="submit" name="makeChat">make chat room</button>
      </form>
      <div class="chatList">
        <h2>myChatList</h2>
        <table>
          <thead>
            <tr>
              <th>Chatroom ID</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "select * from chatlist where prodID=" . $user_id;
            $result = $db->query($sql);

            while ($row = $result->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $row['chatroomID']; ?></td>
              </tr>
              <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div id="view_ajax"></div>
    <div id="ajaxForm">
      <input type="text" id="chatInput" placeholder="chat..." />
      <input type="number" id="userID" placeholder="id" />
      <input type="number" id="chatroomID" placeholder="chatroom ID" />
      <input type="button" value="Send" id="btnSend" />
    </div>
  </body>
</html>
