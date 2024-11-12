<?php
    require_once('functions/function.php');
    needtologin();
    $id=$_GET['un_block'];
    $un_block="UPDATE employee SET emp_active_status='1' WHERE emp_slug='$id'";
    if(mysqli_query($con,$un_block)){
        $_SESSION['success_alert']='5';
        header('Location: all-employee.php');
    }else{
        header('Location: all-employee.php');
    } 
?>