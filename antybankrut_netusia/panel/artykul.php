<?php
include("subheader.php");

$smarty->assign("strona_get","ogl");
$smarty->assign("ust_add_on",$ust['add_on']);
if($_GET['druk']=="tak")
{
	$smarty->assign("druk","tak");
}

if($_POST['addkom'])
{

$kod=0;
if($ust['token_art']=="0")
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
  $in="INSERT INTO ".$pre."komentarze(`kom_nick`, `kom_tresc`, `kom_data`, `kom_typ`, `kom_idk`, `kom_idu`) VALUES ('".htmlspecialchars($nick)."', '".htmlspecialchars($_POST['tresc'])."', NOW(), 'a', '".htmlspecialchars($_GET['id'])."', '".$_SESSION['user_id']."')";
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
$Query='SELECT * FROM '.$pre.'komentarze WHERE kom_idk="'.db_real_escape_string($_GET['id']).'" AND kom_typ="a" ORDER by kom_id DESC'; 
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

if($_COOKIE['view_'.$_GET['id'].'']!="1")
{
   $up="UPDATE ".$pre."artykul SET art_view=art_view+1 WHERE art_id='".db_real_escape_string($_GET['id'])."'";
   db_query($up);
   setcookie("view_".$_GET['id']."","1" , time()+86400);
}
else
{

}


$Query = "SELECT * FROM ".$pre."artykul WHERE art_akt='1' and art_oplacone='1' AND art_id='".db_real_escape_string($_GET['id'])."' ORDER by art_id DESC";
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
$smarty->assign("ds_x",$row['art_x']);
$smarty->assign("ds_y",$row['art_y']);
$smarty->assign("ds_zoom",$row['art_zoom']);
$art_tytul=str_rep("amp",$row['art_tytul']);
$art_tytul_n=namen($row['art_tytul']);
$art_tresc=str_replace($kode_z,$kode_do,$row['art_tresc']);
$art_data=$row['art_data'];
$art_autor=get_login_user($row['art_userid']);
$art_autorn=namen(get_login_user($row['art_userid']));
$art_autorid=$row['art_userid'];
$art_id=$row['art_id'];
$art_cena=$row['art_cena'];
$art_miasto=$row['art_miasto'];
$art_tel=$row['art_tel'];
$art_woj=get_user_woj($row['art_woj']);
$art_demo=$row['art_demo'];
$art_img=$row['art_img'];
$art_end=date("Y.m.d H:i",$row['art_end']);

$ocena=$row['art_ocena'];
$ileg=$row['art_ileg'];
$wys=$row['art_akt'];
$art_view=$row['art_view'];

//bitcoin
$art_bitcoin=$row['art_bitcoin'];

}
$fo_ile=0;
$Query='SELECT * FROM '.$pre.'fotki WHERE f_a="'.$art_id.'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $fo_fm[]=$row['f_m'];
   $fo_fd[]=$row['f_d'];
   $fo_ile++;
}

$Query='SELECT * FROM '.$pre.'user WHERE user_id="'.$art_autorid.'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

$smarty->assign("ue",$row['user_ue']);
$smarty->assign("allegro",$row['user_allegro']);
$smarty->assign("ebay",$row['user_ebay']);
$smarty->assign("swistak",$row['user_swistak']);
$smarty->assign("www",$row['user_www']);
$smarty->assign("gg",$row['user_gg']);
$smarty->assign("id",$row['user_id']);


}

if($wys==1)
{
$smarty->assign("art_woj",$art_woj);
$smarty->assign("art_tel",$art_tel);
$smarty->assign("art_miasto",$art_miasto);
$smarty->assign("art_view",$art_view);
$smarty->assign("art_img",$art_img);
$smarty->assign("art_imgg",str_replace("m","d",$art_img));
$smarty->assign("art_tytul",$art_tytul);
$smarty->assign("art_tytul_n",$art_tytul_n);
$smarty->assign("art_tresc",$art_tresc);
$smarty->assign("art_data",$art_data);
$smarty->assign("art_autor",$art_autor);
$smarty->assign("art_cena",$art_cena);
$smarty->assign("art_demo",$art_demo);
$smarty->assign("art_end",$art_end);
$smarty->assign("fo_fm",$fo_fm);
$smarty->assign("fo_fd",$fo_fd);
$smarty->assign("fo_ile",$fo_ile);
//bitcoin
$smarty->assign("art_bitcoin",$art_bitcoin);

$smarty->assign("art_autorn",$art_autorn);
$smarty->assign("art_autorid",$art_autorid);
$smarty->assign("art_id",$art_id);
$smarty->assign("id_gal",$art_id);
$smarty->assign("t","a");
$smarty->assign("podstron",$podstron);
$smarty->assign("strona",$strona);
$smarty->assign("token",$ust['token_art']);
$smarty->assign("ocenianie",$ust['aocena']);
$smarty->assign("komentowanie",$ust['akomentowanie']);
$smarty->assign("ocena",$ocena);
$smarty->assign("glosy",$ileg);
$smarty->assign("oceniono",$_COOKIE['art_'.$art_id.'']);
$smarty->assign("kom_data",$kom_data);
$smarty->assign("kom_nick",$kom_nick);
$smarty->assign("kom_nickn",$kom_nickn);
$smarty->assign("kom_idu",$kom_idu);
$smarty->assign("kom_tresc",$kom_tresc);
$smarty->assign("kom_ile",$kom_ile);
$smarty->assign("wys",$wys);

$smarty->assign("title",$art_tytul.' - '.$ust['nazwa']);

}



$smarty->display($ust['templates'].'/artykul.tpl');

?>
