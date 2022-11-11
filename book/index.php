<?php

include("./database/config.php");

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


<body>

    <?php

    if (isset($_POST['src'])) {

        $src = $_POST['src'];

        $sql = "SELECT * FROM `product` WHERE  name LIKE '%{$src}%' and status=1";

        $cat = "SELECT  type.t_name FROM product,type WHERE type.t_id= product.type and status=1 and name LIKE '%{$src}%'";
        $bnd = "SELECT book_type FROM booktype,product WHERE booktype.book_id=product.booktype and status=1 and name LIKE '%{$src}%'";

    } else {
        $sql = "SELECT * FROM product WHERE status=1";
        $cat = "SELECT  type.t_name FROM product,type WHERE type.t_id= product.type and status=1";
        $bnd = "SELECT book_type FROM booktype,product WHERE booktype.book_id=product.booktype and status=1";
        $src = "";

    }
    ?>

    <div class="container mt-4">
        <h3 class="text-center ">ALL BOOK LIST</h3>
        <div class="row mb-3 ml-1"><a href="./lib/insertForm.php"><button type="button"
                    class="btn btn-outline-dark col">Add
                    Product</button></a>
            <form class="d-flex form-group mx-sm-3 mb-2 col" method="POST" action="">
                <input class="form-control me-2 md-4" type="search" placeholder="Search" aria-label="Search" name="src"
                    value="<?php echo $src; ?>">
                <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
        </div>



        <?php

        // show all product 
        
        $result = mysqli_query($db, $sql);

        // for catagory 
        $catcon = mysqli_query($db, $cat);

        // for brand 
        
        $bndcon = mysqli_query($db, $bnd);

        $i = 1;
        if ($result->num_rows == 0) {

            echo '<div class="mt-5 card text-center">
                        <div class="card-body">
           
                            <h3 class="card-text">No Book Record Found</h3>
                        </div>
           
                     </div>';


        } else {
            echo '<table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
        
                        <th scope="col">SL NO</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Book Genres</th>
                        <th scope="col">Price</th>
                        <th scope="col">Avibility</th>
                     
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>';



            while (
                $rows = mysqli_fetch_array($result) and $catres = mysqli_fetch_array($catcon) and
                $bndres = mysqli_fetch_array($bndcon)
            ) {


                echo '
        
    <tr>
        <td scope="row">' . $i . '</td>
     
        <td><img src="./lib/' . $rows["img"] . '" width="70" height="100" alt="fail to load"/></td>      
        <td>' . $rows["name"] . '</td>
        <td>' . $catres["t_name"] . '</td>
        <td>' . $bndres["book_type"] . '</td>
        <td>' . $rows["price"] . '</td>
        <td>' . $rows["stock"] . '</td>
        
<td>
            <div class="mb-1 d-flex flex-row"><a href="./lib/updateForm.php?id=' . $rows["id"] . '"><button type="button"
                        class="btn btn-outline-dark mr-2">Edit</button></a>
                <a href="./lib/delete.php?id=' . $rows["id"] . '"><button type="button"
                        class="btn btn-outline-dark float-right">Delete</button></a>
            </div>

        </td>
    </tr>';
                $i++;
            }
            echo '</tbody>
    </table>'
                ;
        }
        ?>
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