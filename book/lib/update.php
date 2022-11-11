<?php
include("../database/config.php");

if (isset($_POST['update'])) {
    $pid = $_POST["pid"];
    $NAME = $_POST['name'];
    $PRICE = $_POST['price'];
    $CAT = $_POST['cat'];
    $BND = $_POST['brand'];
    // $IMAGE = $_FILES['image'];
    $RD = $_POST['radio'];



    // take img name from database
    $img_name = $_FILES['image']['name'];
    // take img loaction from database 
    $img_loc = $_FILES['image']['tmp_name'];
    $img_des = 'img/' . $img_name;
    //  move uploaded img to img folder inside product 
    move_uploaded_file($img_loc, $img_des);

    $update = mysqli_query($db, "UPDATE `product` SET `name`='$NAME',`type`='$CAT',`booktype`='$BND',`price`='$PRICE',`stock`='$RD',`img`='$img_des' WHERE `id`='$pid'");

    if ($update) {
        header("location:../index.php");
    } else {
        echo " Sorry Information not update";
    }



}


?>