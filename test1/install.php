<?php
session_start();
@error_reporting(E_ALL ^ E_NOTICE);
?>
<html>
<head>
<title>Instalacja ogłoszenia 1.x</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body >
<?php



$l_i_info='<div><div style="width:400px;margin:0 auto;color:white;background:#ff0a0a;padding:5px;">Pamiętaj by zmienić prawa do pliku <b>db_connect.php</b> na <b>777</b></div></div>';
$l_i_end='<div style="color:white;background:green;padding:5px;"><b>Instalacja zakończona powodzeniem</b></div>';
$l_i_end2='<div style="color:red;background:#ff0a0a;color:white;padding:5px;"><b>Instalacja zakończona niepowodzeniem</b></div><br><a href="install.php?step=2"><b>Ponów instalacje</b></a><br><br>';
$l_i_zch='<div style="color:red;background:#ff0a0a;color:white;padding:5px;">Pamiętaj by zmienić prawa do pliku <b>db_connect.php</b> na <b>644</b></div><br>';
$l_i_adm ='<b><a href="admin/">Panel administracyjny</a> - ';
$l_i_ind='<a href="index.php">Strona Główna</a><br><br></b>';
$l_i_ind2="";

$pole1 = trim($_POST['pole1']); 
$pole2 = trim($_POST['pole2']); 
$pole3 = trim($_POST['pole3']); 
$pole4 = trim($_POST['pole4']); 
$pole5 = trim($_POST['pole5']);
$pole6 = trim($_POST['pole6']);
$adres = $_POST['adres'];
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$pre=$_POST['pre'];



