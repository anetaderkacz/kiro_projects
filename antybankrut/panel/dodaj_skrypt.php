<?php
include("subheader.php");

$smarty->assign("strona_get","add");
$smarty->assign("ust_add_on",$ust['add_on']);

$Query='SELECT * FROM '.$pre.'woj ORDER by w_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $p_woj[]=$row['w_nazwa'];
   $p_wojid[]=$row['w_id'];
}

$Query='SELECT * FROM '.$pre.'dni ORDER by dni_dni ASC'; 
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

$smarty->assign("pwoj",$p_woj);
$smarty->assign("pwojid",$p_wojid);




if($_GET['ok']==1)
{
   $smarty->assign("ds_add","1");
}
if($_GET['ok']==2)
{

$Query='SELECT * FROM '.$pre.'artykul  WHERE art_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $smarty->assign("ds_oplacone",$row['art_oplacone']);
   $smarty->assign("ds_koszt",$row['art_koszt']);
   $smarty->assign("ds_idp",$row['art_id']);
   $smarty->assign("ds_pr",$row['art_promowane']);
   $dsdniid=$row['art_dniid'];
   $artidpay=$row['art_id'];
   $dsa_cat=$row['art_cat'];
   $dsa_woj=$row['art_woj'];
   $dsa_akt=$row['art_akt'];
}


$Query='SELECT * FROM '.$pre.'dni WHERE dni_id='.$dsdniid.' ORDER by dni_dni ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $ap_dni=$row['dni_dni'];
   $ap_dniid=$row['dni_id'];
   $ap_dnicena=$row['dni_cena'];
   $ap_dnicenasms=$row['dni_cenasms'];
   $ap_dninumer=$row['dni_numer'];
   $ap_dnikod=$row['dni_kod'];
   $ap_dnitresc=$row['dni_tresc'];
}

$smarty->assign("adnidni",$ap_dni);
$smarty->assign("adniid",$ap_dniid);
$smarty->assign("adnicena",$ap_dnicena);
$smarty->assign("adnicenasms",$ap_dnicenasms);
$smarty->assign("adninumer",$ap_dninumer);
$smarty->assign("adnikod",$ap_dnikod);
$smarty->assign("adnitresc",$ap_dnitresc);

if(isset($_POST['kod']))
{
//-----------------------------------------------------

$get_sms=array();
$get_sms['id']=$ust['dotpay_sms'];    
$get_sms['code']=$ap_dnikod;     
$get_sms['typ']="sms";		       			       	
$get_sms['kod']=$_POST['kod'];
         

if($get_sms['kod'] == NULL)
{
   $smarty->assign("bledny_kod","1");
}
else
{
	include("include/pay_get_sms.php");
	
    if($get_sms['status']=="ok") 
    { 
		$up="UPDATE ".$pre."artykul SET art_oplacone='1',art_promowane='0' WHERE art_id=".$artidpay."";           
        db_query($up);
		
		if($dsa_akt=="1")
		{
			$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c+1  WHERE ust_id='1'";
			db_query($up);
			
			if($ds_cat>=1)
			{
				$up="UPDATE ".$pre."cat SET cat_ile=cat_ile+1  WHERE cat_id=".$dsa_cat;
				db_query($up);
			}
			if($ds_woj>=1)
			{
				$up="UPDATE ".$pre."woj SET w_ile=w_ile+1  WHERE w_id=".$dsa_woj;
				db_query($up);
			}
		}
		
        header("Location:".$ust['adres']."dodaj/ok");
		exit();
    }
	else
	{
        $smarty->assign("bledny_kod","1"); 
    }

}

//-----------------------------------------------------

}



   $smarty->assign("ds_pay","1");
}

