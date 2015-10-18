<?php
$name=$_POST['name'];
if(!file_exists('../files/'))
	mkdir('../files/'.$name);
$outputFp = fopen('../files/'.$name.'/gpp/main.c', 'w');
fwrite($outputFp, $_POST['source']);
fclose($outputFp);
$outputFp = fopen('../files/'.$name.'/gpp/input.txt', 'w');
fwrite($outputFp, $_POST['input']);
fclose($outputFp);
passthru("g++ -Wall -std=gnu99 ../files/$name/gpp/main.c -o ../files/$name/gpp/main.exe 2>&1",$ret);
if(!$ret){
	passthru("..\\files\\$name\\gpp\\main.exe < ..\\files\\${name}\\gpp\\input.txt 2>&1",$ret);
}
	echo "[exit code $ret]";
?>