<?php
if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';

if($_GET['e']=="akt_ok")
{



      $Query='SELECT * FROM '.$pre.'artykul  WHERE art_id="'.db_real_escape_string($_GET['id']).'" ORDER by art_cat DESC'; 
      $result = db_query($Query) or die(db_error());
      while($row=db_fetch($result))
      {
			$ds_nazwa=$row['art_tytul'];
			$ds_cat=$row['art_cat'];
			$ds_woj=$row['art_woj'];
			$ds_akt=$row['art_akt'];
			$ds_opl=$row['art_oplacone'];
			$ds_id=$row['art_id'];
      }
	  
		if($ds_akt==0 and $ds_opl=="1" and $ds_id>=1)
		{
			$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c+1  WHERE ust_id='1'";
			db_query($up);
			
			if($ds_cat>=1)
			{
				$up="UPDATE ".$pre."cat SET cat_ile=cat_ile+1  WHERE cat_id=".$ds_cat;
				db_query($up);
			}
			if($ds_woj>=1)
			{
				$up="UPDATE ".$pre."woj SET w_ile=w_ile+1  WHERE w_id=".$ds_woj;
				db_query($up);
			}
		}
	
      $up="UPDATE ".$pre."artykul SET art_akt='1'  WHERE art_id=".$_GET['id'];
      db_query($up);
	  
      $to = $_GET['email'];

	  	  $subject="Aktywacja ogłoszenia w  serwisie: ".$ust['nazwa'];
      $body = '<b>Witam.</b><br><br>Twoje ogłoszenie <b>"'.$ds_nazwa.'"</b> zostało  aktywowane.<br><br><a href="'.$ust['adres'].'ogloszenie/'.$_GET['id'].'/'.namen($ds_nazwa).'">'.$ust['adres'].'ogloszenie/'.$_GET['id'].'/'.namen($ds_nazwa).'</a><br><br>';

      if (nw_mail($ust['email'],$to, $subject, $body, $head)) 
      {
          //echo("<p>Message successfully sent!</p>");
      } else {
        // echo("<p>Message delivery failed...</p>");
      }



      echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Ogłoszenie aktywowane.</b></center></div></div><br>';
}
if($_GET['e']=="pay_ok")
{



      $Query='SELECT * FROM '.$pre.'artykul  WHERE art_id="'.db_real_escape_string($_GET['id']).'" ORDER by art_cat DESC'; 
      $result = db_query($Query) or die(db_error());
      while($row=db_fetch($result))
      {
			$ds_nazwa=$row['art_tytul'];
		 	$ds_cat=$row['art_cat'];
			$ds_woj=$row['art_woj'];
			$ds_akt=$row['art_akt'];
			$ds_opl=$row['art_oplacone'];
			$ds_id=$row['art_id'];
      }
	  
		if($ds_akt==1 and $ds_opl=="0" and $ds_id>=1)
		{
			$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c+1  WHERE ust_id='1'";
			db_query($up);
			
			if($ds_cat>=1)
			{
				$up="UPDATE ".$pre."cat SET cat_ile=cat_ile+1  WHERE cat_id=".$ds_cat;
				db_query($up);
			}
			if($ds_woj>=1)
			{
				$up="UPDATE ".$pre."woj SET w_ile=w_ile+1  WHERE w_id=".$ds_woj;
				db_query($up);
			}
		}

      $up="UPDATE ".$pre."artykul SET art_oplacone='1'  WHERE art_id=".$_GET['id'];
      db_query($up);

      echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Ogłoszenie opłacone.</b></center></div></div><br>';
}
if($_GET['e']=="pro_ok")
{
  
      $up="UPDATE ".$pre."artykul SET art_promowane='1'  WHERE art_id=".$_GET['id'];
      db_query($up);

      echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Ogłoszenie promowane.</b></center></div></div><br>';
}
if($_GET['e']=="pro_no")
{
  
      $up="UPDATE ".$pre."artykul SET art_promowane='0'  WHERE art_id=".$_GET['id'];
      db_query($up);

      echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Ogłoszenie nie jest promowane.</b></center></div></div><br>';
}
if($_GET['e']=="akt_no")
{



      $Query='SELECT * FROM '.$pre.'artykul  WHERE art_id="'.db_real_escape_string($_GET['id']).'" ORDER by art_cat DESC'; 
      $result = db_query($Query) or die(db_error());
      while($row=db_fetch($result))
      {
			$ds_nazwa=$row['art_tytul'];
			$ds_cat=$row['art_cat'];
			$ds_woj=$row['art_woj'];
			$ds_akt=$row['art_akt'];
			$ds_opl=$row['art_oplacone'];
			$ds_id=$row['art_id'];
      }
	  
		if($ds_akt==1 and $ds_opl=="1" and $ds_id>=1)
		{
			$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c-1  WHERE ust_id='1'";
			db_query($up);
			
			if($ds_cat>=1)
			{
				$up="UPDATE ".$pre."cat SET cat_ile=cat_ile-1  WHERE cat_id=".$ds_cat;
				db_query($up);
			}
			if($ds_woj>=1)
			{
				$up="UPDATE ".$pre."woj SET w_ile=w_ile-1  WHERE w_id=".$ds_woj;
				db_query($up);
			}
		}
		
      $up="UPDATE ".$pre."artykul SET art_akt='0'  WHERE art_id=".$_GET['id'];
      db_query($up);
      $to = $_GET['email'];

	  	  $subject="Dezaktywacja ogłoszenia w  serwisie: ".$ust['nazwa'];
      $body = '<b>Witam.</b><br><br>Twoje ogłoszenie <b>"'.$ds_nazwa.'"</b> zostało  dezaktywowane.<br><br><a href="'.$ust['adres'].'ogloszenie/'.$_GET['id'].'/'.namen($ds_nazwa).'">'.$ust['adres'].'ogloszenie/'.$_GET['id'].'/'.namen($ds_nazwa).'</a><br><br>';

      if (nw_mail($ust['email'],$to, $subject, $body, $head)) 
      {
        //  echo("<p>Message successfully sent!</p>");
      } else {
        // echo("<p>Message delivery failed...</p>");
      }

      echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Ogłoszenie dezaktywowane.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{

	$Query='SELECT * FROM '.$pre.'artykul WHERE art_id="'.db_real_escape_string($_GET['id']).'" ORDER by art_id DESC'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$s_cat=$row['art_cat'];
		$s_id=$row['art_id'];
		$s_f=$row['art_img'];
		$s_akt=$row['art_akt'];
		$ds_nazwa=$row['art_tytul'];
		$ds_cat=$row['art_cat'];
		$ds_woj=$row['art_woj'];
		$ds_akt=$row['art_akt'];
		$ds_opl=$row['art_oplacone'];
		$ds_id=$row['art_id'];
      }
	  
		if($ds_akt==1 and $ds_opl=="1" and $ds_id>=1)
		{
			$up="UPDATE ".$pre."ustawienia SET ust_ogl_c=ust_ogl_c-1  WHERE ust_id='1'";
			db_query($up);
			
			if($ds_cat>=1)
			{
				$up="UPDATE ".$pre."cat SET cat_ile=cat_ile-1  WHERE cat_id=".$ds_cat;
				db_query($up);
			}
			if($ds_woj>=1)
			{
				$up="UPDATE ".$pre."woj SET w_ile=w_ile-1  WHERE w_id=".$ds_woj;
				db_query($up);
			}
		}
   

	if($s_id>=1)
	{
	
		$del="DELETE FROM ".$pre."komentarze WHERE kom_idk='".$s_id."' AND kom_typ='a'";
		db_query($del);
		
		$del="DELETE FROM ".$pre."artykul WHERE art_id='".$s_id."'";
		db_query($del);
		

		
		$del="DELETE FROM ".$pre."fotki WHERE f_a='".$s_id."'";
		db_query($del);
		
		del_f("../upload/ogloszenie/".$s_id."");
		
		  $to = $_GET['email'];
	  	  $subject="Usunięcie ogłoszenia w  serwisie: ".$ust['nazwa'];

		  $body = '<b>Witam.</b><br><br>Twoje ogłoszenie <b>"'.$ds_nazwa.'"</b> zostało  usunięte.';

		  if (nw_mail($ust['email'],$to, $subject, $body, $head)) 
		  {
			  //echo("<p>Message successfully sent!</p>");
		  } else {
			// echo("<p>Message delivery failed...</p>");
		  }
	}



echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Ogłoszenie usunięte.</b></center></div></div><br>';
}

