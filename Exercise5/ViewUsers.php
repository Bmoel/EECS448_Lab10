<?php
$mysqli = new mysqli("mysql.eecs.ku.edu", "b627m733", "dax3iR9s", "b627m733");

if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT `user_id` FROM `Users`";
$stmt = $mysqli->query($query);
$user_arr = array();
while($row = $stmt->fetch_assoc()) {
    array_push($user_arr,$row["user_id"]);
}

echo "<table border='1' style='font-size:20pt'>";
    for($i = -1; $i < count($user_arr); $i++) {
        if($i == -1) {
            echo "<tr> <td> <b> Usernames </b> </td> </tr>";
        } else {
            echo "<tr>";
            echo "<td>" . $user_arr[$i] . "</td>";
            echo "</tr>";
        }
    }
echo "</table>";
$mysqli.close();
?>