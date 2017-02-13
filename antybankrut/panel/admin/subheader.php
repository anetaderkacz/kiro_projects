<?php
session_start();

include('../db_connect.php');
include("../include/ust.php");
include('namen.php');
include('../include/function.php');
include('../include/login.php');
?>
    <html>

    <head>
        <title>Panel administracyjny</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="style/default.css" type="text/css" />
        <script type="text/javascript" language="javascript" src="js/ColorPicker2.js"></script>
        <script type="text/javascript" language="javascript" src="js/AnchorPosition.js"></script>
        <script type="text/javascript" language="javascript" src="js/PopupWindow.js"></script>
        <script type="text/javascript" language="javascript" src="js/rgbcolor.js"></script>
        <script type="text/javascript" language="javascript" src="js/function.js"></script>
        <script type="text/javascript" src="js/tiny_mce/tiny_mce.js"></script>
        <script type="text/javascript">
            <?php
if($_SESSION['logadm']=="adm")
{
if($ust['edytor']=="2")
{
?>
            tinyMCE.init({
                // General options
                mode: "exact"
                , language: "pl"
                , elements: "elm1"
                , theme: "advanced"
                , skin: "o2k7"
                , skin_variant: "silver"
                , plugins: "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,inlinepopups", // Theme options
                theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect"
                , theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor"
                , theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen"
                , theme_advanced_buttons4: "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak"
                , theme_advanced_toolbar_location: "top"
                , theme_advanced_toolbar_align: "left"
                , theme_advanced_statusbar_location: "bottom"
                , theme_advanced_resizing: true, // Example content CSS (should be your site CSS)
                content_css: "css/content.css", // Drop lists for link/image/media/template dialogs
                template_external_list_url: "lists/template_list.js"
                , external_link_list_url: "lists/link_list.js"
                , external_image_list_url: "lists/image_list.js"
                , media_external_list_url: "lists/media_list.js", // Replace values for the template plugin
                template_replace_values: {
                    username: "Some User"
                    , staffid: "991234"
                }
            });
            <?php
}
if($ust['edytor']=="1")
{
?>
            tinyMCE.init({
                // General options
                mode: "exact"
                , language: "pl"
                , elements: "elm1"
                , theme: "advanced"
                , skin: "o2k7"
                , skin_variant: "silver"
                , plugins: ""
                , theme_advanced_buttons1: "bold,italic,underline,justifyleft,justifycenter,justifyright,justifyfull,undo,redo,link,unlink,forecolor,code"
                , theme_advanced_buttons2: ""
                , theme_advanced_buttons3: ""
                , theme_advanced_toolbar_location: "top"
                , theme_advanced_toolbar_align: "left"
                , theme_advanced_statusbar_location: "bottom"
                , theme_advanced_resizing: true, // Example content CSS (should be your site CSS)
                content_css: "css/content.css", // Replace values for the template plugin
                template_replace_values: {
                    username: "Some User"
                    , staffid: "991234"
                }
            });
            <?php
}
}
?>

            function toggleEditor(id) {
                if (!tinyMCE.get(id)) {
                    tinyMCE.execCommand('mceAddControl', false, id);
                }
                else {
                    tinyMCE.execCommand('mceRemoveControl', false, id);
                }
            }
        </script>
        <!-- /TinyMCE -->
        <SCRIPT LANGUAGE="JavaScript">
            var cp = new ColorPicker('window');
            var cp2 = new ColorPicker();
        </SCRIPT>
        <title>Panel Administracyjny</title>
    </head>

    <body>
        <script>
            function ukryj() {
                document.getElementById("ukryj").style.display = "none";
            }
            setTimeout("ukryj()", 5000);
        </script>
        <?php

