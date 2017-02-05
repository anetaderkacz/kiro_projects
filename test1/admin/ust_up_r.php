<?php 
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

	if($_POST['fb_se']<>"")
	{
		$upm="`ust_fb_se`='".htmlspecialchars($_POST['fb_se'])."',";
	}

$up="UPDATE ".$pre."ustawienia SET ".$upm."`ust_fb_id`='".htmlspecialchars($_POST['fb_id'])."',`ust_fb_on`='".htmlspecialchars($_POST['fb_on'])."',ust_token_r='".htmlspecialchars($_POST['token_r'])."', ust_register='".htmlspecialchars($_POST['rejestracja'])."', ust_akt_r='".htmlspecialchars($_POST['akt_r'])."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=rejestracja&e=2#rejestracja");
?>