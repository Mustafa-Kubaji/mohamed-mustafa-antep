<?php

function sendRequest($site_name,$send_xml,$header_type) {

    //die('SITENAME:'.$site_name.'SEND XML:'.$send_xml.'HEADER TYPE '.var_export($header_type,true));
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$site_name);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,$send_xml);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$header_type);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);

    $result = curl_exec($ch);

    return $result;
}

$username   = '5349172678';
$password   = 'bmlc531';
$key = 'b2055cb97552be3259938bb416b29b10';
$hash = hash_hmac('sha256','b2055cb97552be3259938bb416b29b10','$2y$12$p2K1jS0x6LXndGbv0Tn6BewQA9OXV31B8Zzi/F6EkxqJ5iXlroWgG');
$orgin_name = 'APITEST';

$tel = $_POST["telefon"];

$xml = <<<EOS
   		 <request>
   			 <authentication>
   				 <username>{$username}</username>
   				 <password>{$password}</password>
           <key>{$key}</key>
           <hash>{$hash}</hash>

   			 </authentication>

   			 <order>
   	    		 <sender>{$orgin_name}</sender>
   	    		 <sendDateTime>01/05/2013 18:00</sendDateTime>
   	    		 <message>
   	        		 <text>test mesaji api denemesi 1</text>
   	        		 <receipents>
   	            		 <number>{$tel}</number>
   	        		 </receipents>
   	    		 </message>
   			 </order>
   		 </request>
EOS;


$result = sendRequest('http://api.iletimerkezi.com/v1/send-sms',$xml,array('Content-Type: text/xml'));
die('<pre>'.var_export($result,1).'</pre>');
//Donen xml degerini sisteminizde parse etmek icin
//http://www.lalit.org/lab/convert-xml-to-array-in-php-xml2array/
//adresindeki kutuphaneyi oneririz

?>
