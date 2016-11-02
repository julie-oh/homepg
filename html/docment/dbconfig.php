<?php
  # database configuration -
  # the entire app will not work if not connected to database
  $db = new mysqli('localhost', 'root', '1221', 'homepg');

  if ($db->connect_error) {
    die('problem with database connection');
  }

  $db->set_charset('utf-8');
?>
