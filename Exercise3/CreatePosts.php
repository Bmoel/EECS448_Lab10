<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b627m733", "dax3iR9s", "b627m733");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user_name = $_POST["user_name"];
$user_post = $_POST["user_post"];

$user_exists = 0;
$query = "SELECT `user_id` FROM `Users` WHERE user_id='$user_name'";
$stmt = $mysqli->query($query);
if($stmt->num_rows > 0) {
    $user_exists = 1;
}

if($user_post == "" ) {
    echo "A post is required, please enter one and try again <br> <br>";
}
elseif($user_exists == 0) {
    echo "User doesn't exist, please try again <br> <br>";
}
else {
    $instr = "INSERT INTO Posts (author_id,content)
    VALUES ('$user_name','$user_post')";
    $mysqli->query($instr);
    echo "Post was published in the table! <br> <br>";
}

readfile("CreatePosts.html");
$mysqli->close();
?>