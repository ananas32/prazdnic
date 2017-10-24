<?php
function ValidateEmail($email)
{
   $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
   return preg_match($pattern, $email);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form1')
{
   $mailto = 'it@jora.biz';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $mailcc = 'zakaz@prazdnic.com.ua, zakaz@jora.biz';
   $subject = 'U menya est voprosy prazdnic.com.ua ';
   $message = 'U menya est voprosy prazdnic.com.ua ';
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form4')
{
   $mailto = 'it@jora.biz';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $mailcc = 'zakaz@prazdnic.com.ua, zakaz@jora.biz';
   $subject = 'Hochu predlozhenie soglasno budzhetu!';
   $message = 'Hochu predlozhenie soglasno budzhetu';
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form2')
{
   $mailto = 'it@jora.biz';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $mailcc = 'zakaz@prazdnic.com.ua, zakaz@jora.biz';
   $subject = 'Zajavka s akciji Comedy Show!';
   $message = 'Zajavka s akciji Comedy Show!';
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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'indexform3')
{
   $mailto = 'it@jora.biz';
   $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
   $mailcc = 'zakaz@prazdnic.com.ua, zakaz@jora.biz';
   $subject = 'Hochu naznachit-vstrechu.prazdnic.com.ua';
   $message = 'Hochu naznachit-vstrechu.prazdnic.com.ua';
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
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Language" content="ru">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Дядя Жора — букинг веселого ведущего праздников на прямую</title>
<meta name="description" content="Я сделаю из Вашего праздника нечто очень крутое — этот день все запомнят навсегда. Жми!">
<link href="favicon%281%29.ico" rel="shortcut icon">
<!--<link href="jora2.css" rel="stylesheet" type="text/css">-->
<link href="index.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="swfobject.js"></script>
<script type="text/javascript" src="jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="wb.carousel.min.js"></script>
<script type="text/javascript" src="fancybox/jquery.easing-1.3.pack.js"></script>
<link rel="stylesheet" href="fancybox/jquery.fancybox-1.3.0.css" type="text/css">
<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.0.pack.js"></script>
<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.2.pack.js"></script>
 <!-- Our CSS stylesheet file -->
<!--<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700" /> -->
<!--<link rel="stylesheet" href="countdown/css/jquery.countdown.css" />-->
        
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- JavaScript includes -->
<script src="countdown/js/jquery.countdown2.js"></script>
<script src="countdown/js/script.js"></script>

<script type="text/javascript" src="wwb10.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
   var Carousel1Opts =
   {
      delay: 11000,
      duration: 500,
      easing: 'linear',
      mode: 'forward',
      direction: '',
      pagination: true,
      pagination_img_default: 'images/page_default.png',
      pagination_img_active: 'images/page_active.png',
      start: 0
   };
   $("#Carousel1").carousel(Carousel1Opts);
   $("#Carousel1_back a").click(function()
   {
      $('#Carousel1').carousel('prev');
   });
   $("#Carousel1_next a").click(function()
   {
      $('#Carousel1').carousel('next');
   });
   $('#YouTube2').fancybox(
   {
      'padding' : 0,
      'autoScale' : false,
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'title' : this.title,
      'width' : 795,
      'height' : 515
   });
   $('#YouTube5').fancybox(
   {
      'padding' : 0,
      'autoScale' : false,
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'title' : this.title,
      'width' : 795,
      'height' : 515
   });
   $('#YouTube6').fancybox(
   {
      'padding' : 0,
      'autoScale' : false,
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'title' : this.title,
      'width' : 795,
      'height' : 515
   });
   $('#YouTube7').fancybox(
   {
      'padding' : 0,
      'autoScale' : false,
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'title' : this.title,
      'width' : 795,
      'height' : 515
   });
   $('#YouTube1').fancybox(
   {
      'padding' : 0,
      'autoScale' : false,
      'transitionIn' : 'none',
      'transitionOut' : 'none',
      'title' : this.title,
      'width' : 795,
      'height' : 515
   });
});
</script>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
(function(){ var widget_id = 'BPUvFTeJBr';
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->

<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 100,
            time: 2000
        });
    });
</script>

<link rel="stylesheet" href="animate.css">
		<script src="wow.js"></script>	
		<script>
			new WOW().init();
		</script>



<script type="text/javascript">
    $(document).ready(function(){
        
        var $menu = $("#menu");
            
        $(window).scroll(function(){
            if ( $(this).scrollTop() > 1800 && $menu.hasClass("default") ){
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("default")
                           .addClass("fixed transbg")
                           .fadeIn('fast');
                });
            } else if($(this).scrollTop() <= 1800 && $menu.hasClass("fixed")) {
                $menu.fadeOut('fast',function(){
                    $(this).removeClass("fixed transbg")
                           .addClass("default")
                           .fadeIn('fast');
                });
            }
        });
        
        $menu.hover(
            function(){
                if( $(this).hasClass('fixed') ){
                    $(this).removeClass('transbg');
                }
            },
            function(){
                if( $(this).hasClass('fixed') ){
                    $(this).addClass('transbg');
                }
            });
    });
</script>








<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
<script src="http://bfintal.github.io/Counter-Up/jquery.counterup.min.js"></script>
<link rel="stylesheet" href="//cabinet.salesupwidget.com/widget/tracker.css">
<script type="text/javascript" src="//cabinet.salesupwidget.com/php/1.js" charset="UTF-8"></script >
<script type="text/javascript">var uid_code="659";</script>


<script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=l7JwdlCl4C1ilI3i6ZDLPf4KNUJ1JAdpSnnTwL11aKCm5dOab*7lKEE6H2tZk7FIGxiJ9ofrXpHU4IFDfQzcYEhQBQGlnb2NFhQOW0GbkM6Bz6cej9ID*N/XWg8YysTf3AqbQMH5dWkVt0LNzm6RLLwcpLD0C36y9UT3V/bKdfY-';</script>


