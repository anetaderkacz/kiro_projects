<?php
include("subheader.php");

if($_POST['submit'])
{

$mail=$_POST['email'];

if($_POST['email']!="" AND $_POST['subject']!="" AND $_POST['text']!="" AND preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $mail) AND $_POST['kod']==$_SESSION['token'])
{
$subject=$_POST['subject'];

$text=$_POST['text'];
$mail=$_POST['email'];




$body = "".$mail." napisal(a): \n\n\r\r ".$text."";



if(nw_mail($mail,$ust['email'], $subject, $body, $head))
{			
	$smarty->assign("send","ok");
}
else
{
	$smarty->assign("send","error");
	$ttt=htmlspecialchars($_POST['subject']);
	$eee=htmlspecialchars($_POST['email']);
	$www=htmlspecialchars($_POST['text']);
	$smarty->assign("temail",$ttt);
	$smarty->assign("eemail",$eee);
	$smarty->assign("wemail",$www);
}

}
else
{

if(empty($_POST['email']))
{
		
  $smarty->assign("error1","pemail");

}
$mail=$_POST['email'];
if(!preg_match("/^[-0-9A-Z_\.]{1,50}@([-0-9A-Z_\.]+\.){1,50}([0-9A-Z]){2,4}$/i", $mail)){
			
  $smarty->assign("error2","ppemail");
			
}

if(empty($_POST['subject'])){
		
  $smarty->assign("error3","pt");
		
}
		
if(empty($_POST['text'])){
		
  $smarty->assign("error4","pw");
		
}

if($_POST['kod']!=$_SESSION['token']){
		
  $smarty->assign("error5","pk");
		
}

$ttt=htmlspecialchars($_POST['subject']);
$eee=htmlspecialchars($_POST['email']);
$www=htmlspecialchars($_POST['text']);
$smarty->assign("temail",$ttt);
$smarty->assign("eemail",$eee);
$smarty->assign("wemail",$www);

}

}
$smarty->assign("kontaktt",$ust['kontaktt']);
$smarty->assign("fk",$ust['fk']);
$smarty->assign("title",$lang[426].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/reklama.tpl');


?>




