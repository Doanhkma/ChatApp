<?php
    $send_id ="";
    $backup_id="";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET["backup_id"])) { $backup_id = $_GET['backup_id']; }
  if(isset($_GET["send_id"])) { $send_id = $_GET['send_id']; }
  
  include "php/config.php";
  $sqlDel="UPDATE messages SET isBackup = 1 WHERE (incoming_msg_id = $backup_id AND outgoing_msg_id = $send_id)
  OR (incoming_msg_id = $send_id AND outgoing_msg_id = $backup_id) ";

  echo 'OK';
  echo $sqlDel;

  $resultDel = mysqli_query($conn, $sqlDel);

    if($resultDel === TRUE){

        header("location: users.php");
    }
}

?>