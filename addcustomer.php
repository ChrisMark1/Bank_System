<?php 
session_start();      
 if(!isset($_SESSION['admin_login'])) 
    header('location:adminlogin.php');   
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Προσθήκη πελάτη</title>
	<link rel="stylesheet" href="newcss.css">
	<link rel="stylesheet" href="newcss2.css">
</head>
<?php include 'header_admin.php'; ?>
<div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
    <div class='addstaff'>
		<form action="add_customer.php" method="POST">
         <table align="center">
            <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><font color="black">Προσθήκη πελάτη</font></h3></td></tr><tr>
                    <td>Όνομα πελάτη (λατινικά)</td>
                    <td><input type="text" name="customer_name" required=""/></td>
                </tr>
                <tr>
                    <td>Φύλο</td>
                    <td>
                        Άνδρας<input type="radio" name="customer_gender" value="M" checked/>
                        Γυναίκα<input type="radio" name="customer_gender" value="F" />
                    </td>
                </tr>
                <tr>
                    <td>
                        Ημ/νια γέννησης
                    </td>
                    <td>
                        <input type="date" name="customer_dob" required=""/>
                    </td>
                </tr>
                <tr>
                    <td>Κληρονόμος</td>
                    <td><input type="text" name="customer_nominee" required=""/></td>
                </tr>
                <tr>
                    <td>
                        Τράπεζα
                    </td>
                    <td>
                        <select name="branch">
                            <option value="Piraeus">Πειραιά</option>
                            <option value="Athens">Αθήνας</option>
                            <option value="Thessaloniki">Θεσσαλονίκης</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Τύπος λογαριασμόυ</td>
                    <td>
                        <select name="customer_account">
                            <option value="Personal">Προσωπικός</option>
                            <option value="Business ">Επιχείρηση</option>
                            
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Ελάχιστο ποσό</td>
                    <td><input type="text" name="initial" value="1000" min="1000" required=""/></td>
                </tr>
                
                <tr>
                    <td>Διεύθυνση (λατινικά)</td>
                    <td><textarea name="customer_address" required=""></textarea></td>
                </tr>
                <tr>
                    <td>Κινητό</td>
                    <td><input type="text" name="customer_mobile" required=""/></td>
                </tr>

                <tr>
                    <td>Email (username)</td>
                    <td><input type="email" name="customer_email" required=""/></td>
                </tr>
                <tr>
                    <td>Κωδικός</td>
                    <td><input type="password" name="customer_pwd" required=""/></td>
                </tr>
                <tr>
                    <td colspan="2" align='center' style='padding-top:20px'><input type="submit" name="add_customer" value="Προσθήκη" class="addstaff_button"/></td>
                </tr>
            </table>
            </div>
    </div>
        </form> <br>
<div class="content22">
	<?php include 'footer1.php';?>
</div>
</body>
</html>