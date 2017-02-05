<?php
session_start();
include('../db_connect.php');

if($_SESSION['logadm']=="adm")
{
  if($_POST['nazwa']!="")
  {
     $nr=1;
     $Query='SELECT * FROM '.$pre.'menu WHERE menu_s="'.db_real_escape_string($_POST['s']).'" ORDER by menu_id DESC'; 
     $result = db_query($Query) or die(db_error());
     while ($row = db_fetch($result)) 
     {
        $nr++;
     }

     $in = 'INSERT INTO `'.$pre.'menu`(`menu_nazwa`, `menu_tresc`, `menu_wys`, `menu_s`, `menu_nr`, `menu_t`)VALUES("'.$_POST['nazwa'].'", "'.$_POST['tresc'].'", "'.$_POST['wys'].'", "'.$_POST['s'].'", "'.$nr.'", "'.$_POST['tf'].'")';
     db_query($in);
  }
  else
  {
     header('Location: index.php?page=menu&action=&e=t');
     exit();
  }
}

header('Location: index.php?page=menu&action=&e=1');

?>