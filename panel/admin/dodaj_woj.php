<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{
$in="INSERT INTO ".$pre."woj(`w_nazwa`)VALUES('".htmlspecialchars($_POST['nazwa'])."')";
db_query($in);
}
header("Location: index.php?page=ustawienia&action=woj&v=dodane");
?>