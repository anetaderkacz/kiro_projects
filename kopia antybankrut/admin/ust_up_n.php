<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET ust_nocena='".htmlspecialchars($_POST['nocena'])."', ust_nkomentarze='".htmlspecialchars($_POST['nkomentowanie'])."', ust_ilen='".htmlspecialchars($_POST['ilen'])."', ust_tn='".htmlspecialchars($_POST['nt'])."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=news&e=2#news");
?>