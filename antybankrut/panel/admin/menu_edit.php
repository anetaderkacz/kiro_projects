<?php
session_start();
include("../db_connect.php");
if($_SESSION['logadm']=="adm")
    
    echo"test0";
{

//---------------------------------------
if($_GET['typ']=="z")
{
  $Query='SELECT * FROM '.$pre.'menu WHERE menu_id="'.db_real_escape_string($_GET['id']).'"'; 
  $result = db_query($Query) or die(db_error());
  while($row=db_fetch($result))
  {
     $menunr=$row['menu_nr'];
  }

  if($_GET['s']==1)
  {
     $ilemp=db_query("SELECT * FROM ".$pre."menu WHERE menu_s='2'");
     $ilep=db_num_rows($ilemp);
       
     $nrl=$ilep+1;

     $up="UPDATE ".$pre."menu SET `menu_nr`='".$nrl."', `menu_s`='2' WHERE menu_id='".db_real_escape_string($_GET['id'])."'";
     db_query($up);
  }
  if($_GET['s']==2)
  {     
     $ilemp=db_query("SELECT * FROM ".$pre."menu WHERE menu_s='1'");
     $ilep=db_num_rows($ilemp);
   
     $nrl=$ilep+1;

     $up="UPDATE ".$pre."menu SET  `menu_nr`='".$nrl."', `menu_s`='1' WHERE menu_id='".db_real_escape_string($_GET['id'])."'";
     db_query($up);

  }

  $Query='SELECT * FROM '.$pre.'menu WHERE menu_nr>"'.$menunr.'" AND menu_s="'.db_real_escape_string($_GET['s']).'"'; 
  $result = db_query($Query) or die(db_error());
  while($row=db_fetch($result))
  {
    $up="UPDATE ".$pre."menu SET menu_nr=menu_nr-1 WHERE menu_id='".$row['menu_id']."'";
    db_query($up);
  }

}
//---------------------------------------
if($_GET['typ']=="top")
{
     $Query='SELECT * FROM '.$pre.'menu WHERE menu_id="'.db_real_escape_string($_GET['id']).'"'; 
     $result = db_query($Query) or die(db_error());
     while($row=db_fetch($result))
     {
        $menu_nr=$row['menu_nr'];
     }

     $menunr=$menu_nr-1;

     $up="UPDATE ".$pre."menu SET menu_nr=menu_nr+1 WHERE menu_s='".db_real_escape_string($_GET['s'])."' AND menu_nr=".$menunr."";
     db_query($up);

     $up="UPDATE ".$pre."menu SET menu_nr=menu_nr-1 WHERE menu_s='".db_real_escape_string($_GET['s'])."' AND menu_id='".db_real_escape_string($_GET['id'])."'";
     db_query($up);
}
//---------------------------------------
if($_GET['typ']=="down")
{
     $Query='SELECT * FROM '.$pre.'menu WHERE menu_id="'.db_real_escape_string($_GET['id']).'"'; 
     $result = db_query($Query) or die(db_error());
     while($row=db_fetch($result))
     {
        $menu_nr=$row['menu_nr'];
     }

     $menunr=$menu_nr+1;

     $up="UPDATE ".$pre."menu SET menu_nr=menu_nr-1 WHERE menu_s='".db_real_escape_string($_GET['s'])."' AND menu_nr=".$menunr."";
     db_query($up);

     $up="UPDATE ".$pre."menu SET menu_nr=menu_nr+1 WHERE menu_s='".db_real_escape_string($_GET['s'])."' AND menu_id='".db_real_escape_string($_GET['id'])."'";
     db_query($up);
}
//---------------------------------------

}
header("Location: index.php?page=menu");
?>