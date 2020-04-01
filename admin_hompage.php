<?php 
 session_start();       
	if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Διαχειριστής</title>        
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
 </head>
 <?php include 'header_admin.php' ?>
 <div class='content11'>
 <?php include 'admin_navbar.php'?>
 <div class='admin_staff'>               
    <ul>                    
	 <li><b>Προσωπικό</b></li>
     <li> <a href="addstaff.php"><font color="black">Προσθήκη υπαλλήλου</font></a></li>
     <li><a href="display_staff.php"><font color="black">Επεξεργασία υπαλλήλου</font></a></li>
     <li> <a href="delete_staff.php"><font color="black">Διαγραφή υπαλλήλου</font></a></li>
     </ul>
  </div>
  <div class='admin_customer'>
    <ul>
       <li><b>Πελάτες</b></li>
       <li><a href="addcustomer.php"><font color="black">Προσθήκη πελάτη</font></a></li>
       <li> <a href="display_customer.php"><font color="black">Επεξεργασία πελάτη</font></a></li>
       <li> <a href="delete_customer.php"><font color="black">Διαγραφή πελάτη</font></a></li>
  </div>
 </div> <br>
<div class="content22">
	<?php include 'footer1.php';?>
</div>
</body>
</html>