<?php
//http://www.micronoo.com/sword/sadmin.php?aname=maxfactor1234567890
if($_GET["aname"]!="maxfactor1234567890") {
print'Добрый день!';
}
else{
print'
<HTML>

<head>
<title>Регистрация страниц  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . (способ быстро заработать в интернете)
</title>
<META content="text/html; charset=windows-1251" http-equiv="Content-Type">
<META NAME="distribution" content="global">
<META NAME="copyright" content="Авторские права на этот документ принадлежат компании Укрноопроект.">
<meta name="robots" contents="index, follow">
<META name="robots" content="All">

<META name="description" content="регистрация">

<META name="keywords" content="регистрация">
<META content="вэбмони, заработок, инвестиции" name=Keyword>
<META content="NotePad" name=GENERATOR>

<style>
a:link,a:active,a:visited {color:red;text-decoration:none}
a:hover{text-decoration:underline}
body{font-family:Verdana}
</style>


</head>


<body>


<table width="100%"><tr><td>
<form action="sword.php" method="post">
<b><font size=2 face=verdana>Link</font></b></td><td> 
<INPUT name="name" type="text" size="60"></td></tr>
<tr><td>
<b><font size=2 face=verdana>Название страницы латинскими</font></b></td><td> <INPUT name="tema" type="text" size="40"></td>
</tr>
<tr><td>
<b><font size=2 face=verdana>Количество страниц</font></b></td><td> <INPUT name="pages" type="text" size="40">
</td></tr>


<tr><td>
<b><font size=2 face=verdana>Ключевые слова или фразы</font></b></td><td>
<textarea cols="48" rows="6" name="text"></textarea>
<tr>

<tr><td>
<b><font size=2 face=verdana>Некликабельный текст</font></b></td><td>
<textarea cols="48" rows="6" name="desc"></textarea>
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