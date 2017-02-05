<?php
if($indexphp!="ok"){exit();}


echo'<center>';




echo'<a href="index.php?page=komentarze&action=news&typ=n"><b>Newsy</b></a> | <a href="index.php?page=komentarze&action=artykuly&typ=a"><b>Ogłoszenia</b></a> <br><br>';

if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."komentarze WHERE kom_id='".db_real_escape_string($_GET['id_del'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Komentarz usunięty.</b></center></div></div><br>';
}

//----------------

if($_GET['typ']=="p")
{

if($_GET['id']=="")
{
echo'
<table width="60%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="95%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'lista  ORDER by lista_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{

$q=db_query("SELECT * FROM ".$pre."komentarze  WHERE kom_idk='".$row['lista_id']."' AND kom_typ='p'");
$ilek=db_num_rows($q);

echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['lista_id'].'</td>
<td width="95%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=komentarze&action=playlista&typ=p&id='.$row['lista_id'].'" title="Zobacz komentarze">'.$row['lista_nazwa'].'</a> ['.$ilek.']</td>
</tr>';
$i++;
}
echo'</table>';
if($i=="1"){echo'<center><b>Brak</b></center>';}
}
else
{
$k=0;
$Query='SELECT * FROM '.$pre.'komentarze WHERE kom_typ="n" AND kom_idk="'.db_real_escape_string($_GET['id']).'" ORDER by kom_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
Nick: <b>';if($row['kom_idu']==""){echo''.$row['kom_nick'].'';}else{echo'<a href="../user/'.namen($row['kom_nick']).'/'.$row['kom_idu'].'">'.$row['kom_idu'].'</a>';}echo'</b> Data: <b>'.$row['kom_data'].'</b> - <b><a href="index.php?page=komentarze&action=playlista&typ=p&id='.htmlspecialchars($_GET['id']).'&id_del='.$row['kom_id'].'&v=delete"><b>Usuń</b></a></b><br>
'.$row['kom_tresc'].'<br><hr><br>
';
$k++;
}
if($k=="0"){echo'<center><b>Brak komentarzy.</b></center>';}
}

}

//----------------
//----------------

if($_GET['typ']=="n")
{

if($_GET['id']=="")
{
echo'
<table width="60%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="95%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'news  ORDER by news_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{

$q=db_query("SELECT * FROM ".$pre."komentarze  WHERE kom_idk='".$row['news_id']."' AND kom_typ='n'");
$ilek=db_num_rows($q);

echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['news_id'].'</td>
<td width="95%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=komentarze&action=news&typ=n&id='.$row['news_id'].'" title="Zobacz komentarze">'.$row['news_tytul'].'</a> ['.$ilek.']</td>
</tr>';
$i++;
}
echo'</table>';
if($i=="1"){echo'<center><b>Brak</b></center>';}
}
else
{
$k=0;
$Query='SELECT * FROM '.$pre.'komentarze WHERE kom_typ="n" AND kom_idk="'.db_real_escape_string($_GET['id']).'" ORDER by kom_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
Nick: <b>';if($row['kom_idu']==""){echo''.$row['kom_nick'].'';}else{echo'<a href="../user/'.namen($row['kom_nick']).'/'.$row['kom_idu'].'">'.$row['kom_idu'].'</a>';}echo'</b> Data: <b>'.$row['kom_data'].'</b> - <b><a href="index.php?page=komentarze&action=news&typ=n&id='.htmlspecialchars($_GET['id']).'&id_del='.$row['kom_id'].'&v=delete"><b>Usuń</b></a></b><br>
'.$row['kom_tresc'].'<br><hr><br>
';
$k++;
}
if($k=="0"){echo'<center><b>Brak komentarzy.</b></center>';}
}

}

//----------------

if($_GET['typ']=="a")
{

if($_GET['id']=="")
{
echo'
<table width="60%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="95%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'artykul  ORDER by art_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
$q=db_query("SELECT * FROM ".$pre."komentarze  WHERE kom_idk='".$row['art_id']."' AND kom_typ='a'");
$ilek=db_num_rows($q);

echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['art_id'].'</td>
<td width="95%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=komentarze&action=artykuly&typ=a&id='.$row['art_id'].'" title="Zobacz komentarze">'.$row['art_tytul'].'</a> ['.$ilek.']</td>
</tr>';
$i++;
}
echo'</table>';
if($i=="1"){echo'<center><b>Brak</b></center>';}
}
else
{
$k=0;
$Query='SELECT * FROM '.$pre.'komentarze WHERE kom_typ="a" AND kom_idk="'.db_real_escape_string($_GET['id']).'" ORDER by kom_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
Nick: <b>';if($row['kom_idu']==""){echo''.$row['kom_nick'].'';}else{echo'<a href="../user/'.namen($row['kom_nick']).'/'.$row['kom_idu'].'">'.$row['kom_idu'].'</a>';}echo'</b> Data: <b>'.$row['kom_data'].'</b> - <b><a href="index.php?page=komentarze&action=artykuly&typ=a&id='.htmlspecialchars($_GET['id']).'&id_del='.$row['kom_id'].'&v=delete"><b>Usuń</b></a></b><br>
'.$row['kom_tresc'].'<br><hr><br>
';
$k++;
}
if($k=="0"){echo'<center><b>Brak komentarzy.</b></center>';}
}

}

//----------------

if($_GET['typ']=="g")
{

if($_GET['id']=="")
{
echo'
<table width="60%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="95%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'gallery  ORDER by ga_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{

$q=db_query("SELECT * FROM ".$pre."komentarze  WHERE kom_idk='".$row['ga_id']."' AND kom_typ='g'");
$ilek=db_num_rows($q);

echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['ga_id'].'</td>
<td width="95%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=komentarze&action=galerie&typ=g&id='.$row['ga_id'].'" title="Zobacz komentarze">'.$row['ga_nazwa'].'</a> ['.$ilek.']</td>
</tr>';
$i++;
}
echo'</table>';
if($i=="1"){echo'<center><b>Brak</b></center>';}
}
else
{
$k=0;
$Query='SELECT * FROM '.$pre.'komentarze WHERE kom_typ="g" AND kom_idk="'.db_real_escape_string($_GET['id']).'" ORDER by kom_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
Nick: <b>';if($row['kom_idu']==""){echo''.$row['kom_nick'].'';}else{echo'<a href="../user/'.namen($row['kom_nick']).'/'.$row['kom_idu'].'">'.$row['kom_idu'].'</a>';}echo'</b> Data: <b>'.$row['kom_data'].'</b> - <b><a href="index.php?page=komentarze&action=galerie&typ=g&id='.htmlspecialchars($_GET['id']).'&id_del='.$row['kom_id'].'&v=delete"><b>Usuń</b></a></b><br>
'.$row['kom_tresc'].'<br><hr><br>
';
$k++;
}
if($k=="0"){echo'<center><b>Brak komentarzy.</b></center>';}
}

}

?>