if($_SESSION['logadm']!="adm")
{
echo'
<br><br>
<center>
<div class="login_f">
<table style="height:180px;width:280px;">
<tr>
<tr><td colspan="2" style="border-bottom: 1px solid rgb(204, 204, 204);padding-bottom:10px;" align="center"><b style="color:white;font-size:14px;">Panel administracyjny</b></td></tr>
<td style="padding-top:5px;" valign="top" align="left"><img src="style/images/lock.png"></td>
<td style="padding-top:5px;"  valign="top" align="left">

<form method="post" action="">
<table>
<tr>
<td><b style="color:white;font-size:12px;">Login:</b></td><td>
<input  type="text" name="login" value="" /></td>
</tr>
<tr>
<tr>
<td><b style="color:white;font-size:12px;">Hasło:</b></td><td>
<input  type="password" name="haslo" value="" /></tr></tr></table>
<input  type="submit" name="login_user" value="Loguj" />
<br><br>
';if($_SESSION['logadm']=="error"){echo'<span id="ukryj" style="color:red;font-weight:bold;font-size:12px;">B??dne dane</span>';}$_SESSION['logadm']="";echo'

</form>



</td>
</tr>

<tr>
<td align="left" colaspn="2">
<a href="../"><img src="style/images/website.png" width="20" border="0" title="Strona g??wna"></a>
</td>

</tr>
</table>
</div>
</center>
';


}


if($_SESSION['logadm'] == "adm")
{
echo'
<table width="100%" rules="cols" cellpadding="10">
<tr>
<td width="100%" valign="top" align="center">
<br>
<table>
<tr>
<td style="border: 1px solid rgb(204, 204, 204);width:80px;" class="td_hover" align="center" valign="top"><a href="../" style="text-decoration:none;font-size:12px;"><img src="style/images/website.png" title="Przejdz do strony glownej"><br>Główna</a></td>

<td style="border: 1px solid rgb(204, 204, 204);width:80px;" class="td_hover" align="center" valign="top"><a href="index.php?page=user" style="text-decoration:none;font-size:12px;"><img src="style/images/user48.png"><br>Użytkownicy</a></td>
<td style="border: 1px solid rgb(204, 204, 204);width:80px;" class="td_hover" align="center" valign="top"><a href="index.php?page=download" style="text-decoration:none;font-size:12px;"><img src="style/images/m48.png"><br>Pobierz</a></td>
<td style="border: 1px solid rgb(204, 204, 204);width:80px;" class="td_hover" align="center" valign="top"><a href="index.php?page=ustawienia"  style="text-decoration:none;font-size:12px;"><img src="style/images/ust48.png"><br>Ustawienia</a></td>
<td style="border: 1px solid rgb(204, 204, 204);width:80px;" class="td_hover" align="center" valign="top"><a href="logout.php"  style="text-decoration:none;font-size:12px;"><img src="style/images/lock48.png"><br>Wyloguj</a></td>
</tr>
</table>
<br>
<div id="login" class="boxed">
<div class="content">&nbsp;';

if($_GET['page']=="" or $_GET['page']=="ustawienia"){echo'<b style="color:white;">Ustawienia</b>';}

if($_GET['page']=="menu"){echo'<b style="color:white;">Menu</b>';}
if($_GET['page']=="FAQ"){echo'<b style="color:white;">FAQ</b>';}

if($_GET['page']=="artykuly"){echo'<b style="color:white;">Ogłoszenia</b>';}
if($_GET['page']=="user"){echo'<b style="color:white;">Użytkownicy</b>';}
if($_GET['page']=="shoutbox"){echo'<b style="color:white;">Shoutbox</b>';}
if($_GET['page']=="strony"){echo'<b style="color:white;">Strony</b>';}
if($_GET['page']=="galerie"){echo'<b style="color:white;">Galerie</b>';}
if($_GET['page']=="komentarze"){echo'<b style="color:white;">Komentarze';

                                if($_GET['typ']=="a"){echo': Artyku?y';}
                                if($_GET['typ']=="g"){echo': Galerie';}echo'</b>';}



echo'</div></div>
</td>
</tr>
<tr>
<td width="100%" valign="top" align="center">



';
}
?>