<?php 
include "header.php";
$user_id = ''; 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if(isset($_GET["user_id"])) { $user_id = $_GET['user_id']; }
}
?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header style="color: #33FFCC">Đổi tên</header>
      <form action="php/editnamesm.php" method="POST" autocomplete="off">
        <div class="field input">
          <label>Họ</label>
          <input type="text" name="editfname" placeholder="Nhập họ" required>
        </div>
        <div class="field input">
          <label>Tên</label>
          <input type="text" name="editlname" placeholder="Nhập tên" required>
          <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Đổi tên">
        </div>
      </form>
    </section>
  </div>
  <script src="../javascript/login.js"></script>
</body>
</html>