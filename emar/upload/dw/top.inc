<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN">
<HTML>
<HEAD>
<TITLE><?=$title?></TITLE>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=iso-8859-2">
<META HTTP-EQUIV="Reply-to" CONTENT="rysiol@xcom.pl">
<link rel="stylesheet" href="style.css" type="text/css">

<SCRIPT LANGUAGE="JavaScript">

function przenies(s) {

var url = "download.php?op=view&kat=" + <?php echo $kategoria ?> + "&sort=" + s.options[s.selectedIndex].value;	

window.top.location.href = url;

}
</SCRIPT>

</HEAD>
<BODY>
