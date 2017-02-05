<?php 
session_start();
header('Content-Type: text/html; charset=utf-8');
include('db_connect.php');
include('include/function.php');
include('include/ust.php');

if($_COOKIE['lang']<>"" and isset($_COOKIE['lang']) and strlen($_COOKIE['lang'])<=3 and $ust['lang_on']=="1")
{
	$u_usr['lang']=substr($_COOKIE['lang'],0,3);
}
else
{
	$u_usr['lang']=$ust['lang_d'];
}


include("lang/".$u_usr['lang']."/lang.php");

if($_GET['action']=="token")
{
	echo '<img src="include/kod.php">';
}
if($_GET['action']=="rep")
{

	if(is_numeric($_GET['add_id'])){}else{echo"".$lang['398'].":";exit();}
	if($_GET['tresc']<>""){}else{echo''.$lang['399'].'';exit();}
	if($_GET['kod']==$_SESSION['token'] or $_SESSION['user_id']>=1){}else{echo''.$lang['400'].'';exit();}
	$tresc=substr(nl2br(strip_tags($_GET['tresc'])),0,1000);
	
	db_query("INSERT INTO ".$pre."zgloszenia(`z_data`,`z_user`,`z_tresc`,`z_ogl`,`z_ip`) VALUES ('".time()."','".$_SESSION['user_id']."','".$tresc."','".db_real_escape_string($_GET['add_id'])."','".user_ip()."')");
	
	echo '<span style="color:green">'.$lang['401'].'</span>';
	exit();

}
if($_GET['action']=="del_fav")
{
	if(strlen($_GET['del'])==32){}else{echo"".$lang['398']."";exit();}

	$Query='SELECT * FROM '.$pre.'ulubione  WHERE u_del="'.db_real_escape_string($_GET['del']).'"  LIMIT 1'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$jest=1;
		$id_del=$row['u_id'];
		$id_ogl=$row['u_ogl'];
	}

	if($jest=="1")
	{
		db_query("UPDATE ".$pre."artykul art_ulubione=art_ulubione-1 WHERE art_id='".$id_ogl."'");
		db_query("DELETE FROM ".$pre."ulubione WHERE u_id='".$id_del."'");
		echo ""; exit();
	}
	else
	{	
		echo "".$lang['402'].""; exit();
	}
}

if($_GET['action']=="add_fav")
{

	if($_COOKIE['idr']<>"")
	{
		$u_key=strip_tags(substr($_COOKIE['idr'],0,32));
	}
	else
	{
		$u_key=md5(time().rand(0,10000)."ulu");
		
		setcookie("idr",$u_key, time()+(86400*10));
	}

	if(is_numeric($_GET['add_id'])){}else{echo"".$lang['398']."";exit();}

	$Query='SELECT * FROM '.$pre.'ulubione  WHERE u_ogl="'.db_real_escape_string($_GET['add_id']).'" and (u_key="'.db_real_escape_string($u_key).'" or u_user="'.$_SESSION['user_id'].'") LIMIT 1'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$jest=1;
	}


	if($jest=="1")
	{
		echo "".$lang['403'].""; exit();
	}
	else
	{
		$del=md5(time().rand(0,10000)."ulu".md5($_GET['add_id']));
		
		db_query("UPDATE ".$pre."artykul art_ulubione=art_ulubione+1 WHERE art_id='".db_real_escape_string($_GET['add_id'])."'");
		db_query("INSERT INTO ".$pre."ulubione(`u_data`,`u_user`,`u_key`,`u_ogl`,`u_del`) VALUES ('".time()."','".$_SESSION['user_id']."','".db_real_escape_string($u_key)."','".db_real_escape_string($_GET['add_id'])."','".$del."')");
		
		echo "".$lang['404'].""; exit();
	}

}
   
?>