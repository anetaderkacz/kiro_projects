<?php
if($strona_panel!="ok"){exit();}

if($_SESSION['user_id']>=1)
{
	$blok_nazwa=$lang[331];
}
else
{
	$blok_nazwa=$lang[332];
}

$ilepw=db_query("SELECT * FROM ".$pre."pw WHERE pw_do='".$_SESSION['user_id']."' and pw_czyt='0' and pw_typ='1'");
$ilepwa=db_num_rows($ilepw);

$smarty->assign("newpw",$ilepwa);

$smarty->display($ust['templates'].'/menu.logowanie.tpl');

if($_SESSION['logadm']=="error"){$_SESSION['logadm']="";}
?>