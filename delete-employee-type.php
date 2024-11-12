<?php
    require_once('functions/function.php');
    needtologin();
    $id=$_GET['d'];
    $delete="DELETE FROM employee_type WHERE employee_type_slug='$id'";
    if(mysqli_query($con,$delete)){
        $_SESSION['success_alert']='3';
        header('Location: all-employee-type.php');
    }else{
        header('Location: all-employee-type.php');
    } 
?>

