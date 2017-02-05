<?php 



	$tab_saf_z=array(");","$","<?","?>",".'","eval","base64_decode","base64_",'."',"`","'#",'"#');
	$tab_saf_na=array(""," $ ","","","'","","","",' " ',"","","");

	if(isset($_POST))
	{
		foreach ($_POST as $key => $value) 
		{
			$_POST[$key] = is_array($key) ? $_POST[$key]: db_real_escape_string(str_replace($tab_saf_z,$tab_saf_na,$_POST[$key]));
		}
	}
	if(isset($_GET))
	{
		foreach ($_GET as $key => $value) 
		{
			$_GET[$key] = is_array($key) ? $_GET[$key]: db_real_escape_string(str_replace($tab_saf_z,$tab_saf_na,$_GET[$key]));
		}
	}



	$kode_z=array("&#34;","&#39;","&nbsp;");
	$kode_do=array('"',"'"," ");
?>