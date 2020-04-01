<?php 
session_start();       
 if(!isset($_SESSION['customer_login'])) 
    header('location:index.php');   
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Προσωπικά στοιχεία</title>        
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
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
    <?php
        $cust_id=$_SESSION['cust_id'];
        include '_inc/dbconn.php';
        $sql="SELECT * FROM customer WHERE email='$cust_id'";
        $result=  mysqli_query($con,$sql) or die(mysql_error());
        $rws=  mysqli_fetch_array($result);
		$name= $rws[1];
        $account_no= $rws[0];
        $dob=$rws[3];
        $nominee=$rws[4];
		if ($rws[10]="Athens")
			$branch="Αθήνας";
		elseif ($rws[10]="Piraeus")
			$branch="Πειραιώς";
		else
			$branch="Θεσσαλονίκης";
        $branch_code= $rws[11];                
        $gender=$rws[2];
        $mobile=$rws[7];
        $email=$rws[8];
        $address=$rws[6];               
        $last_login= $rws[12];              
        $acc_status=$rws[13];
		if ($rws[5]=="Personal")
			$acc_type="Προσωπικός";
		else 
			$acc_type="Επαγγελματικός";
	?>          
	<div class="customer_body"> 
		<h3 style="text-align:center;color:black;">Προσωπικά Στοιχεία</h3>
			<div class="content3">			
				<p><span class="heading">Όνομα: </span><?php echo $name;?></p>
				<p><span class="heading">Φύλο: </span><?php if($gender=='M') echo "Άνδρας"; else echo "Γυναίκα";?></p>
				<p><span class="heading">Κινητό: </span><?php echo $mobile;?></p>
				<p><span class="heading">Email: </span><?php echo $email;?></p>
				<p><span class="heading">Διεύθυνση: </span><?php echo $address;?></p>
            </div>
			<div class="content4">
				<p><span class="heading">Αριθμός λογαριασμού: </span><?php echo $account_no;?></p>
				<p><span class="heading">Κληρονόμος: </span><?php echo $nominee;?></p>
				<p><span class="heading">Τράπεζα: </span><?php echo $branch;?></p>
				<p><span class="heading">Κωδικός SWIFT/BIC: </span><?php echo $branch_code;?></p>            
				<p><span class="heading">Είδος λογαριασμού: </span><?php echo $acc_type;?></p>
				</div>
            </div>
 </div><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>
 </html>