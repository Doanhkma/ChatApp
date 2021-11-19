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
      <header style="color: #33FFCC">Đổi Background</header>
      <form action="php/background.php" method="POST" autocomplete="off">
        <div class="field input" >
        <input type="radio" name="background" value="default.png" checked>Mặc định<br><hr>
        </div>
        <div class="field input">
        <input type="radio" name="background" value="natural.png" checked>Thiên nhiên<br><hr>
        </div>
        <div class="field input">
        <input type="radio" name="background" value="star.png" style="font-size: 10px" checked>Bầu trời sao<br><hr>
          <input type="text" name="user_id" value="<?php echo $user_id ?>" hidden>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Submit">
        </div>
      </form>
    </section>
  </div>
  <script src="../javascript/login.js"></script>
</body>
</html>