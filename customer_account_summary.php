<?php 
 session_start();        
	if(!isset($_SESSION['customer_login'])) 
		header('location:index.php');   
?>
<?php
    $cust_id=$_SESSION['cust_id'];
    include '_inc/dbconn.php';
    $sql="SELECT * FROM customer WHERE email='$cust_id'";
    $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);
    $male="M";               
    $name= $rws[1];
    $account_no= $rws[0];
    $branch=$rws[10];
    $branch_code= $rws[11];
    $last_login= $rws[12];
    $acc_status=$rws[13];
    $address=$rws[6];
    $acc_type=$rws[5];                
    $gender=$rws[2];
    $mobile=$rws[7];
    $email=$rws[8];               
    $_SESSION['login_id']=$account_no;
    $_SESSION['name']=$name;   
?>

<!DOCTYPE html>
<html>
 <head>      
    <meta charset="UTF-8">
    <title>Αρχική e-σοδημα</title>        
    <link rel="stylesheet" href="newcss.css">
	<link rel="stylesheet" href="newcss2.css">
 </head>
    <?php include 'header.php' ?>
    <div class='content_customer'>            
        <?php include 'customer_navbar.php'?>
        <div class="customer_top_nav">
            <div class="text"><?php
				if($rws[2]==$male){
					echo "Καλωσήρθατε κύριε " .$_SESSION['name'];  
				}
            else{
                echo "Καλωσήρθατε κυρία " .$_SESSION['name'] ;                
            }           
            ?> 
            </div>
		</div> 
        <?php  
          $sql="SELECT * FROM passbook".$_SESSION['login_id'] ;
          $result=  mysqli_query($con,$sql) or die(mysqli_error($con));
            while($rws=  mysqli_fetch_array($result)) {               
                $balance=$rws[7];
                }            
		?>
			<div class="customer_body">
                <div class="content1">
					<p><span class="heading">Αριθμός λογαριασμού: </span><?php echo $account_no;?></p>
					<p><span class="heading">Υποκατάστημα: </span>
					  <?php if($branch=="Athens"){
								echo 'Aθήνας'; }
							elseif($branch=="Thessaloniki"){
								echo 'Θεσσαλονίκης'; }
							else
								echo 'Πειραιά';  ?></p>
					<p><span class="heading">Κωδ. υποκαταστήματος: </span><?php echo $branch_code;?></p>
				</div>           
				<div class="content2">
					<p><span class="heading">Ποσό:  </span><?php echo $balance;?> €</p>
					<p><span class="heading">Κατάσταση λογαριασμού: </span>
					<?php if($acc_status=="ACTIVE"){
					  echo 'Ενεργός'; }					
							else
								echo 'Ανενεργός';  ?></p>
					<p><span class="heading">Τελευταία είσοδος: </span><?php echo $last_login;?></p>
				</div>          
			</div> 
    </div><br>
<div class="content22">
	<?php include 'footer.php';?>
</div>          
 </body>
</html>