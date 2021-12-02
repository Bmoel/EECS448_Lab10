<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b627m733", "dax3iR9s", "b627m733");

if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}
$user_value = $_POST["user_id"];

if($user_value == "") {
  echo "You need to enter a value, blank value not submitted <br><br>";
}
readfile("CreateUser.html");
 ?>
