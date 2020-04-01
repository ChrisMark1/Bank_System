<?php 
session_start();      
 if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<?php
	include '_inc/dbconn.php';
	$id=  mysqli_real_escape_string($con,$_REQUEST['staff_id']);
	$sql="SELECT * FROM `staff` WHERE id=$id";
	$result=  mysqli_query($con,$sql) or die(mysqli_error($con));
	$rws=  mysqli_fetch_array($result);
?>
<?php 
	$delete_id=  mysqli_real_escape_string($con,$_REQUEST['staff_id']);
        if(isset($_REQUEST['submit2_id'])){
            $sql_delete="DELETE FROM `staff` WHERE `id` = '$delete_id'";
            mysqli_query($con,$sql_delete) or die(mysqli_error($con));
            header('location:delete_staff.php');
                        }
?>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="newcss.css"/>
  <link rel="stylesheet" type="text/css" href="newcss2.css"/>
  <title>Επεξεργασία προσωπικού</title>
</head>
<?php include 'header_admin.php'; ?>
<div class='content_addstaff'>
	<?php include 'admin_navbar.php'?>
    <div class='addstaff'>
        <form action="alter_staff.php" method="POST">
         <table align="center" >
            <input type="hidden" name="current_id" value="<?php echo $id;?>"/>
            <tr><td colspan='2' align='center' style='color:black;'><h3>Επεξεργασία στοιχείων υπαλλήλου</h3></td></tr>
            <tr><td>Ονοματεπώνυμο</td>
                <td><input type="text" name="edit_name" value="<?php echo $rws[1];?>" required=""/></td>
            </tr>
            <tr><td>Φύλο</td>
            <td><input type="radio" name="edit_gender" value="M" <?php if($rws[10]=="M") echo "checked";?>/>Άνδρας
                <input type="radio" name="edit_gender" value="F" <?php if($rws[10]=="F") echo "checked";?>/>Γυναίκα
            </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νια γέννησης
                    </td>
                    <td>
                        <input type="date" name="edit_dob" value="<?php echo $rws[2];?>"/>
                    </td>
                </tr>
                
                <tr>
                    <td>Οικογενεική κατάσταση</td>
                    <td>
                        <select name="edit_status">
                            <option value="unmarried" <?php if($rws[3]=="unmarried") echo "selected";?>>Ανύπαντρος</option>
                            <option value="married"<?php if($rws[3]=="married") echo "selected";?>>Παντρεμένος</option>                           
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Τμήμα</td>
                    <td>
                        <select name="edit_dept">
                            <option value="revenue" <?php if($rws[4]=="revenue") echo "selected";?>>Οικονομικών</option>
                            <option value="developer" <?php if($rws[4]=="developer") echo "selected";?>>Πληροφορικής</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νια πρόσληψης
                    </td>
                    <td>
                        <input type="date" name="edit_doj" value="<?php echo $rws[5];?>"/>
                    </td>
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
                    <td><input type="email" name="edit_mail" value="<?php echo $rws[8];?>" required=""/></td>
                </tr>
                
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="alter" value="Ενημέρωση στοιχείων" class='addstaff_button'/></td>
                </tr>
            </table>
        </form>                               
    </div>
</div><br>
<div class="content22">
	<?php include 'footer1.php';?>
</div>
</body>
</html>
