<?php
include("subheader.php");

$smarty->assign("pod",$_GET['pod']);
$smarty->assign("v",$_GET['v']);

if($_GET['dni_id']>=1)
{
	$wher_dni='WHERE dni_id="'.db_real_escape_string($_GET['dni_id']).'"';
	$smarty->assign("dni_id",$_GET['dni_id']);
}
if($_GET['pro']>=1)
{
	$smarty->assign("ds_pr","1");
}

$Query='SELECT * FROM '.$pre.'dni '.$wher_dni.' ORDER by dni_dni ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $p_dni[]=$row['dni_dni'];
   $p_dniid[]=$row['dni_id'];
   $p_dnicena[]=$row['dni_cena'];
   $p_dnicenasms[]=$row['dni_cenasms'];
   $p_dninumer[]=$row['dni_numer'];
   $p_dnikod[]=$row['dni_kod'];
   $p_dnitresc[]=$row['dni_tresc'];
}

$smarty->assign("dnidni",$p_dni);
$smarty->assign("dniid",$p_dniid);
$smarty->assign("dnicena",$p_dnicena);
$smarty->assign("dnicenasms",$p_dnicenasms);
$smarty->assign("dninumer",$p_dninumer);
$smarty->assign("dnikod",$p_dnikod);
$smarty->assign("dnitresc",$p_dnitresc);

$Query='SELECT * FROM '.$pre.'artykul WHERE (art_userid="'.$_SESSION['user_id'].'" and art_id="'.db_real_escape_string($_GET['id']).'") or art_del="'.db_real_escape_string($_GET['v']).'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
    $s_end=$row['art_end'];
	$s_id=$row['art_id'];
}



if(isset($_POST['kod']))
{
//-----------------------------------------------------


	$get_sms=array();
	$get_sms['id']=$ust['dotpay_sms'];    
	$get_sms['code']=$p_dnikod[0];     
	$get_sms['typ']="sms";		       			       	
	$get_sms['kod']=$_POST['kod'];        
					
					
	$check = $_POST['kod'];
	$del=0;           

	if($check == NULL)
	{
	   $smarty->assign("bledny_kod","1");
	}
	else
	{
		include("include/pay_get_sms.php");
		
		if($get_sms['status']=="ok") 
		{
			$ds_end=$p_dni[0]*24*60*60;
			$ds_end=$s_end+$ds_end;
			
			$up="UPDATE ".$pre."artykul SET art_prop='',art_oplacone='1',art_promowane='0',art_tim='".time()."',art_end='".$ds_end."',art_dniid='".$p_dniid[0]."',art_koszt='".$p_dnicenasms[0]."' WHERE art_id=".$s_id."";           
			db_query($up);

			$smarty->assign("akt_ok","1");
		}
		else
		{
			$smarty->assign("bledny_kod","1"); 
		}
	}

//-----------------------------------------------------

}



$Query='SELECT * FROM '.$pre.'artykul WHERE (art_userid="'.$_SESSION['user_id'].'" and art_id="'.db_real_escape_string($_GET['id']).'") or art_del="'.db_real_escape_string($_GET['v']).'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
    $s_cat=$row['art_cat'];
    $s_f=$row['art_img'];
    $s_akt=$row['art_akt'];
	$s_koszt=$row['art_koszt'];
	$s_dni=$row['art_dni'];
	$s_oplacone=$row['art_oplacone'];
	$smarty->assign("art_nazwa",$row['art_tytul']);
	$smarty->assign("art_del",$row['art_del']);
	$smarty->assign("art_id",$row['art_id']);
	$smarty->assign("art_promowane",$row['art_promowane']);	
}

if((($p_dnicena[0]=="" or $p_dnicena[0]=="0") and ($p_dnicenasms[0]=="" or $p_dnicenasms[0]=="0")))
{
	$smarty->assign("pay_dar","1");
}

if(isset($_POST['pay_p']) or isset($_POST['pay_b']))
{
	$art_koszt="0";
	$art_koszt=$p_dnicena[0];
	if($_POST['pro']=="1" and isset($_POST['pay_p'])){$art_koszt=$art_koszt+$ust['procena'];}
	
	if((($p_dnicena[0]=="" or $p_dnicena[0]=="0") and ($p_dnicenasms[0]=="" or $p_dnicenasms[0]=="0")) and ($art_koszt=="" or $art_koszr=="0"))
	{

		$ds_end=$p_dni[0]*24*60*60;
		$ds_end=time()+$ds_end;

		$up="UPDATE ".$pre."artykul SET art_prop='',art_koszt='',art_promowane='0',art_oplacone='1',art_tim='".time()."',art_end='".$ds_end."',art_dniid='".$p_dniid[0]."' WHERE art_id=".$s_id."";           
		db_query($up);

		$smarty->assign("akt_ok","1");
	}
	else
	{
		db_query("UPDATE ".$pre."artykul SET art_prop='".htmlspecialchars($_POST['pro'])."',art_promowane='',art_dniid='".$p_dniid[0]."',art_koszt='".$art_koszt."' WHERE art_id='".$s_id."'");

		header("Location: ".$ust['adres']."go_pay.php?id=".$s_id."");
		exit();
	}
}
$smarty->assign("proon",$ust['proon']);
$smarty->assign("procena",$ust['procena']);
$smarty->assign("stan",$_GET['stan']);
$smarty->assign("title",'Panel ogłoszenie - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/przedluz.tpl');

?>
