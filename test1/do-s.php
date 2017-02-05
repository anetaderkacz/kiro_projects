<?php
session_start();
include("db_connect.php");
include("include/ust.php");

if($_POST['od']>=1){$od=$_POST['od'];}else{$od="0";}
if($_POST['do']>=1){$do=$_POST['do'];}else{$do="0";}
if($_POST['cat']>=1){$cat=$_POST['cat'];}else{$cat="0";}
if($_POST['q']<>""){$q=$_POST['q'];}else{$q="0";}

header("Location: ".$ust['adres']."szukaj/".$od."/".$do."/".$cat."/".$q."/");

?>
