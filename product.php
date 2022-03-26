<?php
require('connection.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}


$cat = $_GET["id"];
$result = mysqli_query($con, "SELECT * FROM product WHERE categories_id='".$cat."'");
// $row = mysqli_fetch_assoc($result);
if(mysqli_num_rows($result) == 0){
    header("Location: index.php");
}
// $name = $_GET["name"];
// $result = mysqli_query($con, "SELECT * FROM product WHERE name='".$name."'");
// // $row = mysqli_fetch_assoc($result);
// if(mysqli_num_rows($result) == 0){
//     header("Location: index.php");
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</head>

<body>
<?php include('header.php'); ?>
    
    <!-- <div class="container">
        <img src="images/1.jpg" alt="" class="corona">
    </div> -->

    <section id="banner2" class="section">
        <h3>#stayhome #staysafe</h3>
        <h4>#StayProtectedFromCorona</h4>

    </section>



    <section id="product1" class="section-p1">
        <h1>Products</h1>
        <p>All grocery available here</p>
        <div class="pro-container">
            <?php
                while($row=mysqli_fetch_assoc($result)){
            ?>
            <div class="pro">
            <form action="manage_cart.php" method="POST">
                <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row["image"]; ?>" alt="">
                <div class="des">
                    <span><?php echo $row["name"]; ?></span>
                    <h4><?php echo $row["price"]; ?>/kg</h4>
                    <input type="number" name="" id="" min="1" max="100" value="1" style="width: 10rem;">
                    <span style="color: black; font-style: bold; font-weight: 700;">/kg</span>
                    <button type="submit" name="add_to_cart" class="btn btn-primary">Add to Cart</button>
                    <input type="hidden" name="item_name" value="<?php echo $row["name"]; ?>">
                    <input type="hidden" name="price" value="<?php echo $row["price"]; ?>">
                </form>
                </div>
                

            </div>

            <?php
            }
            ?>


        </div>


    </section>

    <ul class="pagination justify-content-center">
        <li class="page-item"><a class="page-link" href="fruits.html">Previous</a></li>
        <li class="page-item active"><a class="page-link" href="fruits.html">1</a></li>
        <li class="page-item "><a class="page-link" href="fruits2.html">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="fruits2.html">Next</a></li>
      </ul> 











    <div class="mt-5 p-4 bg-dark text-white text-center">
        <!-- Footer -->
        <footer></footer>
            <!-- Grid container -->
            <div class="container p-4 pb-0">
                <!-- Section: Links -->
                <section class="">
                    <!--Grid row-->
                    <div class="row">
                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">
                                GroceryHub
                            </h6>
                            <p>
                                Here you can use rows and columns to organize your footer
                                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit.
                            </p>
                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Quick Link</h6>
                            <p>
                                <a class="text-white" href="index.html">Home</a>
                            </p>
                            <p>
                                <a class="text-white" href="#">About us</a>
                            </p>
                            <p>
                                <a class="text-white" href="#">Categories</a>
                            </p>

                        </div>
                        <!-- Grid column -->

                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <hr class="w-100 clearfix d-md-none" />

                        <!-- Grid column -->
                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fas fa-home mr-3"></i> India</p>
                            <p><i class="fas fa-envelope mr-3"></i> abc@gmail.com</p>
                            <p><i class="fas fa-phone mr-3"></i> +91 0000000000</p>
                            <p><i class="fas fa-print mr-3"></i> +91 0000000000</p>
                        </div>
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

                            <!-- Facebook -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!"
                                role="button"><i class="fab fa-facebook-f"></i></a>

                            <!-- Twitter -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!"
                                role="button"><i class="fab fa-twitter"></i></a>

                            <!-- Google -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!"
                                role="button"><i class="fab fa-google"></i></a>

                            <!-- Instagram -->
                            <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!"
                                role="button"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <!--Grid row-->
                </section>
                <!-- Section: Links -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2022 Copyright:
                <a class="text-white" href="https://groceryhub.com/">GroceryHub.com</a>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
    </div>
    <!-- End of .container -->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <script src="script.js"></script>
    <script src="./js/cartjs.js"></script>
    <script src="https://kit.fontawesome.com/4fb86c3e4e.js" crossorigin="anonymous"></script>
</body>

</html>