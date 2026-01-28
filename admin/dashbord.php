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

</head>

<body>


    <?php
      include 'header.php';
    ?>

            <div class="col-9 ">
                <h3 class="mt-5 text-center">Registered  User</h3>
                <hr>
                <?php  
                    include '../dbconn.php';

                    $sql = "SELECT c_id,c_name,c_email FROM cust";
                    $result = mysqli_query($conn,$sql);
                    $rowcount = mysqli_num_rows($result);
                    if($rowcount > 0){

                    
                ?>
                <table class="table table-striped table-hover border">
                    <thead>
                        <tr>
                            <th>User Id</th>
                            <th>user Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['c_id']; ?></td>
                            <td><?php echo $row['c_name']; ?></td>
                            <td><?php echo $row['c_email']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php  }?>
            </div>
        </div>
      </div>
</body>

</html>