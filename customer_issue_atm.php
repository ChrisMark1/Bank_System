<?php 
 session_start();       
	if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Αίτηση για ATM</title>       
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
  <style>
    .content_customer table,th,td {
    padding:6px;
    border: 1px solid black;
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
	</div> <br><br>    
    <form action="customer_issue_atm_process.php" method="POST">
     <table align="center">
        <tr><td>Θέμα: 
			<select name="atm">
			  <option value='ATM' selected>ATM</option>
			  <option value='CHEQUE'>Επιταγή</option></td><tr>        
			</select>
     </table>      
     <table align="center">
		<tr><td><input type="submit" name="submitBtn" value="Αποστολή αίτησης" class='addstaff_button'></td></tr>
     </table>
	</form>   
	
    <?php 
        include '_inc/dbconn.php';		
        $sender_id=$_SESSION["login_id"];        
        $sql="SELECT * FROM cheque_book WHERE account_no='$sender_id'";
        $result=mysqli_query($con,$sql) or die(mysql_error());
		$c_status="-";
        $rws=mysqli_fetch_array($result);
		if ($rws[3]=="PENDING")
			$c_status="Αναμονή";
		elseif ($rws[3]=="ISSUED") $c_status="Εκδόθηκε";
        $c_id=$rws[2];       
        $sql="SELECT * FROM atm WHERE account_no='$sender_id'";		
        $result=mysqli_query($con,$sql) or die(mysql_error());
		$atm_status="-";
        $rws=mysqli_fetch_array($result);
        if ($rws[3]=="PENDING")
			$atm_status="Αναμονή";
		elseif ($rws[3]=="ISSUED") $atm_status="Εκδόθηκε";
        $a_id=$rws[2];        
        if(($a_id==$sender_id) || ($c_id==$sender_id)) {           
			echo "<table align='center'>";
			echo "<th>Αιτήματα</th>
				  <th>Κατάσταση</th>";
			echo "<tr><td>Έκδοση κάρτας ATM: </td><td>$atm_status</td></tr>";
			echo "<tr><td>Έκδοση επιταγής: </td><td>$c_status</td></tr>";
            echo "</table>"; }?>
	</div> <br><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>