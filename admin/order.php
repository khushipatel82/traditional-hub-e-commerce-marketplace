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
            include '../dbconn.php';
            $sql = "SELECT * FROM orders";
            $result = mysqli_query($conn,$sql);
          ?>
            <div class="col-9 ">
                <h3 class="mt-5 text-center">order List</h3>
                <hr>
                <?php 
                    if($resultcount = mysqli_num_rows($result) > 0)
                    {  
                ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Order Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = mysqli_fetch_assoc($result))
                            {   
                        ?>
                        <tr>
                            <td><?php echo $row['order_id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['item'];?></td>
                            <td><?php echo $row['quantity'];?></td>
                            <td><?php echo $row['price'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td>
                            <form method="POST" class="d-inline">
                                <input type="hidden" value="<?php echo $row['order_id']; ?>" name="oid">
                                <button type="submit" class="btn btn-danger me-2" name="delete" value="delete"><i
                                                class="fa-solid fa-trash"></i></button>
                            </form>
                            <?php 
                                if (isset($_POST['delete'])) {
                                    $sql = "DELETE FROM orders WHERE order_id = ".$_POST["oid"];  

                                    if(mysqli_query($conn,$sql)) {
                                        echo "<script>window.location='order.php';</script>";
                                    }
                                    else
                                    {
                                        echo "unable to delete data";
                                    }
                                }
                            ?>
                            </td>
                        </tr>
                        <?php   } ?>
                    </tbody>
                </table>
                <?php } ?>
            </div>
        </div>
      </div>
</body>

</html>