<?php 

if($strona_panel!="ok"){exit();}


$Query2k1='SELECT * FROM '.$pre.'woj ORDER by  w_nazwa ASC'; 
$result2k1 = db_query($Query2k1) or die(db_error());
while ($row2k1 = db_fetch($result2k1)) 
{

	$count="0";
	$pwoj[]=$row2k1['w_nazwa'];
	$pwojn[]=namen($row2k1['w_nazwa']);
	$pwojile[]=$row2k1['w_ile'];
	$pwojid[]=$row2k1['w_id'];

}


$smarty->assign("pwoj",$pwoj);
$smarty->assign("pwojn",$pwojn);
$smarty->assign("pwojile",$pwojile);
$smarty->assign("pwojid",$pwojid);

$smarty->display($ust['templates'].'/menu.wojewodztwa.tpl');


?>
