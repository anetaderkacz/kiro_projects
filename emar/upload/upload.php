<?
$sid = md5(uniqid(rand()));
// if your php installation cannot produce md5 hashes delete the above line and uncomment the line below.
// $sid = urlencode(uniqid(rand()));
$url = "http://emardrewno.pl/cgi-bin/";
?>

<html>
<script language="javascript" type="text/javascript" src="main.js"></script>

<body>
<h2>File uploader with progress bar demo.</h2>
<p align="left"><a href="http://sourceforge.net/projects/perlphpuploader/">Project Home</a></p>

<iframe name="uploading" width="800" height="100" frameborder="0" ></iframe>
<form name="upload" enctype="multipart/form-data" action="<?= $url ?>upload.cgi?sid=<? echo $sid; ?>" method="post" >

<script>  document.upload.target = "uploading"; </script>

<table border="0" cellpadding="10" align="center">
    <tr>
    <td width="35%" valign="top">
    <p>
	Use this form to upload some files and check out the functionality of the uploader.
	The total file size should be less than 5GB or it will be rejected.
    </p>
    <p>
	If you use a file that is too small the progress bar may not have enough time to display itself,
	specially if you are on a high speed connection.
    </p>
    <table class="newboxTable">
	<tr><td class="newboxTitle"  align="center">Note</td></tr>
	<tr><td>
	    The speed of upload has been throttled for the health of the server.
	</td></tr>
    </table>
    </td>
    <td  valign="top">
	<table border=0 align="left" cellpadding=3>
	<tr><td><input type="file" name="file[0]"></td></tr>
	<tr><td><input type="file" name="file[1]"></td></tr>
	<tr><td><input type="file" name="file[2]"></td></tr>
	<tr><td><input type="file" name="file[3]"></td></tr>
	<tr><td><input type="file" name="file[4]"></td></tr>
	<tr><td><input type="file" name="file[5]"></td></tr>
	<tr><td><input type="file" name="file[6]"></td></tr>
	<tr><td><input type="file" name="file[7]"></td></tr>
	<tr><td><input type="file" name="file[8]"></td></tr>
	<tr><td><input type="file" name="file[9]"></td></tr>
	<tr><td colspan=2 align="center">
        <input type="hidden" name="sessionid" value="<?= $sid ?>">
	<input type="button" name="send" value="Send" onClick="Tick();">
        <!-- uncomment the following to test with out the progress bar -->
	<!input type="submit" name="send" value="Send">
        </td></tr></table>
    </td>
    </tr>
</table>
</form>
<p id="stat"></p>
<a href="upload.php?sid=">New upload</a>
<p id="log"></p>
</body>
</html>
