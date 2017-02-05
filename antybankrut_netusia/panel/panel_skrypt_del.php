<?php
include("subheader.php");

$Query='SELECT * FROM '.$pre.'artykul WHERE art_userid="'.$_SESSION['user_id'].'" and art_id="'.db_real_escape_string($_GET['id']).'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
    $ds_cat=$row['art_cat'];
	$ds_woj=$row['art_woj'];
    $s_id=$row['art_id'];
    $s_f=$row['art_img'];
    $s_akt=$row['art_akt'];
	$s_opl=$row['art_oplacone'];
}

if($s_id>=1)
{

	$del="DELETE FROM ".$pre."komentarze WHERE kom_idk='".$s_id."' AND kom_typ='a'";
	db_query($del);
		
	$del="DELETE FROM ".$pre."artykul WHERE art_id='".$s_id."'";
	db_query($del);
		
	if($s_akt==1 and $s_opl=="1")
	{
		$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c-1  WHERE ust_id='1'";
		db_query($up);
		
		if($ds_cat>=1)
		{
			$up="UPDATE ".$pre."cat SET cat_ile=cat_ile-1  WHERE cat_id=".$ds_cat;
			db_query($up);
		}
		if($ds_woj>=1)
		{
			$up="UPDATE ".$pre."woj SET w_ile=w_ile-1  WHERE w_id=".$ds_woj;
			db_query($up);
		}
	}
	
	$del="DELETE FROM ".$pre."fotki WHERE f_a='".$s_id."'";
	db_query($del);
	
	del_f("upload/ogloszenie/".$s_id."");

   $smarty->assign("del","1");
}


$smarty->assign("stan",$_GET['stan']);
$smarty->assign("title",$lang[342].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/panel_skrypt_del.tpl');

?>
