<?php 

if($strona_panel!="ok"){exit();}
$blok_nazwa=$lang[335];
$smarty->assign("blok_woj_on","1");

$smarty->display($ust['templates'].'/menu.wojewodztwa_mapa.tpl');


?>
