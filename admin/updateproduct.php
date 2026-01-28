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

          if (isset($_POST['productupdatebtn'])) {
            if (($_POST['pro_name'] == "") || ($_POST['category_id'] == "") || ($_POST['pro_detail'] == "") || ($_POST['pro_price'] == ""))
            {
              $mess = '<div class="alert alert-warning  alert-dismissible fade show" role="alert">
              Fill All field..!
              </div>';
            }
            else
            {
                $pro_id = $_POST['pro_id'];
                $proid = $_POST['pro_name'];
                $catid = $_POST['category_id'];
                $prodetail = $_POST['pro_detail'];
                $proprice = $_POST['pro_price'];
                $product_link = $_FILES['pro_img']['name'];
                $product_link_temp = $_FILES['pro_img']['tmp_name'];
                $link_folder = '../assets/images/product/' . $product_link;
                move_uploaded_file($product_link_temp, $link_folder); 

                $sql1 = "UPDATE product SET product_name = '$proid', product_detail = '$prodetail', product_price = '$proprice', 	product_img = '$link_folder', category_id = '$catid' WHERE 	product_id = '$pro_id' ";
  
                if (mysqli_query($conn, $sql1) == TRUE) {
                  $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Category Update Successfully
                  </div>';
                }
                else
                {
                  $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Category Update failed
                  </div>';
                }
            }
        }
        ?>

            <div class="col-9 m-auto">
                <div class="row">
                    <div class="card m-auto mt-5" style="width: 35rem;">
                        <div class="card-header">
                          <h2 class="text-center">Update Product</h2>
                        </div>
                        <div class="card-body">
                        <?php  
                            if (isset($_POST['view'])) {
                              $sql = "SELECT * FROM product WHERE product_id =".$_POST['pid'];
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
                          }
                          ?>
                            <form method="POST" enctype="multipart/form-data">
                            <?php 
                                if(isset($mess))
                                {
                                  echo $mess;
                                }
                              ?>
                            <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Product ID</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="pro_id" value="<?php if(isset($row['product_id'])) {echo $row['product_id'];} ?>" readonly>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Product Name</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="pro_name" value="<?php if(isset($row['product_name'])) {echo $row['product_name'];} ?>">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="category_id">
                                        <?php
                                          $sql = "SELECT * FROM category";
                                          $result = mysqli_query($conn,$sql);
                                          while($crow = mysqli_fetch_assoc($result)){
                                        ?>
                                        <option <?php if($row['category_id'] == $crow['category_id']) echo "selected"; ?>value="<?php if(isset($crow['category_id'])) {echo $crow['category_id'];} ?>"> <?php if(isset($crow['category_name'])) {echo $crow['category_name'];} ?></option>
                                          <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">desc</label>
                                  <input type="text" class="form-control" id="exampleInputEmail1" name="pro_detail" value="<?php if(isset($row['product_detail'])) {echo $row['product_detail'];} ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Price</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name="pro_price" value="<?php 
                                    if(isset($row['product_price'])) {echo $row['product_price'];} ?>">
                                  </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Product Img</label>
                                  <img src="<?php 
                                  if(isset($row['product_img'])) {echo $row['product_img'];} ?>" alt="" height="500px" width="500px">
                                  <input type="file" class="form-control" id="exampleInputPassword1" name="pro_img">
                                </div>
                               
                                <button type="submit" class="btn btn-info form-control" name="productupdatebtn">Update</button>
                              </form>
                        </div>
                      </div>
                </div>
            </div>
</body>
</html>
