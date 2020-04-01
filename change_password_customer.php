<?php 
session_start();
 include '_inc/dbconn.php';        
	if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Αλλαγή κωδικού</title>        
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
  <style>
    .content_customer table,th,td {
	padding:6px;
	border: 1px solid #2E4372;
	border-collapse: collapse;
    text-align: center;
		}
  </style>
 </head>
 <?php include 'header.php' ?>
 <div class='content_customer'>
    <?php include 'customer_navbar.php'?>
    <div class="customer_top_nav">
        <div class="text">
			<?php include '_inc/dbconn.php';
			$cust_id=$_SESSION['cust_id'];
			$sql="SELECT * FROM customer WHERE email='$cust_id'";
			$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
			$rws=  mysqli_fetch_array($result);
			$male="M";
			$gender=$rws[2];
			if($rws[2]==$male){
				echo "Καλωσήρθατε κύριε " .$_SESSION['name'];  
				}
			else{
				echo "Καλωσήρθατε κυρία " .$_SESSION['name'] ;                
				}?> 
        </div>
	</div>  <br><br>
    <h3 style="text-align:center;color:black;">Αλλαγή κωδικού</h3>
    <form action="" method="POST">
		<table align="center">
            <tr><td>Δώστε τον παλιό κωδικό σας:</td>
                <td><input type="password" name="old_password" required=""/></td>
            </tr>
            <tr>
                <td>Δώστε τον νέο σας κωδικό:</td>
                <td><input type="password" name="new_password" required=""/></td>
            </tr>
            <tr>
                <td>Δώστε τον κωδικό ξανά:</td>
                <td><input type="password" name="again_password" required=""/></td>
            </tr>
        </table>
        <table align="center">
			<tr>
                <td><input type="submit" name="change_password" value="Αλλαγή" class="addstaff_button"/></td>
            </tr>
        </table>
    </form>
    <?php
        $change=$_SESSION['login_id'];
        if(isset($_REQUEST['change_password'])){
        $sql="SELECT * FROM customer WHERE id='$change'";
        $result=mysqli_query($con,$sql);
        $rws=  mysqli_fetch_array($result);           
        $salt="@g26jQsG&nh*&#8v";
        $old=  sha1($_REQUEST['old_password'].$salt);
        $new=  sha1($_REQUEST['new_password'].$salt);
        $again=sha1($_REQUEST['again_password'].$salt);           
        if($rws[9]==$old && $new==$again){
            mysqli_query($con,"UPDATE customer SET password='$new' WHERE id='$change'") or die(mysqli_error($con));
            header('location:customer_account_summary.php');
				}
        else{                
            header('location:customer_account_summary.php');
				}
            }
    ?>
  </div>
  <br><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>