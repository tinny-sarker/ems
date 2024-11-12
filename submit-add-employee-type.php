<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {
    $employee_type_slug=uniqid('EMP-TYP');

    $employee_type_name=$_POST['employee_type_name'];
    
    $insert="insert into employee_type(employee_type_name,employee_type_slug) 
    values ('$employee_type_name','$employee_type_slug')";

    $Q=mysqli_query($con,$insert);

    if($Q){
      $_SESSION['success_alert']='1';
      header('Location: all-employee-type.php');
    }else{
      $_SESSION['success_alert']='8';
      header('Location: add-employee-type.php');
    }

  }    
?>
