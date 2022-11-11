<?php
include("../database/config.php");

$id = $_GET["id"];
// echo $id;

$delete = mysqli_query($db, "UPDATE `product` SET `status` = '0' WHERE `product`.`id` ='$id'");

if ($delete) {
    header("location:../index.php");
} else {
    echo 'Something Wrong !';
}


?>