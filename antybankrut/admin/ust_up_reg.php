<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET ust_regulamin='".$_POST['regulamin']."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=regulamin&e=5#regulamin");
?>