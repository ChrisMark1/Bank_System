<?php 
session_start();        
 if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<?php
	include '_inc/dbconn.php';
	$name=  mysqli_real_escape_string($con,$_REQUEST['staff_name']);
	$gender=  mysqli_real_escape_string($con,$_REQUEST['staff_gender']);
	$dob=  mysqli_real_escape_string($con,$_REQUEST['staff_dob']);
	$status=  mysqli_real_escape_string($con,$_REQUEST['staff_status']);
	$dept=  mysqli_real_escape_string($con,$_REQUEST['staff_dept']);
	$doj=  mysqli_real_escape_string($con,$_REQUEST['staff_doj']);
	$address=  mysqli_real_escape_string($con,$_REQUEST['staff_address']);
	$mobile=  mysqli_real_escape_string($con,$_REQUEST['staff_mobile']);
	$email= mysqli_real_escape_string($con,$_REQUEST['staff_email']);
	$password=  mysqli_real_escape_string($con,$_REQUEST['staff_pwd']);
	$sql="insert into staff values('','$name','$dob','$status','$dept','$doj','$address','$mobile',
    '$email','$password','$gender','')";
	mysqli_query($con,$sql) or die("To email υπάρχει ήδη");
	header('location:admin_hompage.php');
?>