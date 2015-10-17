function treenode(value) {
	this.value = value;
	this.left = null;
	this.right = null;
}

function insert(tree, value) {
	if (tree.value == null) {
		tree.value = value;
	};
	if (tree.value == value) {
		return;
	};
	if (value < tree.value) {
		if (tree.left) {
			insert(tree.left, value);
		} else {
			tree.left = new treenode(value);
		};
	} else {
		if (tree.right) {
			insert(tree.right, value);
		} else {
			tree.right = new treenode(value);
		};
	};
}

function search(tree, value) {
	if (value < tree.value) {
		if (tree.left) {
			return search(tree.left, value);
		} else {
			return false;
		}
	} else {
		if (value == tree.value) {
			return true;
		} else {
			if (tree.right) {
				return search(tree.right, value);
			} else {
				return false;
			}
		};
	};
}