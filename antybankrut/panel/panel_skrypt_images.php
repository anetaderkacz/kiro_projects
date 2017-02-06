<?php
include("subheader.php");

$count_ile = db_num_rows ( db_query("SELECT * FROM ".$pre."fotki WHERE f_a='".db_real_escape_string($_GET['id'])."'"));
$smarty->assign("count_ile",$count_ile);
$smarty->assign("ile_img",$ust['ile_img_max']);


if($_GET['v']=="del")
{

	$Query='SELECT * FROM '.$pre.'artykul WHERE art_id="'.db_real_escape_string($_GET['id']).'"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$art_fi=$row['art_img'];
	}

	$Query='SELECT * FROM '.$pre.'fotki WHERE f_id="'.$_GET['idf'].'"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$img_fm=$row['f_m'];
		@unlink("upload/ogloszenie/".$row['f_m']);
		@unlink("upload/ogloszenie/".$row['f_d']);
	}

	$del="DELETE FROM ".$pre."fotki WHERE f_id=".$_GET['idf']." and f_a=".$_GET['id']."";
	db_query($del);
	if($img_fm==$art_fi)
	{
		$up="UPDATE ".$pre."artykul SET art_img='' WHERE art_id='".$_GET['id']."'";
		db_query($up);
	}

     header("Location: ".$ust['adres']."user/panel/images/".$_GET['id']."/7");
     exit();
}

if($_GET['v']=="g")
{
	$Query='SELECT * FROM '.$pre.'fotki WHERE f_id="'.$_GET['idf'].'"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		 $up="UPDATE ".$pre."artykul SET art_img='".$row['f_m']."' WHERE art_id='".$row['f_a']."'";
		 db_query($up);
	}

    header("Location: ".$ust['adres']."user/panel/images/".$_GET['id']."/9");
    exit();
}



if($_POST['upf'])
{
    include("include/f.php");

    for($fi=1;$fi<=1;$fi++)
    {
        $fotuu=imgfff($ust,$_GET['id'],$fi,$pre);
	}
 
    header("Location: ".$ust['adres']."user/panel/images/".$_GET['id']."/5");
    exit();
}

$Query='SELECT * FROM '.$pre.'artykul WHERE art_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $smarty->assign("art_img",$row['art_img']);
}

$img_ile=0;
$Query='SELECT * FROM '.$pre.'fotki WHERE f_a="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

	$img_id[]=$row['f_id'];
	$img_file[]=$row['f_m'];
	$img_o[]=$row['f_a'];

	$img_ile++;
}

$smarty->assign("img_id",$img_id);
$smarty->assign("img_file",$img_file);
$smarty->assign("img_g",$img_g);
$smarty->assign("img_o",$img_o);
$smarty->assign("imgile",$ust['ileimg']);
$smarty->assign("img_iles",$img_ile);



$smarty->assign("stan",$_GET['stan']);
$smarty->assign("title",$lang[344].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/panel_skrypt_images.tpl');

?>