<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
_fbq.push(['addPixelId', '1697080697188812']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1697080697188812&amp;ev=PixelInitialized" /></noscript>
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
<div id="indexLayer15">
<div id="indexLayer15_Container">
<div id="wb_indexForm3">
<form name="contact" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" id="indexForm3">
<input type="hidden" name="formid" value="indexform3">
<input type="submit" id="indexButton3" name="" value="НАЗНАЧИТЬ ВСТРЕЧУ!">
<input type="text" id="indexEditbox10" name="Введите Ваше Имя" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1042;&#1072;&#1096;&#1077; &#1048;&#1084;&#1103;">
<input type="text" id="Editbox2" name="Введите Номер Телефона" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1053;&#1086;&#1084;&#1077;&#1088; &#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072;">
<input type="text" id="Editbox5" name="Удобная Дата" value="" required placeholder="&#1059;&#1076;&#1086;&#1073;&#1085;&#1072;&#1103; &#1044;&#1072;&#1090;&#1072;">
<div id="wb_Text20">
<span id="wb_uid0"><strong>Забронируйте встречу<br><u>со мной</u> прямо сейчас!</strong></span></div>
</form>
</div>
</div>
</div>
<div id="Layer4">
<div id="Layer4_Container">
<div id="wb_Line3">
<img src="images/img0011.png" id="Line3" alt=""></div>
<div id="wb_Image3">
<a href="smain.php"><img src="images/microfon.png" id="Image3" alt="" border="0"></a></div>
<div id="wb_Text21">
<span id="wb_uid1"><strong>А ДАВАЙТЕ&nbsp;&nbsp;&nbsp;&nbsp; ВСТРЕТИМСЯ?!</strong></span></div>
<div id="wb_Text22">
<span id="wb_uid2"><strong>МНЕ НРАВИТСЯ ЛИЧНО ОБСУЖДАТЬ ДЕТАЛИ. А ВАМ?</strong></span></div>
</div>
</div>
<div id="Layer3">
<div id="Layer3_Container">
<div id="wb_Image4">
<img src="images/jora-glavniy.png" id="Image4" alt=""></div>
<div id="wb_Image20">
<img src="images/230204_14116717244235346.png" id="Image20" alt=""></div>
<div id="wb_Image14">
<img src="images/230204_14116717244567897960.png" id="Image14" alt=""></div>
<div id="wb_Image22">
<img src="images/230204_141167172478678769789.png" id="Image22" alt=""></div>
<div id="wb_Image23">
<img src="images/230204_14116717245668980787.png" id="Image23" alt=""></div>
<div id="wb_Image21">
<img src="images/230204_1411671724575678568.png" id="Image21" alt=""></div>
<div id="wb_Image1">
<img src="images/d-word.png" id="Image1" alt=""></div>
<div id="wb_Image5">
<img src="images/ja-word.png" id="Image5" alt=""></div>
<div id="wb_Image6">
<img src="images/d-word.png" id="Image6" alt=""></div>
<div id="wb_Image7">
<img src="images/ja-word.png" id="Image7" alt=""></div>
<div id="wb_Image10">
<img src="images/o-word.png" id="Image10" alt=""></div>
<div id="wb_Image9">
<img src="images/zh-word.png" id="Image9" alt=""></div>
<div id="wb_Image11">
<img src="images/r-word.png" id="Image11" alt=""></div>
<div id="wb_Image12">
<img src="images/a-word.png" id="Image12" alt=""></div>
<div id="Html4">
<span class="counter" id="num">19</span></div>
<div id="wb_Text1">
<span id="wb_uid3"><strong>ЛЕТ ОПЫТА РАБОТЫ ВЕДУЩИМ</strong></span></div>
<div id="Html8">
<span class="counter" id="num">96</span></div>
<div id="wb_Text3">
<span id="wb_uid4"><strong>ПРОЦЕНТ ЗАКАЗОВ - ПО РЕКОМЕНДАЦИЯМ</strong></span></div>
<div id="Html9">
<span class="counter" id="num">1001</span></div>
<div id="wb_Text5">
<span id="wb_uid5"><strong>ТАКОЙ ПРОЦЕНТ ДОВОЛЬНЫХ КЛИЕНТОВ!</strong></span></div>
<div id="Html10">
<span class="counter" id="num">101</span></div>
<div id="Html7">
<span class="counter" id="num">3094</span></div>
<div id="wb_Image8">
<a href="smain.php"><img src="images/microfon.png" id="Image8" alt="" border="0"></a></div>
<div id="wb_Text9">
<span id="wb_uid6"><strong>ПРОВЕДУ САМЫЙ ВЕСЕЛЫЙ ПРАЗДНИК ВАШЕЙ ЖИЗНИ!</strong></span></div>
<div id="wb_Line1">
<img src="images/img0008.png" id="Line1" alt=""></div>
<div id="wb_Form1">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form1">
<input type="hidden" name="formid" value="form1">
<input type="tel" id="Editbox1" name="Введите Телефон" value="" required pattern="[ \t\r\n\f0-9-+ ()]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;">
<input type="text" id="Editbox3" name="Введите Имя" value="" required pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ-]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1048;&#1084;&#1103;">
<input type="submit" id="Button2" name="" value="ОТПРАВИТЬ ЗАЯВКУ!">
<input type="email" id="Editbox17" name="Введите E-mail" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; E-mail">
<div id="wb_Text18">
<span id="wb_uid7"><strong>МОЙ ПРЕДСТАВИТЕЛЬ ПЕРЕЗВОНИТ ЧЕРЕЗ 3 МИНУТЫ:)</strong></span></div>
</form>
</div>
<div id="wb_Text2">
<span id="wb_uid8"><strong>УСПЕШНО ПРОВЕДЕННЫХ<br>ПРАЗДНИКОВ, ВЕЧЕРИНОК И ТОРЖЕСТВ</strong></span></div>

