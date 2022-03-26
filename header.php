<?php 
// session_start();
?>
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
  <!-- navbar start here -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#44ee4d;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">GroceryHub</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#contact">Contact Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#about">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Category
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
										foreach($cat_arr as $list){
											?>
											<li><a href="product.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a></li>
											<?php
										}
									?>
            </ul>
          </li>
          <?php
            if(!isset($_SESSION['id'])){
              echo '<li class="nav-item">
              <a class="nav-link active" href="login.php">Login</a>
              </li>';
            }else{
              echo '<li class="nav-item">
              <a class="nav-link active" href="logout.php">Logout</a>
              </li>';
            }
         ?>
          <li class="nav-item">
            <?php
              $count = 0;
              if(isset($_SESSION['cart']))
              {
                $count = count($_SESSION['cart']);
              }
            ?>
            <a class="nav-link active" href="cart.php">My Cart (<?php echo $count;?>)</a>
          </li>

          
        </ul>
        

        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>