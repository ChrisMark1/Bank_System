<?php 
session_start();
 if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
 <head>
   <meta charset="UTF-8">
   <title>Μεταφορά κεφαλαίου</title>       
   <link rel="stylesheet" href="newcss.css">
   <link rel="stylesheet" href="newcss2.css">
   <style>
	.content_customer table,th,td {
		padding:6px;
		border: 1px solid #2E4372;
		border-collapse: collapse;
		text-align: center;
    }
	.content_customer td {
		padding:10px;
    }	
	.head {  
		text-align:center;
		color:#2E4372;
		font-weight:bold;
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
	</div> <br><br><br>            
    <h3 style="text-align:center;color:black;">Μεταφορά κεφαλαίου</h3>                                
    <?php include '_inc/dbconn.php';
    $sender_id=$_SESSION["login_id"];             
    $sql="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
    $result=  mysqli_query($con,$sql);
    $rws=mysqli_fetch_array($result);
    $s_id=$rws[1];              
    ?>   
    <?php if($sender_id==$s_id) {          
		echo "<form action='customer_transfer_process.php' method='POST'>";
        echo "<table align='center'>";
        echo "<tr><td>Επιλογή δικαιούχου:</td><td> <select name='transfer'>" ;       
        $sql1="SELECT * FROM beneficiary1 WHERE sender_id='$sender_id' AND status='ACTIVE'";
        $result=  mysqli_query($con,$sql);               
			while($rws=mysqli_fetch_array($result)) {
				echo "<option value='$rws[3]'>$rws[4]</option>";
			}      
        echo "</td></tr></select>";        
        echo "<tr><td>Ποσό: </td><td><input type='number' name='t_val' required></td></table>";       
        echo "<table align='center'><tr><td style='padding:5px;'><input type='submit' name='submitBtn' value='Μεταφορά' class='addstaff_button'></td></tr></table></form>"; 
        }
        else{
			echo "<br><br><div class='head'><h3>No Benefeciary Added with your account.</h3></div>";
        }
    ?>
 </div> <br><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>