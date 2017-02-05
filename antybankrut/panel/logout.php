<?php
session_start();

unset($_SESSION['logadm']);
unset($_SESSION['user_nick']);
unset($_SESSION['user_id']);
unset($_SESSION['user_t']);

if($_SERVER['HTTP_REFERER']!="")
{
   $adres=$_SERVER['HTTP_REFERER'];
}
else
{
  $adres="index.php";
}

header("Location: ".$adres."");
?>