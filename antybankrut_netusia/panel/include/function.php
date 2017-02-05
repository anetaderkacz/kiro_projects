<?php
include_once("function_all.php");


function user_ip() 
{

		if (getenv('HTTP_CLIENT_IP')) {
			$ip = getenv('HTTP_CLIENT_IP');
		}
		elseif (getenv('HTTP_X_FORWARDED_FOR')) {
			$ip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_X_FORWARDED')) {
			$ip = getenv('HTTP_X_FORWARDED');
		}
		elseif (getenv('HTTP_FORWARDED_FOR')) {
			$ip = getenv('HTTP_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_FORWARDED')) {
			$ip = getenv('HTTP_FORWARDED');
		}
		else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
}

function str_rep($co,$txt)
{
	if($co=="amp")
	{
		$kodes_z=array("&amp;amp;#34;","&amp;amp;#39;","&nbsp;");
		$kodes_do=array('&#34;',"&#39;"," ");
		$txt = str_replace($kodes_z,$kodes_do,$txt);
	}
	
	return $txt;
}

function del_f($dir) 
{
	if(is_dir($dir) and $dir<>"upload/ogloszenie/") 
	{
		$objects = scandir($dir);
		foreach ($objects as $object) 
		{
			if($object != "." && $object != "..") 
			{
				if(filetype($dir."/".$object) == "dir"){}else{unlink($dir."/".$object);}
			}
		}
		reset($objects);
		rmdir($dir);
   }
} 

function user_online(){

   global $user_online_ct;
   return $user_online_ct;

}

function user_login_online(){
   global $pre; global $user_online_ct;
   $count = db_num_rows ( db_query("SELECT user_id FROM ".$pre."useronline WHERE user_id='0' GROUP by ip"));
   return $user_online_ct-$count;

}

function get_user_online($id)
{
   global $pre;
   $count = db_num_rows ( db_query("SELECT user_id FROM ".$pre."useronline WHERE user_id='".$id."' GROUP BY ip"));
   if($count>=1){return $count;}else{return 0;}
}

function get_user_wiek($wiek)
{
   if($wiek>=1){return (date("Y")-$wiek);}else{return " ";}
}

function get_user_plec($plec)
{
   if($plec==1){return "Kobieta";}else if($plec==2){return"Mężczyzna";}else{return"";}
}

function get_user_woj($id)
{
   global $pre;
   $Query_flu='SELECT * FROM '.$pre.'woj WHERE w_id="'.db_real_escape_string($id).'"'; 
   $result_flu = db_query($Query_flu) or die(db_error());
   while ($row_flu = db_fetch($result_flu)) 
   {
      return $row_flu['w_nazwa'];
   }
}



function get_login_user($id)
{
   global $pre;
   $Query_flu='SELECT user_login,user_id FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($id).'"'; 
   $result_flu = db_query($Query_flu) or die(db_error());
   while ($row_flu = db_fetch($result_flu)) 
   {
      return $row_flu['user_login'];
   }
}
function get_email_user($id)
{
   global $pre;
   $Query_flu='SELECT user_email,user_id FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($id).'"'; 
   $result_flu = db_query($Query_flu) or die(db_error());
   while ($row_flu = db_fetch($result_flu)) 
   {
      return $row_flu['user_email'];
   }
}

function  spremail($email) 
{
  if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) 	
  { 
  return false;
  } 
  else
  {
  return true;
  }
}


function emot($txt)
{

$txt = str_replace(':)', '<img src="images/emot/smile.gif" title=":)">', $txt);
$txt = str_replace(';)', '<img src="images/emot/wink.gif" title="";)>', $txt);
$txt = str_replace(':|', '<img src="images/emot/frown.gif" title=":|">', $txt);
$txt = str_replace(':(', '<img src="images/emot/sad.gif" title=":(">', $txt);
$txt = str_replace(':o', '<img src="images/emot/shock.gif" title=":o">', $txt);
$txt = str_replace(';p', '<img src="images/emot/jezyk.gif" title=";P">', $txt);
$txt = str_replace(':P', '<img src="images/emot/jezyk.gif" title=";P">', $txt);
$txt = str_replace('b)', '<img src="images/emot/cool.gif" title="b)">', $txt);
$txt = str_replace(':D', '<img src="images/emot/grin.gif" title=":D">', $txt);
$txt = str_replace(':d', '<img src="images/emot/grin.gif" title=":d">', $txt);
$txt = str_replace(';D', '<img src="images/emot/grin.gif" title=";D">', $txt);
$txt = str_replace(';d', '<img src="images/emot/grin.gif" title=";d">', $txt);
$txt = str_replace(':@', '<img src="images/emot/angry.gif" title=":@">', $txt);
$txt = str_replace(':pa', '<img src="images/emot/papa.gif" title=":pa">', $txt);
$txt = str_replace(':hej', '<img src="images/emot/heej.gif" title=":hej">', $txt);
$txt = str_replace(':spioch', '<img src="images/emot/spioch.gif" title=":spioch">', $txt);
$txt = str_replace(':co', '<img src="images/emot/co.gif" title=":co">', $txt);
$txt = str_replace(':czytaj', '<img src="images/emot/czytaj.gif" title=":czytaj">', $txt);
$txt = str_replace(':ok', '<img src="images/emot/ok.gif" title=":ok">', $txt);
$txt = str_replace(':*', '<img src="images/emot/buzki.gif" title=":*">', $txt);
$txt = str_replace(':muza', '<img src="images/emot/muza.gif" title=":muza">', $txt);
$txt = str_replace(':beczy', '<img src="images/emot/beczy.gif" title=":beczy">', $txt);
$txt = str_replace(':bezradny', '<img src="images/emot/bezradny.gif" title=":bezradny">', $txt);
$txt = str_replace(':spadaj', '<img src="images/emot/spadaj.gif" title=":spadaj">', $txt);
$txt = str_replace(':szok', '<img src="images/emot/szok.gif" title=":szok">', $txt);
$txt = str_replace(':wnerw', '<img src="images/emot/wnerw.gif" title=":wnerw">', $txt);
$txt = str_replace(':zly', '<img src="images/emot/zly.gif" title=":zly">', $txt);
$txt = preg_replace("/([^\s]{25})/", "$1\n", $txt);

return $txt;
}
?>