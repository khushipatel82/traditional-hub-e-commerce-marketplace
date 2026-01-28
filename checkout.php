<?php
session_start();

if(isset($_GET['remove']))
{
    $id = $_GET['remove'];
    foreach($_SESSION['cart'] as $k => $part)
    {
        if($id == $part['id'])
        {
            unset($_SESSION['cart'][$k]);
            echo "<script>window.location='cart.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <title>Tradition Hub</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" href="assets/css/imh.css">

    <script>
    if(window.history.replaceState)
    {
      window.history.replaceState(null,null,window.location.href);
    }
  </script>
  

</head>

<body>
    <!-- ***** Header Area start ***** -->
    <?php
     include 'header.php';
     include 'dbconn.php';

     if(isset($_POST['placeorderbtn']))
     {
        if($_POST['address'] == "" || $_POST['phone'] == "")
        {
          $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Fill All field..!
                  </div>';
        }
        else
        {
          if(isset($_SESSION['cart']))
          {
            if(count($_SESSION['cart']) == 0)
            {
              $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Frist item add to cart..!
              </div>';
            }
            else
            {
              $date = date("Y/m/d");
              $p_total = 0;
              $product = "";
              $quant = "";
              $name = $_POST['name'];
              $email = $_POST['email'];
              $add = $_POST['address'];
              $phone = $_POST['phone'];

              foreach($_SESSION['cart'] as $key => $pro)
              {
                $product .= $pro['name']. ",";
                $quant .= $pro['quantity']. ",";
                $pp = $pro['price'] * $pro['quantity'];
                $p_total = $p_total + $pp;  
              }

              $sql = "INSERT INTO orders (name,email,address,phone,item,quantity,price,	date) VALUES ('$name','$email','$add','$phone','$product','$quant','$p_total','$date')";
              $result = mysqli_query($conn,$sql);
              if($result)
              {
                $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Oreder Place Successfulty..
                        </div>';
              }
              else
              {
                $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Oreder Place failed..
                        </div>';
              }

            }
          }
        }
     }
     else
     {
      echo "noo";
     }
     

    ?>

    <!-- ***** Header Area end ***** -->

    <div class="main-banner" id="top">
        <div class="container w-50">
            <div class="row">
                <div class="col">
                    <h2 class="text-center mb-5">Billing Address</h2>
                    <form method="POST">
                        <?php 
                          if(isset($mess))
                          {
                            echo $mess;
                          }
                        ?>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Name</label>
                          <input type="text" class="form-control" id="name" name="name" value="<?php if(isset($_SESSION['name'])){echo $_SESSION['name'];}?>" readonly>
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="<?php if(isset($_SESSION['logemail'])){echo $_SESSION['logemail'];}?>" readonly>
                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleFormControlTextarea1">Address</label>
                            <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Phone number</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                          </div>
                        <button type="submit" class="btn btn-dark form-control" name="placeorderbtn">Place Order</button>
                      </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>