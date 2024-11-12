<?php
  require_once('functions/function.php');
  needtologin();
  get_header();
  get_sidebar();

  
  $slug=$_GET['e'];
  $select="SELECT * FROM employee_type WHERE employee_type_slug='$slug'";

  $Query=mysqli_query($con,$select);
  $data=mysqli_fetch_assoc($Query);

  if($_SESSION['success_alert']=='3'){
  ?>
    <script>
      swal({title: "Oops!", text: "Employee type update process failed!", icon: "error", button: "OK",});
    </script>
  <?php
      }
      $_SESSION['success_alert']='0';
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
                <b>Update Employee Type</b>
              </div>
              <div class="col-md-2 card_header_for_one_button">
                
              </div>
            </div>
          </div>
          
          <form method="post" action="submit-edit-employee-type.php" enctype="multipart/form-data">
            
          <input type="hidden" class="form-control" id="" name="employee_type_slug" value="<?= $slug ?>" required>
          <div class="card-body">
              <div class="form-group row">
                <label for="" class="col-sm-3 col-form-label">Employee Type <span class="text-danger">*</span></label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="" name="employee_type_name" value="<?=$data['employee_type_name']?>" required>
                </div>
                <div class="col-sm-1"></div>
              </div>
          </div>
          
          <div class="card-footer text-muted text-center">
            <button type="submit" class="btn btn-success">Update</button>
          </div>
          </form>
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