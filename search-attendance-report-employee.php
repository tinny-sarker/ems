<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

if (!empty($_GET)) {
  $search_date = $_GET['s_date'];

  $select = "SELECT * FROM emp_attendance_report INNER JOIN employee ON emp_attendance_report.emp_id=employee.emp_id WHERE c_date='$search_date' ORDER BY attendance_report_id DESC";
  $Query = mysqli_query($con, $select);
}
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
                <div class="col-md-8 card_header_text">
                  <b>Searched Attendance Report's Date : <span class="text-danger"><?= $search_date ?></span></b>
                </div>
                <div class="col-md-4 card_header_for_one_button">
                  <form method="get" action="search-attendance-report-employee.php">
                    <div class="form-group row float-sm-right">
                      <div class="col-sm-8">
                        <input type="date" class="form-control" id="" name="s_date" required>
                      </div>
                      <div class="col-sm-4"><button type="submit" class="btn btn-info">Search</button></div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Employee Name</th>
                      <th>Check In Time</th>
                      <th>Check Out Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($Query as $data) {
                    ?>
                      <tr>
                        <td><?= $data['emp_name']; ?></td>
                        <td><?= $data['check_in_time']; ?></td>
                        <td><?= $data['check_out_time']; ?></td>
                      </tr>
                    <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
            <div class="card-footer text-muted">

            </div>
          </div>
        </div>
      </div>
      <!-- /.content -->
    </div>
  </div>
</div>

<!-- /.content-wrapper -->

<?php
get_footer();
?>