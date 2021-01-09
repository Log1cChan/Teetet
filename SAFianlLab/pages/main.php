<?php
session_start();
  include '../include/db.php';
  $usr_id = $_SESSION['user'][$_SESSION['online']];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>RoomPage</title>
<link rel="stylesheet" href="../css/bootstrap.css"/>
<script src="../js/jquery.min.js"></script>
<script src="../js/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
  // jQuery code here
  $(document).ready(function(){
    $("#btSend").click(function(){
      var message = document.getElementById("message").value;
      $("#message").val("");
      console.log(message);
      $("#room").load("../include/message.php",{
          message: message
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
                <a href="../include/logout.php"><?php echo $usr_id; ?>&nbsp;&nbsp;退出登录<span class="sr-only">(current)</span></a>
            </div>
        </div>
    </nav>

    <div class="row">
            <div class="col-md-3">
                <div class="list-group" id="onlineList" style="height: 640px;overflow-y:scroll;">
                    <a href="#" class="list-group-item active">在线用户</a>
                    <ul>
                      <?php
                        $sql = "SELECT * FROM usr_info WHERE iflog=1;";
                        $res = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($res) > 0){
                          while($row = mysqli_fetch_assoc($res)){
                            echo "<li>";
                            echo $row['usr_name'];
                            echo "</li>";
                          }
                        }
                      ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">公共聊天室</h3>
                    </div>
                    <div class="panel-body">
                        <div class="well" style="height: 500px;overflow-y:scroll;" id="room">
                            <?php
                              $sql = "SELECT * FROM message;";
                              $m = mysqli_query($conn, $sql);
                              if(mysqli_num_rows($m) > 0){
                                while ($row = mysqli_fetch_assoc($m)){
                                  if($row['usr_id'] == $usr_id){
                                    echo "<p class='pull-right'>";
                                    echo "你说:&nbsp;&nbsp;";
                                    echo $row['message'];
                                    echo "</p>";
                                  }else{
                                    echo "<p>";
                                    echo $row['usr_id'];
                                    echo "说:&nbsp;&nbsp;";
                                    echo $row['message'];
                                    echo "</p>";
                                  }
                                }
                                
                            }else{
                                echo "还没有人说话呢 快来做第一个说话的人!";
                            }
                            ?>
                        </div>
                        <form class="form-inline">
                            <textarea class="form-control" id="message" style="width: 90%;"></textarea>
                            <button class="btn btn-primary form-control" type="button" id="btSend" style="width: auto;">发送</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
</body>
</html>

