<?php 
session_start();       
 if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<?php include '_inc/dbconn.php';
	$id=  mysqli_real_escape_string($con,$_REQUEST['customer_id']);
	$sql="SELECT * FROM `customer` WHERE id=$id";
	$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
	$rws=  mysqli_fetch_array($result);
?>
<?php
    $delete_id=  mysqli_real_escape_string($con,$_REQUEST['customer_id']);
        if(isset($_REQUEST['submit2_id'])){
            $sql_delete="DELETE FROM `customer` WHERE `id` = '$delete_id'";
            $sql_drop="DROP TABLE passbook".$delete_id;
            mysqli_query($con,$sql_delete) or die(mysqli_error($con));
            mysqli_query($con,$sql_drop) or die(mysqli_error($con));
            header('location:delete_customer.php');
            }
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="newcss.css"/>
	<link rel="stylesheet" type="text/css" href="newcss2.css"/>
    <title>Επεξεργασία πελάτη</title>      
</head>
<?php include 'header_admin.php'; ?>
<div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
    <div class='addstaff'>
        <form action="alter_customer.php" method="POST">
			<table align="center">
                <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
					<tr><td colspan='2' align='center' style='color:black;'><h3>Επεξεργασία στοιχείων</h3></td></tr>
					<tr><td>Ονοματεπώνυμο</td>
						<td><input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
					</tr>
					<tr>
						<td>Φύλο</td>
						<td><input type="radio" name="edit_gender" value="M" <?php if($rws[2]=="M") echo "checked";?>/>Άνδρας
							<input type="radio" name="edit_gender" value="F" <?php if($rws[2]=="F") echo "checked";?>/>Γυναίκα
						</td>
					</tr>
					<tr>
						<td> Ημ/νια γέννησης</td>
						<td><input type="date" name="edit_dob" value="<?php echo $rws[3];?>"/> </td>
					</tr>
					<tr>
						<td>Κληρονόμος</td>
						<td><input type="text" name="edit_nominee" value="<?php echo $rws[4];?>" required=""/></td>
					</tr>
					<tr>
						<td>Τύπος Λογαριασμού</td>
						<td><select name="edit_account">
                            <option value="Personal" <?php if($rws[5]=="savings") echo "selected";?>>Προσωπικός</option>
                            <option value="Business"<?php if($rws[5]=="current") echo "selected";?>>Επιχείρηση</option>
                        </select></td>
					</tr>            
					<tr>
						<td>Διεύθυνση</td>
						<td><textarea name="edit_address"><?php echo $rws[6];?></textarea></td>
					</tr>              
						<td>Κινητό</td>
						<td><input type="text" name="edit_mobile" value="<?php echo $rws[7];?>" required=""/></td>
					</tr>

                <tr>
                    <td>Email</td>
                    <td><input type="text" name="edit_mail" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter_customer" value="Ενημέρωση στοιχείων" class='addstaff_button'/></td>
                </tr>
            </table>
        </form>
                
        </div>
        </div>
<div class="content22">
	<?php include 'footer1.php';?>
</div>               
</body>
</html>
