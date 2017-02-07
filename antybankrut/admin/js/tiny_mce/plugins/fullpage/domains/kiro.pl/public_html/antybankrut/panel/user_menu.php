<?php 
include("subheader.php");

$smarty->assign("title","Menu - ".$ust['nazwa']);

$smarty->display($ust['templates'].'/user_menu.tpl');

?>
