<?php
session_start();
include("../db_connect.php");
include("../include/ust.php");
if($_SESSION['user_id']>=1)
{
$Query='SELECT * FROM '.$pre.'user WHERE user_id="'.$_SESSION['user_id'].'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
  $haslo=$row['user_haslo'];
}

if(md5($_POST['sh'])==$haslo)
{
  $nh=$_POST['nh'];
  $up="UPDATE ".$pre."user SET user_haslo='".md5($nh)."' WHERE user_id='".$_SESSION['user_id']."'";
  db_query($up);
  header("Location: ".$ust['adres']."user/panel/2");
  exit();
}
}
header("Location: ".$ust['adres']."user/panel/1")


?>