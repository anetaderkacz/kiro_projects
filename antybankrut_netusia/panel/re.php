<?php
include("subheader.php");

if($_GET['v']=="ogloszenie")
{
   $Query = "SELECT * FROM ".$pre."artykul WHERE art_akt='1' AND art_id='".db_real_escape_string($_GET['id'])."' ORDER by art_id DESC";
   $result = db_query($Query) or die(db_error());
   while ($row = db_fetch($result)) 
   {
      $art_demo=$row['art_demo'];
   }

   header("Location: ".$art_demo);
}

if($_GET['v']=="www")
{
   $Query = "SELECT * FROM ".$pre."user WHERE user_id='".db_real_escape_string($_GET['id'])."'";
   $result = db_query($Query) or die(db_error());
   while ($row = db_fetch($result)) 
   {
      $art_demo=$row['user_www'];
   }

   header("Location: ".$art_demo);
}
?>
