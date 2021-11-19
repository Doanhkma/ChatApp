<?php
$profile_id="";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if(isset($_GET["profile_id"])) { $profile_id = $_GET['profile_id']; }
}
  include "php/config.php";
  $sql="SELECT * FROM users WHERE unique_id = '$profile_id'";
  $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
              $fname=$row['fname'];
              $lname=$row['lname'];
              $email=$row['email'];
              $img=$row['img'];
              echo '<!DOCTYPE html>
              <head>
                 <meta charset="utf-8">
                 <title>'.$fname.' '.$lname.'</title>
                 <link rel="stylesheet" href="style2.css">
                 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
              </head>
              <body>
                 <div class="container">
                    <div class="image">
                       <img src="php/images/'.$img.'">
                    </div>
                    <div class="content">
                       <div class="info">
                          <h2>
                          '.$fname.' '.$lname.'
                          </h2>
                          <span>'.$email.'</span>
                       </div>
                    </div>
                 </div>
              </body>
              </html>';
            }
          }
?>