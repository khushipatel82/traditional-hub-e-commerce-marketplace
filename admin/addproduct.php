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
            
            if(isset($_POST["productaddbtn"]))
            {
                if (($_POST['pro_name'] == "") || ($_POST['pro_detail'] == "") || ($_POST['pro_price'] == ""))
                {
                  $mess = '<div class="alert alert-warning  alert-dismissible fade show" role="alert">
                  Fill All field..!
                  </div>';
                }
                else{
                  $pro_name = $_POST["pro_name"];
                  $categoty_id = $_POST["categoty_id"];
                  $pro_detail = $_POST["pro_detail"];
                  $pro_price = $_POST["pro_price"];
                  $product_link = $_FILES['pro_img']['name'];
                  $product_link_temp = $_FILES['pro_img']['tmp_name'];
                  $link_folder = '../assets/images/product/' . $product_link;
                  move_uploaded_file($product_link_temp, $link_folder); 

                  $sql = "INSERT INTO product (product_name,product_detail,product_price,product_img,category_id) VALUES ('$pro_name','$pro_detail','$pro_price','$link_folder','$categoty_id')";
                                            
                  if(mysqli_query($conn,$sql) == TRUE)
                  {
                    $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Product Add Successfully
                    </div>';
                  }
                  else
                  {
                    $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Product Add failed..
                    </div>';
                  }
                }
            }

?>

      <div class="col-9 m-auto">
          <div class="row">
              <div class="card m-auto mt-5" style="width: 35rem;">
                  <div class="card-header">
                    <h2 class="text-center">Add New Product</h2>
                  </div>
                  <div class="card-body">
                      <form method="POST" enctype="multipart/form-data">
                              <?php 
                                if(isset($mess))
                                {
                                  echo $mess;
                                }
                              ?>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="pro_name" name="pro_name">
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Category</label>
                              <select class="form-select" aria-label="Default select example" name="categoty_id">
                                <?php 
                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($conn,$sql);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                ?>
                                      <option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name'];?></option>

                                      <?php } ?>
                                </select>
                          </div>
                          <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">product detail</label>
                            <input type="text" class="form-control" id="pro_detail" name="pro_detail">
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Price</label>
                              <input type="text" class="form-control" id="pro_price" name="pro_price">
                            </div>
                          <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Product Img</label>
                            <input type="file" class="form-control" id="pro_img" name="pro_img">
                          </div>
                          
                          <button type="submit" class="btn btn-primary form-control" name="productaddbtn">Submit</button>
                        </form>
                  </div>
                </div>
          </div>
      </div>
</body>
</html>


<?php
  
?>