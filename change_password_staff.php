<?php 
session_start();
include '_inc/dbconn.php';      
 if(!isset($_SESSION['staff_login'])) 
    header('location:staff_login.php');   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Αλλαγή κωδικού</title>
    <style>
        .displaystaff_content table,th,td {
			padding:6px;
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}
	</style>
    <link rel="stylesheet" href="newcss.css">
	<link rel="stylesheet" href="newcss2.css">
	<link rel="stylesheet" href="newcss3.css">
	<link rel="stylesheet" href="newcss4.css">
</head>
<?php include 'header_staff.php' ?>
<?php include 'staff_navbar.php'?>
    <div class="displaystaff_content">
        <h3 style="text-align:center;color:black;">Αλλαγή κωδικού</h3>
        <form action="" method="POST">
        <table align="center">
            <tr><td>Δώστε τον παλιό κωδικό σας:</td>
                <td><input type="password" name="old_password" required=""/></td>
            </tr>
            <tr><td>Δώστε τον νέο σας κωδικό:</td>
                <td><input type="password" name="new_password" required=""/></td>
            </tr>
            <tr><td>Δώστε τον κωδικό ξανά:</td>
                <td><input type="password" name="again_password" required=""/></td>
            </tr>
		</table>
        <table align="center">
			<tr><td><input type="submit" name="change_password" value="Αλλαγή" class='addstaff_button'/></td></tr>          
        </table>
        </form>
<?php
    $user=$_SESSION['login_id'];
    if(isset($_REQUEST['change_password'])){
        $sql="SELECT * FROM staff WHERE email='$user'";
        $result=mysqli_query($con,$sql);
        $rws=  mysqli_fetch_array($result);
        $old=  mysqli_real_escape_string($con,$_REQUEST['old_password']);
        $new=  mysqli_real_escape_string($con,$_REQUEST['new_password']);
        $again=  mysqli_real_escape_string($con,$_REQUEST['again_password']);
            if($rws[9]==$old && $new==$again){          
                mysqli_query($con,"UPDATE staff SET pwd='$new' WHERE email='$user'") or die(mysqli_error($con));
                header('location:staff_homepage.php');
            }
            else{               
                header('location:change_password_staff.php');
            }
    }
?>          
    </div><br>
<div class="content22"> 
	<?php include 'footer2.php';?>
</div>