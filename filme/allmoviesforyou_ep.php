<!DOCTYPE html>
<?php
include ("../common.php");
$tit=unfix_t(urldecode($_GET["title"]));
$tit=prep_tit($tit);
$image=$_GET["image"];
$link=urldecode($_GET["link"]);
$tip=$_GET["tip"];
$sez=$_GET["sez"];
$ep=$_GET["ep"];
$ep_title=unfix_t(urldecode($_GET["ep_tit"]));
$ep_title=prep_tit($ep_title);
$year=$_GET["year"];
/* ====================== */
$fs_target = "allmoviesforyou_fs.php";
$width="200px";
$height="100px";
$has_img="yes";
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="../custom.css" />
<meta charset="utf-8">
<title><?php echo $tit; ?></title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

</head>
<body>
<?php
error_reporting(0);
function str_between($string, $start, $end){
	$string = " ".$string; $ini = strpos($string,$start);
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini;
	return substr($string,$ini,$len);
}
echo '<h2>'.$tit.'</h2><BR>';
echo '<table border="1" width="100%">'."\n\r";
//echo '<TR><td style="color:#000000;background-color:deepskyblue;text-align:center" colspan="3" align="center">'.$tit.'</TD></TR>';
$ua="Mozilla/5.0 (Windows NT 10.0; rv:80.0) Gecko/20100101 Firefox/80.0";
  $host=parse_url($link)['host'];
  $ch = curl_init($link);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_REFERER, $l);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $h = curl_exec($ch);
  curl_close($ch);
//echo $h;
$n=0;
$z=1;
$path = parse_url($link)['path'];
//echo $h;
$host=parse_url($link)['host'];
$videos = explode('<section class="SeasonBx AACrdn', $h);
$sezoane=array();
$link_sez=array();
//$link_sezoane=array();
unset($videos[0]);
$videos = array_values($videos);
//$videos = array_reverse($videos);
foreach($videos as $video) {
  if (preg_match("/\<span\>(\d+)/i",$video,$m))
     $sezoane[]=$m[1];
  $t1=explode('href="',$video);
  $t2=explode('"',$t1[1]);
  $l1=trim($t2[0]);
  if ($l1[0]=="/")
   $l1="https://".$host.$l1;
  elseif (substr($l1, 0, 4) == "http")
  $l1=trim($t2[0]);
  else
   $l1 = "https://".$host.$path.$l1;
  $link_sez[]=$l1;
}
echo '<table border="1" width="100%">'."\n\r";

$p=0;
foreach($sezoane as $key => $value) {
if ($p==0) echo '<TR>';
echo '<td class="sez" style="color:black;text-align:center"><a href="#sez'.($value).'">Sezonul '.($value).'</a></TD>';
$p++;
if ($p == 10) {
 echo '</tr>';
 $p=0;
 }
}
if ($p < 10 && $p > 0 && $k > 9) {
 for ($x=0;$x<10-$p;$x++) {
   echo '<TD></TD>'."\r\n";
 }
 echo '</TR>'."\r\n";
}
echo '</TABLE>';
//$z=1;
$p=0;
$k=0;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION  ,1);
  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER  ,1);  // RETURN THE CONTENTS OF THE CALL
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
foreach($sezoane as $key => $value) {
  $sez = $value;
  $season=$value;
  echo '<table border="1" width="100%">'."\n\r";
  echo '<TR><td class="sez" style="color:black;background-color:#0a6996;color:#64c8ff;text-align:center" colspan="3">Sezonul '.($sez).'</TD></TR>';
  $n=0;

  //echo $l;
  //echo $link_sez[$key];
  curl_setopt($ch, CURLOPT_URL,$link_sez[$key]);
  $h = curl_exec($ch);
  $path = parse_url($link_sez[$key])['path'];
  //echo $h;
  $vids = explode('span class="Num">', $h);
  unset($vids[0]);
  $vids = array_values($vids);
  //$vids = array_reverse($vids);
  foreach($vids as $vid) {
  $img_ep="";
  $episod="";
  $ep_tit="";
  $t1=explode('<',$vid);
  $episod = $t1[0];
  $t1=explode('href="',$vid);
  $t2=explode('"',$t1[1]);
  $link=$t2[0];
 if ($link[0]=="/")
  $link="https://".$host.$link;
 elseif (substr($link, 0, 4) == "http")
  $link=$t2[0];
 else
  $link="https://".$host.$path.$link;
  //if ($link[0]=="/")
   //$link="https://".$host.$link;
  $t3=explode('>',$t1[2]);
  $t4=explode('<',$t3[1]);
  $ep_tit = $t4[0];
  $img_ep="blank.jpg";
  $t1=explode('src="',$vid);
  $t2=explode('"',$t1[1]);
  $img_ep=$t2[0];


  $year="";
   $epNr=$episod;

  if ($ep_tit)
   $ep_tit_d=$season."x".$episod." ".$ep_tit;
  else
   $ep_tit_d=$season."x".$episod;
  //$link="moviesjoy_fs.php?tip=series&link=".urlencode($l)."&title=".urlencode(fix_t($tit))."&ep_tit=".urlencode(fix_t($ep_tit1))."&ep=".$epNr."&sez=".$sez."&image=".$image;
  $link_f=$fs_target.'?tip=series&link='.urlencode($link).'&title='.urlencode(fix_t($tit)).'&image='.$image."&sez=".$sez."&ep=".$epNr."&ep_tit=".urlencode(fix_t($ep_tit))."&year=".$year."&host=".$host;
   if ($n == 0) echo "<TR>"."\n\r";
   if ($has_img == "yes")
    echo '<TD class="mp" width="33%">'.'<a id="sez'.$sez.'" href="'.$link_f.'" target="_blank"><img width="'.$width.'" height="'.$height.'" src="'.$img_ep.'"><BR>'.$ep_tit_d.'</a></TD>'."\r\n";
   else
    echo '<TD class="mp" width="33%">'.'<a id="sez'.$sez.'" href="'.$link_f.'" target="_blank">'.$ep_tit_d.'</a></TD>'."\r\n";
   $n++;
   if ($n == 3) {
    echo '</TR>'."\n\r";
    $n=0;
   }
}
  if ($n < 3 && $n > 0) {
    for ($k=0;$k<3-$n;$k++) {
      echo '<TD></TD>'."\r\n";
    }
    echo '</TR>'."\r\n";
  }

}
echo '</table>';
curl_close($ch);
?>
</body>
</html>
