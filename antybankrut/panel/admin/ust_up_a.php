<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET `ust_wag1`='".htmlspecialchars($_POST['wag1'])."',`ust_wag2`='".htmlspecialchars($_POST['wag2'])."',`ust_wag3`='".htmlspecialchars($_POST['wag3'])."',`ust_wag4`='".htmlspecialchars($_POST['wag4'])."',`ust_wag5`='".htmlspecialchars($_POST['wag5'])."',`ust_granica`='".htmlspecialchars($_POST['granica'])."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=artykuly&e=3#artykuly");
?>