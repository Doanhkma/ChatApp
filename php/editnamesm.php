<?php
  $fname='';
  $lname='';
  $user_id='';

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["editfname"])) { $fname = $_POST['editfname']; }
    if(isset($_POST["editlname"])) { $lname = $_POST['editlname']; }
    if(isset($_POST["user_id"])) { $user_id = $_POST['user_id']; }
  }

  include 'config.php';
  $sql="UPDATE users SET fname='{$fname}', lname='{$lname}' WHERE unique_id='{$user_id}'";
  $result=mysqli_query($conn, $sql);
  if($result === TRUE){
      header("location: ../users.php");
  }
  else {echo "Lỗi";}

  ?>