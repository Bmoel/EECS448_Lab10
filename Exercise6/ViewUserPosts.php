<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b627m733", "dax3iR9s", "b627m733");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user = $_POST["user"];

$query = "SELECT `content` FROM `Posts` WHERE `author_id`='$user'";
$result = $mysqli->query($query);
$post_arr = array();
while($row = $result->fetch_assoc()) {
    array_push($post_arr,$row["content"]);
}

echo "<table border='1' style='font-size:20pt'>";
    for($i = -1; $i < count($post_arr); $i++) {
        if($i == -1) {
            echo "<tr> <td> <b>" . $user . "'s Posts </b> </td> </tr>";
        } else {
            echo "<tr>";
            echo "<td>" . $post_arr[$i] . "</td>";
            echo "</tr>";
        }
    }
echo "</table>";
$mysqli->close();
?>