<?php
include("subheader.php");

$Query='SELECT * FROM '.$pre.'user WHERE user_kod="'.db_real_escape_string($_GET['kod']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
	$id=$row['user_id'];
	$smarty->assign("akt_u",$row['user_akt']);
	$akt_u=$row['user_akt'];
	$login=$row['user_login'];
}

$smarty->assign("login",$login);

if($id!="" and $akt_u==0)
{
	$up="UPDATE ".$pre."user SET user_akt='1' WHERE user_id='".$id."'";
	db_query($up);
	$smarty->assign("akt",'1');

}
else
{
	$smarty->assign("akt",'0');
}

$smarty->assign("title",$lang[320].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/aktywacja.tpl');

?>
