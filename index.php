<?php 
require('connection.inc.php');
require('functions.inc.php');
// session_start();
// session_destroy();
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();

while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}

$result = mysqli_query($con, "SELECT * FROM product WHERE 1 LIMIT 4");

if(mysqli_num_rows($result) == 0){
    header("Location: index.php");
}


?>
<div class="body__overlay"></div>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="cartstyle.css">
  <script text="text/javascript" src="js/jquery-3.6.0.js"></script>


  <title>Grocery Hub</title>
</head>

<body>
  <?php include("header.php"); ?>
  <!-- navbar ends here -->
  <!-- <marquee behavior="alternate" direction="left">GroceryHub GroceryHub GroceryHub GroceryHub GroceryHub GroceryHub
  </marquee> -->
  <!-- carousel starts here -->
  <!-- <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
    <div class="carousel-indicators"> -->
      <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button> -->
      <!-- <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
        aria-label="Slide 3"></button> -->
    <!-- </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="images/grocery.png" class="d-block w-100" alt="..."> -->
        <!-- <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div> -->
      <!-- </div> -->
      <!-- <div class="carousel-item">
        <img src="images/1.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="images/3.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div> -->
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> -->
  <!-- </div> -->
  <!-- carousel ends here -->
  <div class="container-fluid">
    <img src="images/grocery.png" alt="" style="width: 100%; height:80%; padding: 75px 25px; border-radius:10px" > 
  </div>
      
<!-- feature products start -->
  <section id="product1" class="section-p1">
    <h2>Featured Products</h2>
    <p>All grocery available here</p>
    <div class="pro-container">
           
          <?php
              while($row=mysqli_fetch_assoc($result)){
          ?>
          <div class="pro" >
              <img src="<?php echo PRODUCT_IMAGE_SITE_PATH.$row["image"]; ?>" alt="">
              <div class="des" >
              <form action="manage_cart.php" method="POST">
                  <span><?php echo $row["name"]; ?></span>
                  <h4><?php echo $row["price"]; ?>/kg</h4>
                  <!-- <input type="number" name="" id="" min="1" max="100" value="1" style="width: 10rem;">
                  <span style="color: black; font-style: bold; font-weight: 700;">/kg</span> -->
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
  <!-- contactus -->
  <section class="my-0" id="contact">
    <div class="pt-0">
      <h2 class="text-center text-success">Contact Us</h2>
    </div>
    <div class="w-50 m-auto">
      <form action="send_message.php" method="post">
      <div class="form-group">
          <label>Name</label>
          <input type="text" id="name" name="name" class="form-control" required />
        </div>
       
        <div class="form-group">
          <label>Email Id</label>
          <input type="text"  id="email" name="email" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Mobile</label>
          <input type="text" id="mobile" name="mobile" class="form-control" required />
        </div>
        <div class="form-group">
          <label>Comments</label>
          <textarea name="message" id="message" class="form-control" rows="2" ></textarea>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
      </form>
    </div>
  </section>
  <!-- About us -->
  <div class="pt-0" id="about">
      <h2 class="text-center text-success">About Us</h2>
    </div>
   <div class="section">
    <div class="container">
      <div class="content">
        <div class="article">
          <h3>
          Welcome to GroceryHub, your number one source for all groceries. We're dedicated to providing you the very best of grocery, with an emphasis on fresh grocery, less price, and on time delivery.</h3>
          <p>We want our customers to focus on the more important things for themselves and not need to plan for the little things that life needs on an everyday basis. We are here to get your chores out of your way.
          We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.
            </p>
          <div class="button">
            <a href="#">Read More</a>
          </div>
        </div>
      </div>
      <div class="image-section">
        <img src="images/1.jpg" alt="">
      </div>
    </div>
    </div>
    <!-- Footer -->
  <div class="mt-5 p-4 bg-dark text-white text-center">
    <footer>
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
                Welcome to GroceryHub, your number one source for all groceries. We're dedicated to providing you the very best of grocery, with an emphasis on fresh grocery, less price, and on time delivery.
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
              <p><i class="fas fa-envelope mr-3"></i> groceryhub@gmail.com</p>
              <p><i class="fas fa-phone mr-3"></i> +91 0000000000</p>
              <p><i class="fas fa-print mr-3"></i> +91 0000000000</p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
              <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>

              <!-- Facebook -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #3b5998" href="#!" role="button"><i
                  class="fab fa-facebook-f"></i></a>

              <!-- Twitter -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #55acee" href="#!" role="button"><i
                  class="fab fa-twitter"></i></a>

              <!-- Google -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #dd4b39" href="#!" role="button"><i
                  class="fab fa-google"></i></a>

              <!-- Instagram -->
              <a class="btn btn-primary btn-floating m-1" style="background-color: #ac2bac" href="#!" role="button"><i
                  class="fab fa-instagram"></i>
              </a>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/4fb86c3e4e.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!-- <script src="js/script.js"></script> -->
  

<script type="text/javascript">
  function send_message(){
    var name=$("name").val);
    var email=$("email").val();
    var mobile=$("mobile").val();
    var message=$("message").val();
    var is_error="";
    if(name=="" || email=="" || mobile=="" || message==""){
        alert('Please Enter Fields are Required!');
    } else{
		$.ajax({
			url:'send_message.php',
			type:'POST',
			data:'name='+name +'&email='+email+'&mobile='+mobile+'&message='+message,
			success:function(result){
				alert(result);
			}	
		});
	}
}

</script>

</body>

</html>