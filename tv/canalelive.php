<!DOCTYPE html>
<?php
error_reporting(0);
include ("../common.php");

$width="200px";
$height=intval(200*(228/380))."px";
$page_title="canale.live";
$page_title="sultanovic";
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
<meta http-equiv="Pragma" content="no-cache"/>
<meta http-equiv="Expires" content="0"/>
      <title>Sport</title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../custom.css" />
<script type="text/javascript">
function ajaxrequest(link) {
  var request =  new XMLHttpRequest();
  on();
  var the_data = link;
  var php_file='direct_link.php';
  request.open('POST', php_file, true);			// set the request

  // adds a header to tell the PHP script to recognize the data as is sent via POST
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(the_data);		// calls the send() method with datas as parameter

  // Check request status
  // If the response is received completely, will be transferred to the HTML tag with tagID
  request.onreadystatechange = function() {
    if (request.readyState == 4) {
      off();
      document.getElementById("mytest1").href=request.responseText;
      document.getElementById("mytest1").click();
    }
  }
}
</script>
</head>
<body>
<script>
function on() {
    document.getElementById("overlay").style.display = "block";
}

function off() {
    document.getElementById("overlay").style.display = "none";
}
</script>
   <a href='' id='mytest1'></a>
<?php
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
if (file_exists($base_pass."player.txt")) {
$flash=trim(file_get_contents($base_pass."player.txt"));
} else {
$flash="direct";
}
if (file_exists($base_pass."mx.txt")) {
$mx=trim(file_get_contents($base_pass."mx.txt"));
} else {
$mx="ad";
}
$user_agent     =   $_SERVER['HTTP_USER_AGENT'];

$n=0;
//echo '<h2>'.$page_title.'</H2>';
/* dead .....
echo '<table border="1px" width="100%">'."\n\r";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0";
$l="https://canale.live/";
$l="http://sultanovic.net/index/sport/0-193";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 25);
  $h = curl_exec($ch);
  curl_close($ch);
  $t1=explode('<div ID="CHANNELS',$h);
  $t2=explode('</div',$t1[1]);
  $h=$t2[0];
//$videos = explode("canale.live/tv/", $h);
  $videos=explode('href="',$h);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
 $t1=explode('"',$video);

 $link=$t1[0];
 //$link=str_replace("/","",$link);
 $t3=explode('title="',$video);
 $t4=explode('"',$t3[1]);
 $title=trim($t4[0]);
    $link1="direct_link.php?link=".$link."&title=".urlencode($title)."&from=sultanovic&mod=direct";
    $l="link=".urlencode(fix_t($link))."&title=".urlencode(fix_t($title))."&from=sultanovic&mod=direct";
  if ($link && $title) {
  if ($n==0) echo '<TR>';
  if ($flash == "flash")
  echo '<td class="mp" align="center" width="25%"><a href="'.$link1.'" target="_blank">'.$title.'</a></TD>';
    else
  echo '<td class="mp" align="center" width="25%">'.'<a onclick="ajaxrequest('."'".$l."')".'"'." style='cursor:pointer;'>".''.$title.'</a></TD>';

  $n++;
  if ($n == 4) {
  echo '</tr>';
  $n=0;
  }
  }
}
echo "</table>";
*/
////////////////////////////////////////////////
// sport7.pm
$l="https://sport7.pm/channels";
$n=0;
echo '<h2>sport7.pm</H2>';
echo '<table border="1px" width="100%">'."\n\r";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0";

  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 25);
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;

//$videos = explode("canale.live/tv/", $h);
  $videos=explode('<div class="image"',$h);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
 $t1=explode('data-slug="',$video);
 $t2=explode('"',$t1[1]);
 $link=$t2[0];
 //$link=str_replace("/","",$link);
 $t3=explode('>',$t1[2]);
 $t4=explode('<',$t3[1]);
 $title=trim($t4[0]);

    $link1="direct_link.php?link=".$link."&title=".urlencode($title)."&from=sultanovic&mod=direct";
    $l="link=".urlencode(fix_t($link))."&title=".urlencode(fix_t($title))."&from=sultanovic&mod=direct";
  if ($link && $title) {
  if ($n==0) echo '<TR>';
  if ($flash == "flash")
  echo '<td class="mp" align="center" width="25%"><a href="'.$link1.'" target="_blank">'.$title.'</a></TD>';
    else
  echo '<td class="mp" align="center" width="25%">'.'<a onclick="ajaxrequest('."'".$l."')".'"'." style='cursor:pointer;'>".''.$title.'</a></TD>';

  $n++;
  if ($n == 4) {
  echo '</tr>';
  $n=0;
  }
  }
}
echo "</table>";
////////// LIVE
$n=0;
echo '<h2>Live Sports Schedule - Stream Today</H2>';
echo '<table border="1px" width="100%">'."\n\r";
$ua="Mozilla/5.0 (Windows NT 10.0; rv:89.0) Gecko/20100101 Firefox/89.0";
$l="https://canale.live/";
$l="http://sultanovic.net/index/sport/0-193";
$l="https://sport7.pm/feed?language=en";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $l);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
  curl_setopt($ch, CURLOPT_TIMEOUT, 25);
  $h = curl_exec($ch);
  curl_close($ch);
  //echo $h;

//$videos = explode("canale.live/tv/", $h);
  $videos=explode('<event>',$h);
unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {
 $t1=explode('<urls>',$video);
 $t2=explode('</urls>',$t1[1]);
 $link=$t2[0];
 //$link=str_replace("/","",$link);
 $t3=explode('<name>',$video);
 $t4=explode('</name>',$t3[1]);
 $title=trim($t4[0]);
 $t1=explode('<startDateTime>',$video);
 $t2=explode('</startDateTime>',$t1[1]);
 $t=date("j/m H:i",$t2[0]);
 $title .=" (".$t.")";
    $link1="direct_link.php?link=".$link."&title=".urlencode($title)."&from=sultanovic&mod=direct";
    $l="link=".urlencode(fix_t($link))."&title=".urlencode(fix_t($title))."&from=sultanovic&mod=direct";
  if ($link && $title) {
  if ($n==0) echo '<TR>';
  if ($flash == "flash")
  echo '<td class="mp" align="center" width="25%"><a href="'.$link1.'" target="_blank">'.$title.'</a></TD>';
    else
  echo '<td class="mp" align="center" width="25%">'.'<a onclick="ajaxrequest('."'".$l."')".'"'." style='cursor:pointer;'>".''.$title.'</a></TD>';

  $n++;
  if ($n == 4) {
  echo '</tr>';
  $n=0;
  }
  }
}
echo "</table>";
?>
<div id="overlay"">
  <div id="text">Wait....</div>
</div>
</body>
</html>
