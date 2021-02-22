<!DOCTYPE html>
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
$main_title="ustream";
$target="ustream.php";
$fav_target="";
$recente="https://www.ustream.to/index.html";
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
<title><?php echo $main_title; ?></title>
<script type="text/javascript" src="//code.jquery.com/jquery-3.2.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="../custom.css" />
<script type="text/javascript">
   function zx(e){
    var charCode = (typeof e.which == "number") ? e.which : e.keyCode
    if (charCode == "53" && e.target.type != "text") {
      document.getElementById("send").click();
    } else if (charCode == "50" && e.target.type != "text") {
      document.getElementById("fav").click();
    }
   }
document.onkeypress =  zx;
</script>
</head>
<body>
<?php
include ("../common.php");

echo '<table border="1px" width="100%" style="table-layout:fixed;">'."\r\n";
echo '<TR><th class="cat" colspan="3">'.$main_title.'</th></TR>';
$n=0;
$l="https://www.ustream.to/index.html";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:85.0) Gecko/20100101 Firefox/85.0";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 25);
  $html = curl_exec($ch);
  curl_close($ch);

$videos = explode('href="/country', $html);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
    $t1 = explode('"', $video);
    $link = "https://www.ustream.to/country".$t1[0];
    $t2 = explode('>', $video);
    $t3 = explode('<', $t2[1]);
    $title = trim($t3[0]);
    $link=$target."?page=1&show=&sez=&link=".urlencode(fix_t($link))."&title=".urlencode(fix_t($title));
    if (!preg_match("/IN CURAND|FILME SERIALE|Contact|TOP IMDb|Filme online/i",$title)) {
	if ($n == 0) echo "<TR>"."\r\n";
	echo '<TD class="cat">'.'<a class ="cat" href="'.$link.'" target="_blank">'.$title.'</a></TD>';
    $n++;
    if ($n == 3) {
     echo '</TR>'."\r\n";
     $n=0;
    }
    }
}
  if ($n < 3 && $n > 0) {
    for ($k=0;$k<3-$n;$k++) {
      echo '<TD></TD>'."\r\n";
    }
    echo '</TR>'."\r\n";
  }
 echo '</table>';
?>
</BODY>
</HTML>