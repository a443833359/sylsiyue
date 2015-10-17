$(document).ready(function() {
	var temp = 0,
		changeable = 1,
		defaultProcess = function(x, y) {
			return y;
		},
		process = defaultProcess;

	function eq() {
		temp = process(temp, Number($("#input").text()));
		$("#input").text(temp);
		changeable = 1;
		temp = 0;
		process = defaultProcess;
	}
	$("button.btn").not(".btn-info").not(".btn-warning").click(function() {
		a = this;
		$("#input").text(function(i, orig) {
			if (orig == 0 || changeable) {
				orig = "";
				changeable = 0;
			}
			return orig + $(a).text();
		});
	});
	$("button#add").click(function() {
		if (changeable == 0) {
			eq();
			temp = Number($("#input").text());
			changeable = 1;
			process = function(a, b) {
				return a + b;
			};
		}
	});
	$("button#sub").click(function() {
		if (changeable == 0) {
			eq();
			temp = Number($("#input").text());
			changeable = 1;
			process = function(a, b) {
				return a - b;
			};
		}
	});
	$("button#muitiply").click(function() {
		if (changeable == 0) {
			eq();
			temp = Number($("#input").text());
			changeable = 1;
			process = function(a, b) {
				return a * b;
			};
		}
	});
	$("button#divide").click(function() {
		if (changeable == 0) {
			eq();
			temp = Number($("#input").text());
			changeable = 1;
			process = function(a, b) {
				return a / b;
			};
		}
	});
	$("button#clear").click(function() {
		$("#input").text("0");
		changeable = 1;
		temp = 0;
		process = defaultProcess;
	});
	$("button#eq").click(function() {
		eq();
		$("#input").fadeOut("fast");
		$("#input").fadeIn("fast");
	});
});