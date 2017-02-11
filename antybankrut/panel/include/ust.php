<?php
$Query='SELECT * FROM '.$pre.'ustawienia WHERE ust_id="1"'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
$ust['fb_id']=$row['ust_fb_id']; 	

$ust['fb_se']=$row['ust_fb_se']; 	

$ust['fb_on']=$row['ust_fb_on']; 
	
$ust['ulubione']=$row['ust_ulubione']; 

$ust['zglaszanie']=$row['ust_zglaszanie']; 

$ust['email_login']=$row['ust_email_login']; 

$ust['email_pas']=$row['ust_email_pas']; 

$ust['email_host']=$row['ust_email_host']; 

$ust['email_port']=$row['ust_email_port']; 

$ust['email_uw']=$row['ust_email_uw']; 

$ust['meta_desc']=$row['ust_meta_desc'];

$ust['meta_key']=$row['ust_meta_key'];

$ust['meta_title']=$row['ust_meta_title'];

$ust['pay_dod']=$row['ust_pay_dod'];

$ust['pay_typ']=$row['ust_pay_typ'];

$ust['pay_typ_sms']=$row['ust_pay_typ_sms'];

$ust['pro_typ']=$row['ust_pro_typ'];

$ust['g_on']=$row['ust_g_on'];

$ust['s_on']=$row['ust_s_on'];

$ust['ogl_c']=$row['ust_ogl_c'];

$ust['ile_str']=$row['ust_ile_str'];

$ust['lang_on']=$row['ust_lang_on'];

$ust['lang_d']=$row['ust_lang_d'];

$ust['add_on']=$row['ust_add_on'];

$ust['cookie_on']=$row['ust_cookie_on'];

$ust['procena']=$row['ust_procena'];

$ust['proon']=$row['ust_proon'];

$ust['map_key']="apikey";

$ust['r_j']=$row['ust_r_j'];

$ust['r_d']=$row['ust_r_d'];

$ust['r_t']=$row['ust_r_t'];

$ust['ileimg']=$row['ust_ileimg'];

$ust['fb_like']=$row['ust_fb_like'];

$ust['gp_like']=$row['ust_gp_like'];

$ust['nk_like']=$row['ust_nk_like'];

$ust['wykop']=$row['ust_wykop'];

$ust['print']=$row['ust_print'];

$ust['dotpay']=$row['ust_dotpay'];

$ust['dotpay_sms']=$row['ust_dotpay_sms'];

$ust['dotpay_pin']=$row['ust_dotpay_pin'];

$ust['adres']=$row['ust_adres'];

$ust['omod']=$row['ust_mod'];

$ust['7o']=$row['ust_7o'];

$ust['7c']=$row['ust_7c'];

$ust['14o']=$row['ust_14o'];

$ust['14c']=$row['ust_14c'];

$ust['30o']=$row['ust_30o'];

$ust['30c']=$row['ust_30c'];

$ust['90o']=$row['ust_90o'];

$ust['90c']=$row['ust_90c'];

$ust['365o']=$row['ust_365o'];

$ust['365c']=$row['ust_365c'];

$ust['nazwa']=$row['ust_nazwa'];

$ust['email']=$row['ust_email'];

$ust['ilen']=$row['ust_ilen'];

$ust['nocena']=$row['ust_nocena'];

$ust['nkomentowanie']=$row['ust_nkomentarze'];

$ust['aocena']=$row['ust_aocena'];

$ust['akomentowanie']=$row['ust_akomentarze'];

$ust['cache']=$row['ust_cache'];

$ust['templates']=$row['ust_templates'];

$ust['fotd']=$row['ust_fd'];

$ust['fotm']=$row['ust_fm'];

$ust['fotmj']=$row['ust_fmj'];

$ust['fotdj']=$row['ust_fdj'];

$ust['tekst_color']=$row['ust_tc'];

$ust['tekst_on']=$row['ust_ont'];

$ust['tekst']=$row['ust_ft'];

$ust['tekst_size']=$row['ust_st'];

$ust['tekst_r']=$row['ust_r'];

$ust['tekst_g']=$row['ust_g'];

$ust['tekst_b']=$row['ust_b'];

$ust['token_news']=$row['ust_tn'];

$ust['token_art']=$row['ust_ta'];

$ust['token_ga']=$row['ust_tg'];

$ust['gocena']=$row['ust_og'];

$ust['gkomentowanie']=$row['ust_kg'];

$ust['fk']=$row['ust_fk'];

$ust['kontaktt']=$row['ust_kontakt_dane'];

$ust['edytor']=$row['ust_edytor'];

$ust['token_r']=$row['ust_token_r'];

$ust['rejestracja']=$row['ust_register'];

$ust['akt_r']=$row['ust_akt_r'];

$ust['regulamin']=$row['ust_regulamin'];

$ust['wersja']="";

$ust['wersja_data']="";

$ust['wersja_nazwa']="s";

$ust['wersja_adres']="";

$ust['wersja_user']="";

$ust['wersja_id']="";
$ust['wag1']=$row['ust_wag1'];
$ust['wag2']=$row['ust_wag2'];
$ust['wag3']=$row['ust_wag3'];
$ust['wag4']=$row['ust_wag4'];
$ust['wag5']=$row['ust_wag5'];
$ust['granica']=$row['ust_granica'];

}

if($ust['ile_str']>=1)
{

}
else
{
	$ust['ile_str']="20";
}

?>