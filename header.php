<?php
    session_start();

    include 'dbconn.php';
?>

<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav ">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo2.png">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="index.php">Home</a></li>

                            <li class="submenu">
                                <a href="javascript:;">Catagory</a>
                                <ul>
                                    <?php 
                                        $sql = "SELECT * FROM category";
                                        $result = mysqli_query($conn,$sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                    ?>
                                    <li><a href="products.php?c_id=<?php echo $row['category_id']; ?>"><?php echo $row['category_name']; ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li><a href="about.php">About Us</a></li>
                            <!-- <li><a href="single-product.html">Single Product</a></li> -->
                            <li><a href="contact.php">Contact Us</a></li>

                            <li class="scroll-to-section"><a href="#explore">Explore</a></li>
                           <?php 
                            if(isset($_SESSION['is_login']))
                            {
                                echo '<li><a href="logout.php">Logout</a></li>
                                <a href="cart.php" class="btn btn-outline-success" type="submit">Cart<i class="fa fa-cart-plus ms-2" aria-hidden="true"></i></a>
                                <span class="ps-4"><b >welcome, <br>'.$_SESSION['name'].'</b></span>';
                            }
                            else
                            {
                                echo '<li><a href="login.php">Login</a></li>';
                            }
                           ?>
                            
                          
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>