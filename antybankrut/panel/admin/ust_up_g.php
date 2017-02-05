<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
{

$up="UPDATE ".$pre."ustawienia SET ust_fm='".htmlspecialchars($_POST['fotm'])."', ust_fd='".htmlspecialchars($_POST['fotd'])."', ust_fdj='".htmlspecialchars($_POST['fotdj'])."', ust_fmj='".htmlspecialchars($_POST['fotmj'])."', ust_ont='".htmlspecialchars($_POST['tekst_on'])."', ust_ft='".htmlspecialchars($_POST['tekst'])."', ust_st='".htmlspecialchars($_POST['tekst_size'])."', ust_tc='".htmlspecialchars($_POST['text_color'])."', ust_r='".htmlspecialchars($_POST['rt'])."', ust_g='".htmlspecialchars($_POST['gt'])."', ust_b='".htmlspecialchars($_POST['bt'])."', ust_kg='".htmlspecialchars($_POST['gkomentowanie'])."', ust_og='".htmlspecialchars($_POST['gocena'])."', ust_tg='".htmlspecialchars($_POST['gtt'])."' WHERE ust_id='1'";
db_query($up);

}
header("Location: index.php?page=ustawienia&action=galerie&e=4#galeria");
?>