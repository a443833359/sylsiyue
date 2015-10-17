$("body").ready(function() {

	tree = new treenode(null);

	$("#insert").click(function() {
		insert(tree, $("#a").val());
		$("#a").val("");
	});

	$("#search").click(function() {
		$("#a").val(search(tree, $("#a").val()));
	});

});