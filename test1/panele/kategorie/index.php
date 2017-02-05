<?php

if($strona_panel!="ok"){exit();}
$blok_nazwa=$lang[330];

$Query2k='SELECT * FROM '.$pre.'cat ORDER by  cat_nazwa ASC'; 
$result2k = db_query($Query2k) or die(db_error());
while ($row = db_fetch($result2k)) 
{

$c_nazwa[]=$row['cat_nazwa'];
$c_nazwan[]=namen($row['cat_nazwa']);
$c_id[]=$row['cat_id'];
$c_pod[]=$row['cat_pod'];
$c_count[] = db_num_rows ( db_query("SELECT * FROM ".$pre."artykul WHERE art_cat='".$row['cat_id']."' and art_akt='1'"));

}

$smarty->assign("c_nazwa",$c_nazwa);
$smarty->assign("c_nazwan",$c_nazwan);
$smarty->assign("c_id",$c_id);
$smarty->assign("c_pod",$c_pod);
$smarty->assign("c_count",$c_count);

$smarty->assign("cpo",$_GET['pod']);
$smarty->assign("cpi",$_GET['id_cat']);

$smarty->display($ust['templates'].'/menu.kategorie.tpl');


?>
