<?php
  session_start();
  $_SESSION["iflog"] = 0;
  $_SESSION["online"] = -1;
  include '../include/db.php'
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>LoginPage</title>
<link rel="stylesheet" href="../css/bootstrap.css"/>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
  // jQuery code here
  $(document).ready(function(){
    $("#login").click(function(){
      var usr_id = document.getElementById("usr_id").value;
      var psw = document.getElementById("psw").value;
      console.log(usr_id);
      console.log(psw);
      $("#com").load("../include/load-usr.php",{
        usr_id: usr_id,
        psw: psw
      });
    });
  });
</script>
</head>
<body>
  <nav class="navbar navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="login.php">Ajax聊天室</a>
            </div>
            <div class="pull-right">
                <a href="login.php">登录<span class="sr-only">(current)</span></a>
                <a href="register.php"> 注册</a>
            </div>
        </div>
    </nav>
  <div>
      <center>
        <form>
            <p>用户名: &nbsp;<input type="text" id="usr_id" placeholder="UserID"/></p>
            <p>密 &nbsp;&nbsp;&nbsp;码: &nbsp;<input type="password" id="psw" placeholder="Password"/></p>
            <input type="button" class="btn btn-primary" id="login" value="登陆"/>
        </form>
        <div id="com">
        </div>
      </center>
  </div>
  <?php
    if($_SESSION['iflog']==1){
      header("location:main.php" );
    }
  ?>
</body>
</html>

