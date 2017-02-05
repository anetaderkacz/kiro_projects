<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {

 
    $up="UPDATE ".$pre."faq SET faq_nazwa='".$_POST['nazwa']."', faq_tresc='".$_POST['tresc']."' WHERE faq_id='".db_real_escape_string($_GET['id'])."'";
    db_query($up);
  }
  else
  {
    header('Location: index.php?page=faq&action=&e=t');
    exit();
  }
}

header('Location: index.php?page=faq&action=&e=2');

?>