<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{
$in="INSERT INTO ".$pre."dni(`dni_dni`,`dni_cena`,`dni_kod`,`dni_numer`,`dni_tresc`,`dni_czas`,`dni_cenasms`)VALUES('".htmlspecialchars($_POST['dni'])."','".htmlspecialchars($_POST['cena'])."','".htmlspecialchars($_POST['kod'])."','".htmlspecialchars($_POST['numer'])."','".htmlspecialchars($_POST['tresc'])."','".htmlspecialchars($_POST['czas'])."','".htmlspecialchars($_POST['cenasms'])."')";
db_query($in);
}
header("Location: index.php?page=ustawienia&action=artykuly&v=dodane");
?>