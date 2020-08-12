<?php

session_start();
if(!isset($_SESSION['username'])){
    header('Location:sign_in.html');
}


$id = isset($_GET["id"])?$_GET["id"]:"";

include "./phps.php";

$phps = new phps();

$result = $phps->show($id);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $result["title"] ?></title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="detail">
      <div class="header">
          <a href="list.php"><img src="images/return.png" alt=""></a>
          <?php echo $result["title"] ?>
      </div>
      <div class="img" style="text-align: center; margin-top: 10px"><img src="<?php echo $result["img"] ?>" alt="" /></div>
      <!-- <div class="title"> flower</div> -->
      <div class="desc"><?php echo $result["des"] ?></div>
    </div>
  </body>
</html>
