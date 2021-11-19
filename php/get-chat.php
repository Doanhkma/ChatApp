<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";
    $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
    WHERE isDel = 0 AND ((outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
    OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id})) ORDER BY msg_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $message = '';
            if ($row['is_image']) {
                $message = '<a target="_blank" href="uploads/'.$row['msg'].'"><img src="uploads/'.$row['msg'].'" class="chat-box-image"/></a>';
            } else {
                $message = $row['msg'];
            }
            if ($row['outgoing_msg_id'] === $outgoing_id) {
                $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>
                                    ' . $message . '<br>
                                    </p>
                                </div>
                                </div>';
            } else {
                $output .= '<div class="chat incoming">
                                <img src="php/images/' . $row['img'] . '" alt="" class="chat-box-image">
                                <div class="details">
                                    <p>
                                    ' . $message . '<br>
                                    </p>
                                </div>
                                </div>';
            }
        }
    } else {
        $output .= '<div class="text">Bạn và người này chưa có tin nhắn nào. Hãy gửi tin nhắn đầu tiên để bắt đầu cuộc trò chuyện.</div>';
    }
    echo $output;
} else {
    header("location: ../login.php");
}

?>