<?php
  require_once('../dbconfig.php');

  # only if 'bno' is set
  if (isset($_GET['nno'])) {
    $bNo = $_GET['nno'];
  }

  $sql = 'DELETE from notice WHERE n_no = ' . $nNo;
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
