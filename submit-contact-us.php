<?php
 
 require_once('functions/function.php');

  if(!empty($_POST))
  {
    
    $name=$_POST['name'];
    $mobile=$_POST['mobile'];
    $email=$_POST['email'];
    $details=mysqli_real_escape_string($con,$_POST['details']);

  
    $insert="insert into contact_us(name,mobile,email,details) 
    values ('$name','$mobile','$email','$details')";

    $Q=mysqli_query($con,$insert);

    if($Q){
        $_SESSION['success_alert']='1';
      header("Location: contact_us.php");
    }else{

        $_SESSION['success_alert']='8';
      
        header("Location: contact_us.php");
    
    }
   
  }

?>
