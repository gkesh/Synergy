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
<link rel="stylesheet" type="text/css" href="$stylesheet$/toplist.css"/>
<link rel="stylesheet" type="text/css" href="$stylesheet$/login.css"/>
<link rel="stylesheet" type="text/css" href="$stylesheet$/attendeelist.css"/>
<script language="javascript" rel="text/javascript">
	var num = 1;
	function dispNext(){
		imgIndex(1);
	}
	
	function dispPrev(){
		imgIndex(-1);
	}
	function imgIndex(v){
		num = num + v;
		imgchng(num);
	}
	function imgchng(numa){
		if(numa == 2){
			document.getElementById("pgbdy").style="background-image:url($images$/$toplist$/$slider$/2.jpg)";
			document.getElementById("badge1").style="color:darkgray";
			document.getElementById("badge2").style="color:white";
			document.getElementById("badge3").style="color:darkgray";
		}
		if(numa==1){
			document.getElementById("pgbdy").style="background-image:url($images$/$toplist$/$slider$/1.jpg)";
			document.getElementById("badge1").style="color:white";
			document.getElementById("badge2").style="color:darkgray";
			document.getElementById("badge3").style="color:darkgray";
		}
		if(numa == 0 || numa == 3){
			document.getElementById("pgbdy").style="background-image:url($images$/$toplist$/$slider$/3.jpg)";
			document.getElementById("badge1").style="color:darkgray";
			document.getElementById("badge2").style="color:darkgray";
			document.getElementById("badge3").style="color:white";
		}
		if(numa>3){
			num=1;
			imgchng(1);
		}
		if(numa<0){
			num=2;
			imgchng(2);
		}
	}
	function logOut(){
		window.location= "$script$/destroy_session.php";
	}
	window.addEventListener("scroll", function(){
		if(window.scrollY!=0){
			document.getElementById('header').style="background:black";
		}else{
			document.getElementById('header').style="background:none";
		}
	}, true);
</script>
<title>Synergy-TopList
</title>
</head>

