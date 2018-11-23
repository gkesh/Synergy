<?php
	session_start();
	if(isset($_SESSION['fname'])){
		$fname = $_SESSION['fname'];
		$lname = $_SESSION['lname'];
		if($_SESSION['sex']=="male"){
			$profile_img="<img src='\$images\$/profilepics/profile_img_male.jpg' id='profile_img'>";
		}else{
			$profile_img="<img src='\$images\$/profilepics/profile_img_female.jpg' id='profile_img'>";
		}
	}else{
		$fname = " ";
		$guest_img="<img src='\$images\$/profilepics/guest_img.png' id='profile_img' width='100px' height='100px' >";
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="$stylesheet$/store.css"/>
<link rel="stylesheet" type="text/css" href="$stylesheet$/login.css"/>
<link rel="stylesheet" type="text/css" href="$stylesheet$/attendeelist.css"/>
<script language="javascript" rel="text/javascript">
	function logOut(){
		window.location= "$script$/destroy_session.php";
	}
</script>
<title>Homepage</title>
</head>

<body>
<div id="wrapper">
<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content -->
  <form class="modal-content animate" action="$script$/getDataFromDatabase.php" method="POST">
    <div class="imgcontainer">
      <img src="$images$/avatar-boy.png" alt="Avatar" class="avatar">
    </div>
	<center>
    <div class="container">
      <input type="text" placeholder="Enter Username" name="uname" id="usrnm" required><br/>

      <input type="password" placeholder="Enter Password" name="psw" id="psswrd" required><br/>

      <button onclick="login() id="lginbtn"><font face="Caviar Dreams" size="3.3em"><b>Login</b></font></button><br/><br/>
      <input type="checkbox" checked="checked">&nbsp;<span id="rem"><font face="Caviar Dreams">Remember me</font></span>
    </div>
	</center>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><font face="Caviar Dreams" size="4pt">Cancel</font></button>
      <span class="psw" ><font face="Caviar Dreams"><a href="#" style="color:black">Forgot password?</a></font></span>
    </div>
  </form>
</div>
<!--Profile Display Section-->
	<div id="popup1" class="overlay" style="z-index:1">
		<div class="popup">
			<div class="imgcontainer">
			<?php echo $profile_img;?><br>
			<label for="profileimage">Change Pic&nbsp;&nbsp;&#9998;</label>
			<input type="file" name="profileimage" id="profileimage" accept="image/*"/>
			</div>
			<h2><?php echo $fname." ".$lname ?></h2>
			<a class="close" href="#">&times;</a>
			<div class="content">
				<center>
				<div id="table-container">
				<table id="userinfo">
					<tr>
					<td class="imgtd"><img src="$images$/country-icon.png"><!--&nbsp;&nbsp;&nbsp;&nbsp;Country--></td>
					<td style="text-align:left; padding-left:2vw;"><?php echo $_SESSION['country']?></td>
					</tr>
					<tr>
					<td class="imgtd"><img src="$images$/dob-icon.png"><!--&nbsp;&nbsp;&nbsp;&nbsp;D.O.B--></td>
					<td style="text-align:left; padding-left:2vw;"><?php echo $_SESSION['dob']?></td>
					</tr>
					<tr>
					<td class="imgtd"><img src="$images$/gender-icon.png"><!--&nbsp;&nbsp;&nbsp;&nbsp;Gender--></td>
					<td style="text-align:left; padding-left:2vw;"><?php echo strtoupper($_SESSION['sex'])?></td>
					</tr>
					<tr>
					<td class="imgtd"><img src="$images$/phone-icon.png"><!--&nbsp;&nbsp;&nbsp;&nbsp;Phone No.--></td>
					<td style="text-align:left; padding-left:2vw;"><?php echo $_SESSION['phn']?></td>
					</tr>
					<tr>
					<td class="imgtd"><img src="$images$/email-icon.png"><!--&nbsp;&nbsp;&nbsp;&nbsp;E-Mail--></td>
					<td style="text-align:left; padding-left:2vw;"><?php echo $_SESSION['email']?></td>
					</tr>
				</table>
				</div>
				</center>
			</div>
		</div>
		</div>
	<!--profile Section End-->
<font face="Caviar Dreams">
	<div id="header">
			<div id="strnm"><a href="homepage.php"><img src="$images$\logo3.png" alt="header-image2"  align="left"/></a><span>SYNERGY MUSIC&nbsp;</span><sup>&copy;</sup></div>
		<div id="nav">
  		 <p align="right" id="links">
    		<a href="homePage.php" accesskey="h">Home</a>&nbsp;&nbsp;
			<a href="Stores.php"><b>Store</b></a>&nbsp;&nbsp;
			<a href="Contents.php">Contents</a>&nbsp;&nbsp;
			<a href="Top-List.php">Top Charts</a>&nbsp;&nbsp;
			<a href="about.php">About Us</a>&nbsp;&nbsp;
			<input type="text" name="search" id="searchbar" placeholder="Search.. &#9906;"/><b id="srch"></b>&nbsp;&nbsp;&nbsp;<font color="e6e6e6"></font>
			<span id="lgin" ><font color="black"><?php if($fname != " "){echo "Hi, ".$fname;}else{echo "<i><img src='\$images$\prfile_rep.png'/></i>";}?></font>
				<span id="profile-opt">
					<span id="profile_img_container"><i><?php if($fname != " "){echo $profile_img;}else{echo $guest_img;}?></i></span><!--Put in the user uploaded profile-->
					<?php if($fname != " "){echo "<b>".$fname." ".$lname."&nbsp;&nbsp;</b>";}else{echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Guest</b>&nbsp;&nbsp;<br/><a style='padding-top:2vh' href='sgnin.html'>Sign Up</a>";}?>
					<a onclick="<?php if($fname==" "){echo "document.getElementById('id01').style.display='block'";}else{echo "location.href='#popup1'";}?>"><?php if($fname != " "){echo "Profile";}else{echo "Login";}?></a>
					<?php if($fname!=" "){echo "<a href='#' onclick='logOut()'>Log out</a>";}?>
				</span>
			</span>&nbsp;&nbsp;
	   </p>
	   </div>
	</div>
<div id="pgbdy">
	<div id="bgimg">
	<center>
		<img src="$images$/strebgimg.jpg"/>
	</center>
	</div>
	<div id="albmarts">
	<p id="albmtitle" align="left">Featured Albums</p><br/>
	<center>
	<div id="rw1">
		<span id="img1">
		<img src="$images$/$Store$/albmart1.jpg"/>	
		</span>
		<span id="img2">
		<img src="$images$/$Store$/albmart2.jpg"/>	
		</span>
		<span id="img3">
		<img src="$images$/$Store$/albmart6.jpg"/>	
		</span>
		<span id="img4">
		<img src="$images$/$Store$/albmart3.jpg"/>	
		</span>
		<span id="img5">
		<img src="$images$/$Store$/albmart4.jpg"/>	
		</span>
		<span id="img6">
		<img src="$images$/$Store$/albmart5.jpg"/>	
		</span>
		<span id="img7">
		<img src="$images$/$Store$/albmart7.jpg"/>	
		</span>
		</div>
		<div id="imgrw2">
		<span id="img8">
		<img src="$images$/$Store$/albmart8.jpg"/>	
		</span>
		<span id="img9">
		<img src="$images$/$Store$/albmart9.jpg"/>	
		</span>
		<span id="img10">
		<img src="$images$/$Store$/albmart10.jpg"/>	
		</span>
		<span id="img11">
		<img src="$images$/$Store$/albmart11.jpg"/>	
		</span>
		<span id="img12">
		<img src="$images$/$Store$/albmart12.jpg"/>	
		</span>
		<span id="img13">
		<img src="$images$/$Store$/albmart13.jpg"/>	
		</span>
		<span id="img14">
		<img src="$images$/$Store$/albmart14.jpg"/>	
		</span>
	</div>
	</center>
	</div>
	<div id="artsts">
	<p id="artst" align="right">Featured Artists</p><br/>
	<center>
	<div id="artrw1">
		<span id="aimg1">
		<img src="$images$/$Store$/artst1.jpg"/>	
		</span>
		<span id="aimg2">
		<img src="$images$/$Store$/artst2.jpg"/>	
		</span>
		<span id="aimg3">
		<img src="$images$/$Store$/artst6.jpg"/>	
		</span>
		<span id="aimg4">
		<img src="$images$/$Store$/artst3.jpg"/>	
		</span>
		<span id="aimg5">
		<img src="$images$/$Store$/artst4.jpg"/>	
		</span>
		<span id="aimg6">
		<img src="$images$/$Store$/artst5.jpg"/>	
		</span>
		<span id="aimg7">
		<img src="$images$/$Store$/artst7.jpg"/>	
		</span>
		</div>
		<div id="artrw2">
		<span id="aimg8">
		<img src="$images$/$Store$/artst8.jpg"/>	
		</span>
		<span id="aimg9">
		<img src="$images$/$Store$/artst9.jpg"/>	
		</span>
		<span id="aimg10">
		<img src="$images$/$Store$/artst10.jpg"/>	
		</span>
		<span id="aimg11">
		<img src="$images$/$Store$/artst11.jpg"/>	
		</span>
		<span id="aimg12">
		<img src="$images$/$Store$/artst12.jpg"/>	
		</span>
		<span id="aimg13">
		<img src="$images$/$Store$/artst13.jpg"/>	
		</span>
		<span id="aimg14">
		<img src="$images$/$Store$/artst14.jpg"/>	
		</span>
	</div>
	</center>
	</div>
	<div id="songs">
	<p id="song" align="left">Featured Songs</p><br/>
	<center>
	<div id="spngs1">
		<span id="sng1">
		<img src="$images$/$Store$/albmart1.jpg"/>	
		</span>
		<span id="sng2">
		<img src="$images$/$Store$/albmart2.jpg"/>	
		</span>
		<span id="sng3">
		<img src="$images$/$Store$/albmart6.jpg"/>	
		</span>
		<span id="sng4">
		<img src="$images$/$Store$/albmart3.jpg"/>	
		</span>
		<span id="sng5">
		<img src="$images$/$Store$/albmart4.jpg"/>	
		</span>
		<span id="sng6">
		<img src="$images$/$Store$/albmart5.jpg"/>	
		</span>
		<span id="sngg7">
		<img src="$images$/$Store$/albmart7.jpg"/>	
		</span>
		</div>
		<div id="songs2">
		<span id="sng8">
		<img src="$images$/$Store$/albmart8.jpg"/>	
		</span>
		<span id="sng9">
		<img src="$images$/$Store$/albmart9.jpg"/>	
		</span>
		<span id="sng10">
		<img src="$images$/$Store$/albmart10.jpg"/>	
		</span>
		<span id="sng11">
		<img src="$images$/$Store$/albmart11.jpg"/>	
		</span>
		<span id="sng12">
		<img src="$images$/$Store$/albmart12.jpg"/>	
		</span>
		<span id="sng13">
		<img src="$images$/$Store$/albmart13.jpg"/>	
		</span>
		<span id="sng14">
		<img src="$images$/$Store$/albmart14.jpg"/>	
		</span>
	</div>
	</center>
	</div>
</div>
	</font>
<font face="Caviar Dreams">
<div id="footer">
<div id="linkpack">
		<span id="ftrlgo"><center><a href="homepage.php"><img src="$images$/header2.png"/></a>
		</center></span>
		<span id="ftpara1">
			<h4>Shop with us</h4>
			<ol>
				<li><a href="contents.php">Albums</a></li>
				<li><a href="contents.php">Artists</a></li>
				<li><a href="contents.php">Songs</a></li>
			</ol>
		</span>
		<span id="ftpara2">
			<h4>Find Us</h4>
			<ol>
				<li><a href="https://www.google.com.np/maps/place/Yogbir+Singh+Marg,+Kathmandu+44600/@27.707159,85.3080365,18z/data=!3m1!4b1!4m5!3m4!1s0x39eb18ff3adeb63b:0x1ef9ba913b90615f!8m2!3d27.707159!4d85.3091178?hl=en">Google Maps</a></li>
				<li><a href="contents.php">Local Maps</a></li>
				<li><a href="contents.php">Street View</a></li>
			</ol>
		</span>
		<span id="ftpara3">
			<h4>Languages</h4>
			<ol>
				<li><a href="contents.php">Nepali</a></li>
				<li><a href="contents.php">Japanese</a></li>
				<li><a href="contents.php">Spanish</a></li>
				<li><a href="contents.php">French</a></li>
			</ol>
		</span>
		<span id="ftpara4">
			<h4>Contact us</h4>
			<ol>
				<li><a href="http://www.facebook.com">Facebook</a></li>
				<li><a href="http://www.mail.google.com">Google</a></li>
				<li><a href="http://www.twitter.com">Twitter</a></li>
			</ol>
		</span>
		</div>
		<div id="bottomlb">
		<br/>
		<hr color="black" width="90%"/>
		&nbsp;&nbsp;&nbsp;<img src="$images$/sclimg.png" usemap="#mapthis"/>
		<map name="mapthis"><area shape ="circ" coords="19,20,19" href= "https://www.facebook.com"/><area shape ="circ" coords="76,20,19" href= "https://www.twitter.com"/><area shape ="circ" coords="133,20,19" href= "https://www.instagram.com"/>
		</map>
		<br/>
		<center>
			Copyright <sup>&copy;</sup> Synergy Music Co. Ltd. 2017. All rights are reserved. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Legal</a>&nbsp;&nbsp;<font color="e6e6e6"><b>|</b></font>&nbsp;&nbsp;<a href="#">Privacy Policy</a>&nbsp;&nbsp;<font color="e6e6e6"><b>|</b></font>&nbsp;&nbsp;<a href="#">Terms of Use</a>&nbsp;&nbsp;<font color="e6e6e6"><b>|</b></font>&nbsp;&nbsp;<a href="#">Return and refund</a></center>
		</div>
	
		</font>
</div>
<script language="javascript" rel="text/javascript">
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style="display:none";
    }
}
</script>
</body>
</html>