<div id="wb_Text39">
<span id="wb_uid9"><strong>ЗНАЮ ШУТОК И АНЕКДОТОВ</strong></span></div>
<div id="wb_Text78">
<span id="wb_uid10"><strong>ЛУЧШИЙ ВЕДУЩИЙ - ГАРАНТИЯ УСПЕШНОГО ПРАЗДНИКА!</strong></span></div>
<div id="wb_Text17">
<span id="wb_uid11"><strong><u>НЕ РИСКУЙ!</u> ДОВЕРЬ ПРАЗДНИК ПРОФЕССИОНАЛУ!</strong></span></div>
</div>
</div>
<div id="Layer15">
<div id="Layer15_Container">
<div id="wb_Text14">
<span id="wb_uid12"><strong><u>Отправьте</u></strong> заявку прямо сейчас и <br><strong><u>узнайте</u></strong> какой приятный сюрприз Ваш ждет!</span></div>
<div id="wb_indexBookmark1">
<a id="wb_uid13" name="price">&nbsp;</a>
</div>
<div id="wb_Text13">
<div id="wb_uid14"><span id="wb_uid15"><strong><u>ПОЛУЧИТЕ СУПЕР ПРЕДЛОЖЕНИЕ</u></strong></span></div>
<div id="wb_uid16"><span id="wb_uid17"><strong>ОТ КОТОРОГО НЕЛЬЗЯ ОТКАЗАТЬСЯ!</strong></span></div>
</div>
<div id="wb_Form4">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form4">
<input type="hidden" name="formid" value="form4">
<input type="text" id="Editbox8" name="Введите Имя" value="" required pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ-]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1048;&#1084;&#1103;">
<input type="email" id="Editbox10" name="Введите E-mail" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; E-mail">
<input type="submit" id="Button4" name="" value="ПОЛУЧИТЬ СЕЙЧАС!">
<input type="tel" id="Editbox9" name="Номер Телефона" value="" required pattern="[ \t\r\n\f0-9-+ ()]*$" placeholder="&#1053;&#1086;&#1084;&#1077;&#1088; &#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;&#1072;">
</form>
</div>
</div>
</div>
<div id="Layer16">
<div id="Layer16_Container">
<div id="wb_Text25">
<span id="wb_uid18"><strong>СМОТРИТЕ&nbsp;&nbsp;&nbsp;&nbsp; ОТЗЫВЫ</strong></span></div>
<div id="wb_Line4">
<img src="images/img0012.png" id="Line4" alt=""></div>
<div id="wb_Image18">
<a href="smain.php"><img src="images/microfon.png" id="Image18" alt="" border="0"></a></div>
<div id="wb_Text26">
<span id="wb_uid19"><strong>НАШИХ ДОВОЛЬНЫХ КЛИЕНТОВ:)</strong></span></div>
<div id="wb_Bookmark1">
<a id="wb_uid20" name="otzyv">&nbsp;</a>
</div>
<div id="wb_Carousel1">
<div id="Carousel1">
<div class="frame">
<div id="wb_Image16">
<img src="images/img0013.png" id="Image16" alt=""></div>
<div id="wb_YouTube2">
<a class="iframe" id="YouTube2" title="Отзыв от владельца ивент агенства Кристины Смирновой "Стильная свадьба" " href="https://www.youtube.com/embed/hwy2EKPoLfY?rel=0&amp;modestbranding=1&amp;showinfo=0&amp;version=3&amp;autohide=0&amp;theme=dark"><img src="images/4324234235254534534.jpg" alt="Отзыв от владельца ивент агенства Кристины Смирновой "Стильная свадьба" "></a>
</div>
</div>
<div class="frame">
<div id="wb_Image33">
<img src="images/img0023.png" id="Image33" alt=""></div>
<div id="wb_YouTube5">
<a class="iframe" id="YouTube5" title="Отзыв о ведении свадьбы от молодоженов Валентины и Кирилла " href="https://www.youtube.com/embed/XhuvCv6iGL0?rel=0&amp;modestbranding=1&amp;showinfo=0&amp;version=3&amp;autohide=0&amp;theme=dark"><img src="images/43242342353.jpg" alt="Отзыв о ведении свадьбы от молодоженов Валентины и Кирилла "></a>
</div>
</div>
<div class="frame">
<div id="wb_Image34">
<img src="images/img0014.png" id="Image34" alt=""></div>
<div id="wb_YouTube6">
<a class="iframe" id="YouTube6" title="Отзыв о ведении свадьбы от молодоженов Яны и Виталия" href="https://www.youtube.com/embed/4X5G-pSPpy0?rel=0&amp;modestbranding=1&amp;showinfo=0&amp;version=3&amp;autohide=0&amp;theme=dark"><img src="images/42342342355646346346346.jpg" alt="Отзыв о ведении свадьбы от молодоженов Яны и Виталия"></a>
</div>
</div>
<div class="frame">
<div id="wb_Image35">
<img src="images/img0009.png" id="Image35" alt=""></div>
<div id="wb_YouTube7">
<a class="iframe" id="YouTube7" title="Отзывы выпускников лицея №241" href="https://www.youtube.com/embed/nNGfBw4g4H0?rel=0&amp;modestbranding=1&amp;showinfo=0&amp;version=3&amp;autohide=0&amp;theme=dark"><img src="images/43567869780980.jpg" alt="Отзывы выпускников лицея №241"></a>
</div>
</div>
<div class="frame">
<div id="wb_Image15">
<img src="images/img0028.png" id="Image15" alt=""></div>
<div id="wb_YouTube1">
<a class="iframe" id="YouTube1" title="Благодарственный отзыв от молодоженов Миши и Кати" href="https://www.youtube.com/embed/cNXon7CCs3k?rel=0&amp;modestbranding=1&amp;showinfo=0&amp;version=3&amp;autohide=0&amp;theme=dark"><img src="images/5345345346346346.jpg" alt="Благодарственный отзыв от молодоженов Миши и Кати"></a>
</div>
</div>
</div>
<div id="Carousel1_back"><a id="wb_uid21"><img alt="Back" id="wb_uid22" src="images/left-strelka-jora123.png"></a></div>
<div id="Carousel1_next"><a id="wb_uid23"><img alt="Next" id="wb_uid24" src="images/right-strelka-vpravo123.png"></a></div>
</div>
</div>
</div>
<div id="Layer13">
<div id="Layer13_Container">
<div id="wb_Shape5">
<img src="images/img0027.png" id="Shape5" alt=""></div>
<div id="wb_Text24">
&nbsp;</div>
<div id="wb_Text29">
<span id="wb_uid25"><strong>ПОЛУЧИТЕ БЕСПЛАТНУЮ КОНСУЛЬТАЦИЮ!</strong></span></div>
<div id="wb_Shape1">
<a href="javascript:displaylightbox('./svadba.php',{height:402,width:302})" target="_self"><img src="images/img0015.png" id="Shape1" alt=""></a></div>
<div id="wb_Shape6">
<a href="javascript:displaylightbox('./dr.php',{height:402,width:302})" target="_self"><img src="images/img0016.png" id="Shape6" alt=""></a></div>
<div id="wb_Shape7">
<a href="javascript:displaylightbox('./koncert.php',{height:402,width:302})" target="_self"><img src="images/img0017.png" id="Shape7" alt=""></a></div>
<div id="wb_Shape8">
<a href="javascript:displaylightbox('./klub.php',{height:402,width:302})" target="_self"><img src="images/img0018.png" id="Shape8" alt=""></a></div>
<div id="wb_Shape9">
<a href="javascript:displaylightbox('./korp.php',{height:402,width:302})" target="_self"><img src="images/img0019.png" id="Shape9" alt=""></a></div>
<div id="wb_Shape13">
<a href="javascript:displaylightbox('./mal-dev.php',{height:402,width:302})" target="_self"><img src="images/img0020.png" id="Shape13" alt=""></a></div>
<div id="wb_Shape2">
<a href="javascript:displaylightbox('./mass.php',{height:402,width:302})" target="_self"><img src="images/img0001.png" id="Shape2" alt=""></a></div>
<div id="wb_indexImage147">
<img src="images/456-098765434678.png" id="indexImage147" alt=""></div>
<div id="wb_Text50">
<span id="wb_uid26"><strong>Я ОЧЕНЬ ВЕСЕЛО ПРОВЕДУ ЛЮБОЙ ФОРМАТ ПРАЗДНИКА:)</strong></span></div>
</div>
</div>
<div id="Layer2">
<div id="Layer2_Container">
<div id="wb_Shape12">
<img src="images/img0006.png" id="Shape12" alt=""></div>
<div id="wb_Image13">
<img src="images/monitor53463712324.png" id="Image13" alt=""></div>
<div id="wb_Shape15">
<a href="javascript:displaylightbox('./zakat-vedushego.php',{height:402,width:302})" target="_self"><img src="images/img0022.gif" id="Shape15" alt=""></a></div>
<div id="wb_YouTube4">
<iframe id="YouTube4" src="https://www.youtube.com/embed/ZBskyjtOjnM?rel=0&amp;modestbranding=1&amp;showinfo=0&amp;version=3&amp;autohide=0&amp;theme=dark" frameborder="0"></iframe>
</div>
<div id="wb_Bookmark2">
<a id="wb_uid27" name="present">&nbsp;</a>
</div>
<div id="wb_Text16">
<span id="wb_uid28"><strong>&#1071; &#1091;&#1085;&#1080;&#1074;&#1077;&#1088;&#1089;&#1072;&#1083;&#1100;&#1085;&#1099;&#1081; &#1074;&#1077;&#1076;&#1091;&#1097;&#1080;&#1081;. &#1057;&#1084;&#1086;&#1090;&#1088;&#1080; &#1087;&#1088;&#1077;&#1079;&#1077;&#1085;&#1090;&#1072;&#1094;&#1080;&#1102;! </strong></span></div>
</div>
</div>
<div id="indexLayer2">
<div id="indexLayer2_Container">
<div id="wb_indexText11">
<span id="wb_uid29"><strong>НЕЗАБЫВАЕМЫЕ</strong><br></span><span id="wb_uid30">КОРПОРАТИВЫ</span></div>
<div id="wb_Shape4">
<a href="javascript:displaylightbox('./lids.php',{height:402,width:302})" target="_self"><img src="images/img0002.png" id="Shape4" alt=""></a></div>
</div>
</div>
<div id="indexLayer6">
<div id="indexLayer6_Container">
<div id="wb_Text7">
<span id="wb_uid31"><strong>ЯРКИЕ </strong></span><span id="wb_uid32">ПРЕЗЕНТАЦИИ</span></div>
<div id="wb_Shape3">
<a href="javascript:displaylightbox('./lids.php',{height:402,width:302})" target="_self"><img src="images/img0003.png" id="Shape3" alt=""></a></div>
</div>
</div>
<div id="indexLayer8">
<div id="indexLayer8_Container">
<div id="wb_Text8">
<span id="wb_uid33"><strong>СВАДЬБА</strong><br></span><span id="wb_uid34">ТВОЕЙ МЕЧТЫ</span></div>
<div id="wb_Shape10">
<a href="javascript:displaylightbox('./lids.php',{height:402,width:302})" target="_self"><img src="images/img0004.png" id="Shape10" alt=""></a></div>
</div>
</div>
<div id="indexLayer10">
<div id="indexLayer10_Container">
<div id="wb_Text12">
<span id="wb_uid35"><strong>КРУТЫЕ</strong><br></span><span id="wb_uid36">ДНИ РОЖДЕНИЯ</span></div>
<div id="wb_Shape11">
<a href="javascript:displaylightbox('./lids.php',{height:402,width:302})" target="_self"><img src="images/img0005.png" id="Shape11" alt=""></a></div>
</div>
</div>
<div id="indexLayer12">
<div id="indexLayer12_Container">
<div id="wb_Text15">
<span id="wb_uid37"><strong>ЗАЖИГАТЕЛЬНЫЕ</strong><br></span><span id="wb_uid38">ТУСОВКИ</span></div>
<div id="wb_Shape14">
<a href="javascript:displaylightbox('./lids.php',{height:402,width:302})" target="_self"><img src="images/img0007.png" id="Shape14" alt=""></a></div>
</div>
</div>
<div id="Layer7">
<div id="Layer7_Container">
<div id="wb_Text27">
<span id="wb_uid39"><strong>ПРИХОДИТЕ&nbsp;&nbsp;&nbsp;&nbsp; В ГОСТИ</strong></span></div>
<div id="wb_Line6">
<img src="images/img0021.png" id="Line6" alt=""></div>
<div id="wb_Image24">
<a href="smain.php"><img src="images/microfon.png" id="Image24" alt="" border="0"></a></div>
<div id="wb_Text28">
<span id="wb_uid40"><strong>ПРИХОДИТЕ В ОФИС И ПОЛУЧИТЕ ЭКСКЛЮЗИВНЫЙ ПОДАРОК ЛИЧНО ОТ ДЯДИ ЖОРЫ!</strong></span></div>
</div>
</div>
<div id="Layer11">
<div id="Html1">
<script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCfHx1D--8U6NqAeapPy9kqeVRZeHARN4A&extension=.js'></script>
 
