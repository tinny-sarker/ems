<?php
    require_once('functions/function.php');
    needtologin();
    $id=$_GET['d'];
    $delete="DELETE FROM employee WHERE emp_slug='$id'";
    if(mysqli_query($con,$delete)){
        $_SESSION['success_alert']='3';
        header('Location: all-employee.php');
    }else{
        header('Location: all-employee.php');
    } 
?>