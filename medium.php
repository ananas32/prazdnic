<?php
function ValidateEmail($email)
{
    $pattern = '/^([0-9a-z]([-.\w]*[0-9a-z])*@(([0-9a-z])+([-\w]*[0-9a-z])*\.)+[a-z]{2,6})$/i';
    return preg_match($pattern, $email);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formid'] == 'form2') {
    $mailto = 'zakaz@jora.biz';
    $mailfrom = isset($_POST['email']) ? $_POST['email'] : $mailto;
    $mailcc = 'zakaz@prazdnic.com.ua';
    $subject = 'Пакет Медиум prazdnic.com.ua!';
    $message = 'Пакет Медиум prazdnic.com.ua!';
    $success_url = './fin1.php';
    $error_url = '';
    $error = '';
    $eol = "\n";
    $max_filesize = isset($_POST['filesize']) ? $_POST['filesize'] * 1024 : 1024000;
    $boundary = md5(uniqid(time()));

    $header = 'From: ' . $mailfrom . $eol;
    $header .= 'Reply-To: ' . $mailfrom . $eol;
    $header .= 'Cc: ' . $mailcc . $eol;
    $header .= 'MIME-Version: 1.0' . $eol;
    $header .= 'Content-Type: multipart/mixed; boundary="' . $boundary . '"' . $eol;
    $header .= 'X-Mailer: PHP v' . phpversion() . $eol;
    if (!ValidateEmail($mailfrom)) {
        $error .= "The specified email address is invalid!\n<br>";
    }

    if (!empty($error)) {
        $errorcode = file_get_contents($error_url);
        $replace = "##error##";
        $errorcode = str_replace($replace, $error, $errorcode);
        echo $errorcode;
        exit;
    }

    $internalfields = array("submit", "reset", "send", "filesize", "formid", "captcha_code", "recaptcha_challenge_field", "recaptcha_response_field");
    $message .= $eol;
    $message .= "IP Address : ";
    $message .= $_SERVER['REMOTE_ADDR'];
    $message .= $eol;
    foreach ($_POST as $key => $value) {
        if (!in_array(strtolower($key), $internalfields)) {
            if (!is_array($value)) {
                $message .= ucwords(str_replace("_", " ", $key)) . " : " . $value . $eol;
            } else {
                $message .= ucwords(str_replace("_", " ", $key)) . " : " . implode(",", $value) . $eol;
            }
        }
    }
    $body = 'This is a multi-part message in MIME format.' . $eol . $eol;
    $body .= '--' . $boundary . $eol;
    $body .= 'Content-Type: text/plain; charset=UTF-8' . $eol;
    $body .= 'Content-Transfer-Encoding: 8bit' . $eol;
    $body .= $eol . stripslashes($message) . $eol;
    if (!empty($_FILES)) {
        foreach ($_FILES as $key => $value) {
            if ($_FILES[$key]['error'] == 0 && $_FILES[$key]['size'] <= $max_filesize) {
                $body .= '--' . $boundary . $eol;
                $body .= 'Content-Type: ' . $_FILES[$key]['type'] . '; name=' . $_FILES[$key]['name'] . $eol;
                $body .= 'Content-Transfer-Encoding: base64' . $eol;
                $body .= 'Content-Disposition: attachment; filename=' . $_FILES[$key]['name'] . $eol;
                $body .= $eol . chunk_split(base64_encode(file_get_contents($_FILES[$key]['tmp_name']))) . $eol;
            }
        }
    }
    $body .= '--' . $boundary . '--' . $eol;
    if ($mailto != '') {
        mail($mailto, $subject, $body, $header);
    }
    header('Location: ' . $success_url);
    exit;
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Language" content="ru">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Untitled Page</title>
    <link href="jora2.css" rel="stylesheet" type="text/css">
    <link href="medium.css" rel="stylesheet" type="text/css">


    <script type="text/javascript">(window.Image ? (new Image()) : document.createElement('img')).src = location.protocol + '//vk.com/rtrg?r=ycCzXfxsd2yem2oGtBkc8*7aBctUSCXPQI/Rps9qU6TbkGKYMzsrmOJOfDcJv3GfQ9YQQrqCoM0qvFsdtcKtlzG7Wb3vqAHM**ZcJKggfqhN0ZJK9lBiUPfzuApxcPTeo9Kc9zHEI7meWt9SZQP0zIQX7bqFAxOaP5bqT8MdY1o-';</script>
</head>
<body>
<!-- Google Tag Manager -->
<noscript>
    <iframe src="//www.googletagmanager.com/ns.html?id=GTM-MQ6P9H"
            height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<script>(function (w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(), event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            '//www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MQ6P9H');</script>
<!-- End Google Tag Manager -->
<div id="space"><br></div>
<div id="container">
    <div id="wb_Form2">
        <form name="Form2" method="post" action="<?php echo basename(__FILE__); ?>" enctype="multipart/form-data"
              accept-charset="UTF-8" id="Form2">
            <input type="hidden" name="formid" value="form2">
            <input type="tel" id="Editbox4" name="Телефон" value="" required pattern="[ \t\r\n\f0-9-+ ()]*$"
                   placeholder="&#1058;&#1077;&#1083;&#1077;&#1092;&#1086;&#1085;">
            <input type="submit" id="Button1" name="" value="ОТПРАВИТЬ">
            <input type="text" id="Editbox2" name="Имя" value="" required
                   pattern="[A-Za-zÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýþÿ \t\r\n\f0-9-йцукенгшщзхъфывапролджэячсмитьбюЙЦУКЕНГШЩЗХЪФЫВАПРОЛДЖЭЯЧСМИТЬБЮ-]*$"
                   placeholder="&#1048;&#1084;&#1103;">
            <div id="wb_Text19">
                <div id="wb_uid0"><span id="wb_uid1"><strong>Заполните форму и </strong></span></div>
                <div id="wb_uid2"><span id="wb_uid3"><strong>нажмите отправить.</strong></span></div>
            </div>
            <input type="email" id="Editbox1" name="E-mail" value="" required placeholder="E-mail">
        </form>
    </div>
</div>
</body>
</html>