echo'

<a href="index.php?page=artykuly&typ=akt"><b>Aktywne</b></a> |  <a href="index.php?page=artykuly&typ=n"><b>Nie aktywne</b></a><br>
<br>';

if($_GET['typ']=="akt")
{

echo'
<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Kategoria</b></td>
<td width="50%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b  title="koszt dodania ogłoszenia">Cena</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Aktywny</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Promowane</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Opłacone</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Zmień</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$zapytanie = 'SELECT * FROM '.$pre.'artykul  WHERE art_akt="1" ORDER by art_cat DESC'; 

if(!$strona){
$nr=$_GET["strona"];
if($nr==0)
{
$nr=1;
}

$strona=$nr;
}


$ile="50";

$start=($strona-1)*$ile;     

$wykonaj = db_query($zapytanie) or Die("Nie działa zapytanie". $zapytanie);
$ile_rek = db_num_rows($wykonaj);

$podstron = ceil($ile_rek/$ile);

$zapytanie.= " LIMIT $start,$ile";    

$final = db_query($zapytanie) or Die ("Nie działa zapytanie końcowe");
$i=1;

$link="index.php?page=artykuly&typ=".$_GET['typ']."&strona=";


while($row=db_fetch($final))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['art_id'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';
$Query1='SELECT * FROM '.$pre.'cat WHERE cat_id="'.$row['art_cat'].'"'; 
$result1 = db_query($Query1) or die(db_error());
while($row1=db_fetch($result1))
{
echo $row1['cat_nazwa'];
}
echo'</td>
<td width="50%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=artykuly&action=view&id='.$row['art_id'].'" title="Zobacz ogłoszenie">'.str_rep("amp",$row['art_tytul']).'</a></td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['art_koszt'].'zł</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['art_akt']=="1"){echo'<a href="index.php?page=artykuly&e=akt_no&id='.$row['art_id'].'&cat='.$row['art_cat'].'&typ=akt&email='.get_email_user($row['art_userid']).'"><img src="style/images/ok16.png" title="Widoczny"></a>';}else{echo'<a href="index.php?page=artykuly&typ=akt&e=akt_ok&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'"><b title="Ukryty">---</b></a>';}echo'</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['art_promowane']=="1"){echo'<a href="index.php?page=artykuly&e=pro_no&id='.$row['art_id'].'&cat='.$row['art_cat'].'&typ=akt&email='.get_email_user($row['art_userid']).'"><img src="style/images/ok16.png" title="Promowane"></a>';}else{echo'<a href="index.php?page=artykuly&typ=akt&e=pro_ok&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'"><b title="Nie promowane">---</b></a>';}echo'</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['art_oplacone']=="1"){echo'<img src="style/images/ok16.png" title="Opłacone">';}else{echo'<a href="index.php?page=artykuly&typ=akt&e=pay_ok&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'"><b title="Ukryty">Opłać</b></a>';}echo'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="../panel_skrypt_edit.php?id='.$row['art_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=artykuly&v=delete&akt='.$row['art_akt'].'&typ=akt&id='.$row['art_id'].'&cat='.$row['art_cat'].'&img='.$row['art_img'].'&email='.get_email_user($row['art_userid']).'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';
include("include/podzial.php");

}
if($_GET['typ']=="n")
{

echo'
<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Kategoria</b></td>
<td width="50%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b  title="koszt dodania ogłoszenia">Cena</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Aktywny</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Opłacone</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Zmień</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$zapytanie ='SELECT * FROM '.$pre.'artykul WHERE art_akt="0" ORDER by art_cat DESC'; 

if(!$strona){
$nr=$_GET["strona"];
if($nr==0)
{
$nr=1;
}

$strona=$nr;
}


$ile="50";

$start=($strona-1)*$ile;     

$wykonaj = db_query($zapytanie) or Die("Nie działa zapytanie". $zapytanie);
$ile_rek = db_num_rows($wykonaj);

$podstron = ceil($ile_rek/$ile);

$zapytanie.= " LIMIT $start,$ile";    

$final = db_query($zapytanie) or Die ("Nie działa zapytanie końcowe");
$i=1;

$link="index.php?page=artykuly&typ=".$_GET['typ']."&strona=";


while($row=db_fetch($final))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['art_id'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';
$Query1='SELECT * FROM '.$pre.'cat WHERE cat_id="'.$row['art_cat'].'"'; 
$result1 = db_query($Query1) or die(db_error());
while($row1=db_fetch($result1))
{
echo $row1['cat_nazwa'];
}
echo'</td>
<td width="50%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=artykuly&action=view&id='.$row['art_id'].'" title="Zobacz ogłoszenie">'.str_rep("amp",$row['art_tytul']).'</a></td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['art_koszt'].'zł</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['art_akt']=="1"){echo'<a href="index.php?page=artykuly&e=akt_no&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'&typ=n"><img src="style/images/ok16.png" title="Widoczny"></a>';}else{echo'<a href="index.php?page=artykuly&typ=n&e=akt_ok&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'"><b title="Aktywuj">Aktywuj</b></a>';}echo'</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['art_oplacone']=="1"){echo'<img src="style/images/ok16.png" title="Opłacone">';}else{echo'<a href="index.php?page=artykuly&e=pay_ok&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'&typ=n"><b title="Ukryty">Opłać</b></a>';}echo'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="../panel_skrypt_edit.php?id='.$row['art_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=artykuly&v=delete&akt='.$row['art_akt'].'&id='.$row['art_id'].'&cat='.$row['art_cat'].'&img='.$row['art_img'].'&email='.get_email_user($row['art_userid']).'&typ=n" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';
include("include/podzial.php");

}
}


if($_GET['action']=="view")
{

$Query='SELECT * FROM '.$pre.'artykul WHERE art_id="'.db_real_escape_string($_GET['id']).'"  ORDER by art_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<table width="60%">
<tr>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['art_akt']=="1"){echo'<a href="index.php?page=artykuly&e=akt_no&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'"><img src="style/images/ok16.png" title="Aktywny"></a>';}else{echo'<a href="index.php?page=artykuly&e=akt_ok&id='.$row['art_id'].'&cat='.$row['art_cat'].'&email='.get_email_user($row['art_userid']).'"><b title="Aktywuj">Aktywuj</b></a>';}echo'</td>
</tr>
<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=artykuly&v=delete&akt='.$row['art_akt'].'&id='.$row['art_id'].'&cat='.$row['art_cat'].'&img='.$row['art_img'].'&email='.get_email_user($row['art_userid']).'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>
';if($row['art_img']<>""){echo'<tr><td colspan="2"><center><a href="../upload/ogloszenie/d_'.$row['art_img'].'"><img src="../upload/ogloszenie/m_'.$row['art_img'].'"></a></center></td></tr>';}echo'
<tr>
<td><b>'.$row['art_tytul'].'</b></td>
</tr>
<tr><td><a href="../user/'.get_login_user($row['art_userid']).'/'.$row['art_userid'].'">'.get_login_user($row['art_userid']).'</a></td></tr>
<tr><td>'.$row['art_data'].'</td></tr>
<tr><td>'.date("Y.m.d H:i",$row['art_end']).'</td></tr>
<tr><td>'.$row['art_cena'].'</td></tr>
<tr><td>'.$row['art_misato'].'</td></tr>
<tr><td>'.$row['art_tel'].'</td></tr>
<tr><td>'.$row['art_ip'].'</td></tr>
<tr><td>'.$row['art_tresc'].'</td></tr>
</table>
';
$idk=$row['art_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiego arta!</b></center>';
}
}
?>