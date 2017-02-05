<?php
session_start();
include("../db_connect.php");

if($_SESSION['logadm']=="adm")
{

	$up="UPDATE ".$pre."ustawienia SET `ust_meta_title`='".htmlspecialchars($_POST['meta_title'])."',`ust_meta_key`='".htmlspecialchars($_POST['meta_key'])."',`ust_meta_desc`='".htmlspecialchars($_POST['meta_desc'])."',ust_lang_d='".$_POST['lang_d']."',ust_lang_on='".$_POST['lang_on']."',ust_cookie_on='".$_POST['cookie_on']."',ust_map_key='".$_POST['map_key']."',ust_nazwa='".htmlspecialchars($_POST['nazwa'])."', ust_adres='".htmlspecialchars($_POST['adres'])."', ust_templates='".htmlspecialchars($_POST['templates'])."', `ust_cache`='".htmlspecialchars($_POST['cache'])."', `ust_edytor`='".htmlspecialchars($_POST['edytor'])."' WHERE ust_id='1'";
	db_query($up);

}

header("Location: index.php?page=ustawienia&action=podstawowe&e=1#glowne");
?>