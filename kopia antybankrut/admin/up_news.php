<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['tytul']!="")
  {
    $up="UPDATE ".$pre."news SET news_tytul='".$_POST['tytul']."', news_tresc='".$_POST['tresc']."', news_wys='".$_POST['wys']."' WHERE news_id='".db_real_escape_string($_GET['id'])."'";
    db_query($up);
  }
  else
  {
     header('Location: index.php?page=news&e=t');
     exit();
  }
}

header('Location: index.php?page=news&e=2');

?>