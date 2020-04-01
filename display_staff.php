<?php 
session_start();        
 if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<?php
	include '_inc/dbconn.php';
	$sql="SELECT * FROM `staff`";
	$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
	$sql_min="SELECT MIN(id) from staff";
	$result_min=  mysqli_query($con,$sql_min);
	$rws_min=  mysqli_fetch_array($result_min);
	
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Επεξεργασία υπαλλήλου</title>
 <style>
    .displaystaff_content table,th,td {
    padding:6px;
    border: 1px solid black;
    border-collapse: collapse;
			}
	#button{
		border:none;
		  }
 </style>
 <link rel="stylesheet" href="newcss.css">
 <link rel="stylesheet" href="newcss2.css">
 <link rel="stylesheet" href="newcss3.css">
 <link rel="stylesheet" href="newcss4.css">
</head>    
<?php include 'header_admin.php' ?>    
	<div class="displaystaff_content">
		<?php include 'admin_navbar.php'?>
        <div class="displaystaff">
            <form action="editstaff.php" method="POST">
             <table align="center">
              <caption align='center' style='color:black'><h3>Στοιχεία προσωπικού</h3></caption>
				<th>Id</th>
                <th>Ον/επώνυμο</th>
                <th>Φύλο</th>
                <th>Ημ. γέννησης</th>
                <th>Οικογ. κατ.</th>
                <th>Τμήμα</th>
                <th>Πρόσληψη</th>
                <th>Διεύθνση</th>
				<th>Κινητό</th>
                <th>Email</th>
<?php

	
    while($rws=  mysqli_fetch_array($result)){
        echo "<tr><td><input type='radio' name='staff_id' value=".$rws[0];		
        if($rws[0]==$rws_min[0])  echo' checked';
		echo " /></td>";
        echo "<td>".$rws[1]."</td>";
		if($rws[10]=="M"){
			echo "<td>".'Άνδρας'."</td>"; }
		else {
			echo "<td>".'Γυναίκα'."</td>";   }         				 
        echo "<td>".$rws[2]."</td>";
		if($rws[3]=="unmarried")
			echo "<td>"."Ανύπαντρος"."</td>";	
		else {
			echo "<td>".'Παντρεμένος'."</td>";   }             
		if($rws[4]=="developer")
			echo "<td>"."Πληροφορικής"."</td>";	
		else {
			echo "<td>".'Οικονομικών'."</td>";   }             
        echo "<td>".$rws[5]."</td>";
        echo "<td>".$rws[6]."</td>";
        echo "<td>".$rws[7]."</td>";
        echo "<td>".$rws[8]."</td>";
        echo "</tr>";
		}		
?>
             </table>
             <table align="center" id='button'>
                <tr><td><input type="submit" name="submit1_id" value="Επεξεργασία μέλους" class='addstaff_button' ></td></tr>
            </table>
            </form>                                  
		</div>
	</div> <br> 
<div class="content22">
	<?php include 'footer1.php';?>
</div>
</body>
</html>