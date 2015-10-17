<html>
	<head>
		<title>PHP Test</title>
	</head>
	<body>
		<?php
			require "db.php";
			echo "Launching missile : {$_GET['missile']}<br>";
			echo "Latitude locked : {$_GET['lat']}<br>";
			echo "Longitude locked : {$_GET['lnt']}<br>";
			
			$conn = new connection("localhost", "root", "f0nXsBgB", "nuclear");
			$conn -> insert("nuclear", ["lat","lng","type"], [$_GET["lat"],$_GET["lnt"],$_GET["missile"]]);
			$data = $conn -> shift($conn -> select("nuclear", ["*"]));
			foreach ($data as $row) {
				foreach ($row as $d){
					echo "$d<br>";
				}
				echo "<br>";
			}
		?>
	</body>
</html>