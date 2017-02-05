<?php

if($db_function_typ=="")
{
	echo'Zainstaluj skrypt.';
	exit();
}

function db_connect($f_host,$f_login,$f_haslo,$f_nazwa,$f_port='null')
{
	global $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		$f_return = mysqli_connect($f_host, $f_login, $f_haslo, $f_nazwa,$f_port) or die (mysqli_connect_error());
	}
	else
	{
	
		if($f_port>=1){$f_p=':'.$f_port;}else{$f_p='';}
		
		mysql_connect($f_host.''.$f_p, $f_login, $f_haslo);
		mysql_select_db($f_nazwa);
	}

	return $f_return;

}

//-----------------------------------------------------------

function db_query($f_query,$f_cache = "0")
{
	global $db_connect, $db_function_typ, $ile_c_my;

	if($db_function_typ=="mysqli")
	{
		$f_return=mysqli_query($db_connect,$f_query);
	}
	else
	{
		$f_return=mysql_query($f_query);
	}
	$ile_c_my++;
	return $f_return;

	
}

//-----------------------------------------------------------

function db_fetch($f_result)
{
	global $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		if($f_result<>""){$f_return =  mysqli_fetch_array($f_result, MYSQLI_ASSOC);}
	}
	else
	{
		if($f_result<>""){$f_return =  mysql_fetch_array($f_result);}
	}

	return $f_return;
}

//-----------------------------------------------------------

function db_num_rows($fn_query)
{
	global $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		$f_return = mysqli_num_rows($fn_query);
	}
	else
	{
		$f_return = mysql_num_rows($fn_query);
	}

	return $f_return;

}

//-----------------------------------------------------------

function db_insert_id()
{
	global $db_connect, $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		$f_return = mysqli_insert_id($db_connect);
	}
	else
	{
		$f_return = mysql_insert_id();
	}

	return $f_return;

}

//-----------------------------------------------------------

function db_real_escape_string($f_text)
{
	
	global $db_connect, $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		$f_return = mysqli_real_escape_string($db_connect,$f_text);
	}
	else
	{
		$f_return = mysql_real_escape_string($f_text);
	}

	return $f_return;

}

//-----------------------------------------------------------

function db_error()
{
	global $db_connect, $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		$f_return = mysqli_error($db_connect);
	}
	else
	{
		$f_return = mysql_error();
	}


	return $f_return;
}

//-----------------------------------------------------------

function db_close()
{
	global $db_connect, $db_function_typ;

	if($db_function_typ=="mysqli")
	{
		mysqli_close($db_connect);
	}
	else
	{
		mysql_close();
	}

}





?>