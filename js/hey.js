$("body").ready(function() {
	document.body.onmousewheel = function(event) {
		var delta = 0;
		if (!event) event = window.event;
		if (event.wheelDelta) delta = event.wheelDelta / 120;
		document.getElementsByTagName("p").innerHTML = delta;
	}

	document.onmousemove = function(e) {
		e = e ? e : window.event;
		ex = e.screenX;
		ey = e.screenY;
		c = $("#car")
		cx = c.css("left");
		cy = c.css("top");
		cx = Number(cx.substring(0, cx.length - 2));
		cy = Number(cy.substring(0, cy.length - 2));
		ang = math.atan((ey - cy) / (ex - cx));
		$("p").text("(" + ex + "," + ey + ")" + "(" + cx + "," + cy + ")" + ang);
		c.css("transform", "rotate(" + ang + "rad)");
	}
});