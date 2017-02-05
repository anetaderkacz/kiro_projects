<?php
session_start();
include("../db_connect.php");
include("../include/ust.php");
include("../include/function.php");
if($_SESSION['user_id']>=1)
{
if(spremail($_POST['email']))
{
  $up="UPDATE ".$pre."user SET user_swistak='".htmlspecialchars($_POST['swistak'])."',user_ebay='".htmlspecialchars($_POST['ebay'])."',user_allegro='".htmlspecialchars($_POST['allegro'])."', user_email='".htmlspecialchars($_POST['email'])."', user_d='".htmlspecialchars($_POST['d'])."', user_m='".htmlspecialchars($_POST['m'])."', user_y='".htmlspecialchars($_POST['y'])."', user_gg='".htmlspecialchars($_POST['gg'])."', user_www='".htmlspecialchars($_POST['www'])."', user_omnie='".htmlspecialchars($_POST['omnie'])."', user_plec='".htmlspecialchars($_POST['plec'])."', user_ue='".htmlspecialchars($_POST['ue'])."' WHERE user_id='".$_SESSION['user_id']."'";
  db_query($up);
  header("Location: ".$ust['adres']."user/panel/4");
  exit();
}
if($_POST['email']=="")
{
  $up="UPDATE ".$pre."user SET user_swistak='".htmlspecialchars($_POST['swistak'])."',user_ebay='".htmlspecialchars($_POST['ebay'])."',user_allegro='".htmlspecialchars($_POST['allegro'])."', user_email='".htmlspecialchars($_POST['email'])."', user_d='".htmlspecialchars($_POST['d'])."', user_m='".htmlspecialchars($_POST['m'])."', user_y='".htmlspecialchars($_POST['y'])."', user_gg='".htmlspecialchars($_POST['gg'])."', user_www='".htmlspecialchars($_POST['www'])."', user_omnie='".htmlspecialchars($_POST['omnie'])."', user_plec='".htmlspecialchars($_POST['plec'])."', user_ue='".htmlspecialchars($_POST['ue'])."' WHERE user_id='".$_SESSION['user_id']."'";
  db_query($up);
  header("Location: ".$ust['adres']."user/panel/4");
  exit();
}
}
header("Location: ".$ust['adres']."user/panel/3")


?>