<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b627m733", "dax3iR9s", "b627m733");

if ($mysqli->connect_errno) {
  printf("Connect failed: %s\n", $mysqli->connect_error);
  exit();
}

$user_value = $_POST["user_id"];

$in_table = 0;
$query = "SELECT `user_id` FROM `Users` WHERE user_id='$user_value'";
$stmt = $mysqli->query($query);
if($stmt->num_rows > 0) {
  $in_table = 1;
}

if($user_value == "") {
  echo "You need to enter a value, blank value not submitted <br><br>";
}
elseif ($in_table == 1) {
  echo "That value is already in the table, try again pls <br><br>";
}
else {
  $instr = "INSERT INTO Users (user_id) 
  VALUES ('" . $user_value . "')";
  $mysqli->query($instr);
  $instr = "SELECT user_id FROM Users";
  $result = $mysqli->query($instr);
  echo "Value was entered into the table!<br><br>";
}

readfile("CreateUser.html");
$mysqli->close();
?>
