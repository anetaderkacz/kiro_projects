<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {
    $in = 'INSERT INTO `'.$pre.'faq`(`faq_nazwa`, `faq_tresc`)VALUES("'.$_POST['nazwa'].'", "'.$_POST['tresc'].'")';
    db_query($in);
  }
  else
  { 
     header('Location: index.php?page=faq&action=&e=n');
     exit();
  }

}

header('Location: index.php?page=faq&action=&e=1');

?>