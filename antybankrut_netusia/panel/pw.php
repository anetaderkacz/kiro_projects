<?php 
include("subheader.php");

if($_GET['action']=="" or $_GET['action']=="pw" or $_GET['action']=="wyslano"  or $_GET['action']=="nie-wyslano")
{

	if($_GET['v']=="del")
	{
		$del="DELETE FROM ".$pre."pw WHERE pw_id='".db_real_escape_string($_GET['id'])."' and pw_do='".$_SESSION['user_id']."' ";
		db_query($del);
		$smarty->assign("del","ok");

	}
	$ilepw=0;
	$Query='SELECT * FROM '.$pre.'pw WHERE pw_do="'.db_real_escape_string($_SESSION['user_id']).'" and pw_do="'.$_SESSION['user_id'].'"  and pw_typ="1" order by pw_id DESC'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		if($row['pw_od']>=1)
		{
			$Query1='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($row['pw_od']).'"'; 
			$result1 = db_query($Query1) or die(db_error());
			while ($row1 = db_fetch($result1)) 
			{
				$user_login[]=$row1['user_login'];
				$user_loginn[]=namen($row1['user_login']);
			}


			$pw_id[]=$row['pw_id'];
			if(strlen(str_replace(" ","",$row['pw_tytul']))>=1){$pw_temat[]=$row['pw_tytul'];}else{$pw_temat[]="Brak tematu";}
			$pw_od[]=$row['pw_od'];
			$pw_czyt[]=$row['pw_czyt'];
			$pw_data[]=$row['pw_data'];
			$ilepw++;
		}
	}

	$smarty->assign("od_login",$user_login);
	$smarty->assign("od_loginn",$user_loginn);
	$smarty->assign("pw_id",$pw_id);
	$smarty->assign("temat",$pw_temat);
	$smarty->assign("od",$pw_od);
	$smarty->assign("czyt",$pw_czyt);
	$smarty->assign("data",$pw_data);
	$smarty->assign("ilepw",$ilepw);

	if($_GET['action']=="wyslano"){$smarty->assign("wyslano","ok");}
	if($_GET['action']=="nie-wyslano"){$smarty->assign("niewyslano","ok");}

	$smarty->assign("title",$lang[345].' - '.$ust['nazwa']);
	$smarty->display($ust['templates'].'/pw.tpl');
}

if($_GET['action']=="wyslane")
{

	if($_GET['v']=="del")
	{
		$del="DELETE FROM ".$pre."pw WHERE pw_id='".db_real_escape_string($_GET['id'])."' and pw_od='".$_SESSION['user_id']."' ";
		db_query($del);
		$smarty->assign("del","ok");

	}
	
	$ilepw=0;
	$Query='SELECT * FROM '.$pre.'pw WHERE pw_od="'.$_SESSION['user_id'].'" and pw_typ="2"  order by pw_id DESC'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{

		if($row['pw_do']>=1)
		{
			$Query1='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($row['pw_do']).'"'; 
			$result1 = db_query($Query1) or die(db_error());
			while ($row1 = db_fetch($result1)) 
			{
				$user_login[]=$row1['user_login'];
				$user_loginn[]=namen($row1['user_login']);
			}


			$pw_id[]=$row['pw_id'];
			if(strlen(str_replace(" ","",$row['pw_tytul']))>=1){$pw_temat[]=$row['pw_tytul'];}else{$pw_temat[]="Brak tematu";}
			$pw_od[]=$row['pw_do'];
			$pw_czyt[]=$row['pw_czyt'];
			$pw_data[]=$row['pw_data'];
			$ilepw++;
		}
	}

	$smarty->assign("od_login",$user_login);
	$smarty->assign("od_loginn",$user_loginn);
	$smarty->assign("pw_id",$pw_id);
	$smarty->assign("temat",$pw_temat);
	$smarty->assign("od",$pw_od);
	$smarty->assign("czyt",$pw_czyt);
	$smarty->assign("data",$pw_data);
	$smarty->assign("ilepw",$ilepw);


	$smarty->assign("title",$lang[346].' - '.$ust['nazwa']);
	$smarty->display($ust['templates'].'/pw.wyslane.tpl');
}

