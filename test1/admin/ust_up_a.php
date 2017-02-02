<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET `ust_zglaszanie`='".htmlspecialchars($_POST['zglaszanie'])."',`ust_ulubione`='".htmlspecialchars($_POST['ulubione'])."',`ust_pay_dod`='".htmlspecialchars($_POST['pay_dod'])."',`ust_pay_typ`='".htmlspecialchars($_POST['pay_typ'])."',`ust_pay_typ_sms`='".htmlspecialchars($_POST['pay_typ_sms'])."',`ust_pro_typ`='".htmlspecialchars($_POST['pro_typ'])."',`ust_s_on`='".htmlspecialchars($_POST['s_on'])."',`ust_g_on`='".htmlspecialchars($_POST['g_on'])."',ust_ile_str='".$_POST['ile_str']."',`ust_add_on`='".htmlspecialchars($_POST['add_on'])."',`ust_dotpay_pin`='".htmlspecialchars($_POST['dotpay_pin'])."',`ust_dotpay_sms`='".htmlspecialchars($_POST['dotpay_sms'])."',`ust_proon`='".htmlspecialchars($_POST['proon'])."',`ust_procena`='".htmlspecialchars($_POST['procena'])."',`ust_print`='".htmlspecialchars($_POST['print'])."',`ust_wykop`='".htmlspecialchars($_POST['wykop'])."',`ust_nk_like`='".htmlspecialchars($_POST['nk_like'])."',`ust_gp_like`='".htmlspecialchars($_POST['gp_like'])."',`ust_fb_like`='".htmlspecialchars($_POST['fb_like'])."',`ust_ileimg`='".htmlspecialchars($_POST['ileimg'])."',`ust_dotpay`='".htmlspecialchars($_POST['dotpay'])."',`ust_365o`='".htmlspecialchars($_POST['365o'])."',`ust_90o`='".htmlspecialchars($_POST['90o'])."',`ust_30o`='".htmlspecialchars($_POST['30o'])."',`ust_14o`='".htmlspecialchars($_POST['14o'])."',`ust_7o`='".htmlspecialchars($_POST['7o'])."',`ust_365c`='".htmlspecialchars($_POST['365c'])."',`ust_90c`='".htmlspecialchars($_POST['90c'])."',`ust_30c`='".htmlspecialchars($_POST['30c'])."',`ust_14c`='".htmlspecialchars($_POST['14c'])."',`ust_7c`='".htmlspecialchars($_POST['7c'])."',ust_mod='".htmlspecialchars($_POST['mod'])."',ust_aocena='".htmlspecialchars($_POST['aocena'])."', ust_akomentarze='".htmlspecialchars($_POST['akomentowanie'])."', ust_ta='".htmlspecialchars($_POST['at'])."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=artykuly&e=3#artykuly");
?>