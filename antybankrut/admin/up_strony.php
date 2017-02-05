<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {
    $up="UPDATE ".$pre."strony SET strony_nazwa='".$_POST['nazwa']."', strony_tresc='".$_POST['tresc']."', strony_wys='".$_POST['wys']."' WHERE strony_id='".db_real_escape_string($_GET['id'])."'";
    db_query($up);
  }
  else
  {
    header('Location: index.php?page=strony&e=t');
    exit();
  }
}

header('Location: index.php?page=strony&e=2');

?>