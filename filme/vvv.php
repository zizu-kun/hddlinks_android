<?php
$l=urldecode($_GET['file']);
$l=str_replace(" ","+",$l);
$l=str_replace("%20","+",$l);
//echo $l."\n";
$ua="Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0";
$head=array('User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/115.0',
'Accept: */*',
'Accept-Language: ro-RO,ro;q=0.8,en-US;q=0.6,en-GB;q=0.4,en;q=0.2',
'Accept-Encoding: gzip, deflate, br',
'Origin: https://vidstream.pro',
'Connection: keep-alive',
'Referer: https://vidstream.pro/',
'Sec-Fetch-Dest: empty',
'Sec-Fetch-Mode: cors',
'Sec-Fetch-Site: cross-site');
     $ch = curl_init();
     curl_setopt($ch, CURLOPT_URL, $l);
     //curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
     //curl_setopt($ch, CURLOPT_USERAGENT, $ua);
     curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
     curl_setopt($ch, CURLOPT_HTTPHEADER,$head);
     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
     curl_setopt($ch, CURLOPT_TIMEOUT, 25);
     curl_exec($ch);
     curl_close($ch);
     //echo $h;
?>
