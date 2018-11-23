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
	