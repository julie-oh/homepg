<?php
  require_once('../dbconfig.php');

  # only if 'bno' is set
  if (isset($_GET['bno'])) {
    $bNo = $_GET['bno'];
  }

  $sql = 'DELETE from board_free WHERE b_no = ' . $bNo;
  $result = $db->query($sql);

    $result = $db->query($sql);
    if($result) {
    ?>
      <script>
        alert("delete successful");
      </script>
    <?php
    } else {
      ?>
      <script>
        alert("delete failed");
      </script>
      <?php
    }
 ?>
<script>
  location.replace("./index.php");
</script>
