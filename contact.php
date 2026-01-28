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
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Tradition Hub</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script>
    if(window.history.replaceState)
    {
      window.history.replaceState(null,null,window.location.href);
    }
  </script>
  
<!--

TemplateMo 571 Hexashop

https://templatemo.com/tm-571-hexashop

-->
    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <?php
    include 'header.php';
    include 'dbconn.php';
    ?>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Contact Us</h2>
                        <span>Have any questions or inquiries? Contact us today, and our friendly team will be delighted to assist you on your cultural fashion journey</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="map">
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d90186.37207676383!2d-80.13495239500924!3d25.9317678710111!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d9ad1877e4a82d%3A0xa891714787d1fb5e!2sPier%20Park!5e1!3m2!1sen!2sth!4v1637512439384!5m2!1sen!2sth" width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>
                      <!-- You can simply copy and paste "Embed a map" code from Google Maps for any location. -->
                      
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Say Hello. Don't Be Shy!</h2>
                        <span>Get in touch with us - Your inquiries are valuable to us! Fill out the form below and let's start a conversation about the beauty of traditional clothing and how we can assist you</span>
                    </div>
                    <form id="contact" action="" method="post">
                        <?php if(isset($mess)){echo $mess;}?>
                        <div class="row">
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="name" type="text" id="name" name="name" placeholder="Your name" value="<?php if(isset($_SESSION['is_login'])) {echo $_SESSION['name'];}?>" readonly>
                            </fieldset>
                          </div>
                          <div class="col-lg-6">
                            <fieldset>
                              <input name="email" type="text" id="email" name="email" placeholder="Your email" value="<?php if(isset($_SESSION['is_login'])) {echo $_SESSION['logemail'];}?>" readonly>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <textarea name="message" rows="6" id="message" name="message" placeholder="Your message" required=""></textarea>
                            </fieldset>
                          </div>
                          <div class="col-lg-12">
                            <fieldset>
                              <button type="submit" id="form-submit" class="main-dark-button" name="conbtn"><i class="fa fa-paper-plane"></i></button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Contact Area Ends ***** -->
    <?php 
    if(isset($_POST['conbtn']))
    {if($_POST['message'] == "")
        {
          $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          Fill All field..!
          </div>';
        }
        else
        {
            $co_name = $_POST['name'];
            $co_email = $_POST['email'];
            $co_content = $_POST['message'];

            $sql = "INSERT INTO contact (co_name,co_email,co_content) VALUES ('$co_name','$co_email','$co_content')";

            if(mysqli_query($conn,$sql) == TRUE)
            {
                $mess = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    Request Send..
                                    </div>';
            }
            else
            {
                $mess = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    Request Send fail..
                                    </div>';
            }
        }
    }
    ?>
    <section class="section" id="explore">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="left-content">
                        <h2 class="text-center">Explore Our Products</h2>
                        <span>
                            Each piece in our carefully curated selection is a masterpiece, meticulously crafted to
                            celebrate the rich heritage and artistry of diverse cultures. Discover the vibrant colors,
                            intricate patterns, and luxurious fabrics that adorn these garments, each telling a unique
                            story of tradition and history.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Step into a world of cultural wonders and timeless elegance with our exquisite collection
                                of traditional clothing.</p>
                        </div>
                        <p>Whether you seek to honor your own cultural roots or indulge in the beauty of others, our
                            collection invites you to embark on a sartorial journey that transcends borders and unites
                            hearts.
                        </p>
                        <p>Experience the world's cultural tapestry through our carefully curated products and celebrate
                            the magnificence of traditions that have withstood the test of time..</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***** Subscribe Area Starts ***** -->
    <div class="subscribe">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h3>"Step into cultural elegance with 30% off on our exquisite traditional clothing collection. </h3>
                        <span>""Experience the allure of tradition with our exclusive collection of timeless and authentic traditional clothing - a fusion of heritage and style, tailored to perfection for the modern connoisseur."</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col-6">
                            <ul>
                                <li>Store Location:<br><span>Sunny Isles Beach, FL 33160, United States</span></li>
                                <li>Phone:<br><span>010-020-0340</span></li>
                                <li>Office Location:<br><span>North Miami Beach</span></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul>
                                <li>Work Hours:<br><span>07:30 AM - 9:30 PM Daily</span></li>
                                <li>Email:<br><span>info@company.com</span></li>
                                <li>Social Media:<br><span><a href="#">Facebook</a>, <a href="#">Instagram</a>, <a
                                            href="#">Behance</a>, <a href="#">Linkedin</a></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Subscribe Area Ends ***** -->

    <!-- ***** Footer Start ***** -->
    <?php
        include 'footer.php';
    ?>
    

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/slick.js"></script> 
    <script src="assets/js/lightbox.js"></script> 
    <script src="assets/js/isotope.js"></script> 
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

    <script>

        $(function() {
            var selectedClass = "";
            $("p").click(function(){
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("."+selectedClass).fadeOut();
            setTimeout(function() {
              $("."+selectedClass).fadeIn();
              $("#portfolio").fadeTo(50, 1);
            }, 500);
                
            });
        });

    </script>

  </body>

</html>
