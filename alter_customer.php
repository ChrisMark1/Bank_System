<?php 
session_start();        
 if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<?php include '_inc/dbconn.php';
	$name=  mysqli_real_escape_string($con,$_REQUEST['edit_name']);
	$gender=  mysqli_real_escape_string($con,$_REQUEST['edit_gender']);
	$dob=  mysqli_real_escape_string($con,$_REQUEST['edit_dob']);
	$id=  mysqli_real_escape_string($con,$_REQUEST['current_id']);
	$type=  mysqli_real_escape_string($con,$_REQUEST['edit_account']);
	$nominee=  mysqli_real_escape_string($con,$_REQUEST['edit_nominee']);
	$address=  mysqli_real_escape_string($con,$_REQUEST['edit_address']);
	$mobile=  mysqli_real_escape_string($con,$_REQUEST['edit_mobile']);
	$mail=  mysqli_real_escape_string($con,$_REQUEST['edit_mail']);
	$sql="UPDATE customer SET  name='$name', dob='$dob', nominee='$nominee', account='$type', 
     address='$address', 
        mobile='$mobile', gender='$gender', email='$mail' WHERE id='$id'";
	mysqli_query($con,$sql) or die(mysqli_error($con));
	header('location:admin_hompage.php');
?>