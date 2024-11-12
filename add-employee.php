<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();


$select = 'SELECT * FROM employee_type ORDER BY employee_type_id DESC';
$employee_type = mysqli_query($con, $select);

if ($_SESSION['success_alert'] == '8') {
?>
  <script>
    Toastr({
      title: "Opps!",
      text: "Employee registration failed! Password confirmation didn't match.",
      icon: "error",
      button: "OK",
    });
    
  </script>
<?php
  $_SESSION['success_alert'] = '0';
}
?>
<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
    <div class="col-lg-5 col-md-6 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee</h2>
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">Add Employee</li>
        </ul>
      </div>
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>Add Employee</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">

                </div>
              </div>
            </div>
            <form method="post" action="submit-add-employee.php" enctype="multipart/form-data">

              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Name <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_name" required placeholder="Name">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee ID <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_official_id" required placeholder="Employee ID">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Email <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="emp_email" name="emp_email" required placeholder="Email">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Qualification <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Employee Qualification" id="" name="qualification" value="" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Experience <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="experience" value="" placeholder="Employee Experience" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Joining Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="" name="emp_joining_date" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Mobile <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_mobile" required placeholder="Phone Number">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Address <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_address" required placeholder="Address">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee Type <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="form-control" id="" name="employee_type_id" required>
                      <option value="" selected="selected">Select Employee Type</option>
                      <?php
                      foreach ($employee_type as $emptyp) {
                      ?>
                        <option value="<?= $emptyp['employee_type_id'] ?>">
                          <?= $emptyp['employee_type_name'] ?>
                        </option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee NID <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_nid" required placeholder="NID">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Password <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="emp_password" required placeholder="Password">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Confirm Password <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="password" class="form-control" id="repassword" name="repassword" required placeholder="Confirm Password">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Photo <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="file" onchange="readURL(this);" class="form-control" id="" name="emp_photo" required>
                    <br>
                    <img id="image_preview" src="#" alt="" />
                  </div>
                  <div class="col-sm-1"></div>
                </div>
              </div>
              <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-success">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php
get_footer();
?>