<body onload="setInterval(dispNext, 3000)">
<div id="wrapper">
<!-- The Modal-->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="close" title="Close Modal">&times;</span>

  <!-- Modal Content-->
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
			<div id="strnm"><a href="homepage.php"><img src="$images$\logo2.png" alt="header-image2"  align="left"/></a><span>SYNERGY MUSIC&nbsp;</span><sup>&copy;</sup></div>
		<div id="nav">
  		 <p align="right" id="links">
    		<a href="homePage.php" accesskey="h">Home</a>&nbsp;&nbsp;
			<a href="Stores.php">Store</a>&nbsp;&nbsp;
			<a href="Contents.php">Contents</a>&nbsp;&nbsp;
			<a href="Top-List.php"><b>Top Charts</b></a>&nbsp;&nbsp;
			 <a href="about.php">About Us</a>&nbsp;&nbsp;
			<input type="text" name="search" id="searchbar" placeholder="Search.. &#9906;"/><b id="srch"></b>&nbsp;&nbsp;&nbsp;<font color="e6e6e6"></font>
			<span id="lgin" ><?php if($fname != " "){echo "Hi, ".$fname;}else{echo "<img src='\$images$\prfile_rep.png'/>";}?>
				<span id="profile-opt">
					<span id="profile_img_container"><i><?php if($fname != " "){echo $profile_img;}else{echo $guest_img;}?></i></span><!--Put in the user uploaded profile-->
					<?php if($fname != " "){echo "<b>".$fname." ".$lname."&nbsp;&nbsp;</b>";}else{echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guest</b>&nbsp;&nbsp;<br/><a style='padding-top:2vh' href='sgnin.html'>Sign Up</a>";}?>
					<a onclick="<?php if($fname==" "){echo "document.getElementById('id01').style.display='block'";}else{echo "location.href='#popup1'";}?>"><?php if($fname != " "){echo "Profile";}else{echo "Login";}?></a>
					<?php if($fname!=" "){echo "<a href='#' onclick='logOut()'>Log out</a>";}?>
				</span>
			</span>&nbsp;&nbsp;
	   </p>
	   </div>
	</div>
<div id="pgbdy">
	<div class="sliderLocal">
  <span class="btn-lft" onClick="dispPrev()"><center>&#10094;</center></span>
  <span class="btn-rght" onClick="dispNext()"><center>&#10095;</center></span>
  <center>
  <div id="badges">
  <span id="badge1" onclick="imgchng(1)">____</span>&nbsp;&nbsp;
  <span id="badge2" onclick="imgchng(2)">____</span>&nbsp;&nbsp;
  <span id="badge3" onclick="imgchng(3)">____</span>&nbsp;&nbsp;
  </div>
  </center>
</div>
</div>


<div id="topmusic">
<br/><br/>
	<table id="albmtbl" align="center">
		<caption><span id="music1">Top 15 Albums &nbsp;<b>&#10095;</b></span><br/><br/><br/></caption>
		<tr>
		<td>
		<img src="$images$/$toplist$/$albums$/1.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/2.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/3.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/13.jpg"/>
		</td>
		
		<td rowspan="2" colspan="2">
		<img src="$images$/$toplist$/$albums$/bg.jpg"/>
		</td>
		</tr>
		<tr>
		
		<td>
		<img src="$images$/$toplist$/$albums$/4.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/5.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/6.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/11.jpg"/>
		</td>
		</tr>
		<tr>
		
		<td>
		<img src="$images$/$toplist$/$albums$/7.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/8.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/9.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/10.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/12.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/14.jpg"/>
		</td>
		</tr>
	<table>
	<br><br>
</div>

<div id="topsongs">
<br/><br/>
	<table id="songtbl" align="center">
		<caption><span id="music1">Top 15 Songs &nbsp;<b>&#10095;</b></span><br/><br/><br/></caption>
		<tr>
		<td rowspan="2" colspan="2">
		<img src="$images$/$toplist$/$albums$/bg.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/1.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/2.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/3.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/13.jpg"/>
		</td>
		</tr>
		<tr>
		
		<td>
		<img src="$images$/$toplist$/$albums$/4.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/5.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/6.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/11.jpg"/>
		</td>
		</tr>
		<tr>
		
		<td>
		<img src="$images$/$toplist$/$albums$/7.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/8.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/9.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/10.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/12.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/14.jpg"/>
		</td>
		</tr>
	<table>
	<br><br>
</div>

<div id="topartists">
<br/><br/>
	<table id="artsttbl" align="center">
		<caption><span id="music1">Top 15 Artists &nbsp;<b>&#10095;</b></span><br/><br/><br/></caption>
		<tr>
		<td rowspan="2" colspan="2">
		<img src="$images$/$toplist$/$albums$/bg.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/1.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/2.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/3.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/13.jpg"/>
		</td>
		</tr>
		<tr>
		
		<td>
		<img src="$images$/$toplist$/$albums$/4.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/5.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/6.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/11.jpg"/>
		</td>
		</tr>
		<tr>
		
		<td>
		<img src="$images$/$toplist$/$albums$/7.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/8.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/9.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/10.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/12.jpg"/>
		</td>
		
		<td>
		<img src="$images$/$toplist$/$albums$/14.jpg"/>
		</td>
		</tr>
	<table>
	<br><br>
</div>

<div id="footer">
<div id="linkpack">
		<span id="ftrlgo"><center><a href="homepage.php"><img src="$images$/header2.png"/></a></center>
		</span>
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
		<hr color="black" width="90%"/>
		&nbsp;&nbsp;&nbsp;<img src="$images$/sclimg.png" usemap="#mapthis" />
		<map name="mapthis">
		<area shape ="circ" coords="19,20,19" href= "https://www.facebook.com"/>
		<area shape ="circ" coords="76,20,19" href= "https://www.twitter.com"/>
		<area shape ="circ" coords="133,20,19" href= "https://www.instagram.com"/>
		</map>
		<br/>
		<center>
			Copyright <sup>&copy;</sup> Synergy Music Co. Ltd. 2017. All rights are reserved. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">Legal</a>&nbsp;&nbsp;<font color="e6e6e6"><b>|</b></font>&nbsp;&nbsp;<a href="#">Privacy Policy</a>&nbsp;&nbsp;<font color="e6e6e6"><b>|</b></font>&nbsp;&nbsp;<a href="#">Terms of Use</a>&nbsp;&nbsp;<font color="e6e6e6"><b>|</b></font>&nbsp;&nbsp;<a href="#">Return and refund</a></center>
	</div>
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
