<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {  
     $emp_task_slug=$_POST['emp_task_slug'];

     $emp_task_id=$_POST['emp_task_id'];
     $commentator_role_id=$_POST['commentator_role_id'];
     $emp_task_comment=mysqli_real_escape_string($con,$_POST['emp_task_comment']);
     $emp_task_comment_time=date("g:i a");
     $emp_task_comment_date=date("Y-m-d");
    
     $insert="INSERT INTO emp_task_comment(commentator_role_id,emp_task_comment,emp_task_id,emp_task_comment_time,emp_task_comment_date) 
     VALUES ('$commentator_role_id','$emp_task_comment','$emp_task_id','$emp_task_comment_time','$emp_task_comment_date')";

     $Q=mysqli_query($con,$insert);

     if($Q){
      header("Location: comment-task.php?c=$emp_task_slug");
     }
  } 
?>