<?php
if($_SESSION['user_id']>=1 and $_SESSION['user_strona']<>$ust['adres'])
{
       $_SESSION['user_nick'] ="";
       $_SESSION['user_id'] = "";
       $_SESSION['user_typu'] ="";
       $_SESSION['logadm']="";
       $_SESSION['user_strona']=$ust['adres'];
} 

if(isset($_POST['login_user'])) 
{

	$dane = @db_query('SELECT user_login, user_haslo, user_akt FROM '.$pre.'user WHERE user_login = "'.db_real_escape_string(substr($_POST['login'],0,100)).'" AND user_haslo= "'.md5($_POST['haslo']).'" AND user_akt="1"') or die(db_error());

	
	if(db_num_rows($dane) == 1) 
	{

		$Query='SELECT * FROM '.$pre.'user WHERE user_login="'.db_real_escape_string(substr($_POST['login'],0,100)).'"'; 
		$result = db_query($Query) or die(db_error());
		while ($row = db_fetch($result)) 
		{
		   $id=$row['user_id'];
		   $_SESSION['user_nick'] = $row["user_login"];
		   $_SESSION['user_id'] = $row["user_id"];
		   $_SESSION['user_strona']=$ust['adres'];
		   if($row['user_t']=="3"){$_SESSION['logadm']="adm";}

		}
		
	$up="UPDATE ".$pre."user SET user_data_o=NOW(),user_lip='".user_ip()."' WHERE user_id='".$id."'";
	db_query($up);

	}
	else 
	{
		$_SESSION['logadm'] = 'error';
	}

	unset($_POST['login_user']);
}





?>