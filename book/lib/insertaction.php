<?php
include("../database/config.php");

if (isset($_POST['insert'])) {

    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $CAT = $_POST['cat'];
    $BND = $_POST['brand'];
    // $IMAGE = $_FILES['image'];s
    $RD = $_POST['radio'];



    // take img name from database
    $img_name = $_FILES['image']['name'];
    // take img loaction from database 
    $img_loc = $_FILES['image']['tmp_name'];
    $img_des = 'img/' . $img_name;
    //  move uploaded img to img folder inside product 
    move_uploaded_file($img_loc, $img_des);

    mysqli_query($db, "INSERT INTO `product`(`name`, `type`, `booktype`, `price`, `stock`, `img`) VALUES ('$NAME','$CAT','$BND','$PRICE','$RD','$img_des');");
    header("location:../index.php");


}


?>