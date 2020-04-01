<?php 
session_start();
 include '_inc/dbconn.php';       
	if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Αλλαγή κωδικού</title>
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
 </head>
 <?php include 'header_admin.php' ?>
 <div class='content11'>
    <?php include 'admin_navbar.php'?>
    <div class='admin_change_pwd'>
        <form action="" method="POST">
         <table align="center">
          <tr>
			<td>Δώστε τον παλιό κωδικό σας:</td>
            <td><input type="password" name="old_password" required=""/></td>
          </tr>
          <tr>
            <td>Δώστε τον νέο σας κωδικό:</td>
            <td><input type="password" name="new_password" required=""/></td>
          </tr>
          <tr>
            <td>Δώστε τον κωδικό ξανά:</td>
            <td><input type="password" name="again_password" required=""/></td>
          </tr>
          <tr>
            <td colspan="2" align='center' style='padding-top:20px'>
			 <input type="submit" name="change_password" value="Αλλαγή" class="button"/>
			</td>
          </tr>
         </table>
        </form>
    </div>
 </div>
 <?php
    if(isset($_REQUEST['change_password'])){
        $sql="SELECT * FROM admin WHERE id='1'";
        $result= mysqli_query($con,$sql);
        $rws=  mysqli_fetch_array($result);
        $old=  mysqli_real_escape_string($con,$_REQUEST['old_password']);
        $new=  mysqli_real_escape_string($con,$_REQUEST['new_password']);
        $again=  mysqli_real_escape_string($con,$_REQUEST['again_password']);
        if($rws[9]==$old && $new==$again){
            $sql1="UPDATE admin SET pwd='$new' WHERE id='1'";
            mysqli_query($con,$sql1) or die(mysql_error());
            header('location:admin_hompage.php');
				}
        else {                
            header('location:change_password.php');
             }
				}
 ?>
 </div> <br>
 <?php include 'footer1.php';?>
 </body>
</html>