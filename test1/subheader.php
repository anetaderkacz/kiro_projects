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
$smarty->assign("ust_ulubione",$ust['ulubione']);
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
$smarty->assign("fb_like",$ust['fb_like']);
$smarty->assign("nk_like",$ust['nk_like']);
$smarty->assign("gp_like",$ust['gp_like']);
$smarty->assign("wykop",$ust['wykop']);
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

if($ust['g_on']=="1")
{
	$Query = "SELECT * FROM ".$pre."artykul a LEFT JOIN ".$pre."woj w ON art_woj=w_id  WHERE art_akt='1' and art_oplacone='1'  ORDER by art_id DESC LIMIT 40";
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$npart_tytul[]=$row['art_tytul'];
		$npart_tytul_n[]=namen($row['art_tytul']);
		$npart_tresc[]=substr($row['art_tresc'],0,250);
		$npart_data[]=$row['art_data'];
		$npart_autor[]=$row['art_user'];
		$npart_autorn[]=namen($row['art_user']);
		$npart_autorid[]=$row['art_userid'];
		$npart_id[]=$row['art_id'];
		$npart_cena[]=$row['art_cena'];
		$npart_rd[]=$row['art_rodzaj'];
		$npart_rdn[]=$row['rd_nazwa'];
		$npart_rdnn[]=namen($row['rd_nazwa']);
		$npart_miasto[]=$row['art_miasto'];
		$npart_pro[]=$row['art_promowane'];
		$npart_img[]=$row['art_img'];
		$npart_rdo[]=$row['art_rodzajo'];
		$npart_rdno[]=$row['rdo_nazwa'];
		$npart_rdnno[]=namen($row['rdo_nazwa']);
		$npart_pow[]=$row['art_cenado'];
		$npart_ulica[]=$row['art_ulica'];
		$npart_woj[]=$row['w_nazwa'];
		$npart_tel[]=$row['art_tel'];
		$npart_pokoje[]=$row['art_pokoje'];
		$nproile++;
	}
	$smarty->assign("npart_cenam",$npart_cenam);
	$smarty->assign("npart_tel",$npart_tel);
	$smarty->assign("npart_ulica",$npart_ulica);
	$smarty->assign("npart_woj",$npart_woj);
	$smarty->assign("npart_pokoje",$npart_pokoje);
	$smarty->assign("npart_rdno",$npart_rdno);
	$smarty->assign("npart_rdnno",$npart_rdnno);
	$smarty->assign("npart_rdo",$npart_rdo);
	$smarty->assign("npart_pow",$npart_pow);
	$smarty->assign("nproile",$nproile);
	$smarty->assign("npart_pro",$npart_pro);
	$smarty->assign("npart_cena",$npart_cena);
	$smarty->assign("npart_rdn",$npart_rdn);
	$smarty->assign("npart_rdnn",$npart_rdnn);
	$smarty->assign("npart_rd",$npart_rd);
	$smarty->assign("npart_miasto",$npart_miasto);
	$smarty->assign("npart_img",$npart_img);
	$smarty->assign("npart_tytul",$npart_tytul);
	$smarty->assign("npart_tytuln",$npart_tytul_n);
	$smarty->assign("npart_tresc",$npart_tresc);
	$smarty->assign("npart_data",$npart_data);
	$smarty->assign("npart_autor",$npart_autor);
	$smarty->assign("npart_autorn",$npart_autorn);
	$smarty->assign("npart_autorid",$npart_autorid);
	$smarty->assign("npart_id",$npart_id);
}

if($ust['ulubione']=="1")
{		

	$u_key=strip_tags(substr($_COOKIE['idr'],0,32));
	if($u_key<>"")
	{
		$u_key=strip_tags(substr($_COOKIE['idr'],0,32));
	}
	else
	{
		$u_key="FD#$T%YUgh5";
	}

	if($_SESSION['user_id']>=1)
	{
		$ul_user=$_SESSION['user_id'];
	}
	else
	{
		$ul_user="342342653";
	}

	$ar_ul=array();
	$ar_ul_del=array();

	$mQuery2kq="SELECT * FROM ".$pre."ulubione WHERE u_user='".$ul_user."' or u_key='".db_real_escape_string($u_key)."' ORDER by u_id ASC"; 
	$mresult2kq = db_query($mQuery2kq) or die(db_error());
	while ($row = db_fetch($mresult2kq)) 
	{
		$ar_ul[]=$row['u_ogl'];
		$ar_ul_del[$row['u_ogl']]=$row['u_del'];
	}

	$smarty->assign("ar_ul",$ar_ul);
	$smarty->assign("ar_ul_del",$ar_ul_del);
}

$Query2kq='SELECT * FROM '.$pre.'cat ORDER by  cat_nazwa ASC'; 
$result2kq = db_query($Query2kq) or die(db_error());
while ($row2kq = db_fetch($result2kq)) 
{
	$fcatnazwaq[]=$row2kq['cat_nazwa'];
	$fcatnazwanq[]=namen($row2kq['cat_nazwa']);
	$fcatileq[]=$row2kq['cat_ile'];
	$fcatidq[]=$row2kq['cat_id'];
	$fcatpodq[]=$row2kq['cat_pod'];
}


$smarty->assign("fcatnazwaq",$fcatnazwaq);
$smarty->assign("fcatnazwanq",$fcatnazwanq);
$smarty->assign("fcatileq",$fcatileq);
$smarty->assign("fcatgq",$fcatgq);
$smarty->assign("fcatidq",$fcatidq);
$smarty->assign("fcatpodq",$fcatpodq);
include("left.php");
include("right.php");
?>