if(empty($pole1) and empty($pole2)) 
{ 

	if(function_exists('mysql_connect')=="1" or function_exists('mysqli_connect')=="1")
	{
	}
	else
	{
		echo'<br><center><b style="color:red;">Skrypt wymaga modułu <a href="http://www.php.net/manual/pl/set.mysqlinfo.php">MySQL</a> lub <a href="http://www.php.net/manual/en/book.mysqli.php">MySQLi</a> aby połączyć się z bazą danych. </b></center><br>';
		exit();
	}
	if(ini_get("mysql.default_port"))
	{
		$port_mysql=ini_get("mysql.default_port");
	}
	else
	{
		$port_mysql=3306;
	}
	
	if(ini_get("mysql.default_host"))
	{
		$host_mysql=ini_get("mysql.default_host");
	}
	else
	{
		$host_mysql="localhost";
	}

	if($_SERVER[HTTP_HOST]<>"" and $_SERVER[PHP_SELF]<>"")
	{
		$site_url='http://'.$_SERVER[HTTP_HOST].''.$_SERVER[PHP_SELF];
		$site_url=str_replace("install.php","",$site_url);
	}
	else
	{
		$site_url='http://adres-strony.pl/';
	}
echo '
<center>
'.$l_i_info.'
<br>
<form action="" method="post">
<table bgcolor="gray" align="center">
<tr>
<td valign="top">Adres:</td>
<td>
<input type=text name="adres" value="'.$site_url.'"  size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Adres strony koniecznie z końcowym /">
</td>
</tr>
<tr>
<td valign="top">MySQL host:</td>
<td> 
<input type=text name="pole1" value="'.$host_mysql.'" size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Przed instalacją należy się upewnić czy podany host do bazy danych jest poprawny.">
</td> 
</tr>
<tr>
<td valign="top">MySQL port:</td>
<td> 
<input type=text name="pole6" value="'.$port_mysql.'" size="10"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Port do połączenia z bazą danych">
</td> 
</tr>
<tr>
<td valign="top">Prefix:</td>
<td> 
<input type=text name="pre" value="ogl_" size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Przedrostek tabel. Przy instalacji w jednej bazie kilku skryptów należy podać inny prefix.">
</td> 
</tr>
<tr>
<td valign="top">Nazwa użytkownika bazy:</td>
<td>
<input type=text name="pole2" size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Login do bazy danych">
</td>
</tr>
<tr>
<td valign="top">Hasło do bazy:</td>
<td>
<input type="password" name="pole3" size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Hasło do bazy danych">
</td>
</tr>
<tr>
<td valign="top">Nazwa bazy:</td>
<td>
<input type=text name="pole4"  size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Nazwa bazy dancyh">
</td>
</tr>
<tr>
<td valign="top">Login admina:</td>
<td>
<input type=text name="login"  size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Należy podać login do panelu administracyjnego. Login można podać dowolny.">
</td>
</tr>
<tr>
<td valign="top">Hasło admina:</td>
<td>
<input type="password" name="haslo" size="50"><img style="margin:0px 5px 0 5px;" src="admin/style/images/faq16.png" title="Należy podać hasło do panelu administracyjnego. Hasło można podać dowolne.">
</td>
</tr>
</table><br>
<input type="submit" value="Instaluj" /> 
</form>

</center>
'; 
} else { 
      
if(function_exists('mysqli_connect')=="1")
{
	$con_typ="mysqli";
}
else
{
	$con_typ="mysql";
}

$dane ='<?php

@error_reporting(E_ALL ^ E_NOTICE);

$db_function_typ="'.$con_typ.'";

include_once("include/db_function.php");

//Host - login - hasło - nazwa bazy danych
$db_connect = db_connect("'.$pole1.'", "'.$pole2.'", "'.$pole3.'","'.$pole4.'",'.$pole6.');

db_query("SET CHARACTER SET utf8");

//Prefix tabel
$pre="'.$pre.'";

//Do zmienej install nalezy podac "ok" gdy skrypt jest zainstalowany
$install="ok";

include_once("include/safe.php");

?>'; 


    $file = "db_connect.php"; 
    $fp = fopen($file, "w"); 
    fwrite($fp, $dane); 
    fclose($fp); 


$instalok=0;


echo'<table bgcolor="gray" align="center">';
echo"<tr>";
echo'<td align="left">';

require_once("db_connect.php");

$pyt = "CREATE TABLE `".$pre."artykul` (
  `art_id` int(11) NOT NULL auto_increment,
  `art_tytul` text NOT NULL,
  `art_tresc` text NOT NULL,
  `art_data` datetime NOT NULL default '0000-00-00 00:00:00',
  `art_cat` int(11) NOT NULL default '0',
  `art_view` int(11) NOT NULL default '0',
  `art_ile` int(11) NOT NULL default '0',
  `art_ileg` int(11) NOT NULL default '0',
  `art_ocena` float NOT NULL default '0',
  `art_wys` int(11) NOT NULL default '0',
  `art_ilek` int(11) NOT NULL default '0',
  `art_glosy` int(11) NOT NULL default '0',
  `art_userid` int(11) NOT NULL default '0',
  `art_user` text NOT NULL,
  `art_cena` text NOT NULL,
  `art_demo` text NOT NULL,
  `art_img` text NOT NULL,
  `art_akt` int(11) NOT NULL default '0',
  `art_dni` int(11) NOT NULL default '0',
  `art_end` int(11) NOT NULL default '0',
  `art_woj` int(11) NOT NULL default '0',
  `art_miasto` text NOT NULL,
  `art_tel` text NOT NULL,
  `art_email` text NOT NULL,
  `art_oplacone` int(11) NOT NULL default '0',
  `art_promowane` text NOT NULL,
  `art_koszt` text NOT NULL,
  `art_x` text NOT NULL,
  `art_y` text NOT NULL,
  `art_zoom` text NOT NULL,
  `art_dniid` text NOT NULL,
  `art_tim` text NOT NULL,
  `art_del` text NOT NULL,
  `art_dod` text NOT NULL,
  `art_prop` text NOT NULL,
  PRIMARY KEY  (`art_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela artykul</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela artykul</b> - <font color="red"><b>Error</b></font><br>';
}


$pyt = "CREATE TABLE IF NOT EXISTS `".$pre."dni` (
  `dni_id` int(11) NOT NULL AUTO_INCREMENT,
  `dni_dni` int(11) NOT NULL,
  `dni_cena` text NOT NULL,
  `dni_kod` text NOT NULL,
  `dni_numer` text NOT NULL,
  `dni_tresc` text NOT NULL,
  `dni_czas` text NOT NULL,
  `dni_cenasms` text NOT NULL,
  PRIMARY KEY (`dni_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela dni</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela dni</b> - <font color="red"><b>Error</b></font><br>';
}


$pyt = "CREATE TABLE `".$pre."cat` (
  `cat_id` int(11) NOT NULL auto_increment,
  `cat_nazwa` text NOT NULL,
  `cat_ile` int(11) NOT NULL default '0',
  `cat_pod` int(11) NOT NULL default '0',
  PRIMARY KEY  (`cat_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela cat</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela cat</b> - <font color="red"><b>Error</b></font><br>';
}
	

$pyt = "CREATE TABLE `".$pre."faq` (
  `faq_id` int(11) NOT NULL auto_increment,
  `faq_nazwa` text NOT NULL,
  `faq_tresc` text NOT NULL,
  PRIMARY KEY  (`faq_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela faq</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela faq</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."img` (
  `img_id` int(11) NOT NULL auto_increment,
  `img_cat` int(11) NOT NULL default '0',
  `img_fm` text NOT NULL,
  `img_fd` text NOT NULL,
  `img_data` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`img_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela img</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela img</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."komentarze` (
  `kom_id` int(11) NOT NULL auto_increment,
  `kom_idk` int(11) NOT NULL default '0',
  `kom_nick` text NOT NULL,
  `kom_data` datetime NOT NULL default '0000-00-00 00:00:00',
  `kom_tresc` text NOT NULL,
  `kom_typ` text NOT NULL,
  `kom_idu` int(11) NOT NULL default '0',
  PRIMARY KEY  (`kom_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela komentarze</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela komentarze</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."menu` (
  `menu_id` int(11) NOT NULL auto_increment,
  `menu_nazwa` text NOT NULL,
  `menu_nr` int(11) NOT NULL default '0',
  `menu_s` int(11) NOT NULL default '0',
  `menu_tresc` text NOT NULL,
  `menu_wys` int(11) NOT NULL default '0',
  `menu_t` text NOT NULL,
  PRIMARY KEY  (`menu_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela menu</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela menu</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."news` (
  `news_id` int(11) NOT NULL auto_increment,
  `news_tytul` text NOT NULL,
  `news_tresc` text NOT NULL,
  `news_data` datetime NOT NULL default '0000-00-00 00:00:00',
  `news_view` int(11) NOT NULL default '0',
  `news_ile` int(11) NOT NULL default '0',
  `news_ileg` int(11) NOT NULL default '0',
  `news_ocena` float NOT NULL default '0',
  `news_wys` int(11) NOT NULL default '0',
  `news_ilek` int(11) NOT NULL default '0',
  `news_glosy` int(11) NOT NULL default '0',
  `news_userid` int(11) NOT NULL default '0',
  `news_user` text NOT NULL,
  PRIMARY KEY  (`news_id`)
) ";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela news</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela news</b> - <font color="red"><b>Error</b></font><br>';
}


$pyt = "CREATE TABLE `".$pre."strony` (
  `strony_id` int(11) NOT NULL auto_increment,
  `strony_nazwa` text  NOT NULL,
  `strony_tresc` text  NOT NULL,
  `strony_wys` int(11) NOT NULL default '0',
  `strony_view` int(11) NOT NULL default '0',
  PRIMARY KEY  (`strony_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela strony</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela strony</b> - <font color="red"><b>Error</b></font><br>';
}


$pyt = "CREATE TABLE `".$pre."ustawienia` (
  `ust_id` int(11) NOT NULL auto_increment,
  `ust_nazwa` text NOT NULL,
  `ust_email` text NOT NULL,
  `ust_adres` text NOT NULL,
  `ust_cache` int(11) NOT NULL default '0',
  `ust_nocena` int(11) NOT NULL default '0',
  `ust_nkomentarze` int(11) NOT NULL default '0',
  `ust_aocena` int(11) NOT NULL default '0',
  `ust_akomentarze` int(11) NOT NULL default '0',
  `ust_ilen` int(11) NOT NULL default '0',
  `ust_templates` text NOT NULL,
  `ust_r` text NOT NULL,
  `ust_g` text NOT NULL,
  `ust_b` text NOT NULL,
  `ust_ft` text NOT NULL,
  `ust_st` text NOT NULL,
  `ust_ont` text NOT NULL,
  `ust_fdj` text NOT NULL,
  `ust_fmj` text NOT NULL,
  `ust_fd` text NOT NULL,
  `ust_fm` text NOT NULL,
  `ust_tc` text NOT NULL,
  `ust_og` int(11) NOT NULL default '0',
  `ust_kg` int(11) NOT NULL default '0',
  `ust_tg` int(11) NOT NULL default '0',
  `ust_tn` int(11) NOT NULL default '0',
  `ust_ta` int(11) NOT NULL default '0',
  `ust_fk` int(11) NOT NULL default '0',
  `ust_kontakt_dane` text NOT NULL,
  `ust_edytor` int(11) NOT NULL default '0',
  `ust_token_r` int(11) NOT NULL default '0',
  `ust_register` int(11) NOT NULL default '0',
  `ust_akt_r` int(11) NOT NULL default '0',
  `ust_regulamin` text NOT NULL,
  `ust_mod` int(11) NOT NULL default '0',
  `ust_7o` int(11) NOT NULL default '0',
  `ust_7c` text NOT NULL,
  `ust_14o` int(11) NOT NULL default '0',
  `ust_14c` text NOT NULL,
  `ust_30o` int(11) NOT NULL default '0',
  `ust_30c` text NOT NULL,
  `ust_90o` int(11) NOT NULL default '0',
  `ust_90c` text NOT NULL,
  `ust_365o` int(11) NOT NULL default '0',
  `ust_365c` text NOT NULL,
  `ust_dotpay` text NOT NULL,
  `ust_dotpay_sms` text NOT NULL,
  `ust_dotpay_pin` text NOT NULL,
  `ust_ileimg` text NOT NULL,
  `ust_fb_like` int(11) NOT NULL default '0',
  `ust_gp_like` int(11) NOT NULL default '0',
  `ust_nk_like` int(11) NOT NULL default '0',
  `ust_wykop` int(11) NOT NULL default '0',
  `ust_print` int(11) NOT NULL default '0',
  `ust_map_key` text NOT NULL,
  `ust_pay_typ` text NOT NULL,
  `ust_r_j` text NOT NULL,
  `ust_r_d` text NOT NULL,
  `ust_r_t` text NOT NULL,
  `ust_proon` int(11) NOT NULL DEFAULT '0',
  `ust_procena` text NOT NULL,
  `ust_cookie_on` text NOT NULL,
  `ust_add_on` text NOT NULL,
  `ust_ile_str` int(11) NOT NULL DEFAULT '0',
  `ust_ogl_c` int(11) NOT NULL DEFAULT '0',
  `ust_lang_on` int(11) NOT NULL DEFAULT '0',
  `ust_lang_d` text NOT NULL,
  `ust_g_on` int(11) NOT NULL default '0',
  `ust_s_on` int(11) NOT NULL default '0',
  `ust_pro_typ` int(11) NOT NULL default '0',
  `ust_pay_typ_sms` int(11) NOT NULL default '0',
  `ust_meta_desc` text NOT NULL,
  `ust_meta_key` text NOT NULL,
  `ust_meta_title` text NOT NULL,
  `ust_pay_dod` text NOT NULL,
  `ust_email_login` text NOT NULL,
  `ust_email_pas` text NOT NULL,
  `ust_email_host` text NOT NULL,
  `ust_email_port` text NOT NULL,
  `ust_email_uw` text NOT NULL,
  PRIMARY KEY  (`ust_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela ustawienia</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela ustawiania</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."pw` (
  `pw_id` int(11) NOT NULL auto_increment,
  `pw_tytul` text NOT NULL,
  `pw_data` datetime NOT NULL default '0000-00-00 00:00:00',
  `pw_tresc` text NOT NULL,
  `pw_do` int(11) NOT NULL default '0',
  `pw_od` int(11) NOT NULL default '0',
  `pw_czyt` int(11) NOT NULL default '0',
  `pw_typ` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pw_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela pw</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela pw</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."user` (
  `user_id` int(11) NOT NULL auto_increment,
  `user_login` text NOT NULL,
  `user_haslo` text NOT NULL,
  `user_email` text NOT NULL,
  `user_data_r` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_d` int(11) NOT NULL default '0',
  `user_m` int(11) NOT NULL default '0',
  `user_y` int(11) NOT NULL default '0',
  `user_plec` int(11) NOT NULL default '0',
  `user_akt` int(11) NOT NULL default '0',
  `user_t` int(11) NOT NULL default '1',
  `user_kod` text NOT NULL,
  `user_omnie` text NOT NULL,
  `user_gg` int(11) NOT NULL default '0',
  `user_www` text NOT NULL,
  `user_fotka` text NOT NULL,
  `user_ue` int(11) NOT NULL default '1',
  `user_data_o` datetime NOT NULL default '0000-00-00 00:00:00',
  `user_allegro` text NOT NULL,
  `user_ebay` text NOT NULL,
  `user_swistak` text NOT NULL,
  `user_knh` text NOT NULL,
  PRIMARY KEY  (`user_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela user</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela user</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."fotki` (
  `f_id` int(11) NOT NULL auto_increment,
  `f_m` text NOT NULL,
  `f_d` text NOT NULL,
  `f_a` int(11) NOT NULL,
  PRIMARY KEY  (`f_id`)
) ";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela fotki</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela fotki</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."useronline` (
  `id` int(10) NOT NULL auto_increment,
  `ip` varchar(15) NOT NULL default '',
  `timestamp` varchar(15) NOT NULL default '',
  `user_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela useronline</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela useronline</b> - <font color="red"><b>Error</b></font><br>';
}
$pyt = "CREATE TABLE `".$pre."woj` (
  `w_id` int(11) NOT NULL auto_increment,
  `w_nazwa` text NOT NULL,
  `w_ile` int(11) NOT NULL default '0',
  PRIMARY KEY  (`w_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela woj</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela woj</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt ="INSERT INTO `".$pre."ustawienia` VALUES (1, 'Ogloszenia', 'email@email.pl', '".$adres."', 0, 1, 1, 1, 2, 3, 'blu', '0', '51', '255', '', '19', '1', '100', '100', '800', '100', '#0000FF', 1, 1, 1, 1, 0, 1, '', 1, 1, 1, 1, '0', 1, 1, '', 1, '2', 1, '3', 1, '4', 1, '5', '123','','','10',0,0,0,0,1,'','0','','','',0,'','1','1','10','0','0','pl',0,0,0,0,'','','','','','','','','');";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Zapis do tabeli ustawienia</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Zapis do tabeli ustawienia</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt ="INSERT INTO `".$pre."user` VALUES (1, '".$login."', '".md5($haslo)."', 'adm@adm.pl', NOW(), 0, 0, 0, 0, 1, 3, '', '', 34234, '', '', 0, NOW(), '', '', '','');";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Dodanie admina</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Dodanie admina</b> - <font color="red"><b>Error</b></font><br>';
}



$pyt ="INSERT INTO `".$pre."menu` VALUES (2, 'Kategorie', 1, 1, '', 1, 'kategorie');";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Dodanie menu - kategorie</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Dodanie menu - kategorie</b> - <font color="lime"><b>OK</b></font><br>';
}


$pyt ="INSERT INTO `".$pre."menu` VALUES (4, 'Statystyki', 3, 1, '', 1, 'statystyki');";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Dodanie menu - statystyki</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Dodanie menu - statystyki</b> - <font color="lime"><b>OK</b></font><br>';
}


$pyt ="INSERT INTO `".$pre."menu` VALUES (5, 'Województwa', 2, 1, '', 1, 'wojewodztwa_mapa');";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Dodanie menu - woj</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Dodanie menu - woj</b> - <font color="lime"><b>OK</b></font><br>';
}
$pyt ="
INSERT INTO `".$pre."woj` (`w_id`, `w_nazwa`, `w_ile`) VALUES 
(1, 'Dolnośląskie', 0),
(2, 'Kujawsko-pomorskie', 0),
(3, 'Lubelskie', 0),
(4, 'Lubuskie', 0),
(5, 'Łódzkie', 0),
(6, 'Małopolskie', 0),
(7, 'Mazowieckie', 0),
(8, 'Opolskie', 0),
(9, 'Podkarpackie', 0),
(10, 'Podlaskie', 0),
(11, 'Pomorskie', 0),
(12, 'Śląskie', 0),
(13, 'Świętokrzyskie', 0),
(14, 'Warmińsko-mazurskie', 0),
(15, 'Wielkopolskie', 0),
(16, 'Zachodniopomorskie', 0);";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Dodanie - woj</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Dodanie - woj</b> - <font color="lime"><b>OK</b></font><br>';
}
//new0021

db_query("ALTER TABLE ".$pre."artykul ADD art_ip text;");
db_query("ALTER TABLE ".$pre."artykul ADD art_ulubione text;");
db_query("ALTER TABLE ".$pre."user ADD user_rip text;");
db_query("ALTER TABLE ".$pre."user ADD user_lip text;");
db_query("ALTER TABLE ".$pre."ustawienia ADD ust_ulubione int(11) NOT NULL default '0';");
db_query("ALTER TABLE ".$pre."ustawienia ADD ust_zglaszanie int(11) NOT NULL default '0';");
db_query("ALTER TABLE ".$pre."user ADD user_lip text NOT NULL;");

db_query("ALTER TABLE ".$pre."user ADD user_rip text NOT NULL;");

db_query("ALTER TABLE ".$pre."user ADD user_fb text NOT NULL;");

db_query("ALTER TABLE ".$pre."ustawienia ADD ust_fb_se text NOT NULL;");

db_query("ALTER TABLE ".$pre."ustawienia ADD ust_fb_id text NOT NULL;");

db_query("ALTER TABLE ".$pre."ustawienia ADD ust_fb_on text NOT NULL;");

$pyt = "CREATE TABLE `".$pre."zgloszenia` (
  `z_id` int(11) NOT NULL auto_increment,
  `z_data` text NOT NULL,
  `z_user` text NOT NULL,
  `z_tresc` text NOT NULL,
  `z_ogl` text NOT NULL,
  `z_ip` text NOT NULL,
  PRIMARY KEY  (`z_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela zgloszenia</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela zgloszenia</b> - <font color="red"><b>Error</b></font><br>';
}

$pyt = "CREATE TABLE `".$pre."ulubione` (
  `u_id` int(11) NOT NULL auto_increment,
  `u_data` text NOT NULL,
  `u_user` text NOT NULL,
  `u_key` text NOT NULL,
  `u_ogl` text NOT NULL,
  `u_del` text NOT NULL,
  PRIMARY KEY  (`u_id`)
)";
$odp = db_query($pyt);

if($odp) 
{
echo'<b>Tabela zgloszenia</b> - <font color="lime"><b>OK</b></font><br>';
$instalok++;
}
else
{
echo'<b>Tabela zgloszenia</b> - <font color="red"><b>Error</b></font><br>';
}

//new0021


echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td align='center'>";
echo"<hr>";

if($instalok==23)
{
echo $l_i_end;
echo $l_i_zch;
echo $l_i_adm;
echo $l_i_ind;
}
else
{
echo $l_i_end2;
}
echo $l_i_ind2;


echo"</td>";
echo"</tr>";
echo"</table>";
 


}
?>
</body>
</html>