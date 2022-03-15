<?php 
require'connection.inc.php';
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate = mysqli_query($con, "SELECT * FROM users WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate) > 0){
        echo 
        "<script>alert('Username or Email Has Already Taken');</script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO users VALUES('', '$name', '$username', '$email', '$password')";
            // $res=mysqli_query($con,$sql);

            mysqli_query($con, $query);
            echo 
            "<script>alert('Registration Successful');</script>";
            header('location:login.php');
        }
        else{
            echo 
            "<script>alert('Password Does not Match');</script>";
        }
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="stylesheet.css">
    
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">
      
                      <div class="text-center">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp" style="width: 185px;" alt="logo">
                        <h4 class="mt-1 mb-5 pb-1">We are The GroceryHub Team</h4>
                      </div>
      
                      <form class="" action="" method="post" autocomplete="off">
                        <p>Please fill this form</p>
      
                        <div class="form-outline mb-4">
                        <label class="form-label" for="name">Name</label>
                          <input type="text" name="name" id="name" class="form-control" placeholder="Your Name"/>
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="username">Username</label>
                          <input type="text" name="username" id="username"  class="form-control" placeholder="Your username"/>
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="email">Email</label>
                          <input type="email" name="email" id="email"  class="form-control" placeholder="Your Email"/>
                        </div>
      
                        <div class="form-outline mb-4">
                          <label class="form-label" for="password">Password</label>
                          <input type="password" name="password" id="password"  class="form-control" placeholder="Password" />
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="confirmpassword">Confirm Password</label>
                          <input type="password" name="confirmpassword" id="confirmpassword" required value="" class="form-control" placeholder="Confirm Password" />
                        </div>
      
                        <div class="text-center pt-1 mb-5 pb-1 butt">
                          <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" >Submit</button>
                        </div>
      
      
                      </form>
      
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                      <h2 class="mb-4">We are GroceryHub</h2>
                      <p class="small mb-0">we sell fresh vegetables,fruits dairy product ,staples and snacks for your daily needs.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
      <script src="script.js"></script>
          
</body>

</html>