<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['tytul']!="")
  {
    $in = 'INSERT INTO `'.$pre.'artykul`(`art_tytul`, `art_tresc`, `art_data`, `art_user`, `art_wys`, `art_cat`, `art_userid`)VALUE("'.$_POST['tytul'].'", "'.$_POST['tresc'].'", NOW(), "'.$_SESSION['user_nick'].'", "'.$_POST['wys'].'", "'.$_POST['cat'].'", "'.$_SESSION['user_id'].'")';
    db_query($in);
    $up="UPDATE ".$pre."cat SET cat_ile=cat_ile+1 WHERE cat_id='".db_real_escape_string($_POST['cat'])."'";
    db_query($up);
  }
  else
  {
     header('Location: index.php?page=artykuly&action=&e=t');
     exit();
  }
}

header('Location: index.php?page=artykuly&action=&e=1');

?>