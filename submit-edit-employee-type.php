<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {

    $employee_type_slug=$_POST['employee_type_slug'];
    $employee_type_name=$_POST['employee_type_name'];
    
    $update="UPDATE employee_type SET employee_type_name='$employee_type_name' WHERE employee_type_slug='$employee_type_slug'";
  

    $Q=mysqli_query($con,$update);

    if($Q){

      $_SESSION['success_alert']='2';
      header('Location: all-employee-type.php');

    }else{
      $_SESSION['success_alert']='3';

      header('Location: edit-employee-type.php');
    }
  }

?>

