<?php
include("subheader.php");


if($_POST['addkom'])
{

$kod=0;
if($ust['token_news']=="0")
{
  $kod=1;
}
else
{
  if($_POST['kod']==$_SESSION['token']){$kod=1;}else{$kod=0;}
}

if($_SESSION['user_nick']=="")
{ 
   $nick=$_POST['nick'];
}
else
{
  $nick=$_SESSION['user_nick'];
}

if($nick!="" and $_POST['tresc']!="" AND $kod==1)
{
  $in="INSERT INTO ".$pre."komentarze(`kom_nick`, `kom_tresc`, `kom_data`, `kom_typ`, `kom_idk`, `kom_idu`) VALUE ('".htmlspecialchars($nick)."', '".htmlspecialchars($_POST['tresc'])."', NOW(), 'n', '".htmlspecialchars($_GET['id'])."', '".$_SESSION['user_id']."')";
  db_query($in);
}
else
{

  $tresc=htmlspecialchars($_POST['tresc']);

  if($nick)
  {
     $smarty->assign("e_n","1");
     $smarty->assign("e_t",$nick);
  }
  else
  {
     $smarty->assign("e_n","0");
     $smarty->assign("e_t",$nick);
  }
  if($_POST['tresc']=="")
  {
     $smarty->assign("t_n","1");
     $smarty->assign("t_t",$tresc);
  }
  else
  {
     $smarty->assign("t_n","0");
     $smarty->assign("t_t",$tresc);
  }
  if($kod==1)
  {
     $smarty->assign("k_n","0");
  }
  else
  {
     $smarty->assign("k_n","1");
  }
}

}

$kom_ile=0;
$Query='SELECT * FROM '.$pre.'komentarze WHERE kom_idk="'.db_real_escape_string($_GET['id']).'" AND kom_typ="n" ORDER by kom_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

  $kom_data[]=$row['kom_data'];
  $kom_nick[]=$row['kom_nick'];
  $kom_nickn[]=namen($row['kom_nick']);
  $kom_tresc[]=$row['kom_tresc'];
  $kom_idu[]=$row['kom_idu'];

$kom_ile++;
}



$Query = "SELECT * FROM ".$pre."news WHERE news_wys='1' AND news_id='".db_real_escape_string($_GET['id'])."' ORDER by news_id DESC";
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

$news_tytul=$row['news_tytul'];
$news_tytul_n=namen($row['news_tytul']);
$news_tresc=$row['news_tresc'];
$news_data=$row['news_data'];
$news_autor=$row['news_user'];
$news_autorn=namen($row['news_user']);
$news_autorid=$row['news_userid'];
$news_id=$row['news_id'];
$ocena=$row['news_ocena'];
$ileg=$row['news_ileg'];
$wys=$row['news_wys'];
}

if($wys==1)
{

$smarty->assign("news_tytul",$news_tytul);
$smarty->assign("news_tytul_n",$news_tytul_n);
$smarty->assign("news_tresc",$news_tresc);
$smarty->assign("news_data",$news_data);
$smarty->assign("news_autor",$news_autor);
$smarty->assign("news_autorn",$news_autorn);
$smarty->assign("news_autorid",$news_autorid);
$smarty->assign("news_id",$news_id);
$smarty->assign("id_gal",$news_id);
$smarty->assign("t","n");
$smarty->assign("podstron",$podstron);
$smarty->assign("strona",$strona);
$smarty->assign("token",$ust['token_news']);
$smarty->assign("ocenianie",$ust['nocena']);
$smarty->assign("komentowanie",$ust['nkomentowanie']);
$smarty->assign("ocena",$ocena);
$smarty->assign("glosy",$ileg);
$smarty->assign("oceniono",$_COOKIE['news_'.$news_id.'']);
$smarty->assign("kom_data",$kom_data);
$smarty->assign("kom_nick",$kom_nick);
$smarty->assign("kom_nickn",$kom_nickn);
$smarty->assign("kom_idu",$kom_idu);
$smarty->assign("kom_tresc",$kom_tresc);
$smarty->assign("kom_ile",$kom_ile);
$smarty->assign("title",$news_tytul.' - '.$lang[338].' - '.$ust['nazwa']);
}


$smarty->display($ust['templates'].'/news.tpl');

?>
