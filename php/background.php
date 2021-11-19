<?php
  $background='';
  $user_id='';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["background"])) { $background = $_POST['background']; }
    if(isset($_POST["user_id"])) { $user_id = $_POST['user_id']; }
  }

  include 'config.php';
  $sql="UPDATE users SET background='{$background}' WHERE unique_id='{$user_id}'";
  $result=mysqli_query($conn, $sql);
  if($result === TRUE){
      header("location: ../users.php");
  }
  else {echo "Lỗi";}

  ?>