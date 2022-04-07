<?php 
require('connection.inc.php');
require('functions.inc.php');
// session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="stylesheet.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="cartstyle.css">
</head>
<body>
<?php 
// include("header.php"); 
?>
  <nav class="navbar navbar-expand-lg" style="background-color:#44ee4d;">
  <div class="container-md">
    <a class="navbar-brand text-dark" href="index.php">Grocery Hub - Cart</a>
  </div>
</nav>
    <div class="container" style="padding-top: 50px;">
        <div class="row">
    <div class="col-lg-9">
            <table class="table">
            <thead class='text-center'>
        <tr>
          <th scope="col">Serial No.</th>
          <!-- <th scope="col">Product Image</th> -->
          <th scope="col">Product Name</th>
          <th scope="col">Product Qty</th>
          <th scope="col">Product Price</th>
          <th scope="col">Total</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody id="items" class='text-center'>
          <?php
            $counter= 0;
            if(isset($_SESSION['cart']))
            {
                foreach($_SESSION['cart'] as $key => $value)
                {
                    $counter=$counter+1;
                    echo"
                        <tr>
                            <td>$counter</td>
                            <td>$value[item_name]</td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                                <input class='text-center iquantity' name='modify_quantity' onchange='this.form.submit()' type='number' value='$value[quantity]' min='1' max='100'>
                                <input type='hidden' name='item_name' value='$value[item_name]'>
                                </form>
                            </td>
                            <td>$value[price]<input type='hidden' class='iprice' value='$value[price]'></td>
                            <td class='itotal'></td>
                            <td>
                            <form action='manage_cart.php' method='POST'>
                            <button name='remove_item' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                            <input type='hidden' name='item_name' value='$value[item_name]'>
                            </form>
                            </td>
                        </tr>
                    ";
                }
            }
          ?>
          </tbody>
    </table>
    </div>
    <div class='col-lg-3'>
    <div class="border bg-light rounded p-4">
        <h4>Grand Total :</h4>
        <h4 class="text-center" id="gtotal"></h4>
        <br>
        <?php 
            if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)    
            {

        ?>
        <form action="purchace.php" method="POST">
          <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="full_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="number" name="phone_no" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" name="address" class="form-control" required>
          </div>
          <input type='hidden' name='item_name' value='$value[item_name]'>
          <input type='hidden' class='iprice' value='$value[price]'>
          <input type='hidden' class='' value='$value[quantity]'>
          <div class="form-check">
              <input class="form-check-input" type="radio" name="pay_mode" value="COD" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
              Cash on Delivery
              </label>
          </div>
          <!-- <div class="form-check">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
              <label class="form-check-label" for="flexRadioDefault2">
              Online 
              </label>
          </div> -->
          <br>
          <button class="btn btn-success btn-block" name="purchase"> Make Payment </button>
        </form>

        <?php
          } 
        ?>
    </div>
</div>
        </div>
    </div>
<script>

    var gt = 0;
    var iprice = document.getElementsByClassName('iprice'); 
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');

    function subTotal()
    {
        gt = 0;
        for(i=0;i<iprice.length;i++)
        {
            itotal[i].innerText = (iprice[i].value) * (iquantity[i].value);
            var add = (iprice[i].value)*(iquantity[i].value);
            gt = gt + add;
        }
        gtotal.innerText = gt;
    }
    subTotal();

</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://kit.fontawesome.com/4fb86c3e4e.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" ></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!-- <script src="js/cartjs.js"></script>
  <script src="js/script.js"></script> -->
</body>
</html>