<?php
include("subheader.php");

$smarty->assign("szukaj_on",$_GET['szukaj_on']);



$q="";
if($_GET['od']>=1){$sz_od=htmlspecialchars($_GET['od']); $q.="art_cena>=".$sz_od." AND ";}else{$sz_od=0;}
if($_GET['doo']>=1){$sz_do=htmlspecialchars($_GET['doo']); $q.="art_cena<=".$sz_do." AND ";}else{$sz_do=0;}
if($_GET['cat']>=1){$sz_cat=htmlspecialchars($_GET['cat']); $q.="art_cat='".$sz_cat."' AND ";}else{$sz_cat=0;}
if($_GET['q']<>"0"){$sz_q=htmlspecialchars($_GET['q']); $q.="(art_tytul  like '%".$sz_q."%' or art_tresc like '%".$sz_q."%' or art_miasto  like '%".$sz_q."%' or art_tel  like '%".$sz_q."%') AND ";}else{$sz_q=0;}
$q.=" art_akt='1' and art_oplacone='1' ".$czy_end_o."";

$smarty->assign("sz_od",$sz_od);
$smarty->assign("sz_do",$sz_do);
$smarty->assign("sz_cat",$sz_cat);
$smarty->assign("sz_q",$sz_q);

if($sz_od>"0" or $sz_do>"0" or $sz_cat>"0" or $sz_q<>"0")
{

$zapytanie = "SELECT * FROM ".$pre."artykul WHERE ".$q."  ORDER by ".$_SESSION['m_sort_sort']."";

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
$art_miasto[]=$row['art_miasto'];
$ai++;
}

}

$smarty->assign("ai",$ile_rek);

$smarty->assign("art_ocena",$art_ocena);
$smarty->assign("art_cena",$art_cena);
$smarty->assign("art_miasto",$art_miasto);
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

$smarty->assign("title",$lang[351]." - ".$ust['nazwa']);

$smarty->display($ust['templates'].'/szukaj.tpl');

?>
