<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();


$slug = $_GET['c'];
$select = "SELECT * FROM employee_task where emp_task_slug='$slug'";
$Query = mysqli_query($con, $select);
$data = mysqli_fetch_assoc($Query);
$emp_task_id = $data['emp_task_id'];

$emp_id = $data['assigned_employee_id'];
$emp_details_q = "SELECT * FROM employee WHERE emp_id='$emp_id'";
$emp_details_c = mysqli_query($con, $emp_details_q);
$emp_details = mysqli_fetch_assoc($emp_details_c);


$select_com = "SELECT * FROM emp_task_comment WHERE emp_task_id='$emp_task_id' ORDER BY emp_task_comment_id ASC";
$comments = mysqli_query($con, $select_com);

if ($_SESSION['success_alert'] == '8') {
?>

  <script>
    swal({
      title: "Oops!",
      text: "Task work submit process failed!",
      icon: "error",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
}

if ($_SESSION['role_id'] == '1' || $data['emp_task_complete_status'] == '0') {
?>
  <!-- Main content -->
  <div id="main-content">
    <div class="container-fluid">
      <div class="block-header">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header bg-light">
                <div class="row">
                  <div class="col-md-10 card_header_text">
                    <center> <h3 class="text-primary">Assigned Task</h3> </center>
                  </div>
                  <div class="col-md-2 card_header_for_one_button">

                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <table class="table table-striped table-bordered view_table">
                      <tr>
                        <td class="text-info">Task Title</td>
                        <td>:</td>
                        <td>
                          <?= $data['emp_task_title'] ?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-info">Task Details</td>
                        <td>:</td>
                        <td>
                          <?= $data['emp_task_details'] ?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-info">Assigned Employee</td>
                        <td>:</td>
                        <td>
                          <?= $emp_details['emp_name']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-info">Assigned Date</td>
                        <td>:</td>
                        <td>
                          <?= $data['emp_task_assign_date'] ?>
                        </td>
                      </tr>
                      <tr>
                        <td class="text-info">Due Date</td>
                        <td>:</td>
                        <?php
                        if ($data['emp_task_complete_status'] == '0' && date("Y-m-d") > $data['emp_task_due_date']) {
                        ?>
                          <td class="text-danger">
                            <?= $data['emp_task_due_date'] ?>
                          </td>
                        <?php
                        } else {
                        ?>
                          <td>
                            <?= $data['emp_task_due_date'] ?>
                          </td>
                        <?php
                        }
                        ?>
                      </tr>
                      <tr>
                        <td class="text-info">Task Status</td>
                        <td>:</td>
                        <td>
                          <?php
                          if ($data['emp_task_complete_status'] == 0) {
                            echo "Incomplete";
                          } elseif ($data['emp_task_complete_status'] == 1) {
                            echo "Completed";
                          }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-md-2"></div>
                </div>
                <?php
                if ($_SESSION['role_id'] == '2') {
                ?>
                  <div class="row">
                    <div class="col-md-12 text-danger text-center">
                      <hr>
                      <h5><b>Attach Your Work</b></h5>
                      <hr>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <form method="post" action="submit-task.php" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="" name="emp_task_slug" value="<?= $data['emp_task_slug'] ?>" required>
                        <div class="form-group row">
                          <label for="" class="col-sm-3 col-form-label"><b>Attach your work: <span class="text-danger">*</span></b></label>
                          <div class="col-sm-5">

                            <input type="file" class="form-control" id="" name="task_work_file" required>

                          </div>
                          <div class="col-sm-4">
                            <button type="submit" class="btn btn-success">Submit Task</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                  <br>
                <?php
                }
                ?>
                <div class="row">
                  <div class="col-md-12">
                    <hr>
                    <h5 class="text-center text-dark"><b>Discussion</b></h5>
                    <hr>
                    <div class="row">
                      <div class="col-md-12">
                        <form method="post" action="submit-comment-task.php">

                          <div class="card-body">
                            <input type="hidden" class="form-control" id="" name="emp_task_id" value="<?= $data['emp_task_id'] ?>" required>
                            <input type="hidden" class="form-control" id="" name="commentator_role_id" value="<?= $_SESSION['role_id']; ?>" required>
                            <input type="hidden" class="form-control" id="" name="emp_task_slug" value="<?= $data['emp_task_slug'] ?>" required>
                            <div class="form-group row">
                              <label for="" class="col-sm-3 col-form-label"><b>Discuss:<span class="text-danger"></span></b></label>
                              <div class="col-sm-8">
                                <input type="text" class="form-control" id="" name="emp_task_comment" required>
                              </div>
                              <div class="col-sm-1"></div>
                            </div>
                          </div>

                          <div class="card-footer text-muted text-center">
                            <button type="submit" class="btn btn-success">Add</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <hr><hr><hr>

                    <div class="table-responsive">
                      <table class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Comment</th>
                            <th>Time</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          foreach ($comments as $comment) {
                          ?>
                            <tr>
                              <?php
                              if ($comment['commentator_role_id'] == '1') {
                              ?>
                                <td><?= "Admin" ?></td>
                              <?php
                              } else {
                              ?>
                                <td><?= $emp_details['emp_name']; ?></td>
                              <?php
                              }
                              ?>
                              <td><?= $comment['emp_task_comment']; ?></td>
                              <td><?= $comment['emp_task_comment_time']; ?></td>
                              <td><?= $comment['emp_task_comment_date']; ?></td>
                            </tr>
                          <?php
                          }
                          ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
              <div class="card-footer text-muted">

              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

  <?php
}

get_footer();


?>