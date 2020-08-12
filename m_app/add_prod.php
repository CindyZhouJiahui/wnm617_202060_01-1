<?php

session_start();
if(!isset($_SESSION['username'])){
    header('Location:sign_in.html');
}

include "./phps.php";

$phps = new phps();

$phps->addPord();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>add</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="addProd" style="background: #fff;">
      <div class="header">Add new product</div>

      <div class="content">
        <p>Add a photo</p>

        <div class="chooseBtn">
          <span>Choose File</span>
          <input type="file" onchange="upload(this)"/>
          <input name="img" hidden>
        </div>

        <div class="photo" id="pro_img"></div>

        <p>Name</p>

        <div class="item">
          <input type="text" name="title" placeholder="Type product name" />
        </div>

        <p>Type</p>
        <select name="types" id="types">
          <option value="Flower">Flower</option>
          <option value="Vegetable">Vegetable</option>
          <option value="Honey">Honey</option>
        </select>

        <p>Description</p>
        <textarea name="des" id="des"></textarea>

        <p>Longitude and latitude</p>

        <div class="item">
          <input type="text" name="coordinate" placeholder="Type product coordinate" />
        </div>
      </div>

      <div class="btm">
          <div class="flex-around">
            <div class="saveBtn" onclick="add_prod()">Save</div>
            <div class="cancelBtn" onclick="back()">Cancel</div>
          </div>
      </div>
    </div>
  </body>

  <script src="./js/jquery-3.4.1.min.js"></script>
  <script src="./js/upload.js"></script>
  <script src="./js/function.js"></script>
</html>
