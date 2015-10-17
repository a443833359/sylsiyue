var angle=-90,x=100,y=100,v=0;

function ro(d){
	angle+=d;
	$("#car").css("transform","rotate(" + (-angle) + "deg)");
}

function go(n){
	x+=n*math.cos(angle*math.pi/180);
	y-=n*math.sin(angle*math.pi/180);
	$("#car").css("left",x+"px");
	$("#car").css("top",y+"px");
}

function mainfor(){
	go(v/100);
}

$("body").ready(function(){
	$("html").keydown(function(event){
		switch (event.which){
			case 37:
				ro(4);
				break;
			case 39:
				ro(-4);
				break;
			case 38:
				v++;
				$("h1").text("Speed="+v+"px/s");
				break;
			case 40:
				v--;
				$("h1").text("Speed="+v+"px/s");
				break;
			default:
				break;
		}
	});
	$("button").click(function () {
		angle=-90,x=100,y=100,v=0;
		ro(0);
		$("h1").text("Speed="+v+"px/s");
	})
	setInterval(mainfor,10);
});