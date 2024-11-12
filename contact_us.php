<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>EMS</title>
    <!--Bootstrap-->
    <link rel="stylesheet" type="text/css" href="./website/css/bootstrap.css">
    <!--Stylesheets-->
    <link rel="stylesheet" type="text/css" href="./website/css/style.css">
    <!--Responsive-->
    <link rel="stylesheet" type="text/css" href="./website/css/responsive.css">
    <!--Animation-->
    <link rel="stylesheet" type="text/css" href="./website/css/animate.css">
    <!--Prettyphoto-->
    <link rel="stylesheet" type="text/css" href="./website/css/prettyPhoto.css">
    <!--Font-Awesome-->
    <link rel="stylesheet" type="text/css" href="./website/css/font-awesome.css">
    <!--Owl-Slider-->
    <link rel="stylesheet" type="text/css" href="./website/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="./website/css/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="./website/css/owl.transitions.css">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  [endif]-->
</head>

<body data-spy="scroll" data-target=".navbar-default" data-offset="100">
    <!--Preloader-->
    <div id="preloader">
        <div id="pre-status">
            <div class="preload-placeholder"></div>
        </div>
    </div>
    <!--Navigation-->
    <header id="menu">
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                        <a class="navbar-brand" href="#menu"><img src="images/Logo/01.png" alt=""></a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a class="scroll" href="index.php">Home</a></li>
                            <li><a class="scroll" href="index.php#about">About</a></li>
                            <li><a class="scroll" href="web-employee.php">Employee</a></li>
                            <li class="active"><a class="scroll" href="contact_us.php">Contact</a></li>
                            <li><a class="scroll" href="dashboard.php">Login</a></li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </header>
    <!--Slider-Start-->
    <section id="slider">
        <div id="home-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active" style="background-image:url(./website/images/Features/01.jpg)">
                    <div class="carousel-caption container">
                        <div class="row">
                            <div class="col-md-7 col-sm-12 col-xs-12">
                                <h1>Contact Us</h1>
                                <h2 class="text-white">As soon as possible </h2>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>

                <a class="home-carousel-left" href="#home-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a> <a class="home-carousel-right" href="#home-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
            </div>
        </div>
        <!--/#home-carousel-->
    </section>
    <!--About-Section-Start-->
    <section id="about">
        <div class="container">
            <div class="col-md-8 col-md-offset-2">
                <div class="heading">
                    <h2>Contact <span>Us</span></h2>
                    <div class="line"></div>
                    <p><span><strong></strong></span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ab-sec">

                    <form method="post" action="submit-contact-us.php" enctype="multipart/form-data">
                        <div class="form-group row mb-3">
                            <label class="col-12 col-sm-3 col-form-label"><b>Employee Name:</b></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" placeholder=" Employee Name" value="" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label"><b>Employee Type:</b></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="mobile" placeholder=" Employee Type" value="" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label class="col-sm-3 col-form-label"><b>Employee Email:</b></label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control"  placeholder="Employee Email" name="email" value="" required>
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <br>
                            <label class="col-sm-3 col-form-label"><b>Write your problem:</b>:</b></label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="details" rows="3" cols="12" required></textarea>
                            </div>
                        </div>
                        <center>
                        <button type="submit" class="btn btn-lg btn-success">Message</button>

                        </center>
                </div>
                </form>
            </div>


        </div>
        </div>
    </section>

    <footer id="footer">
        <div class="bg-sec">
            <div class="container">
                <h2>Employee Management System</h2>
            </div>
        </div>
    </footer>

    <!--Jquery-->
    <script type="text/javascript" src="./website/js/jquery.min.js"></script>
    <!--Boostrap-Jquery-->
    <script type="text/javascript" src="./website/js/bootstrap.js"></script>
    <!--Preetyphoto-Jquery-->
    <script type="text/javascript" src="./website/js/jquery.prettyPhoto.js"></script>
    <!--NiceScroll-Jquery-->
    <script type="text/javascript" src="./website/js/jquery.nicescroll.js"></script>
    <script type="text/javascript" src="./website/js/waypoints.min.js"></script>
    <!--Isotopes-->
    <script type="text/javascript" src="./website/js/jquery.isotope.js"></script>
    <!--Wow-Jquery-->
    <script type="text/javascript" src="./website/js/wow.js"></script>
    <!--Count-Jquey-->
    <script type="text/javascript" src="./website/js/jquery.countTo.js"></script>
    <script type="text/javascript" src="./website/js/jquery.inview.min.js"></script>
    <!--Owl-Crousels-Jqury-->
    <script type="text/javascript" src="./website/js/owl.carousel.js"></script>
    <!--Main-Scripts-->
    <script type="text/javascript" src="./website/js/script.js"></script>
</body>

</html>

<!-- Hosting24 Analytics Code -->
<script type="text/javascript" src="http://stats.hosting24.com/count.php"></script>
<!-- End Of Analytics Code -->





