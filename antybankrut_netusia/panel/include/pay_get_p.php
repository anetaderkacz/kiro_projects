<?php

/*

v 0.1 - 19.04.2014
http://d1php.pl

*/

$get_pay=array();

if($ust['pay_typ']=="1")
{
	
	$service = $ust['dotpay']; 
	$key = $ust['dotpay_pin']; 

	function check_sign($data, $key, $sign) 
	{
		if( md5( $data['service'].$data['orderid'].$data['amount'].$data['userdata'].$data['status'].$key ) == $sign ) 
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	if(check_sign( $_POST, $key, $_POST['sign'] ) && strtoupper($_POST['status']) == 'OK' && $_POST['service'] == $service )
	{
		$get_pay['status']="ok";
		$get_pay['kwota']=$_POST['amount']; //Przekaza przez cashbill.pl kwota właty - wymagane
		$get_pay['id_o']=$_POST['userdata']; // Przekazany przez cashbill.pl ID zamówienia - wymagane
	}
	else
	{
		$get_pay['status']="error";
	}
	echo 'OK';

}
else if($ust['pay_typ']=="2")
{
//------------------Transferuj------------------------

	$ip_get=$_SERVER['REMOTE_ADDR'];

	$m5=md5($_POST['id'].$_POST['tr_id'].$_POST['tr_amount'].$_POST['tr_crc'].$ust['dotpay_pin']);

	$mdpsum=$_POST['md5sum'];
	
	if($ip_get=="195.149.229.109" and $mdpsum==$m5)
	{
		$get_pay['kwota']=$_POST['tr_paid']; //Przekaza przez transferuj.pl kwota właty - wymagane
		$get_pay['id_o']=$_POST['tr_crc']; // Przekazany przez transferuj.pl ID zamówienia - wymagane
		
		if($_POST['tr_status']=="TRUE" and $_POST['tr_error']=="none")
		{
			$get_pay['status']="ok"; // Status go opłacono - wymagane
		}
		else
		{
			$get_pay['status']="error"; // Status gdy nie opłacono - wymagane
		}
		
		echo"TRUE";
	}
	else
	{
		echo"ERROR";
	}
	
//------------------/Transferuj------------------------
}
else
{
//------------------DotPay------------------------

	$ip_get=$_SERVER['REMOTE_ADDR'];

	$m5 = $ust['dotpay_pin'].':'.$ust['dotpay'].':'.$_POST['control'].':'.$_POST['t_id'].':'.$_POST['amount'].':'.$_POST['email'].':'.$_POST['service'].':'.$_POST['code'].':'.$_POST['username'].':'.$_POST['password'].':'.$_POST['t_status'];

	$m5=md5($m5);

	$mdpsum=$_POST['md5'];
	
	if($ip_get=="195.150.9.37" and $mdpsum==$m5)
	{
		$get_pay['kwota']=$_POST['amount']; //Przekaza przez dotpay.pl kwota właty - wymagane
		$get_pay['id_o']=$_POST['control']; // Przekazany przez dotpay.pl ID zamówienia - wymagane
		
		if($_POST['t_status']=="2")
		{
			$get_pay['status']="ok"; // Status go opłacono - wymagane
		}
		else
		{
			$get_pay['status']="error"; // Status gdy nie opłacono - wymagane
		}
		
		echo"OK";
	}
	else
	{
		echo"ERROR";
	}
	
//------------------/DotPay------------------------
}
?>