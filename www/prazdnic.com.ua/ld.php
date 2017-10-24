<?php
$str = 'hypertext language programming i see http://www.noo.ua';
$chars = preg_split('/ /', $str, -1, PREG_SPLIT_OFFSET_CAPTURE);
//print_r($chars[2][0]);
                
print $chars[2][0];
?>
