var timeframe=10,scale=1000/timeframe,g=1,objs=[];

function draw(jqueryObject){
	jqueryObject.css("left",x);
	jqueryObject.css("top",y);
}

function main(){
	objs.push({m:1,fx:0,fy:1,vx:1,vy:0,jqobj:$("#ball")});
	alert(objs[0].jqobj);
	setInterval(mainfor,timeframe);
}

function mainfor(){
	for(o in objs){
		o.vx+=o.fx/o.m/scale;
		o.vy+=o.fy/o.m/scale;
		o.x+=o.vx/scale;
		o.y+=o.vy/scale;
		draw(o.jqobj);
	};
}
