<?php
    require_once('functions/function.php');
    needtologin();
    $id=$_GET['b'];
    $block="UPDATE employee SET emp_active_status='0' WHERE emp_slug='$id'";
    if(mysqli_query($con,$block)){
        $_SESSION['success_alert']='4';
        header('Location: all-employee.php');
    }else{
        header('Location: all-employee.php');
    } 
?>