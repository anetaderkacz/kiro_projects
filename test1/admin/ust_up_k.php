<?php 
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET ust_email_uw='".$_POST['email_uw']."',ust_email_port='".$_POST['email_port']."',ust_email_host='".$_POST['email_host']."',ust_email_pas='".$_POST['email_pas']."',ust_email_login='".$_POST['email_login']."',ust_fk='".$_POST['fk']."', ust_email='".$_POST['email']."', ust_kontakt_dane='".$_POST['kontaktt']."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=kontakt&e=1#kontakt");
?>