<?php
    include '../include/db.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RegisterPage</title>
    <link rel="stylesheet" href="../css/bootstrap.css"/>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script>
  // jQuery code here
  $(document).ready(function(){
    $("#regist").click(function(){
      var usr_id = document.getElementById("usr_id").value;
      var psw = document.getElementById("psw").value;
      var usr_name = document.getElementById("usr_name").value;
      console.log(usr_id, usr_name, psw);
      $("#com").load("../include/check.php" ,{
        usr_id: usr_id,
        usr_name: usr_name,
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
    <div style="text-align:center; padding-top:100px">
        <center>
          <form>
              <p>用户名: &nbsp;<input type="text" id="usr_id" placeholder="Please Enter your UserID"/></p>
              <p>昵 &nbsp;&nbsp;&nbsp;称: &nbsp;<input type="text" id="usr_name" placeholder="Please Enter your UserName" /></p>
              <p>密 &nbsp;&nbsp;&nbsp;码: &nbsp;<input type="password" id="psw" placeholder="Please Enter your Password"/></p>
              <input class="btn btn-primary" type="button" id="regist" value="注册" />
          </form>
        <div id="com">

        </div>
        </center>
    </div>
</body>
</html>