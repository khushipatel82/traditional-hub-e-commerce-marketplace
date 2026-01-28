<?php
  
    session_start();

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

    <title>Traditional Hub</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <link rel="stylesheet" href="assets/css/imh.css">

    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- start header -->
    <?php
    include 'header.php';
    include 'dbconn.php';
    ?>   
    <!-- end header -->

    <?php
    if (!isset($_SESSION['is_login'])) {

        if (isset($_POST['custloginbtn']) && isset($_POST['custlogemail']) && isset($_POST['custlogpass']))
        {
            $logemail = $_POST['custlogemail'];
            $logpass = $_POST['custlogpass'];

            $query = "SELECT c_name,c_email,c_pass FROM cust WHERE c_email = '".$logemail."' AND c_pass = '".$logpass."'";

            $result = mysqli_query($conn,$query);

            $resultcount = mysqli_num_rows($result);

            if ($resultcount == 1) {
                $_SESSION['is_login'] = true;
                $_SESSION['logemail'] = $logemail;
                $row = mysqli_fetch_assoc($result);
                $_SESSION['name'] = $row['c_name'];
                // echo $_SESSION['name'];
                $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Login successfully
                </div>'; 
                echo "<script>location.href='index.php';</script>";

            }
            elseif ($resultcount == 0) {
                $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Login Failed..!
                </div>';
            }
            
        }
    }
?>

    <!-- start login form -->

    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="assets/images/signup.jpg"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form method="POST">
                    <?php if (isset($mess)) {
                        echo $mess;
                        }   
                     ?>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form3Example3">Email address</label>
                            <input type="email" id="form3Example3" class="form-control form-control-lg"
                                placeholder="Enter a valid email address" name="custlogemail">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-3">
                            <label class="form-label" for="form3Example4">Password</label>
                            <input type="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="Enter password" name="custlogpass">
                        </div>


                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary" name="custloginbtn"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">
                                Login
                            </button>

                            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="signup.php"
                            class="link-danger">signUp</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

