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
    </style>
</head>

<body>

    <!-- start header -->
    <?php
     include 'header.php';
    ?>
    <!-- end header -->
    
    <?php
    include 'dbconn.php';

    if( isset($_POST['signupbtn']))
    {
        $regname = $_POST['regname'];
        $regemail = $_POST['regemail'];
        $regpass = $_POST['regpass'];

        $chregemail = $_POST['regemail'];
    
        $query = "SELECT c_email FROM cust WHERE c_email = '$chregemail' "; 
        $result = mysqli_query($conn,$query);
        
        if(mysqli_num_rows($result) > 0)
        {
            $mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            Email Alrady Exist
          </div>';
        }
    
        else
        {
            $query = "INSERT INTO cust (c_name,c_email,c_pass) VALUES ('$regname','$regemail','$regpass')";

            if(mysqli_query($conn,$query) == TRUE)
            {
                $mess = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    SignUp Successfully
                </div>';
                $_SESSION['regname'] = $regname;
            }
            else
            {
                $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                signUp failed..!
                </div>';
            }
        }

        
    }

    
?>

    <!-- satrt signup form -->

    <section class="vh-100">
        <div class="container py-5 h-100">
            
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="assets/images/signup.jpg"
                        class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <form method="POST" name="myForm" onsubmit="return validateForm()">
                    <?php if (isset($mess)) {
                        echo $mess;
                        }   
                     ?>
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Name</label>
                            <input type="text" id="regname" class="form-control form-control-lg" name="regname">
                        </div>
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example13">Email address</label>
                            <input type="email" id="regemail" class="form-control form-control-lg" name="regemail">
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <label class="form-label" for="form1Example23">Password</label>
                            <input type="password" id="regpass" class="form-control form-control-lg" name="regpass">
                        </div>


                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="signupbtn">Sign in</button>

                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

<script>
        function validateForm() {
            var name = document.forms["myForm"]["regname"].value;
            var email = document.forms["myForm"]["regemail"].value;
            var password = document.forms["myForm"]["regpass"].value;
            
            var errors = [];
            
            if (name === "") {
                errors.push("Name is required");
            }
            
            if (email === "") {
                errors.push("Email is required");
            }

            if (password === "") {
                errors.push("password is required");
            }
            
            if (errors.length > 0) {
                alert(errors.join("\n"));
                return false;
            }
        }
        
    </script>

