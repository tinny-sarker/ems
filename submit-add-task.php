<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {

     $emp_task_slug=uniqid('TASK');
     $emp_task_title=$_POST['emp_task_title'];
     $emp_task_details=mysqli_real_escape_string($con,$_POST['emp_task_details']);
     $assigned_employee_id=$_POST['assigned_employee_id'];
     $emp_task_assign_date=$_POST['emp_task_assign_date'];
     $emp_task_due_date=$_POST['emp_task_due_date'];
    
     $insert="insert into employee_task(emp_task_title,emp_task_details,assigned_employee_id,emp_task_assign_date,emp_task_due_date,emp_task_slug) 
     values ('$emp_task_title','$emp_task_details','$assigned_employee_id','$emp_task_assign_date','$emp_task_due_date','$emp_task_slug')";

     $Q=mysqli_query($con,$insert);

     if($Q){
       $_SESSION['success_alert']='1';
       header("Location: all-task.php");
     }
  }
?>

