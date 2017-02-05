<?php

/*

v 0.1 - 19.04.2014
http://d1php.pl

*/

if($ust['pay_typ']==0){$pay_sel_p['dotpay']='selected="selected"';}
if($ust['pay_typ']==1){$pay_sel_p['cash']='selected="selected"';}
if($ust['pay_typ']==2){$pay_sel_p['transferuj']='selected="selected"';}

$pay_set['pay_typ']='<option value="0" '.$pay_sel_p['dotpay'].'>Dotpay</option>';
$pay_set['pay_typ'].='<option value="1" '.$pay_sel_p['cash'].'>CashBill</option>';
$pay_set['pay_typ'].='<option value="2" '.$pay_sel_p['transferuj'].'>Transferuj.pl</option>';

if($ust['pay_typ_sms']==0){$pay_sel_sms['dotpay']='selected="selected"';}
if($ust['pay_typ_sms']==1){$pay_sel_sms['cash']='selected="selected"';}

$pay_set['pay_typ_sms']='<option value="0" '.$pay_sel_sms['dotpay'].'>Dotpay</option>';
$pay_set['pay_typ_sms'].='<option value="1" '.$pay_sel_sms['cash'].'>CashBill</option>';

if($ust['pay_typ']==1)
{
	$pay_set['lang_pin']="Klucz Punktu Płatności";
	$pay_set['lang_dotpay']="Identyfikator Punktu Płatności";
	$pay_set['p_logo']=""; //NP: <img src="images/system_logo.jpg">
	$pay_set['p_info']="Płatności obsługuje cashbill.pl";
}
else if($ust['pay_typ']==2)
{
	$pay_set['lang_pin']="Kod bezpieczeństwa";
	$pay_set['lang_dotpay']="Transferuj ID";
	$pay_set['p_logo']=""; //NP: <img src="images/system_logo.jpg">
	$pay_set['p_info']="Płatności obsługuje Transferuj.pl";
}
else
{
	$pay_set['lang_pin']="Dotpay PIN URLC";
	$pay_set['lang_dotpay']="Przelewy dotpay ID";
	$pay_set['p_logo']=""; //NP: <img src="images/system_logo.jpg">
	$pay_set['p_info']="Płatności obsługuje Dotpay.pl";
	$pay_set['dod']=""; //Dodatkowe pole do zmiany wartości: $ust['pay_dod'] NP: <tr><td>Nazwa</td><td><input type='text' name='pay_dod' value='".$ust['pay_dod']."'></td></tr>
}

if($ust['pay_typ_sms']==1)
{
	$pay_set['lang_dotpay_sms']="";
	$pay_set['lang_kod']="Ponownie treść wiadomości";
	$pay_set['sms_logo']=""; //NP: <img src="images/system_logo.jpg">
	$pay_set['sms_info']="Serwis SMS obsługiwany przez CashBill S.A.<br>Usługa SMS dostępna w sieciach T-Mobile (Era), Orange, Plus GSM, Play, Heyah, Sami Swoi.<br>Właściciel serwisu: ".$ust['email']."<br><a href='http://www.cashbill.pl/download/regulaminy/firmowe/Regulamin%20SMS%20Premium%20-%20KF.pdf' target='_blank'>Regulamin SMS.</a><a href='http://reklamacje.cashbill.pl/' target='_blank'>Reklamacji.</a>";
}
else
{
	$pay_set['lang_dotpay_sms']="SMS dotpay ID";
	$pay_set['lang_kod']="Identyfikator usługi";
	$pay_set['sms_logo']=""; //NP: <img src="images/system_logo.jpg">
	$pay_set['sms_info']="Usługa działa w sieciach operatorów: Plus GSM, Era, Orange, Play.<br>Właściciel serwisu: ".$ust['email']."<br>Serwis SMS obsługuje Dotpay.pl<br><a href=\"http://www.dotpay.pl/regulaminsms\">Regulamin</a>. <a href=\"http://www.dotpay.pl/reklamacje/\">Reklamacje</a>";
}

?>