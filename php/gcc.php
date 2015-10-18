<?php
$name=$_POST['name'];
if(!file_exists('../files/'.$name.'/gcc'))
	mkdir('../files/'.$name.'/gcc');
$outputFp = fopen('../files/'.$name.'/gcc/main.c', 'w');
fwrite($outputFp, $_POST['source']);
fclose($outputFp);
$outputFp = fopen('../files/'.$name.'/gcc/input.txt', 'w');
fwrite($outputFp, $_POST['input']);
fclose($outputFp);
passthru("gcc -Wall -std=gnu99 ../files/$name/gcc/main.c -o ../files/$name/gcc/main.exe 2>&1",$ret);
if(!$ret){
	passthru("..\\files\\$name\\gcc\\main.exe < ..\\files\\${name}\\gcc\\input.txt 2>&1",$ret);
}
	echo "[exit code $ret]";
?>