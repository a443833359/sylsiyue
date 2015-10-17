<?php
$name=$_POST['name'];
mkdir('../files/'.$name);
$outputFp = fopen('../files/'.$name.'/main.c', 'w');
fwrite($outputFp, $_POST['source']);
fclose($outputFp);
$outputFp = fopen('../files/'.$name.'/input.txt', 'w');
fwrite($outputFp, $_POST['input']);
fclose($outputFp);
passthru("gcc -Wall -std=gnu99 ../files/$name/main.c -o ../files/$name/main.exe 2>&1",$ret);
if(!$ret){
	passthru("..\\files\\$name\\main.exe < ..\\files\\${name}\\input.txt 2>&1",$ret);
}
if(!$ret){
	echo "Program Terminated Successfully";
}
?>