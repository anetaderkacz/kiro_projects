<?php
include("db_connect.php");
include("include/ust.php");

setcookie("cookie_off","1" , time()+86400, "/");

if($_SERVER['HTTP_REFERER']<>"")
{
	header("Location: ".$_SERVER['HTTP_REFERER']."");
}
else
{
	header("Location: ".$ust['adres']."");
}

?>