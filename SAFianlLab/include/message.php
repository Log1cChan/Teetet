<?php
session_start();
include '../include/db.php';
$usr_id = $_SESSION['user'][$_SESSION['online']];
$message = $_POST['message'];
$sql = "INSERT INTO message VALUE('$usr_id', '$message')";
$conn->query($sql);
$sql = "SELECT * FROM message;";
$m = mysqli_query($conn, $sql);
if (mysqli_num_rows($m) > 0) {
    while ($row = mysqli_fetch_assoc($m)) {
        if ($row['usr_id'] == $usr_id) {
            echo "<p class='pull-right'>";
            echo "你说:&nbsp;&nbsp;";
            echo $row['message'];
            echo "</p>";
        } else {
            echo "<p>";
            echo $row['usr_id'];
            echo "说:&nbsp;&nbsp;";
            echo $row['message'];
            echo "</p>";
        }
    }
} else {
    echo "还没有人说话呢 快来做第一个说话的人!";
}
