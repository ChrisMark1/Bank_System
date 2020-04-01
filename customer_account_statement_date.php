<?php 
 session_start();       
  if(!isset($_SESSION['customer_login'])) 
	header('location:index.php');   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Ποεπισκόπηση λογαριασμού</title>       
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
<div class="content_customer">
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
    </div> </br></br>
	<h3 style="text-align:center;color:black;">Προεπισκόπηση κατά ημερομηνία</h3>
	<table align="center">
		<th>#</th>
		<th>Ημέρα Συνναλαγής</th>
        <th>Ενέργεια</th>
        <th style="color:green;">Πίστωση</th>
        <th style="color:red";>Χρέωση</th>
        <th style="color:blue">Ισοζύγιο</th>   
<?php if(isset($_REQUEST['summary_date'])) {
    $date1=$_REQUEST['date1'];
    $date2=$_REQUEST['date2'];                    
    include '_inc/dbconn.php';
    $sender_id=$_SESSION["login_id"];
    $sql="SELECT * FROM passbook".$sender_id." WHERE transactiondate BETWEEN '$date1' AND '$date2'";
    $result=  mysqli_query($con,$sql) or die(mysql_error());
    while($rws=  mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$rws[0]."</td>"; //id
        echo "<td>".$rws[1]."</td>"; //imerominia sinallagis
        if($rws[8]=="Account Open")
			echo "<td>"."Ενεργοποίηση λογ."."</td>";	
		elseif ($rws[5]==0)
			echo "<td>"."Προς ".$rws[8]."</td>";											
		else	
			echo "<td>"."Από ".$rws[8]."</td>"; //energeia
		if ($rws[5]==0)
			echo "<td>".""."</td>";
		else	
			echo "<td>".$rws[5]." €"."</td>"; //pistosi
		if ($rws[6]==0)
			echo "<td>".""."</td>";
		else	
        echo "<td>".$rws[6]." €"."</td>"; //xreosi
        echo "<td>".$rws[7]." €"."</td>"; //isozugio      
        echo "</tr>";
        }
    } ?>
	</table>
</div><br>
<div class="content22"> 
	<?php include 'footer.php';?>
</div>