<?php
include("db_connect.php");

if($_GET['t']=="n")
{
//-------------------------------------------------
if($_COOKIE['news_'.$_GET['id'].'']!="")
{
}
else
{


$Query='SELECT * FROM '.$pre.'news ORDER BY news_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

$ile=$row["news_ileg"];
$ile++;

$glosy=$row["news_glosy"] + $_GET["ocena"];
$ocena=substr($glosy / $ile, 0,3);
$ocena1=$ocena;

}



$query="UPDATE ".$pre."news SET news_ileg='".$ile."', news_glosy='".$glosy."', news_ocena='".$ocena1."' WHERE news_id='".db_real_escape_string($_GET['id'])."'";
db_query($query);




setcookie("news_".$_GET['id']."",$_GET['id'] , time()+86400);
}
//----------------------------------------------
}

if($_GET['t']=="a")
{
//-------------------------------------------------
if($_COOKIE['art_'.$_GET['id'].'']!="")
{
}
else
{


$Query='SELECT * FROM '.$pre.'artykul ORDER BY art_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

$ile=$row["art_ileg"];
$ile++;

$glosy=$row["art_glosy"] + $_GET["ocena"];
$ocena=substr($glosy / $ile, 0,3);
$ocena1=$ocena;

}



$query="UPDATE ".$pre."artykul SET art_ileg='".$ile."', art_glosy='".$glosy."', art_ocena='".$ocena1."' WHERE art_id='".db_real_escape_string($_GET['id'])."'";
db_query($query);




setcookie("art_".$_GET['id']."",$_GET['id'] , time()+86400);
}
//----------------------------------------------
}

if($_GET['t']=="g")
{
//-------------------------------------------------
if($_COOKIE['g_'.$_GET['id'].'']!="")
{
}
else
{


$Query='SELECT * FROM '.$pre.'gallery ORDER BY ga_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

$ile=$row["ga_ileg"];
$ile++;

$glosy=$row["ga_glosy"] + $_GET["ocena"];
$ocena=substr($glosy / $ile, 0,3);
$ocena1=$ocena;

}



$query="UPDATE ".$pre."gallery SET ga_ileg='".$ile."', ga_glosy='".$glosy."', ga_ocena='".$ocena1."' WHERE ga_id='".db_real_escape_string($_GET['id'])."'";
db_query($query);




setcookie("g_".$_GET['id']."",$_GET['id'] , time()+86400);
}
//----------------------------------------------
}

header("Location: ".$_SERVER['HTTP_REFERER']."");

?>