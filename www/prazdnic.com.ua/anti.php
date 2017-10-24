<?php

$anti = $_GET['anti'];

$file = file('links.php');

$e = count($file);
$k = 0;
$n = 20;

$name = "";
 
while ($k<$e) {
if (preg_match("($anti)", $file[$k]))
  {
preg_match('#<br><font size=2>(.+?)<br>#isU',$file[$k],$result);
$name = $name . $result[1];

  } 

$k++;

              }

echo $anti."<br><br><br>";
echo $name;


?>
