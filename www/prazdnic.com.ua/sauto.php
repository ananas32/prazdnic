<?php

$name = $_POST["name"];
$tema = $_POST["tema"];
$pages = $_POST["pages"];
$text = $_POST["text"];
$desc = $_POST["desc"];


//if($name and $tema and $pages and $text and $desc) {
if($name) {

$file=file('sauto.txt');

$e = count($file);
//$e = 1;
$i=0;
$ni=$i+1;



  while ($i<$e) {


$link = $file[$i];
//include "print.inc";

$inn= '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Регистрация страниц  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . (способ быстро заработать в интернете)
</title>
<META content="text/html; charset=windows-1251" http-equiv="Content-Type">


</head>

<!--<body>-->
<body onload="document.forms.registerForm.submit();">


<table width="100%"><tr><td>
<form name="registerForm" action="'.$link.'" method="post">
<b><font size=2 face=verdana>Link</font></b></td><td> 
<INPUT name="name" type="text" size="60" value="'.$name.'"></td></tr>
<tr><td>
<b><font size=2 face=verdana>Название страницы латинскими</font></b></td><td> 
<INPUT name="tema" type="text" size="40" value="'.$tema.'"></td>
</tr>
<tr><td>
<b><font size=2 face=verdana>Количество страниц</font></b></td><td> 
<INPUT name="pages" type="text" size="40"  value="'.$pages.'">
</td></tr>


<tr><td>
<b><font size=2 face=verdana>Ключевые слова или фразы</font></b></td><td>
<INPUT type="text" name="text"  value="'.$text.'">
<tr>

<tr><td>
<b><font size=2 face=verdana>Некликабельный текст</font></b></td><td>
<INPUT type="text" name="desc"  value="'.$desc.'">
<tr>


<td><input type="submit" value="       Создать        "></td>
</tr>

</form>

</td></tr></table>


</body>


</HTML>

';


$filename = $i.".htm";
$a=fopen($filename,"w+");
fputs($a,$inn); //place $line back in file
chmod($filename, 444);
fclose($a);

$i=$i+1;
$ni=$i+1;
sleep (2);
}
header('Location: http://www.micronoo.com/ikar.php');

 }
else 
{print '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
<title>Регистрация страниц  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . (способ быстро заработать в интернете)
</title>
<META content="text/html; charset=windows-1251" http-equiv="Content-Type">

</head>


<body>


<table width="100%"><tr><td>
<form action="sauto.php" method="post">
<b><font size=2 face=verdana>Link</font></b></td><td> 
<INPUT name="name" type="text" size="60"></td></tr>
<tr><td>
<b><font size=2 face=verdana>Название страницы латинскими</font></b></td><td> <INPUT name="tema" type="text" size="40" value=""></td>
</tr>
<tr><td>
<b><font size=2 face=verdana>Количество страниц</font></b></td><td> 
<INPUT name="pages" type="text" size="40"  value="">
</td></tr>


<tr><td>
<b><font size=2 face=verdana>Ключевые слова или фразы</font></b></td><td>
<INPUT type="text"  name="text"  value="">
<tr>

<tr><td>
<b><font size=2 face=verdana>Некликабельный текст</font></b></td><td>
<INPUT type="text"  name="desc" value="">
<tr>


<td><input type="submit" value="       Создать        "></td>
</tr>

</form>

</td></tr></table>


</body>


</HTML>
';

}
  

?>