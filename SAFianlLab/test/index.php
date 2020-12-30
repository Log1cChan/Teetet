<?php
    include 'dbh.php'
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.min.js"></script>
    <script>
        // jQuery code here
        $(document).ready(function() {
            var commentCount = 2;
            $("button").click(function(){
                commentCount = commentCount + 2;
                $("#comments").load("load-comments.php", {
                    commentNewCount: commentCount
                });
            });
        });
    </script>
    <title>Ajax Test</title>
</head>
<body>
<div id="comments">
    <?php
        $sql = "SELECT * FROM comments LIMIT 2";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<p>";
                echo $row['author'];
                echo "<br>";
                echo $row['message'];
                echo "</p>";
            }
        }else  {
            echo "There is no comments!";
        }
    ?>
</div>

<button>Show more comments</botton>

</body>
</html>