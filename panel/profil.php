<?php
include("subheader.php");


$Query='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
$login=$row['user_login'];
$smarty->assign("login",$row['user_login']);
$smarty->assign("id",$row['user_id']);
$smarty->assign("datar",$row['user_data_r']);
$smarty->assign("datao",$row['user_data_o']);
$smarty->assign("ue",$row['user_ue']);
$smarty->assign("plec",$row['user_plec']);
if($row[user_y]!="" and $row[user_y]!="0"){$smarty->assign("wiek",(date("Y")-$row['user_y']));}
$smarty->assign("d",$row['user_d']);
$smarty->assign("m",$row['user_m']);
$smarty->assign("y",$row['user_y']);
$smarty->assign("email",$row['user_email']);
$smarty->assign("www",$row['user_www']);
$smarty->assign("gg",$row['user_gg']);
$smarty->assign("omnie",nl2br($row['user_omnie']));
$smarty->assign("img",$row['user_fotka']);
$smarty->assign("allegro",$row['user_allegro']);
$smarty->assign("ebay",$row['user_ebay']);
$smarty->assign("swistak",$row['user_swistak']);
}



$zapytanie = "SELECT * FROM ".$pre."artykul WHERE art_akt='1' and art_oplacone='1' and art_userid='".db_real_escape_string($_GET['id'])."' ".$czy_end_o." ORDER by ".$_SESSION['m_sort_sort']."";

if(!$strona){
$nr=$_GET["strona"];
if($nr==0)
{
$nr=1;
}

$strona=$nr;
}


$ile=$ust['ile_str'];

$start=($strona-1)*$ile;     

$wykonaj = db_query($zapytanie) or Die("Nie działa zapytanie". $zapytanie);
$ile_rek = db_num_rows($wykonaj);

$podstron = ceil($ile_rek/$ile);

$zapytanie.= " LIMIT $start,$ile";    

$final = db_query($zapytanie) or Die ("Nie działa zapytanie końcowe");
$ai=0;
while ($row = db_fetch($final)) 
{

$art_tytul[]=str_rep("amp",$row['art_tytul']);
$art_tytul_n[]=namen($row['art_tytul']);
$art_tresc[]=substr(strip_tags($row['art_tresc']),0,250);
$art_data[]=$row['art_data'];
$art_autor[]=$row['art_user'];
$art_autorn[]=namen($row['art_user']);
$art_autorid[]=$row['art_userid'];
$art_id[]=$row['art_id'];
$art_img[]=$row['art_img'];
$art_ocena[]=$row['art_ocena'];
$art_cena[]=$row['art_cena'];

$ai++;
}
$smarty->assign("ai",$ai);
$smarty->assign("art_ocena",$art_ocena);
$smarty->assign("art_cena",$art_cena);

$smarty->assign("art_img",$art_img);
$smarty->assign("art_tytul",$art_tytul);
$smarty->assign("art_tytuln",$art_tytul_n);
$smarty->assign("art_tresc",$art_tresc);
$smarty->assign("art_data",$art_data);
$smarty->assign("art_autor",$art_autor);
$smarty->assign("art_autorn",$art_autorn);
$smarty->assign("art_autorid",$art_autorid);
$smarty->assign("art_id",$art_id);

$smarty->assign("title",$login.' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/profil.tpl');

?>
