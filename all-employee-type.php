<?php
require_once('functions/function.php');
needtologin();
get_header();
get_sidebar();


$select = 'SELECT * FROM employee_type ORDER BY employee_type_id DESC';
$Query = mysqli_query($con, $select);

if ($_SESSION['success_alert'] == '1') {
?>
  <script>
    swal({
      title: "Done!",
      text: "Employee type added successfully!",
      icon: "success",
      button: "OK",
    });
  </script>
<?php
  $_SESSION['success_alert'] = '0';
} elseif ($_SESSION['success_alert'] == '2') {
?>
  <script>
    swal({
      title: "Done!",
      text: "Employee type updated successfully!",
      icon: "success",
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
      <!-- Main row -->
      <div class="col-lg-5 col-md-6 col-sm-12">
        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i class="fa fa-arrow-left"></i></a> Employee Type</h2>
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
          <li class="breadcrumb-item active">All Employee Type</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-light">
              <div class="row">
                <div class="col-md-10 card_header_text">
                  <b>All Employee Type</b>
                </div>
                <div class="col-md-2 card_header_for_one_button">

                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable">
                  <thead>
                    <tr>
                      <th>Employee Type</th>
                      <th>Manage</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    foreach ($Query as $data) {
                    ?>
                      <tr>
                        <td><?= $data['employee_type_name']; ?></td>
                        </td>
                        <td>
                          <a href="edit-employee-type.php?e=<?= $data['employee_type_slug']; ?>" class="btn btn-info btn-sm">Edit</a>
                          <a href="delete-employee-type.php?d=<?= $data['employee_type_slug']; ?>"class="btn btn-danger btn-sm">Delete</a>
                        </td>
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
    </div>
  </div>
</div>

<!-- /.content -->

<!-- /.content-wrapper -->

<?php
get_footer();
?>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>


