<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b627m733", "dax3iR9s", "b627m733");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT `post_id` FROM `Posts`";
$result = $mysqli->query($query);

$something_delted = 0;
while($row = $result->fetch_array()) {
    if($_POST[$row['post_id']] == 'on') {
            $val = $row['post_id'];
            $query = "DELETE FROM `Posts` WHERE `post_id`='$val'";
            $mysqli->query($query);
            echo "The post with the id '" . $row['post_id'] . "' was deleted <br> <br>";
            $something_delted = 1;
    }
}
if($something_delted == 0) {
    echo "Nothing was deleted";
}
echo "<br> <br>";
$mysqli->close();
?>