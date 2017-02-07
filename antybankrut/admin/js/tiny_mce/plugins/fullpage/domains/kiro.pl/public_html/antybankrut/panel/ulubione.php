<?php 
include("subheader.php");

$smarty->assign("page_f","ulu");
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

$zapytanie = "SELECT * FROM ".$pre."ulubione LEFT JOIN ".$pre."artykul ON art_id=u_ogl  WHERE u_user='".$ul_user."' or u_key='".db_real_escape_string($u_key)."'  ORDER by ".$_SESSION['m_sort_sort']."";

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
	$nam="";

	$art_tytul[]=$row['art_tytul'];
	$art_tytul_n[]=namen($row['art_tytul']);
	$art_tresc[]=substr(strip_tags($row['art_tresc']),0,250);
	$art_data[]=$row['art_data'];
	$art_autor[]=$row['art_user'];
	$art_autorn[]=namen($row['art_user']);
	$art_autorid[]=$row['art_userid'];
	$art_id[]=$row['art_id'];
	$art_cena[]=$row['art_cena'];
	$art_rd[]=$row['art_rodzaj'];
	$art_rdn[]=$row['rd_nazwa'];
	$art_rdnn[]=namen($row['rd_nazwa']);
	$art_miasto[]=$row['art_miasto'];
	$art_pro[]=$row['art_promowane'];
	$art_img[]=$row['art_img'];
	$art_typn[]=$row['art_typn'];
	$art_stant[]=$row['art_stant'];
	$art_rodzajp[]=$row['art_rodzajp'];
	$art_skrzyniab[]=$row['art_skrzyniab'];
	$art_liczbad[]=$row['art_liczbad'];
	$art_przebieg[]=$row['art_przebieg'];
	$art_rokp[]=$row['art_rokp'];
	$art_pojemnosc[]=$row['art_pojemnosc'];
	$art_moc[]=$row['art_moc'];
	$art_del[]=$row['u_del'];
	$art_woj[]=get_user_woj($row['art_woj']);

	$a++;
}
$smarty->assign("art_typn",$art_typn);
$smarty->assign("art_stant",$art_stant);
$smarty->assign("art_rodzajp",$art_rodzajp);
$smarty->assign("art_skrzyniab",$art_skrzyniab);
$smarty->assign("art_liczbad",$art_liczbad);
$smarty->assign("art_przebieg",$art_przebieg);
$smarty->assign("art_rokp",$art_rokp);
$smarty->assign("art_pojemnosc",$art_pojemnosc);
$smarty->assign("art_moc",$art_moc);
$smarty->assign("strona_get","index");
$smarty->assign("art_pro",$art_pro);
$smarty->assign("art_woj",$art_woj);
$smarty->assign("art_del",$art_del);
$smarty->assign("art_cena",$art_cena);
$smarty->assign("art_rdn",$art_rdn);
$smarty->assign("art_rdnn",$art_rdnn);
$smarty->assign("art_rd",$art_rd);
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
$smarty->assign("a",$a);
$smarty->assign("page_m",($strona-1));
$smarty->assign("page_p",($strona+1));
$smarty->assign("page_start",$page_start);
$smarty->assign("page_end",$page_end);

$smarty->assign("title",$ust['nazwa']);

$smarty->display($ust['templates'].'/ulubione.tpl');

?>
