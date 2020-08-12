<?php

session_start();
if(!isset($_SESSION['username'])){
    header('Location:sign_in.html');
}


$types = isset($_GET["types"])?$_GET["types"]:"";

include "./phps.php";

$phps = new phps();

$result = $phps->getList($types);

$del_id = isset($_GET["del_id"])?$_GET["del_id"]:"";

if($del_id){
    $phps->del($del_id);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>list</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <div class="list">
      <div class="header">
        Market List
        <a href="add_prod.php"><img src="images/add.png" alt="" /></a>
      </div>

     <div class="content">
       <div class="menu">
         <a href="list.php">All</a>
         <a href="list.php?types=Flower">Flower</a>
         <a href="list.php?types=Vegetable">Vegetable</a>
         <a href="list.php?types=Honey">Honey</a>
       </div>

       <div class="prods">
         <ul>
             <?php
             if (mysqli_num_rows($result) > 0) {
                 while($row = mysqli_fetch_assoc($result)) {
                     echo '<li>
                             <div class="img">
                               <img src="'.$row["img"].'" alt="" />
                               <p>'.$row["title"].'</p>
                             </div>
                             <div class="btns">
                               <a href="edit.php?id='.(int)$row["id"].'">Edit</a>
                               <a href="list.php?del_id='.(int)$row["id"].'">Del</a>
                               <a href="product.php?id='.(int)$row["id"].'">Show</a>
                             </div>
                           </li>';
                 }
             } else {
                 echo "No Data";
             }
             ?>
         </ul>
       </div>
     </div>

      <div class="bottom">
        <a href="index.php"><img src="images/map.png" alt="" /></a>
        <a href="#"><img src="images/list.png" alt="" /></a>
        <a href="user.php"><img src="images/user.png" alt="" /></a>
      </div>
    </div>
  </body>
</html>
