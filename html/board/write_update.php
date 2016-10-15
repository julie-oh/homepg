<?php
  require_once("../dbconfig.php");

  # receive the POST from write.php (hidden variable 'bno')
  if (isset($_POST['bno'])) {
    $bNo = $_POST['bno'];
  }

  # get the data
  $bID = $_POST['bID'];
  $bPassword = $_POST['bPassword'];
  $bTitle = $_POST['bTitle'];
  $bContent = $_POST['bContent'];
  $date = date('Y-m-d H:i:s');  # get current datetime

  # modifying
  if (isset($bNo)) {
    $query = 'SELECT count(a_password) AS result FROM aboard WHERE a_password=password("'
    . $bPassword . '") and a_no = ' . $bNo;
    $result = $db->query($query);
    $row = $result->fetch_assoc();  # get a single row = if any exists!

    if ($row['result']) {
      $query = 'update board_free set a_title="' . $bTitle . '", a_text"'
      . $bContent . '" where a_no = ' . $bNo;
    } else {
      ?>
      <script>
        alert("<?php echo 'Wrong password!' ?>");
        history.back();
      </script>
    <?php
    exit;
    }
  } else {  # write
    $sql = 'INSERT INTO aboard
    (a_no, a_title, a_text, a_date, a_hit, user_prodID, a_password)
    VALUES
    (null, "' . $bTitle . '", "' . $bContent . '", "'
     . $date . '", 0, ' . $bID . ', password("' . $bPassword . '"))';

    # check for results
    $result = $db->query($sql);
    if($result) {
      $bNo = $db->insert_id;
      $replaceURL = './view.php?bno=' . $bNo;
    } else {
      ?>
      <script>
        alert("post failed");
      </script>
      <?php
      exit;
    }
  }
?>
<script>
  alert("post successful");
  location.replace("<?php echo $replaceURL?>");
</script>
