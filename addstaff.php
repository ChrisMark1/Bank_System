<?php 
session_start();       
 if(!isset($_SESSION['admin_login'])) 
    header('location:admin_login.php');   
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Προσθήκη υπαλλήλου</title>
  <link rel="stylesheet" href="newcss.css">
  <link rel="stylesheet" href="newcss2.css">
 </head>
<?php include 'header_admin.php'; ?>
<div class='content_addstaff'>
    <?php include 'admin_navbar.php'?>
    <div class='addstaff'>
		<form action="add_staff.php" method="POST">
         <table align='center'>
          <tr><td colspan='2' align='center' style='color:#2E4372;'><h3><font color="black">Προσθήκη υπαλλήλου</font></h3></td></tr>
          <tr><td>'Ονομα (λατινικά)</td>
				<td><input type="text" name="staff_name" required=""/></td>
          </tr>
          <tr><td>Φύλο</td>
              <td> Άνδρας<input type="radio" name="staff_gender" value="M" checked/>
                   Γυναίκα<input type="radio" name="staff_gender" value="F" />
              </td>
          </tr>
          <tr><td>Ημ/νια γέννησης</td>
              <td><input type="date" name="staff_dob" required=""/></td>             
          </tr>
          <tr><td>Οικογενεική κατάσταση</td>
              <td><select name="staff_status">
                     <option value="unmarried">Ανύπαντρος</option>
                     <option value="married">Παντρεμένος</option>

                  </select>
			  </td>             
          </tr>
          <tr><td>Τμήμα</td>
              <td><select name="staff_dept">
                     <option value="revenue">Οικονομικών</option>
                     <option value="developer">Πληροφορικής</option>
                  </select> 
			  </td>             
          </tr>
          <tr><td>Ημ/νια πρόσληψης</td>
              <td><input type="date" name="staff_doj" required=""/></td>             
          </tr>
          <tr><td>Διεύθνση (λατινικά)</td>
              <td><textarea name="staff_address" required=""></textarea></td>
          </tr>
          <tr><td>Κινητό</td>
              <td><input type="text" name="staff_mobile" required=""/></td>
          </tr>
	      <tr><td>Email</td>
              <td><input type="email" name="staff_email" required=""/></td>
          </tr>
          <tr><td>Κωδικός πρόσβασης</td>
              <td><input type="password" name="staff_pwd" required=""/></td>
          </tr>
          <tr><td colspan="2" align='center' style='padding-top:20px' ><input type="submit" name="add_staff" value="Προσθήκη μέλους" class='addstaff_button'/></td>
          </tr>
         </table>
        </form>
    </div>
</div> <br>
<div class="content22">
	<?php include 'footer1.php';?>
</div>
</body>
</html>