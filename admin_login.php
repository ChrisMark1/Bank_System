<?php 
session_start();       
 if(isset($_SESSION['admin_login'])) 
    header('location:admin_homepage.php');   
?>

<!DOCTYPE html>
<html>
 <head>
  <noscript>
	<meta http-equiv="refresh" content="0;url=no-js.php">
  </noscript>  
  <meta charset="UTF-8">
  <title>Είσοδος διαχειριστή</title>        
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
 </head>
 
 <?php include 'header_admin.php'; ?>
 <div class='content11'>
	<div class="admin_login">
		<form action='' method='POST'>
         <table align="center">
            <tr><td><span class="caption">Είσοδος διαχειριστή συστήματος</span></td></tr>
            <tr><td colspan="2"><hr></td></tr>
            <tr><td>Όνομα χρήστη:</td></tr>
            <tr><td><input type="text" name="uname" required></td></tr>
            <tr><td>Κωδικός:</td></tr>
            <tr><td><input type="password" name="pwd" required></td></tr>
            <tr><td class="button1"><input type="submit" name="submitBtn" value="Είσοδος" class="button"></td></tr>
         </table>
		</form>
    </div>
 </div>  <br>          
 <?php include 'footer1.php'; ?>
 <?php 
	include '_inc/dbconn.php';
	if(!isset($_SESSION['admin_login'])){
		if(isset($_REQUEST['submitBtn'])){
			$sql="SELECT * FROM admin WHERE id='1'";
			$result=mysqli_query($con,$sql);
			$rws= mysqli_fetch_array($result);	
			$username=  mysqli_real_escape_string($con,$_REQUEST['uname']);
			$password=  mysqli_real_escape_string($con,$_REQUEST['pwd']);
			if($username==$rws[8] && $password==$rws[9]) {
				session_start();
				$_SESSION['admin_login']=1;  		
				header('location:admin_hompage.php'); }
			else
				header('location:admin_login.php');      										 }
										}
		else {
			header('location:admin_hompage.php');
			}
 ?>