if(isset($_POST['dodaj_skrypt_b']))
{
   if($_POST['nazwa']!=""){$ds_nazwa=htmlspecialchars($_POST['nazwa']);}
   if($_POST['cat']!=""){$ds_cat=htmlspecialchars($_POST['cat']);}
   if($_POST['demo']!=""){$ds_demo=htmlspecialchars($_POST['demo']);}
   if($_POST['cena']!=""){$ds_cena=htmlspecialchars($_POST['cena']);}
   if($_POST['opis']!=""){$ds_opis=$_POST['opis'];}
   if($_POST['dni']!=""){$ds_dni=htmlspecialchars($_POST['dni']);}
   if($_POST['woj']!=""){$ds_woj=htmlspecialchars($_POST['woj']);}
   if($_POST['miasto']!=""){$ds_miasto=htmlspecialchars($_POST['miasto']);}
   if($_POST['tel']!=""){$ds_tel=htmlspecialchars($_POST['tel']);}

   if($_POST['pro']!=""){$ds_pro=htmlspecialchars($_POST['pro']);}
   if(spremail($_POST['email'])){$ds_email=htmlspecialchars($_POST['email']);}

if($ds_nazwa!="" and $ds_cat!=""  and $ds_opis!="" and $ds_dni>=1 and $ds_dni<=365 and ((($ds_email<>"" or $_SESSION['user_id']>=1) and $ust['add_on']=="2") or $ust['add_on']=="1"))
{

	$oplacone="1";
	$ds_koszt="0";

	if($ds_pro=="1"){$ds_prom=1;}else{$ds_prom=0;}

	$Query='SELECT * FROM '.$pre.'dni WHERE dni_id="'.db_real_escape_string($ds_dni).'"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
   		if($row['dni_cena']>0){$ds_koszt=$row['dni_cena'];}else{$ds_koszt="0";}

  		 $ds_dnii=$row['dni_dni'];
  		 $ds_dnie=$row['dni_dni'];

  		 if(($row['dni_cena']>0 or $row['dni_cenasms']>0) or $ds_prom=="1"){$oplacone="0";}else{$oplacone="1";}

	}

 	if($ds_prom=="1"){$ds_koszt=$ds_koszt+$ust['procena'];}
  	$ds_end=$ds_dnii*24*60*60;
 	$ds_end=time()+$ds_end;
	$del_dane=md5($ds_end."asd".$ds_nazwa."asd".rand(10,123));


	if($_SESSION['user_id']>=1)
	{
		$user_ogl_id=$_SESSION['user_id'];
	}
	else
	{

		$reg_login=rand(1000,999999999);
		$reg_haslo=rand(100000,9999999999);

		$in="INSERT INTO ".$pre."user(`user_login`, `user_haslo`, `user_email`, `user_akt`, `user_data_r`, `user_kod`,`user_rip`)VALUES('".htmlspecialchars($reg_login)."', '".md5($reg_haslo)."', '".htmlspecialchars($_POST['email'])."', '1', NOW(), '".$kod."','".user_ip()."')";
		db_query($in);

		$user_ogl_id=db_insert_id();

		$em=new Smarty();
		$em->assign("adres", $ust['adres']);
		$em->assign("nazwa", $ust['nazwa']);
		$em->assign("kod", $kod);
		$em->assign("lang", $lang);
		$em->assign("reg_login", $reg_login);
		$em->assign("reg_haslo", $reg_haslo);
		$em->assign("lang",$lang);
		$tresc = $em->fetch($ust['templates'].'/email.dodanie.tpl');

		$head = "From: ".$ust['email']."";
		$head .= "\r\n";
		$head .= "Content-type: text/html; charset=UTF-8\r\n";
		$temat= $lang[322]." - ".$ust['nazwa'];
		nw_mail($ust['email'],$ds_email,$temat, $tresc, $head);
	
	
	}

  	$in="INSERT INTO ".$pre."artykul(`art_tytul`,`art_demo`,`art_cena`,`art_cat`,`art_tresc`,`art_img`,`art_userid`,`art_data`,`art_dni`,`art_end`,`art_akt`,`art_oplacone`,`art_koszt`,`art_woj`,`art_miasto`,`art_tel`,`art_x`,`art_y`,`art_zoom`,`art_promowane`,`art_dniid`,`art_del`,`art_tim`,`art_dod`,`art_prop`,`art_ip`)VALUES('".htmlspecialchars($ds_nazwa)."','".htmlspecialchars($ds_demo)."','".htmlspecialchars($ds_cena)."','".htmlspecialchars($ds_cat)."','".strip_tags($ds_opis,"<a><p><span><img><br><b><strong><em><i><u><hr><font>")."','".htmlspecialchars($ds_img)."','".$user_ogl_id."',NOW(),'".htmlspecialchars($ds_dnie)."','".$ds_end."','".$ust['omod']."','".$oplacone."','".$ds_koszt."','".$ds_woj."','".$ds_miasto."','".$ds_tel."','".$_POST['lat']."','".$_POST['lng']."','".$_POST['zoom']."','".$ds_prom."','".$ds_dni."','".$del_dane."','".time()."','".date("dmY")."','".$ds_prom."','".user_ip()."')";
  	db_query($in);

	$ds_id=db_insert_id();
   	if($ust['omod']=="1" and $oplacone=="1" and $ds_id>=1)
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
   if($ust['ileimg']>=1)
   {

      include("include/f.php");

      for($fi=1;$fi<=$ust['ileimg'];$fi++)
      {
         $fotuu=imgfff($ust,$ds_id,$fi,$pre);
         if($fotuu<>"" and  $fotuu<>"/" )
         {
            $fotu=$fotuu;
         }
      }

      header('Content-type: text/html');

   }

   $up="UPDATE ".$pre."artykul SET art_img='".$fotu."'  WHERE art_id=".$ds_id;   
   db_query($up);


   if($oplacone=="1")
   {
       header("Location:".$ust['adres']."dodaj/ok");
   }
   else
   {
       header("Location:".$ust['adres']."dodaj/pay:".$ds_id);
   }  
   
   $smarty->assign("ds_add","1");
}
else
{
   $smarty->assign("ds_error","1");
}

