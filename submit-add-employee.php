<?php
  require_once('functions/function.php');
  needtologin();

  if(!empty($_POST))
  {

     $emp_slug=uniqid('EMP');
     $emp_name=$_POST['emp_name'];
     $emp_official_id=$_POST['emp_official_id'];
     $emp_email=$_POST['emp_email'];
     $emp_mobile=$_POST['emp_mobile'];
     $emp_address=$_POST['emp_address'];
     $emp_nid=$_POST['emp_nid'];
     $experience=$_POST['experience'];
     $qualification=$_POST['qualification'];
     $emp_joining_date=$_POST['emp_joining_date'];
     $password=md5($_POST['emp_password']);
     $repass=md5($_POST['repassword']);
     $employee_type_id=$_POST['employee_type_id'];
     $image=$_FILES['emp_photo'];
     $imageName='employee_'.time().'_'.rand(100000,1000000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
    
     $insert="insert into employee(emp_name,emp_official_id,emp_email,emp_mobile,emp_address,emp_nid,qualification,experience,emp_joining_date,emp_password,emp_photo,employee_type_id,emp_slug) 
     values ('$emp_name','$emp_official_id','$emp_email','$emp_mobile','$emp_address','$emp_nid','$qualification','$experience','$emp_joining_date','$password','$imageName','$employee_type_id','$emp_slug')";

     if($password==$repass){
  
      $Q=mysqli_query($con,$insert);

      if($Q){
       move_uploaded_file($image['tmp_name'], 'uploads/'.$imageName);
       $_SESSION['success_alert']='1';
       header('Location: all-employee.php');
      }
     }else{
       $_SESSION['success_alert']='8';
       header('Location: add-employee.php');
     }

  }    
?>