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

                if (isset($_POST['categoryupdatebtn'])) {
                  if (($_POST['category_name'] == "") || ($_POST['category_date'] == ""))
                  {
                    $mess = '<div class="alert alert-warning  alert-dismissible fade show" role="alert">
                    Fill All field..!
                    </div>';
                  }
                  else
                  {
                      $catid = $_POST['category_id'];
                      $catname = $_POST['category_name'];
                      $catdatele = $_POST['category_date'];

                      $sql1 = "UPDATE category SET category_name = '$catname', category_date = '$catdatele' WHERE category_id = '$catid' ";
        
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
                          <h2 class="text-center">Update Categaory</h2>
                        </div>
                        <div class="card-body">
                          <?php  
                            if (isset($_POST['view'])) {
                              $sql = "SELECT * FROM category WHERE category_id =".$_POST['cid'];
                              $result = mysqli_query($conn,$sql);
                              $row = mysqli_fetch_assoc($result);
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
                                  <label for="exampleInputEmail1" class="form-label">Categaory ID</label>
                                  <input type="text" class="form-control" id="catrgory_name" name="category_id" value="<?php if(isset($row['category_id'])) {echo $row['category_id'];} ?>" readonly>
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Categaory Name</label>
                                  <input type="text" class="form-control" id="catrgory_name" name="category_name" value="<?php if(isset($row['category_name'])) {echo $row['category_name'];} ?>">
                                  
                                </div>
                                <div class="mb-3">
                                  <label for="exampleInputPassword1" class="form-label">Date</label>
                                  <input type="text" class="form-control" id="catrgory_date" name="category_date" value="<?php if(isset($row['category_date'])) {echo $row['category_date'];} ?>">
                                </div>
                               
                                <button type="submit" class="btn btn-info form-control" name="categoryupdatebtn">Update</button>
                              </form>
                        </div>
                      </div>
                </div>
            </div>
</body>
</html>