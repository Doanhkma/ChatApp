<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);
        $image = $_FILES['image'] ?: '';
        $folder = $_SERVER['DOCUMENT_ROOT'].'/ChatApp';
        if (isset($image)) {
            $imageName = $image['name'];
            $imageMime = $image['type'];
            $imageTmp  = $image['tmp_name'];

            $mimeTypeValid = ["image/jpeg", "image/jpg", "image/png"];
            if (in_array($imageMime, $mimeTypeValid)) {
                // Avoid duplicate image name.
                $imageName = time() . $imageName;
                $isUploaded = move_uploaded_file($imageTmp, $folder."/uploads/" . $imageName);
                if (!$isUploaded) {
                    $imageName = false;
                }
            }

            if ($imageName) {
                mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, is_image)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$imageName}', 1)") or die();
            }
        }

        if(!empty($message)){
            mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../login.php");
    }
?>