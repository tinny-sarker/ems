<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {

    $emp_slug=$_POST['emp_slug'];
    $emp_name=$_POST['emp_name'];
    $emp_official_id=$_POST['emp_official_id'];
    $emp_email=$_POST['emp_email'];
    $emp_mobile=$_POST['emp_mobile'];
    $emp_address=$_POST['emp_address'];
    $emp_nid=$_POST['emp_nid'];
    $experience=$_POST['experience'];
    $qualification=$_POST['qualification'];
    $emp_joining_date=$_POST['emp_joining_date'];
    $employee_type_id=$_POST['employee_type_id'];
    
    if(empty($_FILES['emp_photo']['tmp_name']) || !is_uploaded_file($_FILES['emp_photo']['tmp_name'])){      
    
    $imageName=$_POST['emp_old_photo'];;
    
    $update="UPDATE employee SET emp_name='$emp_name',emp_official_id='$emp_official_id',emp_email='$emp_email',emp_mobile='$emp_mobile',emp_address='$emp_address',emp_nid='$emp_nid',experience='$experience',qualification='$qualification',emp_joining_date='$emp_joining_date',emp_photo='$imageName',employee_type_id='$employee_type_id' WHERE emp_slug='$emp_slug'";
  
    $Q=mysqli_query($con,$update);

    if($Q){
    $_SESSION['success_alert']='2';
    header('Location: all-employee.php');
    }

    }else{
    $image=$_FILES['emp_photo'];
    
    $imageName='employee_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    $update="UPDATE employee SET emp_name='$emp_name',emp_official_id='$emp_official_id',emp_email='$emp_email',emp_mobile='$emp_mobile',emp_address='$emp_address',emp_nid='$emp_nid',emp_joining_date='$emp_joining_date',emp_photo='$imageName',employee_type_id='$employee_type_id' WHERE emp_slug='$emp_slug'";
  
    $Q_image=mysqli_query($con,$update);

    if($Q_image){
    move_uploaded_file($image['tmp_name'], 'uploads/'.$imageName);
    $_SESSION['success_alert']='2';
    header('Location: all-employee.php');
    }

  }
  }    

?>