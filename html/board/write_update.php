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
    $query = 'SELECT count(b_password) AS result FROM board_free WHERE b_password=password("'
    . $bPassword . '") and b_no = ' . $bNo;
    $result = $db->query($query);
    $row = $result->fetch_assoc();  # get a single row = if any exists!

    if ($row['result']) {
      $query = 'update board_free set b_title="' . $bTitle . '", b_content="'
      . $bContent . '" where b_no = ' . $bNo;
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
    $sql = 'INSERT INTO board_free
    (b_no, b_title, b_content, b_date, b_hit, b_id, b_password)
    VALUES
    (null, "' . $bTitle . '", "' . $bContent . '", "'
     . $date . '", 0, "' . $bID . '", password("' . $bPassword . '"))';

    # check for results
    $result = $db->query($sql);
    if($result) {
      $bNo = $db->insert_id;
      $replaceURL = './view.php?bno=' . $bNo;
    } else {
      ?>
      <script>
        alert("post failed");
        history.back();
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
