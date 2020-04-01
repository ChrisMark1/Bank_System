<?php 
session_start();       
 if(isset($_SESSION['staff_login'])) 
    header('location:staff_homepage.php');   
?>
<!DOCTYPE html>
<html>
<head>
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>  
    <meta charset="UTF-8">
    <title>Είσοδος υπαλλήλου</title>
    <link rel="stylesheet" href="newcss.css">
	<link rel="stylesheet" href="newcss2.css">
	<link rel="stylesheet" href="newcss3.css">
</head>
<?php
include 'header_staff.php'; ?>
<div class='content_2'>
	<div class="staff_login">
		<form action='' method='POST'>
			<table align="center">
				<tr><td><span class="caption2">Είσοδος υπαλλήλου</span></td></tr>
				<tr><td colspan="2"><hr></td></tr>
				<tr><td>Email:</td></tr>
				<tr><td><input type="text" name="uname"></td></tr>
				<tr><td>Κωδικός:</td></tr>
				<tr><td><input type="password" name="pwd"></td></tr>
				<tr><td class="button1"><input type="submit" name="submitBtn" value="Σύνδεση" class="button_new"></td></tr>
			</table>
		</form>
    </div>
</div><br><br>
<div class="content22">         
<?php include 'footer2.php';
?>
</div>
<?php
if(isset($_REQUEST['submitBtn'])){
    include '_inc/dbconn.php';
    $username=$_REQUEST['uname'];
    $password=$_REQUEST['pwd']; 
    $sql="SELECT email,pwd FROM staff WHERE email='$username' AND pwd='$password'";
    $result=mysqli_query($con,$sql) or die(mysql_error());
    $rws= mysqli_fetch_array($result);
    if($rws[0]==$username && $rws[1]==$password){
        session_start();
        $_SESSION['staff_login']=1;
        $_SESSION['staff_id']=$username;       
		header('location:staff_homepage.php'); 
    }
    else
        echo "Αποτυχία";       
}
?>