<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['tytul']!="")
  {
     $in = 'INSERT INTO `'.$pre.'news`(`news_tytul`, `news_tresc`, `news_data`, `news_user`, `news_wys`, `news_userid`)VALUES("'.$_POST['tytul'].'", "'.$_POST['tresc'].'", NOW(), "'.$_SESSION['user_nick'].'", "'.$_POST['wys'].'", "'.$_SESSION['user_id'].'")';
     db_query($in);
  }
  else
  {
     header('Location: index.php?page=news&action=&e=t');
     exit();
  }
}

header('Location: index.php?page=news&action=&e=1');

?>