<script> 
    google.maps.event.addDomListener(window, 'load', init);
    var map;
    function init() {
        var mapOptions = {
            center: new google.maps.LatLng(50.4013,30.622792),
            zoom: 15,
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.DEFAULT,
            },
            disableDoubleClickZoom: true,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
            },
            scaleControl: true,
            scrollwheel: true,
            panControl: true,
            streetViewControl: true,
            draggable : true,
            overviewMapControl: true,
            overviewMapControlOptions: {
                opened: false,
            },
            mapTypeId: google.maps.MapTypeId.ROADMAP,
        }
        var mapElement = document.getElementById('mymap');
        var map = new google.maps.Map(mapElement, mapOptions);
        var locations = [
['jora', 'undefined', 'undefined', 'undefined', 'undefined', 50.4001555, 30.6165708, 'http://your-site.com.ua/4345235626546546.png']
        ];
        for (i = 0; i < locations.length; i++) {
   if (locations[i][1] =='undefined'){ description ='';} else { description = locations[i][1];}
   if (locations[i][2] =='undefined'){ telephone ='';} else { telephone = locations[i][2];}
   if (locations[i][3] =='undefined'){ email ='';} else { email = locations[i][3];}
           if (locations[i][4] =='undefined'){ web ='';} else { web = locations[i][4];}
           if (locations[i][7] =='undefined'){ markericon ='';} else { markericon = locations[i][7];}
            marker = new google.maps.Marker({
                icon: markericon,
                position: new google.maps.LatLng(locations[i][5], locations[i][6]),
                map: map,
                title: locations[i][0],
                desc: description,
                tel: telephone,
                email: email,
                web: web
            });
link = '';     }

}
</script>

