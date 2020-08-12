<?php

session_start();
if(!isset($_SESSION['username'])){
    header('Location:sign_in.html');
}


$id = isset($_GET["id"])?$_GET["id"]:"";

include "./phps.php";

$phps = new phps();
$phps->edit();

$result = $phps->show($id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>edit</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="addProd" style="background: #fff;">
      <div class="header">Edit product</div>

      <div class="content">
        <p>Add a photo</p>

        <div class="chooseBtn">
          <span>Choose File</span>
            <input type="file" onchange="upload(this)"/>
            <input name="id" hidden value="<?php echo $result['id'] ?>">
            <input name="img" hidden value="<?php echo $result['img'] ?>">
        </div>

        <div class="photo"><img src="<?php echo $result['img'] ?>" alt=""></div>

        <p>Name</p>

        <div class="item">
          <input type="text" placeholder="Type product name" name="title" value="<?php echo $result['title'] ?>"/>
        </div>

        <p>Type</p>
        <select name="types" id="types">
          <option value="Flower" <?php echo $result['types']=='Flower'?'selected':'' ?>>Flower</option>
          <option value="Vegetable" <?php echo $result['types']=='Vegetable'?'selected':'' ?>>Vegetable</option>
          <option value="Honey" <?php echo $result['types']=='Honey'?'selected':'' ?>>Honey</option>
        </select>

        <p>Description</p>
        <textarea name="des" id="des"><?php echo $result['des'] ?></textarea>

          <p>Longitude and latitude</p>

          <div class="item">
              <input type="text" name="coordinate" value="<?php echo $result['coordinate'] ?>" placeholder="Type product coordinate" />
          </div>
      </div>

      <div class="btm">
          <div class="flex-around">
            <div class="saveBtn" onclick="edit()">Save</div>
            <div class="cancelBtn" onclick="back()">Cancel</div>
          </div>
      </div>
    </div>
  </body>

  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/upload.js"></script>
  <script src="./js/function.js"></script>
</html>
