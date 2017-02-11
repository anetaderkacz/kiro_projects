<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET `ust_dotpay_sms`='".htmlspecialchars($_POST['dotpay_sms'])."',`ust_wag1`='".htmlspecialchars($_POST['wag1'])."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=artykuly&e=3#artykuly");
?>