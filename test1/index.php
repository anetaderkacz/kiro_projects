<?php
include("subheader.php");

$par=0;
$Query = "SELECT * FROM ".$pre."artykul a LEFT JOIN ".$pre."woj w ON art_woj=w_id WHERE art_akt='1' and art_oplacone='1' and art_promowane='1' ".$czy_end_o." ORDER by art_id DESC LIMIT 40";
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

	$part_tytul[]=$row['art_tytul'];
	$part_tytul_n[]=namen($row['art_tytul']);
	$part_tresc[]=substr(strip_tags($row['art_tresc']),0,250);
	$part_data[]=$row['art_data'];
	$part_autor[]=$row['art_user'];
	$part_autorn[]=namen($row['art_user']);
	$part_autorid[]=$row['art_userid'];
	$part_id[]=$row['art_id'];
	$part_cena[]=$row['art_cena'];
	$part_rd[]=$row['art_rodzaj'];
	$part_miasto[]=$row['art_miasto'];
	$part_pro[]=$row['art_promowane'];
	$part_tel[]=$row['art_tel'];
	$part_img[]=$row['art_img'];
	$part_rdo[]=$row['art_rodzajo'];
	$part_pow[]=$row['art_cenado'];
	$part_ulica[]=$row['art_ulica'];
	$part_woj[]=$row['w_nazwa'];
	$part_pokoje[]=$row['art_pokoje'];
	$part_kodp[]=$row['art_kodp'];
	$par++;
}
$smarty->assign("part_tel",$part_tel);
$smarty->assign("part_cenam",$part_cenam);
$smarty->assign("part_ulica",$part_ulica);
$smarty->assign("part_woj",$part_woj);
$smarty->assign("part_kodp",$part_kodp);
$smarty->assign("part_pokoje",$part_pokoje);
$smarty->assign("part_rdno",$part_rdno);
$smarty->assign("part_rdnno",$part_rdnno);
$smarty->assign("part_rdo",$part_rdo);
$smarty->assign("part_pow",$part_pow);
$smarty->assign("proon",$ust['proon']);
$smarty->assign("proile",$proile);
$smarty->assign("part_pro",$part_pro);
$smarty->assign("part_cena",$part_cena);
$smarty->assign("part_rdn",$part_rdn);
$smarty->assign("part_rdnn",$part_rdnn);
$smarty->assign("part_rd",$part_rd);
$smarty->assign("part_miasto",$part_miasto);
$smarty->assign("part_img",$part_img);
$smarty->assign("part_tytul",$part_tytul);
$smarty->assign("part_tytuln",$part_tytul_n);
$smarty->assign("part_tresc",$part_tresc);
$smarty->assign("part_data",$part_data);
$smarty->assign("part_autor",$part_autor);
$smarty->assign("part_autorn",$part_autorn);
$smarty->assign("part_autorid",$part_autorid);
$smarty->assign("part_id",$part_id);
$smarty->assign("par",$par);


$zapytanie = "SELECT * FROM ".$pre."artykul WHERE art_akt='1' and art_oplacone='1' ".$czy_end_o." ORDER by ".$_SESSION['m_sort_sort']."";

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
$a=0;
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
$art_pro[]=$row['art_promowane'];
$art_miasto[]=$row['art_miasto'];

$a++;
}
$smarty->assign("art_miasto",$art_miasto);
$smarty->assign("art_ocena",$art_ocena);
$smarty->assign("art_cena",$art_cena);
$smarty->assign("art_pro",$art_pro);
$smarty->assign("art_img",$art_img);
$smarty->assign("art_tytul",$art_tytul);
$smarty->assign("art_tytuln",$art_tytul_n);
$smarty->assign("art_tresc",$art_tresc);
$smarty->assign("art_data",$art_data);
$smarty->assign("art_autor",$art_autor);
$smarty->assign("art_autorn",$art_autorn);
$smarty->assign("art_autorid",$art_autorid);
$smarty->assign("art_id",$art_id);
$smarty->assign("news_id",$news_id);
$smarty->assign("podstron",$podstron);
$smarty->assign("strona",$strona);

if($_GET['strona']<=10)
{
   $page_start="0";
}
else if($_GET['strona']>10)
{
   $page_start=$_GET['strona']-10;
}

if($podstron<=15)
{
   $page_end=$podstron;
}
else
{
   $page_end=$_GET['strona']+10;
   
   if($page_end>=$podstron)
   {
      $page_end=$podstron;
   }

}

$smarty->assign("page_m",($strona-1));
$smarty->assign("page_p",($strona+1));
$smarty->assign("page_start",$page_start);
$smarty->assign("page_end",$page_end);

$smarty->assign("sgi","index");

$smarty->assign("title",$ust['nazwa']);

$smarty->display($ust['templates'].'/index.tpl');

?>
