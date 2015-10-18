<?php
	if(!$_GET['username'])
		die("Please Enter Username");
	if(!$_GET['lang'])
		die("Please Enter Language");
?>
<!DOCTYPE html>
<html>
	<head>
		
		<style type="text/css">
			#edit{
				font-family: Consolas, 'Source Code Pro', Consolas, 'Courier New', Menlo, Monaco, 'DejaVu Sans Mono', monospace
			}
		</style>

		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css"/>
		<script src="../js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/tabIndent.js" type="text/javascript" charset="utf-8"></script>

		<title>在线编译系统</title>

		<script type="text/javascript">
			$("body").ready(function () {
				
				<?php
					echo "username = \"" . htmlspecialchars($_GET['username']) . "\";\n";
					echo "langname = \"" . htmlspecialchars($_GET['lang']) . "\";\n";
					$langtable = [
						'C' => 'gcc',
						'C++' => 'gpp'
					];
					echo "lang = \"" . htmlspecialchars($langtable[$_GET['lang']]) . "\";\n";
				?>
				
				
				
				set_tab_indent_for_textareas();
				$("textarea#edit").load('../files/'+ username + '/' + lang +'/main.c');
				$.get('../files/'+ username + '/' + lang + '/input.txt',function(result){
					$('#input').val(result);
				});
				$("#language").text(langname);
				$("button#submit").click(function () {
					$.post("../php/"+lang+'.php',{"source":$("textarea#edit").val(),"name":username,"input":$("#input").val()},function (data, textStatus) {
						$("textarea#result").text(data);
					});
				});
				$("button.inb").click(function () {
					$("textarea#edit").val($("textarea#edit").val()+$(this).text());
					$("textarea#edit")[0].focus();
				})
			})
		</script>

	</head>

	<body>
		<div class="container">
			<div class="page-header">
				<h1>在线编译系统 <small id="language">Loading</small></h1>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="btn-group btn-group-lg" role="group" aria-label="...">
						<button type="button" class="btn btn-success inb">{</button>
						<button type="button" class="btn btn-success inb">}</button>
						<button type="button" class="btn btn-success inb">(</button>
						<button type="button" class="btn btn-success inb">)</button>
						<button type="button" class="btn btn-success inb">&lt;</button>
						<button type="button" class="btn btn-success inb">&gt;</button>
						<button type="button" class="btn btn-info inb">"</button>
						<button type="button" class="btn btn-info inb">'</button>
						<button type="button" class="btn btn-info inb">#</button>
						<button type="button" class="btn btn-info inb">*</button>
						<button type="button" class="btn btn-info inb">?</button>
						<button type="button" class="btn btn-info inb">:</button>
						<button type="button" class="btn btn-info inb">/</button>
						<button type="button" class="btn btn-info inb">\</button>
						<button type="button" class="btn btn-info inb">.</button>
						<button type="button" class="btn btn-info inb">-</button>
						<button type="button" class="btn btn-warning inb">;</button>
						
					</div>
				</div>
			</div>
			<hr />
			<div class="row">
				<div class="col-md-6">
					<form>
						<textarea id="edit" name="source" class="form-control" rows="20" spellcheck="false"></textarea>
						<label for="input">输入</label>
						<input type="text" name="input" id="input" value="" class="form-control"/>
						<button type="button" id="submit" class="form-control btn btn-success">上传</button>
					</form>
				</div>
				<div class="col-md-6">
					<textarea id="result" class="form-control" readonly="true" rows="24"></textarea>
				</div>
			</div>
		</div>
		<script src="../js/tabIndent.js" type="text/javascript" charset="utf-8"></script>
	</body>
</html>
