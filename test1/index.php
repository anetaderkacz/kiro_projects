<?php
include("subheader.php");

$par=0;

$smarty->assign("page_start",$page_start);
$smarty->assign("page_end",$page_end);

$smarty->assign("sgi","index");

$smarty->assign("title",$ust['nazwa']);

$smarty->display($ust['templates'].'/index.tpl');

?>