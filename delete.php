<?php
    $send_id ="";
    $del_id="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET["del_id"])) { $del_id = $_GET['del_id']; }
  if(isset($_GET["send_id"])) { $send_id = $_GET['send_id']; }
  
  include "php/config.php";
  $sqlDel="UPDATE messages SET isDel = 1 WHERE (incoming_msg_id = $del_id AND outgoing_msg_id = $send_id)
  OR (incoming_msg_id = $send_id AND outgoing_msg_id = $del_id) ";

  echo 'OK';
  echo $sqlDel;

  $resultDel = mysqli_query($conn, $sqlDel);

    if($resultDel === TRUE){

        header("location: users.php");
    }
}

?>