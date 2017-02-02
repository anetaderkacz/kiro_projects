<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {
    $up="UPDATE ".$pre."menu SET menu_nazwa='".$_POST['nazwa']."', menu_tresc='".$_POST['tresc']."', menu_wys='".$_POST['wys']."', menu_t='".$_POST['tf']."' WHERE menu_id='".db_real_escape_string($_GET['id'])."'";
    db_query($up);
  }
  else
  {
     header('Location: index.php?page=menu&e=t');
     exit();
  }
}

header('Location: index.php?page=menu&e=2');

?>