<?php 
include_once("db_connect.php");
include_once("include/function.php");

if(db_query("ALTER TABLE ".$pre."ustawienia ADD ust_pro_typ text NOT NULL;")) 
{
	echo'<font color="lime"><b>OK</b></font><br>';
}
else
{
	echo'<font color="red"><b>Error</b></font><br>';
}
if(db_query("ALTER TABLE ".$pre."ustawienia ADD ust_s_on text NOT NULL;")) 
{
	echo'<font color="lime"><b>OK</b></font><br>';
}
else
{
	echo'<font color="red"><b>Error</b></font><br>';
}
if(db_query("ALTER TABLE ".$pre."ustawienia ADD ust_g_on text NOT NULL;")) 
{
	echo'<font color="lime"><b>OK</b></font><br>';
}
else
{
	echo'<font color="red"><b>Error</b></font><br>';
}

?>
