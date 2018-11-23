$(document).ready(function(){
	$(".hideshow").click(function(){
		$(".content").animate({
			height: "+=35vh"
		},400);
		setTimeout(next, 300);
		function next(){
			$(".content").fadeIn(100);
		}
	});
	$(".close").click(function(){
		$(".content").fadeOut(100);
		setTimeout(next, 300);
		function next(){
			$(".content").animate({
				height: "-=35vh"
			},400);
		}
		setTimeout(nextone, 400);
		function nextone{
			location.href="#";
		}
	});
});