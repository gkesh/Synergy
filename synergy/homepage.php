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
<link rel="stylesheet" type="text/css" href="$stylesheet$/homepage.css"/>
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

<!--Login Section-->
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
      <button type="submit" id="lginbtn"><font face="Caviar Dreams" size="3.3em"><b>Login</b></font></button><br/><br/>
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
		<div id="nav" align="right">
  		 <span id="links">
    		<a href="homePage.php"><b>Home</b></a>&nbsp;&nbsp;
			<a href="Stores.php">Store</a>&nbsp;&nbsp;
			<a href="Contents.php">Contents</a>&nbsp;&nbsp;
			<a href="Top-List.php">Top Charts</a>&nbsp;&nbsp;
			<a href="about.php">About Us</a>&nbsp;&nbsp;
			<input type="text" name="search" id="search" placeholder="Search.. &#9906;"/><b id="srch"></b>&nbsp;&nbsp;&nbsp;<font color="e6e6e6"></font>&nbsp;&nbsp;
		</span>
			<span id="lgin" ><?php if($fname != " "){echo "Hi, ".$fname;}else{echo "<img src='\$images$\prfile_rep.png'/>";}?>
				<span id="profile-opt">
					<span id="profile_img_container"><i><span id="smallimg"><?php if($fname != " "){echo $profile_img;}else{echo $guest_img;}?></span></i></span><!--Put in the user uploaded profile-->
					<?php if($fname != " "){echo "<b>".$fname." ".$lname."&nbsp;&nbsp;</b>";}else{echo "<b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guest</b>&nbsp;&nbsp;<br/><a style='padding-top:2vh' href='sgnin.html'>Sign Up</a>";}?>
					<a onclick="<?php if($fname==" "){echo "document.getElementById('id01').style.display='block'";}else{echo "location.href='#popup1'";}?>"><?php if($fname != " "){echo "Profile";}else{echo "Login";}?></a>
					<?php if($fname!=" "){echo "<a href='#' onclick='logOut()'>Log out</a>";}?>
				</span>
			</span>&nbsp;&nbsp;
	   </div>
	</div>
	<div id="pgbdy">
		<center>
		<div id="interactables">
		<div id="bd-element1">
			<div id="bdel-contents">
				<div id="smalltext">
					VISIT OUR STORE
				</div>
				<div id="bigtext">
					GET THE LATEST SOUND OF EVERY GENRE
				</div>
				<div id="bd-button">
					<button class="bdbtn" onclick="location.href='stores.php'">STORE</button>
				</div>
			</div>
			</div>
		<div id="bd-element2">
			<div id="bdel-contents">
				<div id="smalltext">
					CHECK OUT SOME CONTENTS
				</div>
				<div id="bigtext">
					GET A TASTE OF OUR DELICIOUS COLLECTIONS
				</div>
				<div id="bd-button">
					<button class="bdbtn" onclick="location.href='contents.php'">CONTENTS</button>
				</div>
			</div>
		</div>
		<div id="bd-element3">
			<div id="bd3-1"><img src="$images$/rock-genre-icon.png"><h1>ROCK</h1><p>Powerful. Chaotic. Liberating.</p></div>
			<div id="bd3-2"><img src="$images$/metal-icon-genre.jpeg"><h1>METAL</h1><p>Strong. Deadly. Expressive.</p></div>
			<div id="bd3-3"><img src="$images$/pop-genre-icon.gif"><h1>POP</h1><p>Fun. Uplifting. Trendy.</p></div>
		</div>
		<div id="bd-element3">
			<div id="bd3-1"><img src="$images$/jazz-genre-icon.gif"><h1>JAZZ</h1><p>Smooth. Complex. Historical.</p></div>
			<div id="bd3-2"><img src="$images$/country-music-icon.jpg"><h1>COUNTRY</h1><p>Calm. Soothing. Serene.</p></div>
			<div id="bd3-3"><img src="$images$/blues-genre-icon.png"><h1>BLUES</h1><p>Emotional. Meaningful. Harmonious.</p></div>
		</div>
		</div>
		</center>
		<div id="bd-element4">
			<center><img src="$images$/bigimg1.jpg" align="center" width="100%"/>
			<p id="bgimg">A Blend Of Music &amp; Technology</p></center>
		</div>
	</div>
	<div id="footer">
		<div id="linkpack">
		<span id="ftrlgo"><center><img src="$images$/header2.png"/></center>
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
				<li><a href="mailto:gkeshthapa@gmail.com">Google</a></li>
				<li><a href="http://www.twitter.com">Twitter</a></li>
			</ol>
		</span>
		</div>
		<div id="bottomlb">
		<hr color="black" width="90%"/>
		&nbsp;&nbsp;&nbsp;<img src="$images$/sclimg.png" usemap="#mapthis"/>
		<map name="mapthis"><area shape ="circ" coords="19,20,19" href= "https://www.facebook.com"/><area shape ="circ" coords="76,20,19" href= "https://www.twitter.com"/><area shape ="circ" coords="133,20,19" href= "https://www.instagram.com"/></map>
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
