<?php

print "It works!";


$name = $_POST["name"];
$tema = $_POST["tema"];
$pages = $_POST["pages"];
$text = $_POST["text"];
$desc = $_POST["desc"];


print $name;
print $tema;
print $pages;
print $text;
print $desc;


           $i=0;
  while ($i<$pages) {

//$s[1]="стихи";
//$s[2]="песни";
//$s[3]="поэзия";


$z = rand (1,15);
//$s = $s[$z];
if($z==1){$s="пептиды";}
if($z==2){$s="продление жизни";}
if($z==3){$s="омоложение клеток";}
if($z==4){$s="команда долгожителей";}
if($z==5){$s="омоложение организма";}
if($z==6){$s="препараты для омоложения";}
if($z==7){$s="ключи-пептиды для активации теломеразы";}
if($z==8){$s="продление жизни клеток";}
if($z==9){$s="наращивание теломеры";}
if($z==10){$s="активация теломеразы";}
if($z==11){$s="эликсир молодости";}
if($z==12){$s="теломераза";}
if($z==13){$s="МЛМ по пептидным препаратам";}
if($z==14){$s="Аюрведа";}
if($z==15){$s="препараты пептидов";}


$file = file('links.php');

$e = count($file);
$k = 0;
$n = 20;
 

while ($k<$n) {
 
$l = rand (0,$e);
$line .= $file[$l];


$k = $k + 1;

}


$place= '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<head>
<title>Лаборатория долгожителей  . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . . (интернет, промоушн, реклама )
</title>
<META content="text/html; charset=windows-1251" http-equiv=Content-Type>
<META NAME="distribution" content="global">
<META NAME="copyright" content="Авторские права на этот документ принадлежат компании Укрноопроект., '.$name.', '.$text.'">
<meta name="robots" contents="index, follow">
<META name="robots" content="All">

<META name="description" content="Лаборатория долгожителей '.$name.', '.$text.'">


<META name="keywords" content="Лаборатория долгожителей, '.$name.', '.$text.'">
<META content="Лаборатория долгожителей,'.$name.', '.$text.' " name=Keyword>
<META content="NotePad" name=GENERATOR>

<style type="text/css">
<!--
    body {
        margin:0;
        padding:0;
        font: bold 11px/1.5em Verdana;
}

h2 {
        font: bold 14px Verdana, Arial, Helvetica, sans-serif;
        color: #000;
        margin: 0px;
        padding: 0px 0px 0px 15px;
}


/*- Menu Tabs C--------------------------- */

    #tabsC {
      float:left;
      width:100%;
      background:#3f8cfe;
      font-size:120%;
      line-height:normal;
      }
    #tabsC ul {
        margin:0;
        padding:10px 10px 0 50px;
        list-style:none;
      }
    #tabsC li {
      display:inline;
      margin:0;
      padding:0;
      }
    #tabsC a {
      float:left;
      background:url("tableftC.gif") no-repeat left top;
      margin:0;
      padding:0 0 0 4px;
      text-decoration:none;
      }
    #tabsC a span {
      float:left;
      display:block;
      background:url("tabrightC.gif") no-repeat right top;
      padding:5px 15px 4px 6px;
      color:#464E42;
      }
    /* Commented Backslash Hack hides rule from IE5-Mac \*/
    #tabsC a span {float:none;}
    /* End IE5-Mac hack */
    #tabsC a:hover span {
      color:#38d54a;
      }
    #tabsC a:hover {
      background-position:0% -42px;
      }
    #tabsC a:hover span {
      background-position:100% -42px;
      }

        #tabsC #current a {
                background-position:0% -42px;
        }
        #tabsC #current a span {
                background-position:100% -42px;
        }
-->
</style>

<META HTTP-EQUIV=REFRESH CONTENT="50; URL=http://'.$name.'">


</head>

<body text="#000000" bgcolor="#17e277" topmargin="0" leftmagin="0">
<a href="index.html"><img src="/Images/header.jpg" border="0" width="100%" vspace="3" align="top"></a>
<div id="tabsC" align="top">
	<table align="right" valign="top" width="100%">
	<tr align="right" valign="top">

<td>

                                <ul>
                                        <!-- CSS Tabs -->
<li><a href="/index.html"><span>Главная</span></a></li>
<li><a href="/product.php"><span>Продукты</span></a></li>
<li><a href="/faq.html"><span>F.A.Q.</span></a></li>
<li><a href="/reg.php"><span>Регистрация</span></a></li>
<li><a href="/contacts.php"><span>Контакты</span></a></li>
<li><a href="/sert.html"><span>Сертификаты</span></a></li>
<li><a href="/order.php"><span>Заказ</span></a></li>

                                </ul>


</td>


	<td align="right">
<form action="http://db.npcriz.ru/login_post.asp" method="POST" >
	<font size="2" color="white">Логин:</font>
		
       <input type="text" size="16" maxlength="256" name="Username" value="" >
	

			
	<font size="2" color="white">Пароль:</font>
	
	<input type="password" size="16" maxlength="256" name="Password" value="">
	<input type="submit" value=" &gt;&gt; Войти"></td>
</form>
	</tr></table>
</div>
<div id="tabsC" align="top">                        
<table width="100%" bgcolor="white"><tr><td>

<center>
<table width="100%" bgcolor="#17e277">
<tr><td colspan="2" valign="top">
<script type="text/javascript"><!--
google_ad_client = "ca-pub-6722470398773468";
/* LD */
google_ad_slot = "2447954910";
google_ad_width = 728;
google_ad_height = 15;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>

</td></tr>
</table>

</center>
</td></tr>


<tr><td>

<table>
<td width="20%"></td>
<td bgcolor="#FFFFFF"  align="justify">
'.$line.'
</td>
<br>
<br>
<td width="20%"></td>
</table>
</td></tr></table>


<script language="JavaScript">
<!--
document.write(\'<script language="JavaScript"\');
document.write(\' src="http://www.micronoo.com/spide.php">\');
document.write(\'</script>\');
//-->
</script>

<table width="100%" height="80" background="/Images/footer.jpg"><tr>
<td align="left" width="50%"><a href="http://www.micronoo.com"><font size="1" color="#FFFFFF">Designed by MicroNoo</font></a></td>
<td align="right" width="50%"><a href="http://www.noo-ws.com"><font size="1" color="#FFFFFF">&copy; by Noo</font></a></td>
</tr></table>
</div>


<!-- BEGIN CODE NOO -->
<a href="http://www.micronoo.com" target="_top">
<img src="http://www.micronoo.com/cgi-bin/show.cgi?4"
width=1 height=1 alt="
Noo Promotion Center" border="0"></a>
<!-- END CODE NOO -->

</center>
</BODY>
</HTML>
';


$number = rand (10000,500000);


$filename = $tema."-".$number.".html";
//$a=fopen($filename,"w+");
//fputs($a,$place); //place $line back in file
//chmod($filename, 444);
//fclose($a);


$line = "<font size=2><a href='http://".$name."/smain.php'>".$s." на ".$text."</a></font><br><font size=2>".$desc."<br><br></font>"."\n  ";
if (rand (1,10)>5){
$line = "<font size=2><a href='".$tema."-".$number.".html'>".$s." на ".$text."</a></font><br><font size=2>".$desc."<br><br></font>"."\n  ";
}

$f=file("links.php");
$f=fopen("links.php","a");
fputs($f,$line); //place $line back in file
fclose($f);
$i=$i+1;
}
$s = "";

?>