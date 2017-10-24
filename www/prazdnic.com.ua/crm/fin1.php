<? session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Untitled Page</title>

</head>
<body>
<strong>Запрос отправлен.</strong>

<?
session_start();
 
// формируем массив с товарами в заказе (если товар один - оставляйте только первый элемент массива)
$products_list = array(
    1 => array( 
            'product_id' => $_GET['product_id'],    //код товара (из каталога CRM)
            'price'      => $_GET['price'], //цена товара 1
            'count'      => '1'                      //количество товара 1
    ),  
    
);
$products = urlencode(serialize($products_list));
 
// параметры запроса
$data = array(
    'key'             => '83a9b308c100e820adfb858c9a1e05e0', //Ваш секретный токен
    'order_id'        => number_format(round(microtime(true)*10),0,'.',''), //идентификатор (код) заказа (*автоматически*)
    'country'         => 'UA',              // Географическое напраление заказа UA, RU
    'products'        => $products,                 // массив с товарами в заказе
    'bayer_name'      => $_GET['name'],             // покупатель (Ф.И.О)
    'phone'           => $_GET['phone'],           // телефон
    'email'           => $_GET['e-mail'],           // электронка
    'comment'         => $_GET['product_name'],    // комментарий
    'site'            => $_SERVER['SERVER_NAME'],  // сайт отправляющий запрос
    'ip'              => $_SERVER['REMOTE_ADDR'],  // IP адрес покупателя
    'delivery_type'   => $_GET['delivery'],        // способ доставки
    'delivery_adress' => $_GET['delivery_adress'], // адрес доставки
    'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source 
    'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium 
    'utm_term'        => $_SESSION['utms']['utm_term'],    // utm_term   
    'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content    
    'utm_campaign'    => $_SESSION['utms']['utm_campaign'] // utm_campaign
);
 
// запрос
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://web.lp-crm.biz/api/addNewOrder.html');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);
//$out – ответ сервера в формате JSON

//$jout=json_decode($out); foreach($jout as $key => $value) {   $mess = $mess."$key =".$value."<br>\n";  } echo $mess;
//foreach($data as $key => $value) {   $mess = $mess."$key =".$value."<br>\n";  } echo $mess;

?>
</body>
</html>