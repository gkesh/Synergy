<?php
	$usrnm = $_POST['uname'];
	$password = $_POST['psw'];
	
	//creating a new db connection
	$con = mysqli_connect('localhost','root','','synergy');

	//Checking Connection
	if (!$con) {
		die('Connection Failed: ' . mysqli_error($con));
	}

	mysqli_select_db($con,"synergy");
	
	$sql="SELECT * FROM customers WHERE cusrnm = '".$usrnm."' AND cpsswrd = '".$password."'";
	$result = mysqli_query($con,$sql);
	session_start();
	
	while($row = mysqli_fetch_array($result)){
		$_SESSION['uid']=$row['cid'];
		$_SESSION['fname']=$row['cfname'];
		$_SESSION['lname']=$row['clname'];
		$_SESSION['username']=$row['cusrnm'];
		$_SESSION['country']=$row['ccountry'];
		$_SESSION['dob']=$row['cdob'];
		$_SESSION['sex']=$row['cgender'];
		$_SESSION['phn']=$row['cphn'];
		$_SESSION['email']=$row['cemail'];
		$_SESSION['added_date']=$row['added_date'];
	}
	
	$ad="http://".$_SERVER['SERVER_ADDR'];
	
	//Redirect to  calling page
	if($_SERVER['HTTP_REFERER']!=$ad."/synergy/sgnin.html"){
		$welcome_page=$_SERVER['HTTP_REFERER'];
		header("Location:$welcome_page", TRUE);
	}else if($_SERVER['HTTP_REFERER']=$ad."/synergy/\$script\$/insertToDatabase.php"){
		header("Location:../wlcmpage.html");
	}
	else{
		$welcome_page=$ad."/synergy/homepage.php";
		header("Location:$welcome_page", TRUE);
	}
	
	mysqli_close($con);
?>