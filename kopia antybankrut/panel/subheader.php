<?php
session_start();
include_once("./db_connect.php");
include_once("./include/function.php");
include_once("./include/ust.php");
include_once("./include/namen.php");
include_once("./include/login.php");
include_once("./include/usersOnline.class.php");
include_once("./libs/Smarty.class.php");
include_once("./templates/".$ust['templates']."/config.php");
include_once("./include/pay_set.php");

if($_COOKIE['lang']<>"" and isset($_COOKIE['lang']) and strlen($_COOKIE['lang'])<=3 and $ust['lang_on']=="1")
{
	$u_usr['lang']=substr($_COOKIE['lang'],0,3);
}
else
{
	$u_usr['lang']=$ust['lang_d'];
}


include("lang/".$u_usr['lang']."/lang.php");

$strona_panel="ok";

$visitors_online = new usersOnline();
$user_online_ct=$visitors_online->count_users();
$smarty = new Smarty;

$smarty->caching=0;
$smarty->assign("fb_login",$ust['fb_on']);
$smarty->assign("meta_desc",$ust['meta_desc']);
$smarty->assign("meta_key",$ust['meta_key']);
$smarty->assign("meta_title",$ust['meta_title']);
$smarty->assign("lii","1");
$smarty->assign("pr_i","1");
$smarty->assign("pr_ii","2");
$smarty->assign("npr_i","1");
$smarty->assign("npr_ii","5");
$smarty->assign("g_on",$ust['g_on']);
$smarty->assign("s_on",$ust['s_on']);
$smarty->assign("pay_set",$pay_set);
$smarty->assign("pay_typ",$ust['pay_typ']);
$smarty->assign("pay_typ_sms",$ust['pay_typ_sms']);
$smarty->assign("pro_typ",$ust['pro_typ']);
$smarty->assign("ust_nazwa",$ust['nazwa']);
$smarty->assign("ust_email",$ust['email']);
$smarty->assign("ust_zglaszanie",$ust['zglaszanie']);
$smarty->assign("lang",$lang);
$smarty->assign("lang_on",$ust['lang_on']);
$smarty->assign("ust_email",$ust['email']);
$smarty->assign("cookie_on",$ust['cookie_on']);
$smarty->assign("cookie_get",$_COOKIE['cookie_off']);
$smarty->assign("site_url",$ust['adres']);
$smarty->assign("user_nick",$_SESSION['user_nick']);
$smarty->assign("user_nickn",namen($_SESSION['user_nick']));
$smarty->assign("user_id",$_SESSION['user_id']);
$smarty->assign("user_adm",$_SESSION['logadm']);
$smarty->assign("templa",$ust['templates']);
$smarty->assign("nlpi","1");
$smarty->assign("reklama_j",$ust['r_j']);
$smarty->assign("reklama_d",$ust['r_d']);
$smarty->assign("reklama_t",$ust['r_t']);
$smarty->assign("omod",$ust['omod']);
$smarty->assign("7c",$ust['7c']);
$smarty->assign("14c",$ust['14c']);
$smarty->assign("30c",$ust['30c']);
$smarty->assign("90c",$ust['90c']);
$smarty->assign("365c",$ust['365c']);
$smarty->assign("7o",$ust['7o']);
$smarty->assign("14o",$ust['14o']);
$smarty->assign("30o",$ust['30o']);
$smarty->assign("90o",$ust['90o']);
$smarty->assign("365o",$ust['365o']);
$smarty->assign("ileimg",$ust['ileimg']);
$smarty->assign("map_key",$ust['map_key']);

$smarty->assign("print",$ust['print']);

$czy_end_o=" and art_end>='".time()."'";

	if($_POST['sort_str']=="20" or $_POST['sort_str']=="50" or $_POST['sort_str']=="100")
	{
		$_SESSION['sort_str']=$_POST['sort_str'];
	}
	
	if($_POST['sort_sort']>="1" and $_POST['sort_sort']<="4")
	{
		$_SESSION['sort_sort']=$_POST['sort_sort'];
	}
	
	if($_SESSION['sort_sort']=="")
	{
		$_SESSION['sort_sort']="1";
	}

	if($_SESSION['sort_str']=="")
	{
		$_SESSION['sort_str']="20";
	}
	
	$smarty->assign("conf_sort",$_SESSION['sort_sort']);
	$smarty->assign("conf_str",$_SESSION['sort_str']);

	
	if($_SESSION['sort_sort']=="2")
	{
		$_SESSION['m_sort_sort']=" art_id ASC ";
	}
	else if($_SESSION['sort_sort']=="3")
	{
	
		$_SESSION['m_sort_sort']=" art_cena * 1 ASC ";
	}
	else if($_SESSION['sort_sort']=="4")
	{
		
		$_SESSION['m_sort_sort']=" art_cena * 1 DESC ";
	}
	else
	{
		$_SESSION['m_sort_sort']=" art_id DESC ";
	}



include("left.php");
include("right.php");
?>