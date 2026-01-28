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
        ?>

            <div class="col-9 ">
                <h3 class="mt-5 text-center">Catagory List</h3>
                <a href="addcategory.php" class="btn btn-dark"><i class="fa-solid fa-plus pe-2"></i>Add Category</a>
                <hr>
                <table class="table table-striped table-hover border">
                <?php
                    $sql = "SELECT * FROM category";
                    $result = mysqli_query($conn, $sql);
                    $rowcount = mysqli_num_rows($result);
                    if ($rowcount > 0) {
                        ?>
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Date</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td> <?php echo $row['category_id']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['category_date']; ?></td>
                            <td>
                                <form action="updatecategory.php" method="POST" class="d-inline">
                                    <input type="hidden" value="<?php echo $row['category_id']; ?>" name="cid">
                                    <button type="submit" class="btn btn-info me-2" name="view" value="view">Update</button>
                                </form>
                            </td>
                            <td>
                            <form method="POST" class="d-inline">
                                <input type="hidden" value="<?php echo $row['category_id']; ?>" name="cid">
                                <button type="submit" class="btn btn-danger me-2" name="delete" value="delete"><i
                                                class="fa-solid fa-trash"></i></button>
                            </form>
                            <?php 
                                if (isset($_POST['delete'])) {
                                    $sql = "DELETE FROM category WHERE category_id = ".$_POST["cid"];  

                                    if(mysqli_query($conn,$sql)) {
                                        echo "<script>window.location='category.php';</script>";
                                    }
                                    else
                                    {
                                        echo "unable to delete data";
                                    }
                                }
                            ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
      </div>
</body>

</html>