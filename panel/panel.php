<?php
include("subheader.php");

if($_POST['upf'])
{

  if($_POST['del']=="1")
  {
     $up="UPDATE ".$pre."user SET user_fotka='' WHERE user_id='".$_SESSION['user_id']."'";
     db_query($up);
     header("Location: ".$ust['adres']."user/panel/7");
     exit();
  }
  else
  {
     include("include/fotka.php");
     $fotu=@imggda($ust);
     $up="UPDATE ".$pre."user SET user_fotka='".$fotu."' WHERE user_id='".$_SESSION['user_id']."'";
     db_query($up);
  }

  header("Location: ".$ust['adres']."user/panel/5");
}

$Query='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($_SESSION['user_id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
$smarty->assign("email",$row['user_email']);
$smarty->assign("plec",$row['user_plec']);
$smarty->assign("d",$row['user_d']);
$smarty->assign("m",$row['user_m']);
$smarty->assign("y",$row['user_y']);
$smarty->assign("ue",$row['user_ue']);
$smarty->assign("www",$row['user_www']);
$smarty->assign("allegro",$row['user_allegro']);
$smarty->assign("ebay",$row['user_ebay']);
$smarty->assign("swistak",$row['user_swistak']);
$smarty->assign("gg",$row['user_gg']);
$smarty->assign("omnie",$row['user_omnie']);
$smarty->assign("img",$row['user_fotka']);
}

$smarty->assign("stan",$_GET['stan']);
$smarty->assign("title",$lang[340].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/panel.tpl');

?>
