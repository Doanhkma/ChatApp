<?php
    $send_id ="";
    $restore_id="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET["restore_id"])) { $restore_id = $_GET['restore_id']; }
  if(isset($_GET["send_id"])) { $send_id = $_GET['send_id']; }
  
  include "php/config.php";
  $sqlDel="UPDATE messages SET isDel = 0 WHERE (incoming_msg_id = $restore_id AND outgoing_msg_id = $send_id)
  OR (incoming_msg_id = $send_id AND outgoing_msg_id = $restore_id) ";

  echo 'OK';
  echo $sqlDel;

  $resultDel = mysqli_query($conn, $sqlDel);

    if($resultDel === TRUE){

        header("location: users.php");
    }
}

?>