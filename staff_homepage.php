<?php 
session_start();       
 if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
 <?php
    $staff_id=$_SESSION['staff_id'];
    include '_inc/dbconn.php';
    $sql="SELECT * FROM staff WHERE email='$staff_id'";
    $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);
	$sql="SELECT * FROM admin WHERE id='1'";			
    $id=$rws[0];
    $name=$rws[1];
    $dob=$rws[2];
	if($rws[4]=="developer")
		$department="Πληροφορικής";
	else 
		$department="Οικονομικών";
    $doj=$rws[5];
    $mobile=$rws[7];
    $email=$rws[8];
    $gender=$rws[10];
    $last_login=$rws[11];               
    $_SESSION['login_id']=$email;
    $_SESSION['name1']=$name;
    $_SESSION['id']=$id;
?>         
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Αρχική</title>
    <link rel="stylesheet" href="newcss.css">
	<link rel="stylesheet" href="newcss2.css">
	<link rel="stylesheet" href="newcss3.css">
	<link rel="stylesheet" href="newcss4.css">
</head>
<?php include 'header_staff.php' ?>
    <div class="displaystaff_content">
        <?php include 'staff_navbar.php'?>
            <div class="customer_top_n">
				<div class="text">Καλωσήρθες <?php echo $_SESSION['name1']?></div>
            </div>           
            <div class="customer_body_">
				<div class="content1_">
					<p><span class="heading">Όνομα: </span><?php echo $name;?></p>
					<p><span class="heading">Τμήμα: </span><?php echo $department;?></p>
					<p><span class="heading">Email: </span><?php echo $email;?></p>
				</div>
				<div class="content2_">
					<p><span class="heading">Πρόσληψη: </span><?php echo $doj;?></p>
					<p><span class="heading">Τελευταία είδοσος: </span><?php echo $last_login;?></p>
				</div>
            </div>
    </div>  <br><br>
<div class="content22">         
<?php include 'footer2.php';
?>
</div>
<?php
	$date1=date('Y-m-d H:i:s');
	$_SESSION['staff_date']=$date1;
?>
            
                