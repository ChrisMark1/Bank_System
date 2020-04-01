<?php 
if(isset($_REQUEST['submitBtn'])){
    include '_inc/dbconn.php';
    $username=$_REQUEST['uname'];   
    $salt="@g26jQsG&nh*&#8v"; //salting of password
    $password= sha1($_REQUEST['pwd'].$salt);  
    $sql="SELECT email,password FROM customer WHERE email='$username' AND password='$password'";
    $result=mysqli_query($con,$sql) or die(mysqli_error($con));
    $rws=  mysqli_fetch_array($result);   
    $user=$rws[0];
    $pwd=$rws[1];      
    if($user==$username && $pwd==$password){
        session_start();
        $_SESSION['customer_login']=1;
        $_SESSION['cust_id']=$username;
		header('location:customer_account_summary.php'); 
    }  
	else{
		header('location:index.php');  
	}}
?>
<?php session_start();
    if(isset($_SESSION['customer_login'])) 
		header('location:customer_account_summary.php');   
?>
<!DOCTYPE html>
<html>
<head>     
    <noscript><meta http-equiv="refresh" content="0;url=no-js.php"></noscript>    
    <meta charset="ISO-8859-7">
    <title>e-σοδημα</title>
	<link rel="stylesheet" type="text/css" href="newcss.css?version=51">
	<link rel="stylesheet" href="newcss2.css">
	
 </head>
    <body style="background-color:powderblue;">
    <?php include 'header.php' ?>      
        <div class="user_login">
            <form action='' method='POST'>
			<table align="left">
				<tr><td><span class="caption">Συνδεθείτε με ασφάλεια</span></td></tr>
				<tr><td colspan="2"><hr></td></tr>
				<tr><td>Email:</td></tr>
				<tr><td><input type="text" name="uname" required></td> </tr>
				<tr><td>Κωδικός:</td></tr>
				<tr><td><input type="password" name="pwd" required></td></tr>            
				<tr><td class="button1"><input type="submit" name="submitBtn" value="Σύνδεση" class="button"></td></tr>
			</table>
            </form>
         </div>        
        <div class="image">
			<img src="homep.jpg" height="100%" width="100%">           
        </div>            
        <div class="left_panel">
            <p>Η πλατφόρμα μας παρέχει υπηρεσίες προσωπικών συνναλαγών που σας δίνουν πλήρη έλεγχο για κάθε σας απαίτηση οποιαδήποτε στιγμή.</p>
            <h3>Παροχές</h3>
            <ul><li>Εγγραφή για χρήση υπηρεσιών e-banking.</li>
                <li>Μπορείτε να προσθέσετε λογαριασμό δικαιούχου.</li>
                <li>Μεταφορά χρηματικών ποσών.</li>
                <li>Καταγραφή τελευταίων εισόδων για λόγους ασφαλείας.</li>
                <li>Κατάθεση</li>
                <li>ATM και τραπεζικές επιταγές.</li>
                <li>Ιστορικό καταθέσεων</li>           
            </ul>
        </div>
        <div class="right_panel">               
            <h3>Προσωπική διαχείριση τραπεζικού λογαριασμού</h3>
            <ul><li>Η εφαρμογή παρέχει λειτουργίες διαχείρισης σε επίπεδο πελατών, προσωπικού και διαχειριστών.</li>
                <li>Προσοχή στο "ψάρεμα" το οποίο είναι μια προσπάθεια που γίνεται για απόσπαση στοιχείων εισόδου, συνήθως μέσω email, τηλεφωνικών κλήσεων κτλ. αλλά και για απόσπαση προσωπικών και εμπιστευτικών πληροφοριών.</li>
                <li>Η παρούσα εφαρμογή δε θα σας στείλει ποτέ email και δε θα υπάρξει οποιαδήποτε επικοινωνία με τεχνολογικά μέσα για λόγους ασφαλείας.</li>
                <li>Σε περίπτωση που δεχτείτε μία από τις παραπάνω ενέργειες σας παρακαλούμε επικοινωνήστε αμέσως μαζί μας.</li>
             </ul>
         </div>
	
	<br>
    <div class="content222">
		<?php include 'footer.php';?>
	</div>
	</body>
</html>