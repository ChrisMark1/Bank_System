<?php 
 session_start();      
  if(!isset($_SESSION['customer_login'])) 
	header('location:index.php');   
?>
<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title>Προεπισκόπηση λογαριασμού</title>
 <link rel="stylesheet" href="newcss.css">
 <link rel="stylesheet" href="newcss2.css">
 <style>
    .content_customer table,th,td {
    padding:6px;
    border: 1px solid grey;
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
        </div>  <br><br>
		<h3 style="text-align:center;color:black;">Προεπισκόπηση λογαριασμού με βάση την ημερομηνία</h3>
		<form action="customer_account_statement_date.php" method="POST">
			<table align="center">
				<tr><td>Από [μ/ημ/χχχχ] </td><td><input type="date" name="date1" required></td></tr>
				<tr><td>Μέχρι [μ/ημ/χχχχ] </td><td><input type="date" name="date2" required></td></tr>
			</table>
			<table align="center"><tr><td colspan="2" align='center'><input type="submit" name="summary_date" value="Συνέχεια" class="addstaff_button"/></td></tr>      
			</table>
        </form>    
    </div>
 </div><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>