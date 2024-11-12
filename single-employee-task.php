<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();

  $emp_id=$_SESSION['id'];
  $select="SELECT * FROM employee_task INNER JOIN employee ON employee_task.assigned_employee_id=employee.emp_id WHERE assigned_employee_id='$emp_id' AND emp_task_complete_status='0' ORDER BY emp_task_id DESC";
  $Query=mysqli_query($con,$select);

  $select="SELECT * FROM employee WHERE emp_id='$emp_id'";
  $Q_emp=mysqli_query($con,$select);
  $data_emp=mysqli_fetch_assoc($Q_emp);
    
  if($_SESSION['success_alert']=='1'){
  ?>
    <script>
      swal({title: "Done!", text: "Task work submitted successfully!", icon: "success", button: "OK",});
    </script>
  <?php
      $_SESSION['success_alert']='0';
  }

?>
    
    <!-- Main content -->
    <div id="main-content">
  <div class="container-fluid">
    <div class="block-header">
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <?php
            if($data_emp['emp_active_status']=='1'){
            ?>
            <div class="card">
              <div class="card-header bg-light">
                <div class="row">
                  <div class="col-md-10 card_header_text">
                    <b>All Assigend Tasks</b>
                  </div>
                  <div class="col-md-2 card_header_for_one_button">
                    
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-striped table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Task Title</th>
                      <th>Task Details</th>
                      <th>Assigned Date</th>
                      <th>Due Date</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach($Query as $data){
                    ?>
                      <tr>
                        <td><?= $data['emp_task_title']; ?></td>
                        <td><?= $data['emp_task_details']; ?></td>
                        <td><?= $data['emp_task_assign_date']; ?></td>
                        <?php
                        if($data['emp_task_complete_status']=='0' && date("Y-m-d")>$data['emp_task_due_date']){
                        ?> 
                        <td class="text-danger"><?= $data['emp_task_due_date']; ?></td>
                        <?php
                        }else{
                        ?>
                        <td><?= $data['emp_task_due_date']; ?></td>
                        <?php
                        }
                        
                        ?>
                        <td>
                        <a href="comment-task.php?c=<?= $data['emp_task_slug']; ?>" class="btn-primary btn btn-sm">Discussion</a>
                        </td>
                      </tr>
                    <?php
                      }


                    ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="card-footer text-muted">

              </div>
            </div>
            <?php
            }elseif($data_emp['emp_active_status']=='0'){
            ?>
              <hr>
              <h3 class="text-danger text-center"><b>Your account is blocked.</b></h3>
              <hr>
            <?php
              }
            ?>
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

<script>
  $(document).ready(function(){

    $('#dataTable').DataTable();
  });

</script>


