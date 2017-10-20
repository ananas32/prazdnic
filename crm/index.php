<?
session_start();
if(!isset($_SESSION['utms'])) {
    $_SESSION['utms'] = array();
    $_SESSION['utms']['utm_source'] = '';
    $_SESSION['utms']['utm_medium'] = '';
    $_SESSION['utms']['utm_term'] = '';
    $_SESSION['utms']['utm_content'] = '';
    $_SESSION['utms']['utm_campaign'] = '';
}
$_SESSION['utms']['utm_source'] = $_GET['utm_source'];
$_SESSION['utms']['utm_medium'] = $_GET['utm_medium'];
$_SESSION['utms']['utm_term'] = $_GET['utm_term'];
$_SESSION['utms']['utm_content'] = $_GET['utm_content'];
$_SESSION['utms']['utm_campaign'] = $_GET['utm_campaign'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Language" content="ru">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


</head>
<body style="background:#f1f1f1;">

<form name="Form1" method="post" action="zakaz.php" id="Form1">
name<br>
<input type="text" id="Editbox3" name="name" value=""><br>
phone<br>
<input type="tel" id="Editbox1" name="phone" value=""><br>
mail<br>
<input type="email" id="Editbox17" name="e-mail" value="">
<br>
<input type="submit" id="Button2" name="" value="ОТПРАВИТЬ ЗАЯВКУ!">


<input type="hidden" name="product_id" value="3" >
<input type="hidden" name="price" value="5" >
</form>

</body>
</html>