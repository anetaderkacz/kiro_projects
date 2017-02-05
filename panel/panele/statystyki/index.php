<?php

if($strona_panel!="ok"){exit();}
$blok_nazwa=$lang[333];
$smarty->assign("online_user",user_online());
$smarty->assign("online_userl",user_login_online());

   $count = db_num_rows ( db_query("SELECT art_id,art_akt,art_oplacone FROM ".$pre."artykul WHERE art_akt='1' and art_oplacone='1'"));

     $smarty->assign("stat_ogl",$count);


$smarty->display($ust['templates'].'/menu.statystyki.tpl');


?>
