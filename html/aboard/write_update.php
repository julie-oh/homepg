<?php
  require_once("../dbconfig.php");

  # receive the POST from write.php (hidden variable 'bno')
  if (isset($_POST['nno'])) {
    $bNo = $_POST['nno'];
  }

  # get the data
  $name = $_POST['name'];
  $nPassword = $_POST['nPassword'];
  $n_title = $_POST['n_title'];
  $n_text = $_POST['n_text'];
  $date = date('Y-m-d H:i:s');  # get current datetime

  # modifying
  if (isset($nNo)) {
    $query = 'SELECT count(n_password) AS result FROM notice WHERE n_password=password("'
    . $nPassword . '") and n_no = ' . $nNo;
    $result = $db->query($query);
    $row = $result->fetch_assoc();  # get a single row = if any exists!

    if ($row['result']) {
      $query = 'update notice set n_title="' . $bTitle . '", n_text="'
      . $nText . '" where n_no = ' . $nNo;
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
    $sql = 'INSERT INTO notice
    (n_no, n_title, n_text, n_date, n_hit, name, n_password)
    VALUES
    (null, "' . $nTitle . '", "' . $nText . '", "'
     . $date . '", 0, "' . $name . '", password("' . $nPassword . '"))';

    # check for results
    $result = $db->query($sql);
    if($result) {
      $nNo = $db->insert_id;
      $replaceURL = './view.php?nno=' . $nNo;
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
