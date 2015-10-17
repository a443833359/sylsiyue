<?php
	if(!$_GET['username'])
		die("Please Enter Username");
	if(!$_GET['lang'])
		die("Please Enter Username");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<title>gcc</title>
		<script src="../js/tabIndent.js" type="text/javascript" charset="utf-8"></script>
		<script>

		</script>
		<script type="text/javascript">
			$("body").ready(function () {
				<?php
					echo "username = \"" . $_GET['username'] . "\";\n";
					echo "lang = \"" . $_GET['lang'] . "\";\n";
				?>
				set_tab_indent_for_textareas();
				$("textarea#edit").load('../files/'+ username +'/main.c');
				$("input").click(function () {
					$.post("../php/gcc.php",{"source":$("textarea#edit").val(),"name":username,"input":$("#input").val()},function (data, textStatus) {
						$("textarea#result").text(data);
					});
				});
			})
		</script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<form>
						<textarea id="edit" name="source" class="form-control" rows="25" spellcheck="false"></textarea>
						<label for="input">输入</label>
						<input type="text" name="input" id="input" value="" class="form-control"/>
						<input type="button" class="form-control btn btn-success" value="上传"/>
					</form>
				</div>
				<div class="col-md-6">
					<textarea id="result" class="form-control" readonly="true" rows="29"></textarea>
				</div>
			</div>
		</div>
		<script src="../js/tabIndent.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
