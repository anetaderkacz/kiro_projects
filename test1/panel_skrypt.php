<?php
include("subheader.php");

if($_GET['pay']=="pay")
{
	$smarty->assign("pay_o","pay_o");
}

$Query='SELECT * FROM '.$pre.'woj ORDER by w_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $p_woj[]=$row['w_nazwa'];
   $p_wojid[]=$row['w_id'];
}

$smarty->assign("pwoj",$p_woj);
$smarty->assign("pwojid",$p_wojid);

$Query='SELECT * FROM '.$pre.'artykul WHERE art_userid="'.$_SESSION['user_id'].'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
    $s_nazwa[]=str_rep("amp",$row['art_tytul']);
    $s_nazwan[]=namen($row['art_tytul']);
    $s_id[]=$row['art_id'];
    $s_akt[]=$row['art_akt'];
    $s_view[]=$row['art_view'];
    $s_ocena[]=$row['art_ocena'];
    $s_oplacone[]=$row['art_oplacone'];
    $s_end[]=date("Y.m.d H:i",$row['art_end']);
}
$smarty->assign("s_oplacone",$s_oplacone);
$smarty->assign("s_ocena",$s_ocena);
$smarty->assign("s_end",$s_end);
$smarty->assign("s_akt",$s_akt);
$smarty->assign("s_view",$s_view);
$smarty->assign("s_id",$s_id);
$smarty->assign("s_nazwa",$s_nazwa);
$smarty->assign("s_nazwan",$s_nazwan);

$smarty->assign("stan",$_GET['stan']);
$smarty->assign("title",$lang[341].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/panel_skrypt.tpl');

?>
