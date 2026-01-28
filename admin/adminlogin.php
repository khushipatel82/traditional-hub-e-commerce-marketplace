<?php

    session_start();
    include '../dbconn.php';

    if (!isset($_SESSION['is_admin_login'])) {

        if (isset($_POST['adminlobtn']) && isset($_POST['adminlogemail']) && isset($_POST['adminlogpass']))
        {
            $adlogemail = $_POST['adminlogemail'];
            $adlogpass = $_POST['adminlogpass'];

            $query = "SELECT admin_email,admin_pass FROM admin WHERE admin_email = '".$adlogemail."' AND admin_pass = '".$adlogpass."'";

            $result = mysqli_query($conn,$query);

            $resultcount = mysqli_num_rows($result);

            if ($resultcount == 1) {
                $_SESSION['is_admin_login'] = true;
                $_SESSION['admin_logemail'] = $adlogemail;

                $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Login successfully
                </div>'; 
                echo "<script>location.href='dashbord.php';</script>";

            }
            elseif ($resultcount == 0) {
                $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Login Failed..!
                </div>';
            }

            
            
        }
    }
    else
    echo "nooo";
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</head>

<body>

    <section class="vh-100" style="background-color: #508bfc;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5">

                <h3 class="mb-5 text-center">Admin Login</h3>
                <form action="" method="POST">
                <div class="form-outline mb-4">
                    <label class="form-label" for="typeEmailX-2">Email</label>
                    <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="adminlogemail">
                </div>

                <div class="form-outline mb-4">
                    <label class="form-label" for="typePasswordX-2">Password</label>
                    <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="adminlogpass">
                </div>

                <button class="btn btn-primary btn-lg btn-block" type="submit" name="adminlobtn">Login</button>

                <span class="mt-3"><?php if(isset($mess)){echo $mess;}?></span>
                </form>

            </div>
            </div>
        </div>
        </div>
    </div>
    </section>

</body>

</html>

<?php
    
?>