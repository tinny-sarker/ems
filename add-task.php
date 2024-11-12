<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();

$selEmp = 'SELECT * FROM employee where emp_active_status="1"';
$employees = mysqli_query($con, $selEmp);

?>
<!-- Main content -->
<div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
      <!-- Main row -->
      <div class="col-lg-5 col-md-6 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Task</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">Add Task</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>Add Task Information</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">

                </div>
              </div>
            </div>
            <form method="post" action="submit-add-task.php">

              <div class="card-body">
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Task Title <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_task_title" required placeholder="Task Title">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Task Details <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="" name="emp_task_details" required placeholder="Task Details">
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Employee <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <select class="form-control" id="" name="assigned_employee_id" required>
                      <option value="" selected="selected">Select Employee</option>
                      <?php
                      foreach ($employees as $employee) {
                      ?>
                        <option value="<?= $employee['emp_id'] ?>"><?= $employee['emp_name'] ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Assigned Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="" name="emp_task_assign_date" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Due Date <span class="text-danger">*</span></label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="" name="emp_task_due_date" required>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
              </div>

              <div class="card-footer text-muted text-center">
                <button type="submit" class="btn btn-success">Assign Task</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /.content -->
      </div>
    </div>
  </div>
</div>
<!-- /.content-wrapper -->

<?php
get_footer();
?>