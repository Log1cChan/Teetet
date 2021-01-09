<?php
    include '../include/db.php';
    $usr_id = $_POST['usr_id'];
    $usr_name = $_POST['usr_name'];
    $psw = $_POST['psw'];
    $sql = "SELECT * FROM usr_info WHERE usr_id='$usr_id'";
    $check_query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($check_query) > 0){
        echo "<script>alert('UserID has been USED!')</script>";
    }else{
        echo "Rigist Successfully!<br>";
        $sql = "INSERT INTO usr_info VALUE('$usr_id', '$usr_name', '$psw')";
        mysqli_query($conn, $sql);
        echo "<a href='../pages/login.php'>前往登陆</a>";
    }
?>