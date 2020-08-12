<?php

session_start();
if(!isset($_SESSION['username'])){
    header('Location:sign_in.html');
}

include "./phps.php";

$phps = new phps();
$user = $phps->getUser();

$phps->getUser();

$phps->setUser();

if(isset($_GET["logout"])){
    $phps->logout();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>user</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="user">
      <div class="content">
          <div class="tx">
              <img id="img" src="<?php echo $user['head']?$user['head']:'images/rose2.png' ?>" alt="" />
              <input type="file" onchange="upload(this)" id="head">
          </div>
        <div class="item">
            <p>Name or nick name</p>
            <input type="text" class="nickname" name="nickname" value="<?php echo $user['nickname'] ?>"/>
            <input hidden name="id" value="<?php echo (int)$user['id'] ?>">
            <input hidden name="head" value="<?php echo $user['head'] ?>">
          </div>
          <div class="item">
            <p>Gendar</p>
            <input type="text" name="sex" class="gendar" value="<?php echo $user['sex'] ?>"/>
          </div>
          <div class="item">
            <p>Age</p>
            <input type="text" name="age" class="age" value="<?php echo $user['age'] ?>"/>
          </div>

          <div class="button" onclick="setting()">Setting</div>

          <a href="user.php?logout=1"><div class="button" style="margin-top: 10px">Logout</div></a>
      </div>

        <div class="bottom">
            <a href="index.php"><img src="images/map.png" alt="" /></a>
            <a href="list.php"><img src="images/list.png" alt="" /></a>
            <a href="#"><img src="images/user.png" alt="" /></a>
        </div>
    </div>
  </body>

  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/upload.js"></script>
  <script src="./js/setting.js"></script>
</html>
