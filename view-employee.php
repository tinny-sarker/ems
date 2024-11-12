<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();


$select = 'SELECT * FROM employee_type ORDER BY employee_type_id DESC';
$employee_type = mysqli_query($con, $select);

$id = $_GET['v'];
$select = "SELECT * FROM employee where emp_slug='$id'";

$Query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($Query);

?>
<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
      <!-- Main row -->
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>View Employee Information</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">
                  <a href="all-employee.php" class="btn btn-info btn-sm float-sm-right"><i class="fas fa-user-friends"></i> ALL EMPLOYEE</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                  <table class="table table-striped table-bordered view_table">
                    <tr>
                      <td>Employee Name</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_name'] ?>
                      </td>
                    </tr>
                    tr>
                      <td>Employee ID</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_official_id'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Email</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_email'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Qualification</td>
                      <td>:</td>
                      <td>
                        <?= $data['qualification'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Experience</td>
                      <td>:</td>
                      <td>
                        <?= $data['experience'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Type</td>
                      <td>:</td>
                      <td>
                        <?php
                        foreach ($employee_type as $emptyp) {
                          if ($emptyp['employee_type_id'] == $data['employee_type_id']) {
                            echo $emptyp['employee_type_name'];
                          }
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Photo</td>
                      <td>:</td>
                      <td>
                        <?php
                        if ($data['emp_photo'] != '') {
                        ?>
                          <img src="uploads/<?= $data['emp_photo'] ?>" height="80px" width="80px">
                        <?php
                        } else {
                        ?>
                          <img src="assets/img/avatar.jpg" height="80px" width="80px">
                        <?php
                        }
                        ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Mobile</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_mobile'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Address</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_address'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee NID</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_nid'] ?>
                      </td>
                    </tr>
                    <tr>
                      <td>Employee Joining Date</td>
                      <td>:</td>
                      <td>
                        <?= $data['emp_joining_date'] ?>
                      </td>
                    </tr>
                  </table>
                </div>
                <div class="col-md-2"></div>
              </div>
            </div>
            <div class="card-footer text-muted">

            </div>
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