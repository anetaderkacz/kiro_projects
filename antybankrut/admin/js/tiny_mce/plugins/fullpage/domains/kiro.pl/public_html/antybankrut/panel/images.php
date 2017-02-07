<?php 
session_start();
include("db_connect.php");
include("include/ust.php");
include("include/function.php");

if($_GET['size']=="d"){$jakosc="90";}else{$jakosc="80";}
$folder="upload/ogloszenie/";
$hotlink="0";
$p_login="0";
$text_on="0";
$text="d1php.pl";
$text_size="20";
$text_border="2";
$text_font = "include/font/arial.ttf";
if($_GET['nw']>=50 and $_GET['nw']<=1000){$xd=154;}else{$xd="154";}


$xd=400;



function imagettfstroketext($image, $size, $angle, $x, $y, $textcolor, $strokecolor, $fontfile, $text, $px) {
 
    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
 
   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}


$Query="SELECT * FROM ".$pre."artykul WHERE art_id='".db_real_escape_string($_GET['id'])."'  ORDER by art_id DESC";
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
  

		$img=str_replace("m_","d_",$row['art_img']);
	
  
}

$sp = explode(".",$img);

if($sp[1] == "jpg" or $sp[1]== "jpeg" or $sp[1] == "JPG" or $sp[1]== "JPEG")
{
	header("Content-type: image/jpeg");
	$org = imagecreatefromjpeg("upload/ogloszenie/".$img."");
   	$s_org = imagesx($org);
   	$w_org = imagesy($org);
        $w_big = $xd;
        $big = ImageCreateTrueColor($xd, $w_big);
        imagecopyresampled($big, $org, 0, 0, 0, 0, $xd, $w_big, $s_org, $w_org);
	imagejpeg($big,NULL, $jakosc); 

}
else if($sp[1] == "png" or $sp[1]== "PNG")
{

	$org = imagecreatefrompng("".$folder."".$img."");
	imagepng($org,NULL, $jakosc); 
}
else if($sp[1] == "gif" or $sp[1]== "GIF")
{
	header("Content-type: image/gif");
	$org = imagecreatefromgif("".$folder."".$img."");
	imagegif($org,NULL, $jakosc); 
}
else
{
	header("Content-type: image/jpeg");
	$org = imagecreatefromjpeg("".$img."");
   	$s_org = imagesx($org);
   	$w_org = imagesy($org);
        if(($w_big = floor(($xd * $w_org) / $s_org)) > $xd) $w_big = $xd;
        $big = ImageCreateTrueColor($xd, $w_big);
        imagecopyresampled($big, $org, 0, 0, 0, 0, $xd, $w_big, $s_org, $w_org);
	imagejpeg($big,NULL, $jakosc); 
}

?>