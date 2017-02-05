<?php
session_start();
include('db_connect.php');
include('include/function.php');
include('include/ust.php');
include('include/pay_get_p.php');

if($get_pay['id_o']>=1)
{
	$Query='SELECT * FROM '.$pre.'artykul WHERE art_id="'.db_real_escape_string($get_pay['id_o']).'"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$za_cena=$row['art_koszt'];
		$za_id=$row['art_id'];
		$ds_cat=$row['art_cat'];
		$ds_woj=$row['art_woj'];
		$ds_akt=$row['art_akt'];
		$za_dniid=$row['art_dniid'];
		$za_prop=$row['art_prop'];
	}
	
	if($za_prop>=1)
	{
		$za_pop="art_promowane='1',";
	}
	
	if($za_dniid>=1)
	{
		$Query='SELECT * FROM '.$pre.'dni WHERE dni_id="'.db_real_escape_string($za_dniid).'"'; 
		$result = db_query($Query) or die(db_error());
		while ($row = db_fetch($result)) 
		{
			$dni_ile=$row['dni_dni'];
		}
	}
	
	$ds_end=$dni_ile*24*60*60;
	$ds_end=time()+$ds_end;

	if($get_pay['kwota']>=$za_cena AND $get_pay['status']=="ok" AND $za_id>=1)
	{
		
		$up="UPDATE ".$pre."artykul SET ".$za_pop."art_oplacone='1',art_tim='".time()."',art_end='".$ds_end."' WHERE art_id=".$za_id."";           
		db_query($up);
			
		if($ds_akt=="1")
		{
			$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c+1  WHERE ust_id='1'";
			db_query($up);
				
			if($ds_cat>=1)
			{
				$up="UPDATE ".$pre."cat SET cat_ile=cat_ile+1  WHERE cat_id=".$ds_cat;
				db_query($up);
			}
			if($ds_woj>=1)
			{
				$up="UPDATE ".$pre."woj SET w_ile=w_ile+1  WHERE w_id=".$ds_woj;
				db_query($up);
			}
		}
	}
}



?>