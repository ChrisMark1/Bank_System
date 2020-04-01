<?php 
 session_start();
  if(!isset($_SESSION['customer_login'])) 
	header('location:index.php');   
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Προσθήκη δικαιούχου</title>
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
    <form action='add_beneficiary_process.php' method='post'> <br><br>      
    <h3 style="text-align:center;color:black;">Προσθήκη δικαιούχου</h3>
     <table align="center">          
        <tr><td><span>Όνομα δικαιούχου: </span></td><td><input type='text' name='name' required></td></tr>
        <tr><td><span>Αριθμός λογαριασμού: </span></td><td><input type='text' name='account_no' required></td></tr>
        <tr><td><span>Υποκατάστημα: </span></td><td>
		 <select name='branch_select' required>                        
          <option value='Piraeus'>Πειραιώς</option>
          <option value='Athens'>Αθήνας</option>
          <option value='Thessaloniki'>Θεσσαλονίκης</option>
        </select></td></tr>
        <tr><td><span>Κωδικός SWIFT/BIC <br>
		*Αθήνας: ATTIGRAA <br>
		*Πειραιώς: PIRBGRAA <br>
		*Θεσσαλονίκης: ETHNGRAA <br> </span></td><td><input type='text' name='ifsc_code' required></td></tr> 
	</table>
	<table align="center"> <tr><td><input type='submit' name='submitBtn' value='Προσθήκη' class="addstaff_button">
	</table>     
    </form>   
</div> 	<br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div> 
</body>
</html>
           