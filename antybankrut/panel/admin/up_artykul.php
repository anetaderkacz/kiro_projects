<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['tytul']!="")
  {
    if($_GET['cat']!=$_POST['cat'])
    {
       $up="UPDATE ".$pre."cat SET cat_ile=cat_ile+1 WHERE cat_id='".db_real_escape_string($_POST['cat'])."'";
       db_query($up);

       $up="UPDATE ".$pre."cat SET cat_ile=cat_ile-1 WHERE cat_id='".db_real_escape_string($_GET['cat'])."'";
       db_query($up);
    }

    $up="UPDATE ".$pre."artykul SET art_tytul='".$_POST['tytul']."', art_tresc='".$_POST['tresc']."', art_wys='".$_POST['wys']."', art_cat='".$_POST['cat']."' WHERE art_id='".db_real_escape_string($_GET['id'])."'";
    db_query($up);
  }
  else
  {
     header('Location: index.php?page=artykuly&e=t');
     exit();
  }
}

header('Location: index.php?page=artykuly&e=2');

?>