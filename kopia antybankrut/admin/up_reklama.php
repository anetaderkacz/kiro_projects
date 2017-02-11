<?php
session_start();
include("../db_connect.php");

if($_SESSION['logadm']=="adm")
{
   $up="UPDATE ".$pre."ustawienia SET ust_r_j='".$_POST['r_j']."',ust_r_d='".$_POST['r_d']."',ust_r_t='".$_POST['r_t']."' WHERE ust_id='1'";
    db_query($up);
 
}

header('Location: index.php?page=ustawienia&action=reklama&e=2');

?>