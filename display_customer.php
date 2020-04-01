<?php 
session_start();       
 if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<?php
	include '_inc/dbconn.php';
	$sql="SELECT * FROM `customer`";
	$result=  mysqli_query($con,$sql) or die(mysql_error());
	$sql_min="SELECT MIN(id) from customer";
	$result_min=  mysqli_query($con,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min);
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="newcss.css"/>
	<link rel="stylesheet" type="text/css" href="newcss2.css"/>
	<style>
        .displaystaff_content table,th,td {
		padding:6px;
		border: 1px solid #2E4372;
		border-collapse: collapse;
		}
	</style>
    <title>Επεξεργασία στοιχείων πελατών</title>
</head>
<?php include 'header_admin.php'?>       
<div class="displaystaff_content">
    <?php include 'admin_navbar.php'?>
    <form action="editcustomer.php" method="POST">
        <table align="center">
            <th>Id</th>
            <th>Ον/επώνυμο</th>
            <th>Φύλο</th>
			<th>Ημ/νια γέννησης</th>
            <th>Κληρονόμος</th>
            <th>Λογαριασμός</th>
            <th>Διεύθνση</th>
            <th>Κινητό</th>
            <th>Email</th>
<?php while($rws=  mysqli_fetch_array($result)){
        echo "<tr><td><input type='radio' name='customer_id' value=".$rws[0]; //id
		if($rws[0]==$rws_min[0]) echo' checked';     
			echo " /></td>";                               
        echo "<td>".$rws[1]."</td>";                   //onoma                   
		  if($rws[2]=="M"){
		echo "<td>".'Άνδρας'."</td>"; }					//fillo andras
		  else {	
		echo "<td>".'Γυναίκα'."</td>";   } 				//fillo ginaika
        echo "<td>".$rws[3]."</td>";					//imerominia gennisis
        echo "<td>".$rws[4]."</td>";					//klironomos
        if ($rws[5]=="Personal")
			echo "<td>"."Προσωπικός"."</td>";	
		else 
			echo "<td>"."Επαγγελματικός"."</td>";					//logariasmos
        echo "<td>".$rws[6]."</td>";					//diefthinsi
        echo "<td>".$rws[7]."</td>";					//kinito
        echo "<td>".$rws[8]."</td>";					//email
        echo "</tr>";                       }
?>                        
        </table>
        <table align="center">
			<tr><td><input type="submit" name="submit_id" value="Επεξεργασία" class='addstaff_button'/></td> </tr>
        </table>
    </form>
</div><br>               
<div class="content22">
	<?php include 'footer1.php';?>
</div>           
</body>
</html>