if($_GET['action']=="view")
{


	$Query='SELECT * FROM '.$pre.'pw WHERE pw_id="'.db_real_escape_string($_GET['id']).'" and (pw_do="'.$_SESSION['user_id'].'" or pw_od="'.$_SESSION['user_id'].'" )'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{

		$up="UPDATE ".$pre."pw SET pw_czyt='1' WHERE pw_id=".$row['pw_id']."";
		db_query($up);

		$Query1='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($row['pw_od']).'"'; 
		$result1 = db_query($Query1) or die(db_error());
		while ($row1 = db_fetch($result1)) 
		{
			$user_login[]=$row1['user_login'];
			$user_loginn[]=namen($row1['user_login']);
		}


		$pw_id[]=$row['pw_id'];
		$pw_temat[]=$row['pw_tytul'];
		$pw_od[]=$row['pw_od'];
		$pw_czyt[]=$row['pw_czyt'];
		$pw_data[]=$row['pw_data'];
		$pw_tresc[]=$row['pw_tresc'];

	}
	

	$smarty->assign("od_login",$user_login);
	$smarty->assign("od_loginn",$user_loginn);
	$smarty->assign("pw_id",$pw_id);
	$smarty->assign("temat",$pw_temat);
	$smarty->assign("od",$pw_od);
	$smarty->assign("czyt",$pw_czyt);
	$smarty->assign("data",$pw_data);
	$smarty->assign("tresc",$pw_tresc);


	$smarty->assign("title",$lang[345].' - '.$ust['nazwa']);
	$smarty->display($ust['templates'].'/pw.view.tpl');

}

if($_GET['action']=="send")
{

	if(isset($_POST['send']))
	{

		$Query1='SELECT * FROM '.$pre.'user WHERE user_login="'.db_real_escape_string($_POST['do']).'"'; 
		$result1 = db_query($Query1) or die(db_error());
		while ($row1 = db_fetch($result1)) 
		{
			$do=$row1['user_id'];
		}
		if($do>=1)
		{
				$in="INSERT INTO ".$pre."pw(`pw_tytul`, `pw_tresc`, `pw_od`, `pw_do`, `pw_data`, `pw_typ`)VALUE('".htmlspecialchars($_POST['temat'])."','".htmlspecialchars($_POST['tresc'])."', '".htmlspecialchars($_SESSION['user_id'])."', '".htmlspecialchars($do)."', NOW(), '1')";
				db_query($in);

				$in="INSERT INTO ".$pre."pw(`pw_tytul`, `pw_tresc`, `pw_od`, `pw_do`, `pw_data`, `pw_typ`)VALUE('".htmlspecialchars($_POST['temat'])."','".htmlspecialchars($_POST['tresc'])."', '".htmlspecialchars($_SESSION['user_id'])."', '".htmlspecialchars($do)."', NOW(), '2')";
				db_query($in);
				
				header("Location: ".$ust['adres']."pw/wyslano/");
				exit();
		}
		else
		{
				header("Location: ".$ust['adres']."pw/nie-wyslano/");
				exit();
		}


	}


	if($_GET['v']=="odp")
	{

		$Query='SELECT * FROM '.$pre.'pw WHERE pw_id="'.db_real_escape_string($_GET['id']).'" and pw_do="'.$_SESSION['user_id'].'" and pw_typ="1"'; 
		$result = db_query($Query) or die(db_error());
		while ($row = db_fetch($result)) 
		{


			$Query1='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($row['pw_od']).'"'; 
			$result1 = db_query($Query1) or die(db_error());
			while ($row1 = db_fetch($result1)) 
			{
				$user_login=$row1['user_login'];
				$user_loginn=namen($row1['user_login']);
			}


			$pw_id=$row['pw_id'];
			$pw_temat=$row['pw_tytul'];


		}

		$smarty->assign("od_login",$user_login);
		$smarty->assign("od_loginn",$user_loginn);
		$smarty->assign("pw_id",$pw_id);
		$smarty->assign("temat",$pw_temat);

	}
	if($_GET['v']=="" and $_GET['id']!="")
	{

		$Query1='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($_GET['id']).'"'; 
		$result1 = db_query($Query1) or die(db_error());
		while ($row1 = db_fetch($result1)) 
		{
			$user_login=$row1['user_login'];
			$user_loginn=namen($row1['user_login']);

		}

		$smarty->assign("od_login",$user_login);
		$smarty->assign("od_loginn",$user_loginn);

	}

	$smarty->assign("title",$lang[347].' - '.$ust['nazwa']);
	$smarty->display($ust['templates'].'/pw.send.tpl');

}

?>