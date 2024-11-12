<?php
    require_once('functions/function.php');
    needtologin();
    $id=$_GET['d'];
    $delete="DELETE FROM contact_us WHERE id='$id'";
    if(mysqli_query($con,$delete)){
        $_SESSION['success_alert']='3';
        header('Location: message.php');
    }else{
        header('Location: message.php');
    } 
?>