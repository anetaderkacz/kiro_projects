<?php

function nw_mail($m_od,$m_do,$m_tytul,$m_tresc,$m_head,$m_inc='null')
{
	global $ust;
	
	if($ust['email_login']<>"")
	{
		if($m_inc=="null")
		{
			require_once('include/phpmail/class.phpmailer.php');
			require_once('include/phpmail/class.smtp.php');
		}
		
		$mail             = new PHPMailer();
		$mail->IsSMTP(); 
		$mail->SMTPDebug  = 0;                    
		$mail->SMTPAuth   = true;              
		if($ust['email_uw']<>""){$mail->SMTPSecure = $ust['email_uw'];}		
		$mail->Host       = $ust['email_host']; 
		$mail->Port       = $ust['email_port'];                    
		$mail->Username   = $ust['email_login']; 
		$mail->Password   = $ust['email_pas'];       
		$mail->CharSet = "UTF-8";
		$mail->SetFrom($ust['email'],$ust['email']);
		$mail->AddReplyTo($m_od,$m_od);
		$mail->Subject    = $m_tytul;
		$mail->MsgHTML($m_tresc);
		$mail->AddAddress($m_do, $m_do);

		if($mail->Send())
		{			
			return 1;
		}
		else
		{
			return 0;
		}
	}
	else
	{
	
		$head = "From: ".$m_od."";
		$head .= "\r\n";
		$head .= "Content-type: text/html; charset=UTF-8\r\n";
		
		$m_tytul="=?UTF-8?B?".base64_encode($m_tytul)."?=";

		if(mail($m_do,$m_tytul, $m_tresc, $head))
		{
			return 1;
		}
		else
		{
			return 0;
		}
	}
}


?>