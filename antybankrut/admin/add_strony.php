<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {
    $in = 'INSERT INTO `'.$pre.'strony`(`strony_nazwa`, `strony_tresc`, `strony_wys`)VALUE("'.$_POST['nazwa'].'", "'.$_POST['tresc'].'", "'.$_POST['wys'].'")';
    db_query($in);
  }
  else
  {
    header('Location: index.php?page=strony&action=&e=t');
    exit();
  }
}

header('Location: index.php?page=strony&action=&e=1');

?>