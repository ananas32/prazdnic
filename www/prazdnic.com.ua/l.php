<?php

$file = file('links.php');

$e = count($file);
$i = 0;
$n = 20;
 

while ($i<$n) {
 
$l = rand (0,$e);
$line = $file[$l];
echo $line;

$i = $i + 1;

}


?>