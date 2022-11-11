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

<body class="container mt-5">
    <h3 class="text-center">LIST YOUR BOOK</h3>
    <form method="POST" action="./insertaction.php" enctype="multipart/form-data">
        <div class="is-valid">
            <div class="form-row mt-4">
                <div class="col">

                    <input type="text" class="form-control text-center is-valid" id="name" placeholder="Enter Name"
                        name="name" required />
                </div>
                <div class="col">
                    <!-- <label for="price">Price</label> -->
                    <input type="text" class="form-control text-center is-valid" id="price" placeholder="Enter Price"
                        name="price" required />
                </div>
            </div>





            <div class="form-row align-items-center mt-4">
                <div class="col my-1">
                    <select class="custom-select mr-sm-2" name="cat" required>
                        <option class="text-center" selected>Type</option>
                        <?php
                        $cata = "SELECT * FROM `type`";
                        $cselect = mysqli_query($db, $cata);
                        while ($row = mysqli_fetch_array($cselect)) {

                        ?>
                        <option value="<?php echo $row['t_id']; ?>">
                            <?php echo $row['t_name']; ?>
                        </option>
                        <?php } ?>
                    </select>
                </div>


                <div class="col my-1">
                    <select class="custom-select mr-sm-2" name="brand" required>

                        <option class="text-center" selected>Book Genres</option>
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

            <div class="custom-file mt-4">

                <input type="file" class="custom-file-input is-valid" id="file" name="image" required />
                <label for="file" class="custom-file-label is-valid">Upload your image</label>
            </div>




            <div class="mt-4">

                <input class="btn-check" type="radio" name="radio" id="Radio1" value="YES" />
                <label class="form-check-label mr-4" for="Radio1">In Stock</label>


                <input class="btn-check" type="radio" id="Radio2" name="radio" value="NO" />
                <label class="form-check-label" for="Radio2">Out Of Stock</label>

            </div>
            <br />
            <button type="submit" class="btn btn-outline-dark btn-lg btn-block " name="insert">Save Record</button>
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