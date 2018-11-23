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
<link rel="stylesheet" type="text/css" href="$stylesheet$/contents.css"/>
<link rel="stylesheet" type="text/css" href="$stylesheet$/login.css"/>
<link rel="stylesheet" type="text/css" href="$stylesheet$/attendeelist.css"/>
<script src="$script$/jquery.js"></script>	
<script language="javascript" rel="text/javascript">
	var tm=1;
	function showSamples(){
	document.getElementById("btnp").innerHTML="try it v";
	document.getElementById("collapseable").style.display="block";
	document.getElementById("collapseable").style="padding-bottom:8vh";
	}
	function hideSamples(){
		document.getElementById("btnp").innerHTML="try it >";
		document.getElementById("collapseable").style.display="none";
	}
	function timedDisplay(){
	if(tm==1){
		chngbck1();
	}
	if(tm==2){
		chngbck2();
	}
	if(tm==3){
		chngbck3();
	}
	tm++;
	if(tm>3){
		tm=1;
	}
	}
	function chngbck1(){
	document.getElementById("playlist").style="background-image:url($images$/cntPlylst.jpg)";
	document.getElementById("pnt1").style="font-size:55pt; font-weight:900; color:white;";
	document.getElementById("pnt2").style="font-weight:800; font-size:30pt; color:white;";
	document.getElementById("pnt3").style="font-weight:800; font-size:30pt; color:white;";
	document.getElementById("toptxt").innerHTML="Our PlayList";
	document.getElementById("plylstbg").innerHTML="THE MUST KNOW SONGS";
	}
	function chngbck2(){
	document.getElementById("playlist").style="background-image:url($images$/cntPlylst1.jpg)";
	document.getElementById("pnt2").style="font-size:55pt; font-weight:900; color:white;";
	document.getElementById("pnt1").style="font-weight:800; font-size:30pt; color:white;";
	document.getElementById("pnt3").style="font-weight:800; font-size:30pt; color:white;";
	document.getElementById("toptxt").innerHTML="Awesome Tones";
	document.getElementById("plylstbg").innerHTML="HEAR WHAT THE WORLD LIKES";
	}
	function chngbck3(){
	document.getElementById("playlist").style="background-image:url($images$/cntPlylst2.jpg)";	
	document.getElementById("pnt3").style="font-size:55pt; font-weight:900; color:white;";
	document.getElementById("pnt2").style="font-weight:800; font-size:30pt; color:white;";
	document.getElementById("pnt1").style="font-weight:800; font-size:30pt; color:white;";
	document.getElementById("toptxt").innerHTML="Find &amp; Listen";
	document.getElementById("plylstbg").innerHTML="THE ERA DEFINING SONGS";
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
<title>Contents</title>
</head>

<body onload="setInterval(timedDisplay, 3000)">
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
	<font color="black">
      <input type="text" placeholder="Enter Username" name="uname" id="usrnm" required><br/>
	  <input type="password" placeholder="Enter Password" name="psw" id="psswrd" required><br/>
	</font>
      <button onclick="login() id="lginbtn"><font face="Caviar Dreams" size="3.3em" color="white"><b>Login</b></font></button><br/><br/>
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
			<a href="Contents.php"><b>Contents</b></a>&nbsp;&nbsp;
			<a href="Top-List.php">Top Charts</a>&nbsp;&nbsp;
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
	<div id="playlist">
		<div id="playlist-contents">
		<center>
				<p id="plylstpara"><font size="15pt" style="font-weight:500; color:white"><span id="toptxt">Our PlayList<span></font><br/><span id="plylstbg"><a href="table">THE MUST KNOW SONGS</a></span><br/><button onClick="showSamples()"	class="plst-btn" ><font face="Caviar Dreams" size="12pt" style="font-weight:600; color:white"><span id="plybtnp">Go To Playlist</span></font></button></p>
		</center>
		</div>
	<center>
	<span onclick="chngbck1()" id="pnt1" style="font-weight:900; font-size:55pt; color:white;">.</span>
	<span onclick="chngbck2()" id="pnt2" style="font-weight:800; font-size:40pt; color:white;">.</span>
	<span onclick="chngbck3()" id="pnt3" style="font-weight:800; font-size:40pt; color:white;">.</span>
	</center>
	</div>
	<!--<div id="cnts">
	<div id="samples">
		<div id="divpara1">
			<a name="#table"></a>
			<h1 id="hdrpr1">Test. It. Out!</h1>
			<p id="be1-para">Before you actually buy anything, you can simply try it out first. You are allowed to listen to small samples of our vast library and listen to uncompressed audio files with unreal quality. Be Smart! Don't listen to us, listen to the songs and decide whether or not you'd want to buy it.<br><br/>
			<br/><br/>
			<button	class="trial" onClick="showSamples()" ondblclick="hideSamples()"><font face="Caviar Dreams" size="25pt"><span id="btnp">try it &gt;</span></font></button>
			</p>
		</div>
		<div id="divimg1">
			<img src="$images$/cntimg2.png" align="right"/>
		</div>
	</div>
	<div id="collapseable" style="display:none; clear:both">
		<center>
		<table>
			<tr>
				<th>#</th>
				<th>Songs</th>
				<th>Artist</th>
				<th>Album</th>
				<th>Duration</th>
			</tr>
			<tr>
				<td>1</td>
				<td>Somebody To Love</td>
				<td>Queen</td>
				<td>Greatest Hits</td>
				<td>3:48</td>
				</tr><tr><td>2</td><td>Around the World</td><td>Daft Punk</td><td>Musique</td><td>6:23</td></tr><tr><td>3</td><td>Loving You</td><td>Michael Jackson</td><td>Xscape</td><td>4:28</td></tr><tr><td>4</td><td>Never Gonna leave this bed</td><td>Maroon 5</td><td>Hands All Over</td><td>4:08</td></tr><tr><td>5</td><td>Misery</td><td>Marron 5</td><td>Misery</td><td>3:58</td></tr><tr><td>6</td><td>Let Me Live</td><td>Queen</td><td>The Platinum Collection</td><td>4:42</td></tr><tr><td>7</td><td>Sugar</td><td>Marron 5</td><td>V(Deluxe Edition)</td><td>4:07</td></tr><tr><td>8</td><td>Love Somebody</td><td>Marron 5</td><td>Overexposed</td><td>3:38</td></tr><tr><td>9</td><td>Moves Like Jagger</td><td>Maroon 5</td><td>Moves Like jagger</td><td>4:58</td></tr><tr><td>10</td><td>Soldier Of Fortune</td><td>Opeth</td><td>Ghost Reveries</td><td>4:48</td></tr><tr><td>11</td><td>Bleak</td><td>Opeth</td><td>Ghost Reveries</td><td>11:48</td></tr><tr><td>12</td><td>Ghost Of Perdition</td><td>Opeth</td><td>Bleak</td><td>12:58</td></tr><tr><td>13</td><td>Roots Rock Reggae</td><td>Aerosmith</td><td>Living on the edge</td><td>5:58</td></tr><tr><td>14</td><td>Bohemian Rhapsody</td><td>Queen</td><td>Greatest Hits Vol. II</td><td>7:12</td></tr><tr><td>15</td><td>All Notes Off</td><td>Underside</td><td>Demo I</td><td>5:58</td></tr></table></center>
	</div>
	</div>-->
	<div id="strlnk">
			<div id="cntlwrimg"><img src="$images$/cntlwrimg.jpg" align="left"/></div>
			<div id="cntlwrp"><h1 id="lwrhd" align="right">Buy. Full. Songs.&nbsp;&nbsp;</h1><p id="lwrp" align="right">Get a wide range of classic as well as modern music. Find the tune that plays your heart-string. If you can't find what you're looking for, just request it on our fouroum.<br/><br/> Synergy gives you instant access to millions of songs – from old favorites to the latest hits. Just hit play to stream anything you like. <br/><br/>Browse our store.<br/><br/><br/>
			<button	class="trial2" onClick="window.location.href='Stores.php'" ><font face="Caviar Dreams" size="20em"><span id="btnp2">&nbsp;&nbsp;go to store&nbsp;&nbsp;</span></font></button></p>
			</div>
	</div>
<div id="footer">
	<div id="linkpack">
		<span id="ftrlgo"><a href="homepage.php"><center><img src="$images$/header2.png"/></center></a>
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
		&nbsp;&nbsp;&nbsp;<img src="$images$/sclimg.png" usemap="#mapthis"/>
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
