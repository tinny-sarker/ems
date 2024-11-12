<?php
    require_once('functions/function.php');
    needtologin();
    $emp_slug=$_GET['checkin'];
    $c_date=date("Y-m-d");
    $check_in_time=date("g:i a");

    $emp_checkin_q="UPDATE employee SET emp_checkin_status='1' WHERE emp_slug='$emp_slug'";
    $emp_checkin=mysqli_query($con,$emp_checkin_q);

    $emp_id_q="SELECT emp_id FROM employee WHERE emp_slug='$emp_slug'";
    $emp_id_d=mysqli_query($con,$emp_id_q);
    $emp_ids=mysqli_fetch_assoc($emp_id_d);
    $emp_id=$emp_ids['emp_id'];
    
    $insert="INSERT INTO emp_attendance_report(emp_id,c_date,check_in_time) 
    VALUES ('$emp_id','$c_date','$check_in_time')";

    $Q=mysqli_query($con,$insert);
    $insert_id=mysqli_insert_id($con);

    $emp_checkin_insert_id_q="UPDATE employee SET checkin_inserted_id='$insert_id' WHERE emp_slug='$emp_slug'";
    $emp_checkin_insert_id=mysqli_query($con,$emp_checkin_insert_id_q);

    if($emp_checkin && $Q && $emp_checkin_insert_id){
        header('Location: attendance.php');
    }else{
        header('Location: attendance.php');
    }
  
?>