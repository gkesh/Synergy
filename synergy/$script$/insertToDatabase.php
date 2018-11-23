<?php
//recieve data from page and save to variables

$fname=$_POST['frst_name'];
$lname=$_POST['scnd_name'];
$address=$_POST['address'];
$email=$_POST['email'];
$usrnm=$_POST['usrnm'];
$psswrd=$_POST['pswrd'];
$country=$_POST['country'];
$dy=$_POST['day'];
if(strlen($dy)==1){
	$dy="0".$_POST['day'];
}
$dob=$_POST['month'].$dy.$_POST['year'];
$gen=$_POST['gndr'];
$phn=$_POST['phn'];


//Database entry code
//PDO with Prepared Statment is used

	$servername="localhost";
	$username="root";
	$password="";
	$dbname="synergy";
		
	//Connection Created
	$con = new mysqli($servername,$username,$password,$dbname);
	
	//Test Connection
	if($con->connect_error){
		die("Connection Failed :".$con->connect_error);
	}
	
	//prepare 
	$stmt = $con->prepare("INSERT INTO customers (cfname, clname, caddress, cemail, cusrnm, cpsswrd, ccountry, cdob, cgender, cphn) VALUES (?,?,?,?,?,?,?,?,?,?)");
	
	//bind
	$stmt->bind_param("ssssssssss",$fname,$lname,$address,$email,$usrnm,$psswrd,$country,$dob,$gen,$phn);
	
	//execute prepared statement
	$stmt->execute();
	
	//close connection and preparedStatment
	$stmt->close();
	$con->close();
	
	//Start the session 
	
	
	
?>

<form id="tostartsession" action="Page_C.php" method="post">
<?php
        echo '<input type="hidden" name="'.htmlentities("uname").'" value="'.htmlentities($usrnm).'">';
		echo '<input type="hidden" name="'.htmlentities("psw").'" value="'.htmlentities($psswrd).'">';
?>
</form>
<script type="text/javascript">
    document.getElementById('tostartsession').submit();
</script>
<?php
	//Redirect to welcome page
	$welcome_page="getDataFromDatabase.php";
	header("Location:$welcome_page", TRUE);
	exit();

?>
