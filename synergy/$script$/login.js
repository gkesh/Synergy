function login()
{
var username = document.getElementById("usrnm").value;
var passwrd = document.getElementById("psswrd").value;
var xhr;
 if (window.XMLHttpRequest) { // Mozilla, Safari, ...
    xhr = new XMLHttpRequest();
} else if (window.ActiveXObject) { // IE 8 and older
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}
var usr = "usrnm=" + username;
var psw = "psswrd=" + passwrd;
     xhr.open("POST", "getDataFromDatabase.php", true); 
     xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");                  
     xhr.send(usr);
	 xhr.send(psw);
	 xhr.onreadystatechange = display_data;
	function display_data() {
	 if (xhr.readyState == 4) {
      if (xhr.status == 200) {  
		document.getElementById("lgin").innerHTML="Hi, "+xhr.responseText;
      } else {
        alert('There was a problem with the request.');
      }
     }
	}
}