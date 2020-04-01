<?php 
session_start();        
 if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Εγκρίσεις αιτήσεων ATM</title>
    <link rel="stylesheet" href="newcss.css">
	<link rel="stylesheet" href="newcss2.css">
	<link rel="stylesheet" href="newcss3.css">
	<link rel="stylesheet" href="newcss4.css">
    <style>
        .displaystaff_content table,th,td {
			padding:6px;
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}
	</style>
</head>
<?php include 'header_staff.php' ?>
<div class="displaystaff_content">
<?php include 'staff_navbar.php'?>
<h3 style="text-align:center;color:black;">Εγκρίσεις αιτήσεων ATM</h3>
<?php
	include '_inc/dbconn.php';
	$sql="SELECT * FROM atm WHERE atm_status='PENDING'";
	$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
?>
<form action="staff_atm_approve_process.php" method="POST">
 <table align="center">
		<th>#</th>
        <th>Όνομα</th>
        <th>Αρ. λογαριασμού</th>
        <th>Κατάσταση</th>
<?php while($rws=  mysqli_fetch_array($result)){
        echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
        echo ' checked';
        echo " /></td>";
        echo "<td>".$rws[1]."</td>";
        echo "<td>".$rws[2]."</td>";
        if($rws[3]=="PENDING")
			echo "<td>"."Αναμονή έγκρισης"."</td>";	
				else 						
            echo "<td>"."Ενεργός"."</td>";                          
        echo "</tr>";
} ?>
 </table>
 <table align="center">
        <tr><td><input type="submit" name="submit_id" value="Έγκριση" class='addstaff_button'/></td></tr>
 </table>
</form>
</div><br><br>
<div class="content22">         
	<?php include 'footer2.php';?>