$smarty->assign("ds_isset","1");
$smarty->assign("ds_dni",$ds_dni);
$smarty->assign("ds_nazwa",$ds_nazwa);
$smarty->assign("ds_cat",$ds_cat);
$smarty->assign("ds_cena",$ds_cena);
$smarty->assign("ds_opis",$ds_opis);
$smarty->assign("ds_demo",$ds_demo);
$smarty->assign("ds_woj",$ds_woj);
$smarty->assign("ds_email",$ds_email);
$smarty->assign("ds_miasto",$ds_miasto);
$smarty->assign("ds_tel",$ds_tel);
}


$Query='SELECT * FROM '.$pre.'cat WHERE cat_pod="0" ORDER by cat_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $p_rd[]=$row['cat_nazwa'];
   $p_rdid[]=$row['cat_id'];
   $p_rdp[]=$row['cat_pod'];
}


$smarty->assign("rd",$p_rd);
$smarty->assign("rdid",$p_rdid);
$smarty->assign("rdp",$p_rdp);

$Query='SELECT * FROM '.$pre.'cat ORDER by cat_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $pp_rd[]=$row['cat_nazwa'];
   $pp_rdid[]=$row['cat_id'];
   $pp_rdp[]=$row['cat_pod'];
}


$smarty->assign("prd",$pp_rd);
$smarty->assign("prdid",$pp_rdid);
$smarty->assign("prdp",$pp_rdp);
$smarty->assign("ds_x","51.919438");
$smarty->assign("ds_y","19.145136");
$smarty->assign("ds_zoom","6");
$smarty->assign("ds_id",$ds_id);
$smarty->assign("procena",$ust['procena']);
$smarty->assign("proon",$ust['proon']);
$smarty->assign("title",$lang[321]."  -  ".$ust['nazwa']);

$smarty->display($ust['templates'].'/dodaj_skrypt.tpl');

?>
