<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {

    $emp_task_slug=$_POST['emp_task_slug'];

    
    $task_work_file=$_FILES['task_work_file'];
    $task_file='task_work_file_'.time().'_'.rand(100000,1000000).'.'.pathinfo($task_work_file['name'],PATHINFO_EXTENSION);
  
    $update="UPDATE employee_task SET task_work_file='$task_file',emp_task_complete_status='1' WHERE emp_task_slug='$emp_task_slug'";
  
    $q_task_work=mysqli_query($con,$update);

    if($q_task_work){
      move_uploaded_file($task_work_file['tmp_name'], 'uploads/task_works/'.$task_file);
      $_SESSION['success_alert']='1';
      header('Location: single-employee-task.php');
    }else{

      $_SESSION['success_alert']='8';
      header('Location: comment-task.php');

    }

  }
?>

