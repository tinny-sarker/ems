<!doctype html>
<html lang="en">

<head>
  <title>Employee Management System - login</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
  <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <link rel="stylesheet" href="./assets/vendor/font-awesome/css/font-awesome.min.css">

  <link rel="stylesheet" href="./assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css">
  <link rel="stylesheet" href="./assets/vendor/chartist/css/chartist.min.css">
  <link rel="stylesheet" href="./assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css">
  <link rel="stylesheet" href="./assets/vendor/toastr/toastr.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="./assets/css/main.css">
  <link rel="stylesheet" href="./assets/css/color_skins.css">
</head>

<body>
  <!-- Main content -->
  <div class="container-fluid mt-5">
    <!-- Main row -->
    <div class="row">
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header bg-light">
            <div class="row">
              <div class="col-md-6 card_header_text">
                Log In
              </div>
              <div class="col-md-6 card_header_for_one_button float-sm-right">
                <?php
                require_once('functions/function.php');

                if (!empty($_POST)) {
                  $emp_email = $_POST['emp_email'];
                  $password = md5($_POST['emp_password']);

                  $select_emp = "SELECT * FROM employee WHERE emp_email='$emp_email' AND emp_password='$password'";
                  $Q_emp = mysqli_query($con, $select_emp);
                  $Q_emp_data = mysqli_fetch_assoc($Q_emp);

                  $select_sa = "SELECT * FROM super_admin WHERE sa_email='$emp_email' AND sa_password='$password'";
                  $Q_sa = mysqli_query($con, $select_sa);
                  $Q_sa_data = mysqli_fetch_assoc($Q_sa);

                  if ($Q_emp_data) {
                    if ($Q_emp_data['emp_active_status'] == '1') {

                      $_SESSION['id'] = $Q_emp_data['emp_id'];
                      $_SESSION['email'] = $Q_emp_data['emp_email'];
                      $_SESSION['name'] = $Q_emp_data['emp_name'];
                      $_SESSION['photo'] = $Q_emp_data['emp_photo'];
                      $_SESSION['role_id'] = $Q_emp_data['role_id'];
                      $_SESSION['emp_slug'] = $Q_emp_data['emp_slug'];
                      $_SESSION['emp_password'] = $Q_emp_data['emp_password'];
                      $_SESSION['success_alert'] = '0';

                      if ($Q_emp_data['role_id'] == '1') {
                        header('Location: dashboard.php');
                      } else {
                        header('Location: dashboard.php');
                      }
                    } else {
                      echo '<span class="text-danger"><b>Your account is blocked!<b></span>';
                    }
                  } elseif ($Q_sa_data) {
                    $_SESSION['id'] = "SA1";
                    $_SESSION['email'] = $Q_sa_data['sa_email'];
                    $_SESSION['name'] = "Admin";
                    $_SESSION['photo'] = "";
                    $_SESSION['role_id'] = $Q_sa_data['role_id'];
                    $_SESSION['sa_password'] = $Q_sa_data['sa_password'];
                    $_SESSION['success_alert'] = '0';

                    header('Location: dashboard.php');
                  } else {
                    echo '<span class="text-warning"><b>Your email or password did not match!<b></span>';
                    //header('Location: login.php');
                  }
                }
                ?>
              </div>
            </div>
          </div>
          <form method="post" action="">

            <div class="card-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Email <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="" name="emp_email" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="" name="emp_password" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
            </div>

            <div class="card-footer text-muted text-center">
              <button type="submit" class="btn btn-success">Log in</button>
            </div>
          </form>
        </div>
        <div class="col-md-3"></div>
      </div>
    </div>
    <!-- all js link -->
  </div>
  <!-- all js link -->
  <!-- Javascript -->
  <script src="./assets/bundles/libscripts.bundle.js"></script>
  <script src="./assets/bundles/vendorscripts.bundle.js"></script>

  <script src="./assets/bundles/chartist.bundle.js"></script>
  <script src="./assets/bundles/knob.bundle.js"></script> <!-- Jquery Knob-->
  <script src="./assets/vendor/toastr/toastr.js"></script>

  <script src="./assets/bundles/mainscripts.bundle.js"></script>
  <script src="./assets/js/index.js"></script>
</body>

</html>

