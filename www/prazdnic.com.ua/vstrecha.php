<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'indexform3')
{
   $mailto = 'zakaz@jora.biz';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $mailcc = 'zakaz@prazdnic.com.ua, zakaz@jora.biz';
   $subject = 'Hochu proverit datu. Perezvonite!';
   $message = 'Hochu proverit datu. Perezvonite!';
   $success_url = './fin.html';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
   $boundary = md5(uniqid(time()));

   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'Cc: '.$mailcc.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=ISO-8859-1'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   header('Location: '.$success_url);
   exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form5')
{
   $mailto = 'zakaz@jora.biz';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $mailcc = 'zakaz@prazdnic.com.ua, zakaz@jora.biz';
   $subject = 'Hochu zabroniravat vstrechu. Perezvonite!';
   $message = 'Hochu zabroniravat vstrechu. Perezvonite!';
   $success_url = './fin.html';
   $error_url = '';
   $error = '';
   $eol = "\n";
   $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
   $boundary = md5(uniqid(time()));

   $header  = 'From: '.$mailfrom.$eol;
   $header .= 'Reply-To: '.$mailfrom.$eol;
   $header .= 'Cc: '.$mailcc.$eol;
   $header .= 'MIME-Version: 1.0'.$eol;
   $header .= 'Content-Type: multipart/mixed; boundary="'.$boundary.'"'.$eol;
   $header .= 'X-Mailer: PHP v'.phpversion().$eol;
   if (!ValidateEmail($mailfrom))
   {
      $error .= "The specified email address is invalid!\n<br>";
   }

   if (!empty($error))
   {
      $errorcode = file_get_contents($error_url);
      $replace = "##error##";
      $errorcode = str_replace($replace, $error, $errorcode);
      echo $errorcode;
      exit;
   }

   $internalfields = array ("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field");
   $message .= $eol;
   $message .= "IP Address : ";
   $message .= $_SERVER['REMOTE_ADDR'];
   $message .= $eol;
   foreach ($_POST as $key => $value)
   {
      if (!in_array(strtolower($key), $internalfields))
      {
         if (!is_array($value))
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
         }
         else
         {
            $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
         }
      }
   }
   $body  = 'This is a multi-part message in MIME format.'.$eol.$eol;
   $body .= '--'.$boundary.$eol;
   $body .= 'Content-Type: text/plain; charset=UTF-8'.$eol;
   $body .= 'Content-Transfer-Encoding: 8bit'.$eol;
   $body .= $eol.stripslashes($message).$eol;
   if (!empty($_FILES))
   {
       foreach ($_FILES as $key => $value)
       {
          if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize)
          {
             $body .= '--'.$boundary.$eol;
             $body .= 'Content-Type: '.$_FILES[$key]['type'].'; name='.$_FILES[$key]['name'].$eol;
             $body .= 'Content-Transfer-Encoding: base64'.$eol;
             $body .= 'Content-Disposition: attachment; filename='.$_FILES[$key]['name'].$eol;
             $body .= $eol.chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))).$eol;
          }
      }
   }
   $body .= '--'.$boundary.'--'.$eol;
   if ($mailto != '')
   {
      mail($mailto, $subject, $body, $header);
   }
   header('Location: '.$success_url);
   exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Безымянная страница</title>
<meta name="generator" content="WYSIWYG Web Builder 10 - http://www.wysiwygwebbuilder.com">
<link href="jora2.css" rel="stylesheet" type="text/css">
<link href="vstrecha.css" rel="stylesheet" type="text/css">


<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=ycCzXfxsd2yem2oGtBkc8*7aBctUSCXPQI/Rps9qU6TbkGKYMzsrmOJOfDcJv3GfQ9YQQrqCoM0qvFsdtcKtlzG7Wb3vqAHM**ZcJKggfqhN0ZJK9lBiUPfzuApxcPTeo9Kc9zHEI7meWt9SZQP0zIQX7bqFAxOaP5bqT8MdY1o-';</script>
</head>
<body>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQ6P9H"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MQ6P9H');</script>
<!-- End Google Tag Manager -->
<div id="wb_Shape5">
<img src="images/img0010.png" id="Shape5" alt=""></div>
<div id="Layer6">
<div id="Layer6_Container">
<div id="wb_Text16">
<span id="wb_uid0"><strong>ПРОВЕРИТЬ&nbsp;&nbsp;&nbsp;&nbsp; ДАТУ</strong></span></div>
<div id="wb_Line5">
<img src="images/img0026.png" id="Line5" alt=""></div>
<div id="wb_Image15">
<img src="images/microfon.png" id="Image15" alt=""></div>
<div id="wb_Text19">
<span id="wb_uid1"><strong>УЗНАЙТЕ, СМОГУ ЛИ ЭТОТ ДЕНЬ ОТДАТЬ ВАМ:)</strong></span></div>
</div>
</div>
<div id="indexLayer15">
<div id="indexLayer15_Container">
<div id="wb_indexForm3">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="indexForm3">
<input type="hidden" name="formid" value="indexform3">
<input type="submit" id="indexButton3" name="" value="ПРОВЕРИТЬ ДАТУ">
<input type="text" id="indexEditbox10" name="Введите Ваше Имя" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1042;&#1072;&#1096;&#1077; &#1048;&#1084;&#1103;">
<input type="text" id="Editbox2" name="Введите Номер Телефона" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1053;&#1086;&#1084;&#1077;&#1088; &#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072;">
<input type="text" id="Editbox4" name="Дата Мероприятия" value="" required placeholder="&#1044;&#1072;&#1090;&#1072; &#1052;&#1077;&#1088;&#1086;&#1087;&#1088;&#1080;&#1103;&#1090;&#1080;&#1103;">
<input type="email" id="Editbox5" name="E-mail" value="" required placeholder="E-mail">
<div id="wb_Text20">
<span id="wb_uid2"><strong>ЗАПОЛНИТЕ ПОЛЯ И НАЖМИТЕ ОТПРАВИТЬ</strong></span></div>
</form>
</div>
</div>
</div>
<div id="Layer8">
<div id="Layer8_Container">
<div id="Layer10">
<div id="Layer10_Container">
<div id="wb_Form5">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form5">
<input type="hidden" name="formid" value="form5">
<input type="submit" id="Button5" name="" value="НАЗНАЧИТЬ ВСТРЕЧУ">
<input type="tel" id="Editbox14" name="Введите Телефон" value="" required pattern="[ \t\r\n\f0-9-+ ()]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;">
<input type="text" id="Editbox13" name="Введите Имя" value="" required pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ-]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1048;&#1084;&#1103;">
<input type="text" id="Editbox15" name="Удобная Дата" value="" required pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ-]*$" placeholder="&#1059;&#1076;&#1086;&#1073;&#1085;&#1072;&#1103; &#1044;&#1072;&#1090;&#1072;">
<div id="wb_Text23">
<span id="wb_uid3"><strong>Забронируйте встречу<br><u>со мной</u> прямо сейчас!</strong></span></div>
</form>
</div>
</div>
</div>
</div>
</div>
<div id="wb_Image17">
<img src="images/ok4567890-98765432.png" id="Image17" alt=""></div>
</body>
</html>