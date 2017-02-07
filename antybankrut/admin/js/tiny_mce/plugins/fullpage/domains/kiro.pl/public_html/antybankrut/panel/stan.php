<?php
include("subheader.php");


$smarty->assign("stan",$_GET['stan']);

$smarty->assign("stan_id",$_GET['id']);

$smarty->assign("title",$ust['nazwa']);

$smarty->display($ust['templates'].'/stan.tpl');

?>
