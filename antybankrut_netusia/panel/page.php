<?php
include("subheader.php");



$Query = "SELECT * FROM ".$pre."strony WHERE strony_wys='1' AND strony_id='".db_real_escape_string($_GET['id'])."' ORDER by strony_id DESC";
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

$page_nazwa=$row['strony_nazwa'];
$page_id=$row['strony_id'];
$page_nazwa_n=namen($row['strony_nazwa']);
$page_tresc=$row['strony_tresc'];
$wys=$row['strony_wys'];

}

if($wys==1)
{

$smarty->assign("page_nazwa",$page_nazwa);
$smarty->assign("page_nazwa_n",$page_nazwa_n);
$smarty->assign("page_tresc",$page_tresc);
$smarty->assign("page_id",$page_id);

$smarty->assign("title",$page_nazwa.' - '.$ust['nazwa']);
}


$smarty->display($ust['templates'].'/page.tpl');

?>
