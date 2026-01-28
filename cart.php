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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>

<body>

    <!-- ***** Header Area start ***** -->

    <?php
    include 'header.php';
    include 'dbconn.php';
    ?>
    <!-- ***** Header Area End ***** -->
  
    <div class="main-banner" id="top">
        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-10">
                    <?php
                     $total = 0 ;
                        if (isset($_SESSION['cart'])) { ?>
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        </div>

                        <?php
                            foreach ($_SESSION['cart'] as $k => $item) {
                                ?>
                                <div class="card rounded-3 mb-4">
                                    <div class="card-body p-4">
                                        <div class="row d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="<?php echo $item['img']; ?>" class="img-fluid rounded-3"
                                                    alt="Cotton T-shirt">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <p class="lead fw-normal mb-2">
                                                    <?php echo $item['name']; ?>
                                                </p>
                                                <p><span class="text-muted">
                                                        <?php echo $item['detail']; ?>
                                                    </span></p>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <p class="lead fw-normal mb-0">
                                                    <?php echo $item['quantity']; ?>
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h5 class="mb-0">
                                                    <?php echo $item['price'] * $item['quantity']; 
                                                        $pro = $item['price'] * $item['quantity'];
                                                        $total = $total + $pro;
                                                    ?>
                                                </h5>
                                            </div>
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a href="cart.php?remove=<?php echo $item['id']; ?>" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            }
                         ?>


                        <div class="card mb-4">
                            <div class="card-body p-4">
                                <div class="float-end">
                                    <p class="mb-0 me-5 d-flex align-items-center">
                                        <span class="small text-muted me-2">Order total:</span> <span
                                            class="lead fw-normal"><?php echo $total;?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    

                        <!-- <button type="button" class="btn btn-warning btn-block btn-lg float-end"><a href="checkout.php" class="btn btn-warning">Proceed to Pay</a></button> -->
                        <a href="checkout.php" class="btn btn-warning btn-block btn-lg float-end">Proceed to Pay</a>

                        <?php 
                        }
                        else{
                            echo '<div class="display-6">Empty Cart</div>';
                        } 
                        
                        ?>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>




</body>

</html>