<div id='mymap'></div>








</div>
<div id="Layer19">
<div id="Layer19_Container">
<div id="wb_Text30">
<div id="wb_uid41"><span id="wb_uid42"><strong>Я жду Вас в гости:</strong></span></div>
<div id="wb_uid43"><span id="wb_uid44">г. Киев, ул. Княжий Затон, 21, </span></div>
<div id="wb_uid45"><span id="wb_uid46">4 секция, офис 580.</span></div>
</div>
<div id="wb_Text48">
<div id="wb_uid47"><span id="wb_uid48"><strong>Звоните прямо сейчас:</strong></span></div>
<div id="wb_uid49"><span id="wb_uid50">+38 (067) 35 4444 5</span></div>
<div id="wb_uid51"><span id="wb_uid52">+38 (067) 380 20 60</span></div>
</div>
<div id="wb_Text31">
<div id="wb_uid53"><span id="wb_uid54"><strong>Напишите мне письмо:</strong></span></div>
<div id="wb_uid55"><span id="wb_uid56"> zakaz@prazdnic.com.ua</span></div>
</div>
<div id="wb_Image26">
<img src="images/jora-logo.png" id="Image26" alt=""></div>
<div id="wb_Text77">
<div id="wb_uid57"><span id="wb_uid58"><strong>Следите за новостями:</strong></span></div>
</div>
<div id="wb_Image50">
<a href="https://www.facebook.com/DyadyaJoraComedy" target="_blank"><img src="images/facebook.png" id="Image50" alt=""></a></div>
<div id="wb_Image54">
<a href="https://vk.com/dyadyajoraofficial" target="_blank"><img src="images/vkontakte.png" id="Image54" alt=""></a></div>
<div id="wb_Image55">
<a href="http://ok.ru/dyadyajoracomedy" target="_blank"><img src="images/odnoklassniki.png" id="Image55" alt=""></a></div>
<div id="wb_Image56">
<a href="https://www.youtube.com/user/dyadyajoraofficial"><img src="images/youtube.png" id="Image56" alt=""></a></div>
<div id="wb_Image57">
<a href="https://www.linkedin.com/pub/%D0%B4%D1%8F%D0%B4%D1%8F-%D0%B6%D0%BE%D1%80%D0%B0/63/909/251" target="_blank"><img src="images/linkedin.png" id="Image57" alt=""></a></div>
<div id="wb_Image58">
<a href="https://twitter.com/dyadyajora_" target="_blank"><img src="images/twitter.png" id="Image58" alt=""></a></div>
<div id="wb_Image59">
<a href="https://instagram.com/dyadya_jora/" target="_blank"><img src="images/iinstagram.png" id="Image59" alt=""></a></div>
<div id="wb_Image60">
<a href="https://plus.google.com/+dyadyajoraofficial/posts" target="_blank"><img src="images/google_plus.png" id="Image60" alt=""></a></div>
<div id="wb_Shape25">
<a href="javascript:displaylightbox('./lids.php',{height:402,width:302})" target="_self"><img src="images/img0024.png" id="Shape25" alt=""></a></div>
</div>
</div>
</div>
<div id="Layer5">
<div id="Layer5_Container">
<div id="wb_Text33">
<span id="wb_uid59">Продающие сайты от <a href="http://landing-page.kiev.ua/">Studia №1</a>. Сайт lp.jora.biz внесен в реестр авторских прав, копирование материалов запрещенно.</span></div>
</div>
</div>
<div id="indexLayer3">
<div id="indexLayer3_Container">
<div id="wb_indexText4">
<span id="wb_uid60"><strong>ИНДИВИДУАЛЬНЫЙ ПОДХОД</strong></span></div>
<div id="wb_indexText15">
<span id="wb_uid61"><strong>МЕДИЙНОГО И УНИВЕРСАЛЬНОГО ВЕДУЩЕГО</strong></span></div>
<div id="wb_indexText18">
<span id="wb_uid62">Для каждого мероприятия я с командой разрабатываю <u>нешаблонный</u> подход и индивидуальный супер сценарий.</span></div>
<div id="wb_indexText25">
<span id="wb_uid63">Юмориста, шоумена, певца, актера и DJ. Ваши гости смогут сделать крутое селфи, а Вы поднимите авторитет и статус своего праздника.</span></div>
<div id="wb_Image27">
<img src="images/43565678678678679679.png" id="Image27" alt=""></div>
<div id="wb_indexText10">
<span id="wb_uid64"><strong>ОПЫТНУЮ КОМАНДУ</strong></span></div>
<div id="wb_indexText20">
<span id="wb_uid65">За плечами <u>20 лет опыта</u> и мега команда ивент менеджеров, с опытом проведения небольших мероприятий на 20 человек и до 50 000 гостей на городских праздниках.</span></div>
<div id="wb_Image28">
<img src="images/raster546546546523523626.png" id="Image28" alt=""></div>
<div id="wb_Image29">
<img src="images/65465475484.png" id="Image29" alt=""></div>
<div id="wb_indexText16">
<span id="wb_uid66"><strong>ГАРАНТИЮ УСПЕХА</strong></span></div>
<div id="wb_indexText24">
<span id="wb_uid67">Умение найти подход к любой аудитории, знание современных праздничных трендов позволяет нам дать <u>гарантию на успешность</u> Вашего мероприятия. Будет круто!</span></div>
<div id="wb_Image30">
<img src="images/raster5345345546754754.png" id="Image30" alt=""></div>
<div id="wb_indexText6">
<span id="wb_uid68"><strong>КОМПЛЕКС УСЛУГ «ПОД КЛЮЧ»</strong></span></div>
<div id="wb_indexText5">
<span id="wb_uid69"><strong>ВЫСОЧАЙШЕЕ КАЧЕСТВО</strong></span></div>
<div id="wb_indexText21">
<span id="wb_uid70">90% наших заказчиков - это рекомендации тех, кому мы уже провели праздник!</span></div>
<div id="wb_Image31">
<img src="images/Like534536423423532.png" id="Image31" alt=""></div>
<div id="wb_Text49">
<span id="wb_uid71">Мы не только проведем, но и поможем организовать праздник, а также наполним шоу программу артистами из нашей огромной базы. </span></div>
<div id="wb_Image2">
<img src="images/434235646576868767.png" id="Image2" alt=""></div>
</div>
</div>
<div id="Layer12">
<div id="Layer12_Container">
<div id="wb_Text34">
<span id="wb_uid72"><strong>ЧТО ВЫ&nbsp;&nbsp;&nbsp;&nbsp; ПОЛУЧИТЕ?!</strong></span></div>
<div id="wb_Line8">
<img src="images/img0025.png" id="Line8" alt=""></div>
<div id="wb_Image25">
<a href="smain.php"><img src="images/microfon.png" id="Image25" alt="" border="0"></a></div>
</div>
</div>
<div id="Layer1">
<div id="Layer1_Container">
<div id="wb_Form2">
<form name="Form1" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data" accept-charset="UTF-8" id="Form2">
<input type="hidden" name="formid" value="form2">
<input type="tel" id="Editbox6" name="Введите Телефон" value="" required pattern="[ \t\r\n\f0-9-+ ()]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;">
<input type="text" id="Editbox7" name="Введите Имя" value="" required pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ-]*$" placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; &#1048;&#1084;&#1103;">
<input type="email" id="Editbox16" name="Введите E-mail" value="" required placeholder="&#1042;&#1074;&#1077;&#1076;&#1080;&#1090;&#1077; E-mail">
<input type="submit" id="Button1" name="ОТПРАВИТЬ ЗАЯВКУ!" value="ОТПРАВИТЬ ЗАЯВКУ!">
</form>
</div>
<div id="wb_Text10">
<div id="wb_uid73"><span id="wb_uid74"><strong>СУПЕР АКЦИЯ! </strong></span><strong></strong></div>
<div id="wb_uid75"><span id="wb_uid76"><strong><u>ЗАКАЖИ</u></strong> ВЕДУЩЕГО ДЯДЮ ЖОРУ СЕЙЧАС И </span></div>
<div id="wb_uid77"><span id="wb_uid78"><strong><u>ПОЛУЧИ</u></strong> 30 МИНУТ ЮМОРА ОТ COMEDY UA</span></div>
<div id="wb_uid79"><span id="wb_uid80"><strong><u>БЕСПЛАТНО</u></strong>!!!</span></div>
</div>
<div id="wb_Text11">
<span id="wb_uid81"><strong><u>Поспешите!</u></strong> Акция только до 31 апреля. Ваш подарок уже ждет Вас!</span></div>
<div id="wb_indexExtension1">
<div id="countdown"></div>
<p id="note"></p>
</div>
<div id="wb_indexText42">
<span id="wb_uid82"><strong>ДНИ&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; ЧАСЫ&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; МИНУТЫ&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; СЕКУНДЫ</strong></span></div>
</div>
</div>
<div id="Layer14">
<div id="Layer14_Container">
<div id="wb_Shape16">
<img src="images/img0032.png" id="Shape16" alt=""></div>
<div id="wb_Shape18">
<img src="images/img0033.png" id="Shape18" alt=""></div>
<div id="wb_Shape17">
<img src="images/img0034.png" id="Shape17" alt=""></div>
<div id="wb_Line2">
<img src="images/img0035.png" id="Line2" alt=""></div>
<div id="wb_Image39">
<a href="smain.php"><img src="images/microfon.png" id="Image39" alt="" border="0"></a></div>
<div id="wb_Text35">
<span id="wb_uid83"><strong>ДЛЯ ВАС 3 ДОСТОЙНЫХ ПРЕДЛОЖЕНИЯ НА РАЗНЫЕ БЮДЖЕТЫ</strong></span></div>
<div id="wb_Text36">
<span id="wb_uid84"><strong>ВЫБЕРИТЕ&nbsp;&nbsp;&nbsp; ПАКЕТ</strong></span></div>
<div id="wb_Text37">
<span id="wb_uid85"><strong>МЕДИУМ</strong></span></div>
<div id="wb_Text38">
<span id="wb_uid86"><strong>VIP</strong></span></div>
<div id="wb_Text32">
<span id="wb_uid87"><strong>СТАНДАРТ</strong></span></div>
<div id="wb_Shape19">
<img src="images/img0036.png" id="Shape19" alt=""></div>
<div id="wb_Shape20">
<img src="images/img0037.png" id="Shape20" alt=""></div>
<div id="wb_Shape21">
<img src="images/img0038.png" id="Shape21" alt=""></div>
<div id="wb_Shape22">
<a href="javascript:displaylightbox('./standart.php',{height:402,width:302})" target="_self"><img src="images/img0039.png" id="Shape22" alt=""></a></div>
<div id="wb_Shape23">
<a href="javascript:displaylightbox('./medium.php',{height:402,width:302})" target="_self"><img src="images/img0040.png" id="Shape23" alt=""></a></div>
<div id="wb_Line9">
<img src="images/img0042.png" id="Line9" alt=""></div>
<div id="wb_Line10">
<img src="images/img0043.png" id="Line10" alt=""></div>
<div id="wb_Line11">
<img src="images/img0044.png" id="Line11" alt=""></div>
<div id="wb_Line12">
<img src="images/img0045.png" id="Line12" alt=""></div>
<div id="wb_Line13">
<img src="images/img0046.png" id="Line13" alt=""></div>
<div id="wb_Line14">
<img src="images/img0047.png" id="Line14" alt=""></div>
<div id="wb_Line16">
<img src="images/img0049.png" id="Line16" alt=""></div>
<div id="wb_Line17">
<img src="images/img0050.png" id="Line17" alt=""></div>
<div id="wb_Line18">
<img src="images/img0051.png" id="Line18" alt=""></div>
<div id="wb_Line19">
<img src="images/img0052.png" id="Line19" alt=""></div>
<div id="wb_Line20">
<img src="images/img0053.png" id="Line20" alt=""></div>
<div id="wb_Line21">
<img src="images/img0054.png" id="Line21" alt=""></div>
<div id="wb_Line22">
<img src="images/img0055.png" id="Line22" alt=""></div>
<div id="wb_Line23">
<img src="images/img0056.png" id="Line23" alt=""></div>
<div id="wb_Line24">
<img src="images/img0057.png" id="Line24" alt=""></div>
<div id="wb_Line25">
<img src="images/img0058.png" id="Line25" alt=""></div>
<div id="wb_Line26">
<img src="images/img0059.png" id="Line26" alt=""></div>
<div id="wb_Line27">
<img src="images/img0060.png" id="Line27" alt=""></div>
<div id="wb_Line28">
<img src="images/img0061.png" id="Line28" alt=""></div>
<div id="wb_Line29">
<img src="images/img0062.png" id="Line29" alt=""></div>
<div id="wb_Text42">
<div id="wb_uid88"><span id="wb_uid89"><strong>Ведущий</strong></span></div>
</div>
<div id="wb_Text46">
<div id="wb_uid90"><span id="wb_uid91">Время ведения 4-5 ч.</span></div>
</div>
<div id="wb_Text51">
<span id="wb_uid92">Р&#1072;&#1079;&#1088;&#1072;&#1073;&#1086;&#1090;&#1082;&#1072; сценария</span></div>
<div id="wb_Text52">
<span id="wb_uid93">Звукооператор</span></div>
<div id="wb_Text54">
<span id="wb_uid94">Рекомендации</span></div>
<div id="wb_Text55">
<span id="wb_uid95">Администрирование</span></div>
<div id="wb_Text47">
<div id="wb_uid96"><span id="wb_uid97"><strong>Дуэт Ведущих</strong></span></div>
</div>
<div id="wb_Text59">
<span id="wb_uid98">Р&#1072;&#1079;&#1088;&#1072;&#1073;&#1086;&#1090;&#1082;&#1072; сценария</span></div>
<div id="wb_Text60">
<span id="wb_uid99">Звукооператор</span></div>
<div id="wb_Text62">
<span id="wb_uid100">Рекомендации</span></div>
<div id="wb_Text63">
<span id="wb_uid101">Администрирование</span></div>
<div id="wb_Text58">
<div id="wb_uid102"><span id="wb_uid103">Время ведения 4-5 ч.</span></div>
</div>
<div id="wb_Text64">
<span id="wb_uid104">Подарок от Дяди Жоры</span></div>
<div id="wb_Shape24">
<a href="javascript:displaylightbox('./vip.php',{height:402,width:302})" target="_self"><img src="images/img0041.png" id="Shape24" alt=""></a></div>
<div id="wb_Line34">
<img src="images/img0070.png" id="Line34" alt=""></div>
<div id="wb_Line35">
<img src="images/img0071.png" id="Line35" alt=""></div>
<div id="wb_Text65">
<div id="wb_uid105"><span id="wb_uid106"><strong>Дуэт Ведущих</strong></span></div>
</div>
<div id="wb_Text66">
<div id="wb_uid107"><span id="wb_uid108"><strong>Блок Юмора</strong></span></div>
</div>
<div id="wb_Text72">
<div id="wb_uid109"><span id="wb_uid110"><strong>Флористика</strong></span></div>
</div>
<div id="wb_Text73">
<div id="wb_uid111"><span id="wb_uid112"><strong>Декорации</strong></span></div>
</div>
<div id="wb_Text74">
<div id="wb_uid113"><span id="wb_uid114"><strong>Фото+видео съемка</strong></span></div>
</div>
<div id="wb_Text4">
<span id="wb_uid115">Подарок от Дяди Жоры</span></div>
<div id="wb_Line36">
<img src="images/img0072.png" id="Line36" alt=""></div>
<div id="wb_Text57">
<div id="wb_uid116"><span id="wb_uid117"><strong>Блок Юмора</strong></span></div>
</div>
<div id="wb_Text71">
<div id="wb_uid118"><span id="wb_uid119"><strong>Организация&nbsp; «Под ключ»</strong></span></div>
</div>
<div id="wb_Text69">
<div id="wb_uid120"><span id="wb_uid121"><strong>Хеад Лайнер «Звезда»</strong></span></div>
</div>
<div id="wb_Text67">
<div id="wb_uid122"><span id="wb_uid123"><strong>Вокальный блок</strong></span></div>
</div>
<div id="wb_Text68">
<div id="wb_uid124"><span id="wb_uid125"><strong>Артисты\Шоу</strong></span></div>
</div>
<div id="wb_Text70">
<div id="wb_uid126"><span id="wb_uid127"><strong>Тех+звук обеспечение</strong></span></div>
</div>
<div id="wb_Line37">
<img src="images/img0091.png" id="Line37" alt=""></div>
<div id="wb_Text75">
<span id="wb_uid128"><strong>Разработка сценария</strong></span></div>
<div id="wb_Line38">
<img src="images/img0092.png" id="Line38" alt=""></div>
<div id="wb_Text76">
<span id="wb_uid129"><strong>Звукооператор</strong></span></div>
<div id="wb_Text56">
<span id="wb_uid130"><strong>Подарок от Дяди Жоры</strong></span></div>
</div>
</div>
<div id="Layer17">
<div id="Layer17_Container">
<div id="wb_Text40">
<span id="wb_uid131"><strong>ВАРИАНТЫ&nbsp;&nbsp;&nbsp;&nbsp; ВЕДЕНИЯ</strong></span></div>
<div id="wb_Line30">
<img src="images/img0063.png" id="Line30" alt=""></div>
<div id="wb_Image41">
<a href="smain.php"><img src="images/microfon.png" id="Image41" alt="" border="0"></a></div>
<div id="wb_Text41">
<span id="wb_uid132"><strong>СМОТРИТЕ ВОЗМОЖНЫЕ ВАРИАНТЫ ПРОВЕДЕНИЯ ВАШЕГО ПРАЗДНИКА</strong></span></div>
</div>
</div>
<div id="Layer18">
<div id="Layer18_Container">
<div id="wb_Image45">
<img src="images/423423423545465464.png" id="Image45" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Image42">
<img src="images/5678970887654324567890.png" id="Image42" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Image47">
<img src="images/4557807807807070.png" id="Image47" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Image46">
<img src="images/4354657897096856546547.png" id="Image46" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Image49">
<img src="images/654654654675475474572.png" id="Image49" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Text43" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1">
<span id="wb_uid133"><strong>Один ведущий</strong></span></div>
<div id="wb_Text45" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1">
<span id="wb_uid134"><strong>Дуэт c соведущей</strong></span></div>
<div id="wb_Image48">
<img src="images/65467575676756757.png" id="Image48" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Image51">
<img src="images/microfon.png" id="Image51" alt="" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1"></div>
<div id="wb_Line31">
<img src="images/img0064.png" id="Line31" alt="" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1"></div>
<div id="wb_Line32">
<img src="images/img0065.png" id="Line32" alt="" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1"></div>
<div id="wb_Image52">
<img src="images/microfon.png" id="Image52" alt="" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1"></div>
<div id="wb_Image53">
<img src="images/microfon.png" id="Image53" alt="" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1"></div>
<div id="wb_Line33">
<img src="images/img0066.png" id="Line33" alt="" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1"></div>
<div id="wb_Image44">
<img src="images/997898797969689.png" id="Image44" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Image43">
<img src="images/6547568678678868678678.png" id="Image43" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
<div id="wb_Text44" class="wow slideInLeft" data-wow-duration="0.5s" data-wow-delay="1">
<span id="wb_uid135"><strong>Дуэт ведущих из Comedy UA</strong></span></div>
<div id="wb_Image40">
<img src="images/543545465465475474.png" id="Image40" alt="" class="wow slideInDown" data-wow-duration="1s" data-wow-delay="1"></div>
</div>
</div>
<div id="indexLayer23">
<div id="indexHtml1">
<script type="text/javascript">(function() {
  if (window.pluso)if (typeof window.pluso.start == "function") return;
  if (window.ifpluso==undefined) { window.ifpluso = 1;
    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
    var h=d[g]('body')[0];
    h.appendChild(s);
  }})();</script>
<div data-url="http://lp.jora.biz/" class="pluso" data-background="transparent" data-options="medium,round,line,vertical,counter,theme=04" data-services="facebook,vkontakte,google,twitter,linkedin,livejournal,odnoklassniki"></div></div>
</div>

</body>
</html>