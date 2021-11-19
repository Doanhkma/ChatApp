<?php 
  session_start();
  include_once "php/config.php";
  if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
  }
?>
<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="chat-area">
      <header>
        <?php 
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);
          } else {
            header("location: users.php");
          }
        ?>
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p style="color: #0066FF; font-size: 12px;"><?php echo $row['status']; ?></p>
        </div>
        <?php
        $send_id = $_SESSION['unique_id'];
        ?>
        <div class="dropdown">
          <button class="dropdown-toggle" 
            type="button" 
            id="profileDropdown" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="true" 
            style="margin-left: 100px; border: none; background-color: #fff; color: #0066FF">
            <i class="fas fa-info-circle" style="font-size: 22px"></i>
          </button>
          <ul class="dropdown-menu" aria-labelledby="profileDropdown">
            <li><a href="profile.php?profile_id=<?php echo $user_id ?>" style="text-align: center">Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><form method="GET" action="backup.php">
        <input type="text" class="backup_id" name="backup_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" class="send_id" name="send_id" value="<?php echo $send_id; ?>" hidden>
        <button style="border: none; width: 120px; background-color: #fff; margin-left: 20px">Sao lưu</button>
        </form></li>
            <li role="separator" class="divider"></li>
            <li><form method="GET" action="delete.php">
        <input type="text" class="del_id" name="del_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" class="send_id" name="send_id" value="<?php echo $send_id; ?>" hidden>
        <button style="border: none; width: 120px; background-color: #fff; margin-left: 17px">Xóa tin nhắn</button>
        </form></li>
            <li role="separator" class="divider"></li>
            <li><form method="GET" action="restore.php">
        <input type="text" class="restore_id" name="restore_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" class="send_id" name="send_id" value="<?php echo $send_id; ?>" hidden>
        <button style="border: none; width: 120px; background-color: #fff; margin-left: 20px">Khôi phục</button>
        </form></li>
          </ul>
        </div>
      </header>
      <?php
      $background=$row['background'];
      ?>
      <div class="chat-box" style="background: none ; background-image: url('background/<?php echo $background ?>')">

      </div>
      <div class="image-preview mb-4" id="imagePreview">
          <i class="fas fa-trash" id="delBtn"></i>
          <img src="" alt="Image Preview" class="image-preview__image" />
          <span class="image-preview__default-text">Hình ảnh</span>
      </div>
      <form action="#" class="typing-area" method="GET" >
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>"  hidden>
        <input type="text" name="message" class="input-field" placeholder="Nhập tin nhắn ở đây..." autocomplete="off">
        <div class="image-input">
            <input type="file" name="image" id="image" class="input-img"/>
        </div>
        <button><i class="fab fa-telegram-plane"></i></button>
      </form>
    </section>
  </div>
  <script src="javascript/chat.js"></script>
  <script src="javascript/preview.js"></script>
  <script src="javascript/delete.js"></script>
</body>
</html>
