<?php
    require_once('functions/function.php');
    needtologin();
    $emp_slug=$_GET['checkout'];
    $c_date=date("Y-m-d");
    $check_out_time=date("g:i a");

    $select="SELECT checkin_inserted_id FROM employee WHERE emp_slug='$emp_slug'";
    $Query=mysqli_query($con,$select);
    $checkin_inserted_ids=mysqli_fetch_assoc($Query);
    $checkin_inserted_id=$checkin_inserted_ids['checkin_inserted_id'];

    $emp_checkout_q="UPDATE employee SET emp_checkin_status='0' WHERE emp_slug='$emp_slug'";
    $emp_checkout=mysqli_query($con,$emp_checkout_q);
    
    $update="UPDATE emp_attendance_report SET check_out_time='$check_out_time' WHERE attendance_report_id='$checkin_inserted_id'";

    $Q=mysqli_query($con,$update);

    if($emp_checkout && $Q){
        header('Location: attendance.php');
    }else{
        header('Location: attendance.php');
    }


?>

