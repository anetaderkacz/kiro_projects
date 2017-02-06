<?php

/*

v 0.1 - 19.04.2014
http://d1php.pl

*/

if($ust['pay_typ_sms']=="1")
{

	if(!empty($get_sms['kod']))
	{
		$check = $get_sms['kod'];
		$id = '';              	
		$code = urlencode($get_sms['code']);        	
		$handle = fopen("http://sms.cashbill.pl/backcode_check.php?id=".$id."&code=".$code."&check=".$check."", 'r');
		$status = fgets($handle, 8);
		$czas_zycia = fgets($handle, 24);
		fclose($handle);
		$czas_zycia = trim($czas_zycia);

		if($status == '0')
		{
			$get_sms['status']="error"; // gdy kod błędny - wymagane
		}
		else
		{
			$get_sms['status']="ok"; // gdy kod poprawny - wymagane
		}
	}
}
else
{
//------------------DotPay------------------------

	if(!empty($get_sms['kod']))
	{
		$array = array();
		$array['code'] = $get_sms['code'];
		$array['check']= $get_sms['kod'];
		$array['id']   = $get_sms['id'];
		$array['type'] = $get_sms['typ'];
		$array['del']  = "0";
		$ch = curl_init ();
		curl_setopt ($ch, CURLOPT_URL, "https://ssl.dotpay.pl/check_code.php");
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 2);
		curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 0);
		curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt ($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt ($ch, CURLOPT_POST, 1);
		curl_setopt ($ch, CURLOPT_POSTFIELDS, $array);
		$recv = curl_exec ($ch);
		curl_close ($ch);

		$dane = explode("\n", $recv);
		$status = $dane[0];

		if($status=="1")
		{
			$get_sms['status']="ok"; // gdy kod poprawny - wymagane
		}
		else
		{
			$get_sms['status']="error"; // gdy kod błędny - wymagane
		}
	}
	
//------------------/DotPay------------------------
}

?>