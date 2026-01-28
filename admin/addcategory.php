<?php
    session_start();
    if(isset($_SESSION['is_admin_login']))
    {
        $adminemail = $_SESSION['admin_logemail'];
    }
    else
    {
        echo "<script>window.location='adminlogin.php';</script>";
    }

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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  
  <script>
    if(window.history.replaceState)
    {
      window.history.replaceState(null,null,window.location.href);
    }
  </script>

</head>
<body>
      <?php
            include 'header.php';
            include '../dbconn.php';
      ?>

            <div class="col-9 m-auto">
                <div class="row">
                    <div class="card m-auto mt-5" style="width: 35rem;">
                        <div class="card-header">
                          <h2 class="text-center">Add New Categaory</h2>
                        </div>
                        <div class="card-body">
                          <?php 
                            if(isset($_POST['addcatebtn']))
                            {
                              if($_POST['category_name'] == "")
                              {
                                $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Fill All field..!
                                </div>';
                              }
                              else
                              {
                                $category_name = $_POST['category_name'];
                                $category_date = $_POST['catrgory_date'];

                                $sql = "INSERT INTO category (category_name,category_date) VALUES ('$category_name','$category_date')";
                                
                                if(mysqli_query($conn,$sql) == TRUE)
                                {
                                  $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  Category Add Successfully
                                  </div>';
                                }
                                else
                                {
                                  $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  Category Add failed..
                                  </div>';
                                }
                              }
                            }
                          ?>
                            <form method="POST">
                              <?php 
                                if(isset($mess))
                                {
                                  echo $mess;
                                }
                              ?>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Categaory Name</label>
                                  <input type="text" class="form-control" id="category_name" name="category_name">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Date</label>
                                  <input type="text" class="form-control" id="catrgory_date" name="catrgory_date" value="<?php echo date("Y/m/d"); ?>" readonly>
                                </div>
                               
                                <button type="submit" class="btn btn-primary form-control" name="addcatebtn">Submit</button>
                              </form>
                        </div>
                      </div>
                </div>
            </div>
</body>
</html>