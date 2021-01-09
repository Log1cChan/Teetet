<?php
session_start();
    include '../include/db.php';
    $usr_id = $_SESSION['user'][$_SESSION['online']];
    $sql = "UPDATE usr_info SET iflog=0 WHERE usr_id='$usr_id';";
    $conn->query($sql);
    echo "<script>window.location='../pages/login.php'</script>";
?>