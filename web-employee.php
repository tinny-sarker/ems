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
                            <li class="active"><a class="scroll" href="web-employee.php">Employee</a></li>
                            <li><a class="scroll" href="contact_us.php">Contact</a></li>
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
                                <h1>OUR EMPLOYEE</h1>
                                <h2 class="text-white">All Employee's Profile</h2>
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

  <!--Service-Section-Start-->
  <?php

  $db_name = 'ems';
  $db_host = 'localhost';
  $db_user = 'root';
  $db_pass = '';

  $con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
  if (!$con) {
    echo "Database Connection Error!";
  }


  $select = 'SELECT * FROM employee WHERE role_id="2" ORDER BY emp_id DESC';
  $Query = mysqli_query($con, $select);

  $select = 'SELECT * FROM employee_type ORDER BY employee_type_id DESC';
  $employee_type = mysqli_query($con, $select);
  ?>
  <section id="employee">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="heading">
          <h2 class="text-center">Our Employee</h2>
          
          <p><span><strong></strong></span></p>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($Query as $data) {
        ?>
          <div class="col-md-4 col-sm-6 col-xs-12 team-main-sec wow slideInUp" data-wow-duration="1s" data-wow-delay=".1s">
            <div class="team-sec">
              <div class="team-img">
                <?php
                if ($data['emp_photo'] != '') {
                ?>
                  <img src="uploads/<?= $data['emp_photo'] ?>" height="300px" width="350px">
                <?php
                } else {
                ?>
                  <img src="./website/images/" height="300px" width="350px">
                <?php
                }
                ?>
                <div class="team-desc">
                  <h5 class="text-center"><?= $data['emp_name']; ?></h5>
                  <!-- <p class="text-center"> Employee type: 
                  </p> -->
                  
                  <p> Qualification : <?= $data['qualification']; ?></p>
                  <p> Email : <?= $data['emp_email']; ?></p>
                  <p> Employee type : <?php
                                          foreach ($employee_type as $emptyp) {
                                            if ($emptyp['employee_type_id'] == $data['employee_type_id']) {
                                              echo $emptyp['employee_type_name'];
                                            }
                                          }
                                          ?></p>
                  <p> Phone : <?= $data['emp_mobile']; ?></p>
                  <p> Joining date : <?= $data['emp_joining_date']; ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php
        }
        ?>


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

