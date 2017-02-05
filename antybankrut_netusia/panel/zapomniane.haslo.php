<?php
include("subheader.php");

if(strlen($_GET['knh'])==32)
{
	$Query='SELECT * FROM '.$pre.'user WHERE user_knh="'.db_real_escape_string($_GET['knh']).'" and user_akt="1"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$id_ver=$row['user_id'];
		$login=$row['user_login'];
		$email=$row['user_email'];
		$uknh=$row['user_knh'];
	}

	if($id_ver!="" and strlen($uknh)=="32")
	{
		$nhn=rand(11111,99999999);
		$nh=md5($nhn);
		
		$up="UPDATE ".$pre."user SET user_haslo='".$nh."',user_knh='' WHERE user_id='".$id_ver."'";
		db_query($up);

		$em=new Smarty();
		$em->assign("adres", $ust['adres']);
		$em->assign("nazwa", $ust['nazwa']);
		$em->assign("haslo", $nhn);
		$em->assign("lang", $lang);
		
		$tresc = $em->fetch($ust['templates'].'/email.nowe.zapomniane.haslo.tpl');

		$head = "From: ".$ust['email']." <".$ust['email'].">";
		$head .= "\r\n";
		$head .= "Content-type: text/html; charset=UTF-8\r\n";
		$temat= "".$lang[354]." - ".$ust['nazwa']."";
		nw_mail($ust['email'],$email,$temat, $tresc, $head);

		$smarty->assign("akt",'1');

	}
	else
	{
		$smarty->assign("akt",'2');
	}
}

if(isset($_POST['nhzi']))
{

	$Query='SELECT * FROM '.$pre.'user WHERE user_login="'.db_real_escape_string($_POST['login']).'" and user_akt="1"'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$id=$row['user_id'];
		$login=$row['user_login'];
		$email=$row['user_email'];
	}

	if($id!="")
	{
		$nhn=rand(11111,99999999);
		$nh=md5($nhn);

		$up="UPDATE ".$pre."user SET user_knh='".$nh."' WHERE user_id='".$id."'";
		db_query($up);

		$em=new Smarty();
		$em->assign("adres", $ust['adres']);
		$em->assign("nazwa", $ust['nazwa']);
		$em->assign("nh", $nh);
		$em->assign("lang", $lang);
		
		$tresc = $em->fetch($ust['templates'].'/email.zapomniane.haslo.tpl');

		$head = "From: ".$ust['email']." <".$ust['email'].">";
		$head .= "\r\n";
		$head .= "Content-type: text/html; charset=UTF-8\r\n";
		$temat= "".$lang[354]." - ".$ust['nazwa']."";
		nw_mail($ust['email'],$email,$temat, $tresc, $head);

		$smarty->assign("akt",'3');

	}
	else
	{
		$smarty->assign("akt",'2');
	}
}

$smarty->assign("title",$lang[355].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/zapomniane.haslo.tpl');

?>
