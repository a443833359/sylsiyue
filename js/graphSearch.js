function Node() {
	this.parent = null;
	this.visited = 0;
	this.connection = [];
	this.connect = function(n) {
		this.connection.push(n);
	}
};

function dfs(node, parent) {
	node.visited = 1;
	node.parent = parent;
	for (var i = 0; i < node.connection.length; i++) {
		if (!node.connection[i].visited) {
			dfs(node.connection[i], node);
		};
	};
	return;
};

function bfs(node) {
	var queue = [node];
	node.visited = 1;
	var index = 0;
	var n = null;
	while (index < queue.length) {
		n = queue[index];
		for (var i = 0; i < n.connection.length; i++) {
			if (!n.connection[i].visited) {
				n.connection[i].parent = n;
				queue.push(n.connection[i]);
				n.connection[i].visited = 1;
			};
		};
		index++;
	};
};