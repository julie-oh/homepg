<?php

// create connection
$con = mysqli_connect('localhost', 'root', '1221', 'test', '3306');

// validate connection
if (!$con) {
  echo "ERROR : Unable to connect to MYSQL." . PHP_EOL;
} else {
  echo "Database connected successfully";
}

$id = $_POST['id'];
$passwd = $_POST['passwd'];

if (!$id or !$passwd) {
  echo "<script>alert(\" insert both id and password! '$id', '$passwd' \");</script>";
  echo "<script>history.back();</script>";
  exit;
}

$sql = "INSERT INTO usertbl (id, password)
VALUES ('$id', '$passwd')";

// see if the data has been inserted properly
if ($con->query($sql) == TRUE) {
  echo "New record created successfully";
}

$con->close();
?>

