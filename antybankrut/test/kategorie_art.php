<?php
include("subheader.php");

if($_GET['id']=="")
{
//---------------------------------------------------------------------


$smarty->assign("title",$lang[327].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/kategorie_art.tpl');

//---------------------------------------------------------------------
}
else
{
//---------------------------------------------------------------------

$Query='SELECT * FROM '.$pre.'cat WHERE cat_id="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
  $cat_nazwa=$row['cat_nazwa'];
  $cat_id=$row['cat_id'];
}

$zapytanie = "SELECT * FROM ".$pre."artykul WHERE art_akt='1' and art_oplacone='1' AND art_cat='".db_real_escape_string($_GET['id'])."' ".$czy_end_o." ORDER by ".$_SESSION['m_sort_sort']."";

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
$smarty->assign("cat_id",$cat_id);
$smarty->assign("cat_nazwa",$cat_nazwa);
$smarty->assign("podstron",$podstron);
$smarty->assign("strona",$strona);
$smarty->assign("a",$a);

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

$smarty->assign("title",$cat_nazwa.' - '.$lang[328].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/artykuly_lista.tpl');

//---------------------------------------------------------------------
}
?>
