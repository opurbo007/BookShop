<?php
include("../database/config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <title>Your Book</title>
</head>

<?php
$id = $_GET["id"];
$sql = "SELECT * FROM product WHERE `product`.`id` ='$id'";
$result = mysqli_query($db, $sql);
$prows = mysqli_fetch_array($result);

?>

<body class="container mt-5">
    <h2 class="text-center md-5">UPDATE BOOK INFORMATION</h2>

    <form method="POST" action="./update.php" enctype="multipart/form-data">

        <!-- //name -->
        <div class="is-valid">
            <div class="form-row mt-4">
                <div class="col">
                    <!-- <label for="name">Name</label> -->
                    <input type="text" class="form-control text-center" id="name" value="<?php echo $prows['name']; ?>"
                        placeholder="<?php echo $prows['name']; ?>" name="name" />
                </div>
                <!-- //price -->
                <div class="col">
                    <!-- <label for="price">Price</label> -->
                    <input type="text" class="form-control text-center" id="price"
                        value="<?php echo $prows['price']; ?>" placeholder="<?php echo $prows['price']; ?>"
                        name="price" />
                </div>
            </div>



            <!-- //catagory -->
            <div class="form-row align-items-center mt-4">
                <div class="col my-1">
                    <select class="custom-select mr-sm-2" name="cat" value=" <?php echo $prows['type']; ?>" required>
                        <option class="text-center" selected>
                            <?php echo $prows['type']; ?>
                        </option>
                        <?php
                        $cata = "SELECT * FROM `type`";
                        $cselect = mysqli_query($db, $cata);
                        while ($row = mysqli_fetch_array($cselect)) {

                        ?>
                        <option class="text-center" value="<?php echo $row['t_id']; ?>">
                            <?php echo $row['t_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- //brand -->

                <div class="col my-1">
                    <select class="custom-select mr-sm-2" name="brand" required
                        value=" <?php echo $prows['booktype'] ?>">

                        <option selected>
                            <?php echo $prows['booktype'] ?>
                        </option>
                        <?php
                        $bnd = "SELECT * FROM `booktype`";
                        $bselect = mysqli_query($db, $bnd);
                        while ($row = mysqli_fetch_array($bselect)) {

                        ?>
                        <option value="<?php echo $row['book_id']; ?>">
                            <?php echo $row['book_type']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <!-- //image -->
            <div class="custom-file mt-4">
                <label class="custom-file-label is-valid" for="file">Upload your image</label>
                <input type="file" class="custom-file-input is-valid" id="file" name="image"
                    value="<?php echo $prows['img']; ?>" />
                <img class="mt-4" src=' <?php echo
                    $prows['img']; ?>' width='200' height='150' alt='fail to load' />

                <br>

                <!-- //radio -->


                <div class="mt-4">

                    <input class="btn-check" type="radio" name="radio" id="Radio1" value="YES" />
                    <label class="form-check-label mr-4" for="Radio1">In Stock</label>


                    <input class="btn-check" type="radio" id="Radio2" name="radio" value="NO" />
                    <label class="form-check-label" for="Radio2">Out Of Stock</label>

                </div>
                <br />

                <input type="hidden" value=" <?php echo $id; ?> " name="pid">

                <button type="submit" class="btn btn-outline-dark btn-lg btn-block" name="update">Save Update
                    Record</button>
            </div>
        </div>
    </form>









</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

</html>