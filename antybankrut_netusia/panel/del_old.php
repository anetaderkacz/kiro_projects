<?php
session_start();
include_once("db_connect.php");
include_once("include/ust.php");
include_once("include/function.php");
include_once("libs/Smarty.class.php");

if($_COOKIE['lang']<>"" and isset($_COOKIE['lang']) and strlen($_COOKIE['lang'])<=3 and $ust['lang_on']=="1")
{
	$u_usr['lang']=substr($_COOKIE['lang'],0,3);
}
else
{
	$u_usr['lang']=$ust['lang_d'];
}


include("lang/".$u_usr['lang']."/lang.php");

$ile_del=0;
$ile_dez=0;
$ile_prz=0;

$asd=time()+24*60*60;
$asde=5*24*60*60;
$asda=1*24*60*60;

$Query2kqa='SELECT * FROM '.$pre.'artykul '; 
$result2kqa = db_query($Query2kqa) or die(db_error());
while ($r = db_fetch($result2kqa)) 
{
 
	$s_cat=$r['art_cat'];
	$s_id=$r['art_id'];
	$s_f=$r['art_img'];
	$s_akt=$r['art_akt'];
	$ds_cat=$row['art_cat'];
	$ds_woj=$row['art_woj'];
	$ds_akt=$row['art_akt'];
    $ds_opl=$row['art_oplacone'];
	$art_end=$r['art_end']-$asde;
	$art_enda=$art_end+$asda;
	$s_opl=$r['art_oplacone'];
	
	$Query='SELECT user_id,user_email FROM '.$pre.'user WHERE user_id='.$r['art_userid'].''; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$ds_email=$row['user_email'];
	}
	
	if($s_id>=1 and $r['art_end']<time() and $s_opl=="1")
	{
		$ile_dez++;
		$Query='SELECT user_id,user_email FROM '.$pre.'user WHERE user_id='.$r['art_userid'].''; 
		$result = db_query($Query) or die(db_error());
		while ($row = db_fetch($result)) 
		{
			$ds_email=$row['user_email'];
		}

		$del="UPDATE ".$pre."artykul SET art_oplacone='0' WHERE art_id='".$s_id."'";
		db_query($del);
		
		$em=new Smarty();
		$em->assign("adres", $ust['adres']);
		$em->assign("nazwa", $ust['nazwa']);
		$em->assign("lang", $lang);
		$em->assign("art_nazwa", $r['art_tytul']);
		$em->assign("art_end", date("d-m-Y H:i",$r['art_end']));
		$em->assign("akt_dane", $r['art_del']);
		$em->assign("art_id", $r['art_id']);
		$tresc = $em->fetch($ust['templates'].'/email.wygaslo.tpl');

		nw_mail($ust['email'],$ds_email,$lang[420]." - ".$ust['nazwa'], $tresc, $head);
		if($s_id>=1)
		{
		
			$del="DELETE FROM ".$pre."komentarze WHERE kom_idk='".$s_id."' AND kom_typ='a'";
			db_query($del);
			
			$del="DELETE FROM ".$pre."artykul WHERE art_id='".$s_id."'";
			db_query($del);
			
			$del="DELETE FROM ".$pre."fotki WHERE f_a='".$s_id."'";
			db_query($del);
			
			if($ds_opl=="1" and $ds_akt=="1")
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

			if($_GET['go']=="go")
			{
				del_f("../upload/ogloszenie/".$s_id."");
			}
			else
			{
				del_f("upload/ogloszenie/".$s_id."");
			}

			echo'del: '.$r['art_id'].'<br>';
			$ile_del++;
		}
	}
	
	if($s_id>=1 and (time()>=$art_end and time()<=$art_enda) and $s_opl=="1")
	{
		$ile_prz++;
		$Query='SELECT user_id,user_email FROM '.$pre.'user WHERE user_id='.$r['art_userid'].''; 
		$result = db_query($Query) or die(db_error());
		while ($row = db_fetch($result)) 
		{
			$ds_email=$row['user_email'];
		}
		
		$em=new Smarty();
		$em->assign("adres", $ust['adres']);
		$em->assign("nazwa", $ust['nazwa']);
		$em->assign("lang", $lang);
		$em->assign("art_nazwa", $r['art_tytul']);
		$em->assign("art_end", date("d-m-Y H:i",$r['art_end']));
		$em->assign("akt_dane", $r['art_del']);
		$em->assign("art_id", $r['art_id']);
		$tresc = $em->fetch($ust['templates'].'/email.przedluz.tpl');
		
		nw_mail($ust['email'],$ds_email,$lang[419]." - ".$ust['nazwa'], $tresc, $head);
		
	}
}
echo'Przypomnien: '.$ile_prz.'<br>';
echo"Usunięto: ".$ile_del;



?>
