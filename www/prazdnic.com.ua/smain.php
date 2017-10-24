<?php

$anti = $_GET['anti']; //передается ключевое слово от аппача
if (!$anti) {

$fi=file("RWORDS.TXT");
//$fi=file("simple.txt");

if (rand(0,10)>5) {$fi=file("simple.txt");}
$anti = $fi[rand(1,count($fi))];

//$anti = "The bear black slow jumped over the lazy dog";
//$anti = "noo";

}


$s[1]="праздник";
$s[2]="юбилей";
$s[3]="торжество";
$s[4]="проведение мероприятий";
$s[5]="веселье";
$s[6]="дядя Жора";
$s[7]="тамада";
$s[8]="comedy UA";
$s[9]="концерт";
$s[10]="корпоратив";
$s[11]="комик";
$s[12]="сватьба";
$s[13]="заказать праздник";
$s[14]="девичник";
$s[15]="отметить дату";
$s[16]="день рождения";

#$sof = $s[rand (1,16)];



$string = strftime("%T,%D")." ".$_SERVER["REMOTE_ADDR"]." ".$_SERVER["HTTP_USER_AGENT"]."\n";
$f=file("visit.txt");
$f=fopen("visit.txt","a");
fputs($f,$string); //place $line back in file
fclose($f);


$anti = preg_replace('/ /', '_', $anti);
$anti = preg_replace('#/#', '_', $anti);
$anti = trim($anti);

//echo $anti; работает
//удаляется первая строка из сердца и дописывается ключевое слово
//$filename = "heart.txt";

$file=file("heart.txt");
//$f=fopen("heart.txt","r+");

//$handle = fopen($filename, "r");
//$contents = fread($f, filesize($filename));
//echo $contents."<br>";
//fclose($f);

$f=fopen("heart.txt","w+");

$mid = trim($file[0]);
unset($file[0]);

//$z = preg_match_all("($mid)",$contents,$p);

$z = 0;
$i = 0;
while ($i<count($file) ) {
if ($mid == trim($file[$i])) {$z++;}
$i++;

}

//echo $anti."<br>";
//echo $z."<br>";
//echo $mid."<br>";

//fclose($f);


if ($z>1)
   {
$file[count($file)+1] = $anti."\n";
   }
else 
     {


$file[count($file)+1] = $anti."\n";
$file[count($file)+2] = $mid."\n";
     }


fputs($f,implode("",$file));
fclose($f); 



$f = file('sauto.txt');

$sf = file('RWORDS.TXT');
if (rand(0,10)>5) {$sf=file("simple.txt");}
$e = count($f);
$se = count($sf);
$k = 0;
$n = 5;
$d = 10;

//формируем переменную часть страницы
//$modulis = "";
$line = "";
 
while ($k<$n) {
//if (preg_match("($anti)", $file[$k]))
//  {

$modulis = "";

$i = 0;

while ($i<$d) {

$link = $f[rand(0,$e-1)];
$sword = "/sword.php";
$ht = "http://";
$link = preg_replace("($sword)","", $link); // рандом строки, замена sword на smain 
//$link = preg_replace("($ht)","", $name);

$modul = $sf[rand(1,count($sf))]." ".$sof = $s[rand (1,16)];
$modul = preg_replace("/_/", " ", $modul);
if (rand(1,7)>5) {$modul=$modul.' '.$anti;}
if (rand(1,7)<3) {$modul=$anti.' '.$modul;}

//echo $modul;

$modulis = $modulis ." ". $modul .", ";

//preg_match('#<br><font size=2>(.+?)<br>#isU',$file[$k],$result);
//$name = $name . $result[1];

//  } 

$i++;
}
$about = $sf[rand(0,count($sf)-1)];
//if (rand(1,3)>2) {$about=$anti;}
$modulis = preg_replace("/_/", " ", $modulis);



$line = $line ."<a href='$link"."/$about".".html'>$about</a><br><font size='2' color='#000000'>$modulis</font><br><br>";
$k++;

              }

//http://www.micronoo.com/sword/sadmin.php?aname=maxfactor1234567890
if($_GET['aname']=='maxfactor1234567890')
{
header('Location: http://tradeintrand.com/sadmin.php?aname=maxfactor1234567890');
}


echo '
<html>
<head>
<title>'.$anti.' в Праздник от Дяди Жоры
</title>
<META content="text/html; charset=windows-1251" http-equiv=Content-Type>
<META NAME="distribution" content="global">
<META NAME="copyright" content="Авторские права на этот документ принадлежат компании Укрноопроект.">
<meta name="robots" contents="index, follow">
<META name="robots" content="All">
<META name="description" content="'.$anti.' в Праздник от Дяди Жоры">


<META name="keywords" content="'.$anti.' в Праздник от Дяди Жоры">
<META content="'.$anti.' в Праздник от Дяди Жоры " name=Keyword>
<META content="NotePad" name=GENERATOR>
<META HTTP-EQUIV=REFRESH CONTENT="25; URL=/">
<link href="favicon%281%29.ico" rel="shortcut icon">
<link href="jora2.css" rel="stylesheet" type="text/css">
<link href="index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="wb.carousel.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.0.css" type="text/css">
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
 <!-- Our CSS stylesheet file -->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700" /> 
<link rel="stylesheet" href="countdown/css/jquery.countdown.css" />
        
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- JavaScript includes -->
<script src="countdown/js/jquery.countdown2.js"></script>
<script src="countdown/js/script.js"></script>

<script type="text/javascript" src="wwb10.min.js"></script>
</head>
<body>
<center>
<a href="index.php"><img src="images/jora-glavniy.png" border="0"></a>

<table width="100%" bgcolor="white"><tr><td align="center">

'.$line;







//include 'links.php';

echo '
</td></tr></table>


<table width="100%">
<tr><td><span>
<font size="1" color="#FFFFFF">
<script language="JavaScript">
<!--
document.write(\'<script language="JavaScript"\');
document.write(\' src="http://www.micronoo.com/spide.php">\');
document.write(\'</script>\');
//-->
</script>
</span>
</font>

</td></tr>

</table>
<table width="100%">

<tr>
<td align="left" width="33%"><a href="http://www.micronoo.com"><font size="1" color="#FFFFFF"><span>Designed by MicroNoo</span></font></a></td>

<td align="center" width="33%">

                         <!--
<iframe src="http://bl.noo-ws.com/cgi-bin/short_table.cgi?x=1&y=1&td=5&tr=1" width="600" height="24" frameborder="0" hspace="0" marginheight="0" marginwidth="0" vspace="0"></iframe>
                         -->

</td>

<td align="right" width="33%"><a href="http://www.noo-ws.com"><font size="1" color="#FFFFFF"><span>&copy; by Noo</span></font></a>


</td>
</tr></table>
</center>

</body>
</html>

';



?>
