<?php 
session_start();
 if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Προβολή δικαιούχων</title>       
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
		</div>
	</div>       
    <?php include '_inc/dbconn.php';
	$sender_id=$_SESSION["login_id"];
	$sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id'";
	$result=  mysqli_query($con,$sql) or die(mysql_error());
	?> <br><br><br>
    <h3 style="text-align:center;color:black;">Δικαιούχοι που προστέθηκαν</h3>
    <form action="delete_beneficiary.php">
	<table align="center">                      
        <th>#</th>
        <th>Όνομα</th>
        <th>Αριθμός λογαριασμού δικαιούχου</th>                
        <th>Κατάσταση</th>                                                                      
        <?php while($rws=  mysqli_fetch_array($result)){                            
            echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0];
            echo ' checked';
            echo " /></td>";
			echo "<td>".$rws[4]."</td>";
            echo "<td>".$rws[3]."</td>";
			if($rws[5]=="PENDING")
				echo "<td>"."Αναμονή έγκρισης"."</td>";	
			else 						
				echo "<td>"."Ενεργός"."</td>";                                         
            echo "</tr>";
            } ?>
	</table>
    <table align="center"><tr><td><input type="submit" name="submit_id" value="Διαγραφή δικαιούχου" class='addstaff_button'/></td></tr></table>
    </form>
  </div><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>
</body>
</html>