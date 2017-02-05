<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {

 
    $up="UPDATE ".$pre."cat SET cat_nazwa='".$_POST['nazwa']."',cat_pod='".$_POST['pod']."' WHERE cat_id='".db_real_escape_string($_GET['id'])."'";
    db_query($up);
  }
  else
  {
    header('Location: index.php?page=cat&action=&e=t');
    exit();
  }
}

header('Location: index.php?page=cat&action=&e=2');

?>