<?php
include('subheader.php');
if($_SESSION['logadm'] == "adm")
{
//*****************************

$indexphp="ok";

if($_GET['page']=="ustawienia" or $_GET['page']=="")
{
//-----------------------------
include("module/ustawienia.php");
//-----------------------------
}

else if($_GET['page']=="zgloszenia")
{
//-----------------------------
include("module/zgloszenia.php");
//-----------------------------
}
else if($_GET['page']=="faq")
{
//-----------------------------
include("module/faq.php");
//-----------------------------
}
else if($_GET['page']=="artykuly")
{
//-----------------------------
include("module/artykuly.php");
//-----------------------------
}
else if($_GET['page']=="cat")
{
//-----------------------------
include("module/cat.php");
//-----------------------------
}
else if($_GET['page']=="strony")
{
//-----------------------------
include("module/strony.php");
//-----------------------------
}
else if($_GET['page']=="download")
{
//-----------------------------
include("module/pobierz.php");
//-----------------------------
}
else if($_GET['page']=="komentarze")
{
//-----------------------------
include("module/komentarze.php");
//-----------------------------
}
else if($_GET['page']=="galerie")
{
//-----------------------------
include("module/galerie.php");
//-----------------------------
}
else if($_GET['page']=="user")
{
//-----------------------------
include("module/user.php");
//-----------------------------
}
else
{
//-----------------------------
echo'<center><b>Brak takiej strony.</b></center>';
//-----------------------------
}

//*****************************
}
include('footer.php');
?>