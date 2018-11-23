function showSamples(){
	document.getElementById("btnp").innerHTML="try it v";
	var tbl = "<table id="colTbl"><tr><th>#</th><th>Songs</th><th>Artist</th><th>Album</th><th>Duration</th></tr><tr id="rw1"><td>1</td><td>Somebody To Love</td><td>Queen</td><td>Greatest Hits</td><td>3:48</td></tr><tr id="rw2"><td>2</td><td>Around the World</td><td>Daft Punk</td><td>Musique</td><td>6:23</td></tr><tr id="rw3"><td>3</td><td>Loving You</td><td>Michael Jackson</td><td>Xscape</td><td>4:28</td></tr><tr id="rw4"><td>4</td><td>Never Gonna leave this bed</td><td>Maroon 5</td><td>Hands All Over</td><td>4:08</td></tr><tr id="rw5"><td>5</td><td>Misery</td><td>Marron 5</td><td>Misery</td><td>3:58</td></tr></table>";
	document.getElementById("collapseable").innerHTML=tbl;
}
function styleit(){
	document.getElementsByTagName("tr").style="background-color: gray;";
}