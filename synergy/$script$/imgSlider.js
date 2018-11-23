var tm=1;
	function showSamples(){
	document.getElementById("btnp").innerHTML="try it v";
	var tbl = "<center><table><tr><th>#</th><th>Songs</th><th>Artist</th><th>Album</th><th>Duration</th></tr><tr><td>1</td><td>Somebody To Love</td><td>Queen</td><td>Greatest Hits</td><td>3:48</td></tr><tr><td>2</td><td>Around the World</td><td>Daft Punk</td><td>Musique</td><td>6:23</td></tr><tr><td>3</td><td>Loving You</td><td>Michael Jackson</td><td>Xscape</td><td>4:28</td></tr><tr><td>4</td><td>Never Gonna leave this bed</td><td>Maroon 5</td><td>Hands All Over</td><td>4:08</td></tr><tr><td>5</td><td>Misery</td><td>Marron 5</td><td>Misery</td><td>3:58</td></tr><tr><td>6</td><td>Let Me Live</td><td>Queen</td><td>The Platinum Collection</td><td>4:42</td></tr><tr><td>7</td><td>Sugar</td><td>Marron 5</td><td>V(Deluxe Edition)</td><td>4:07</td></tr><tr><td>8</td><td>Love Somebody</td><td>Marron 5</td><td>Overexposed</td><td>3:38</td></tr><tr><td>9</td><td>Moves Like Jagger</td><td>Maroon 5</td><td>Moves Like jagger</td><td>4:58</td></tr><tr><td>10</td><td>Soldier Of Fortune</td><td>Opeth</td><td>Ghost Reveries</td><td>4:48</td></tr><tr><td>11</td><td>Bleak</td><td>Opeth</td><td>Ghost Reveries</td><td>11:48</td></tr><tr><td>12</td><td>Ghost Of Perdition</td><td>Opeth</td><td>Bleak</td><td>12:58</td></tr><tr><td>13</td><td>Roots Rock Reggae</td><td>Aerosmith</td><td>Living on the edge</td><td>5:58</td></tr><tr><td>14</td><td>Bohemian Rhapsody</td><td>Queen</td><td>Greatest Hits Vol. II</td><td>7:12</td></tr><tr><td>15</td><td>All Notes Off</td><td>Underside</td><td>Demo I</td><td>5:58</td></tr></table></center>";
	document.getElementById("collapseable").innerHTML=tbl;
	document.getElementById("collapseable").style="padding-bottom:30px";
}
	function hideSamples(){
		document.getElementById("btnp").innerHTML="try it >";
		document.getElementById("collapseable").innerHTML="";
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
	function login(){
	var a= prompt("Enter Username");
	var b= prompt("Enter Password");
	if(a=="gkesh" && b=="itsme")
	{
		document.getElementById("lgin").innerHTML="Hi, Gkesh";
	}
	else{
		alert("Wrong Username or password!!");
	}
	}
	function chngbck1(){
	document.getElementById("playlist").style="background-image:url($images$/cntPlylst.jpg)";
	document.getElementById("pnt1").style="font-size:55pt; font-weight:900; color:black";
	document.getElementById("pnt2").style="font-weight:800; font-size:30pt; color:black;";
	document.getElementById("pnt3").style="font-weight:800; font-size:30pt; color:black;";
	document.getElementById("toptxt").innerHTML="Our PlayList";
	document.getElementById("plylstbg").innerHTML="THE MUST KNOW SONGS";
	}
	function chngbck2(){
	document.getElementById("playlist").style="background-image:url($images$/cntPlylst1.jpg)";
	document.getElementById("pnt2").style="font-size:55pt; font-weight:900; color:black";
	document.getElementById("pnt1").style="font-weight:800; font-size:30pt; color:black;";
	document.getElementById("pnt3").style="font-weight:800; font-size:30pt; color:black;";
	document.getElementById("toptxt").innerHTML="Awesome Tones";
	document.getElementById("plylstbg").innerHTML="HEAR WHAT THE WORLD LIKES";
	}
	function chngbck3(){
	document.getElementById("playlist").style="background-image:url($images$/cntPlylst2.jpg)";	
	document.getElementById("pnt3").style="font-size:55pt; font-weight:900; color:black";
	document.getElementById("pnt2").style="font-weight:800; font-size:30pt; color:black;";
	document.getElementById("pnt1").style="font-weight:800; font-size:30pt; color:black;";
	document.getElementById("toptxt").innerHTML="Find &amp; Listen";
	document.getElementById("plylstbg").innerHTML="THE ERA DEFINING SONGS";
	}
