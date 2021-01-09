<?php
session_start();
    include '../include/db.php';
    $usr_id = $_POST['usr_id'];
    $psw = $_POST['psw'];
    $sql = "SELECT * FROM usr_info WHERE usr_id='$usr_id';";
    $check_query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($check_query) > 0){
        $row = mysqli_fetch_assoc($check_query);
        if($psw == $row['psw']){
            $_SESSION['iflog'] = 1;
            $_SESSION['user'][$_SESSION['online']+=1] = $row['usr_id'];
            $sql = "UPDATE usr_info SET iflog=1 WHERE usr_id='$usr_id';";
            $conn->query($sql);
            echo "<script>window.location='main.php'</script>";
        }else{
            echo "Wrong Password!";
        }
    }else{
        echo "No such a USERID!";
    }
//     $row = mysqli_fetch_assoc($check_query);
//     $usrname = $row['usr_name'];
//     echo "<p>";
//     echo $row['usr_name'];
//     echo "</p>";
//     }else{
//     echo "Error!!";
// }
?>