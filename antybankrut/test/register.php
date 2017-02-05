<?php
include("subheader.php");

if($_POST['register']){

if($_POST['login']=="" or db_num_rows(db_query("SELECT user_login FROM ".$pre."user WHERE user_login='".db_real_escape_string($_POST['login'])."'")))
{
	$smarty->assign("l","1");
	$l=1;
}
else
{
	$l=0;
}
if(db_num_rows(db_query("SELECT user_email FROM ".$pre."user WHERE user_email='".db_real_escape_string($_POST['email'])."'")))
{
	$smarty->assign("ej","1");
	$ej=1;
}
else
{
	$ej=0;
}
if($_POST['haslo']=="")
{
 $smarty->assign("h","1");
 $h=1;
}
else
{
 $h=0;
}

if($_POST['regulamin']=="")
{
 $smarty->assign("reg","1");
 $reg=1;
}
else
{
 $reg=0;
}

if(!spremail($_POST['email']))
{
 $smarty->assign("e","1");
 $e=1;
}
else
{
 $e=0;
}

if($ust['token_r']==1)
{
 if($_POST['token']!=$_SESSION['token'])
 {
   $smarty->assign("t","1");
   $t=1;
 }
 else
 {
   $t=0;
 }
}
else
{
 $t=0;
}

if($l==0 and $h==0 and $e==0 and $t==0 and $reg==0 and $ej==0)
{

if($ust['akt_r']==0){$aktr=1;}else{$aktr=0;}

$kod=md5($_POST['login']."-".$_POST['email'].":".$_POST['haslo']);

$in="INSERT INTO ".$pre."user(`user_login`, `user_haslo`, `user_email`, `user_akt`, `user_data_r`, `user_kod`,`user_rip`)VALUES('".htmlspecialchars($_POST['login'])."', '".md5($_POST['haslo'])."', '".htmlspecialchars($_POST['email'])."', '".$aktr."', NOW(), '".$kod."','".user_ip()."')";
db_query($in);
$email=$_POST['email'];
$smarty->assign("regok","1");

if($ust['akt_r']==1)
{


$em=new Smarty();
$em->assign("adres", $ust['adres']);
$em->assign("nazwa", $ust['nazwa']);
$em->assign("kod", $kod);
$em->assign("lang",$lang);
$tresc = $em->fetch($ust['templates'].'/email.aktywacja.tpl');


$temat= $lang[348]." - ".$ust['nazwa'];
nw_mail($ust['email'],$email,$temat, $tresc, $head);

$smarty->assign("send","1");  
}
else
{
$smarty->assign("send","2"); 
}

}else{$smarty->assign("reg_error", "1");}

$smarty->assign("lt", htmlspecialchars($_POST['login']));
$smarty->assign("et", htmlspecialchars($_POST['email']));
$smarty->assign("regulamin", htmlspecialchars($_POST['regulamin']));
}



$smarty->assign("tokenr",$ust['token_r']);
$smarty->assign("rejestracja",$ust['rejestracja']);

$smarty->assign("title",$lang[349]." - ".$ust['nazwa']);

$smarty->display($ust['templates'].'/register.tpl');

?>
