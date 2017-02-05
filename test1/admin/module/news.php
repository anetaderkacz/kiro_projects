<?php
if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';

if($_GET['e']==1)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>News zapisany.</b></center></div></div><br>';
}
if($_GET['e']==2)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>News zmieniony.</b></center></div></div><br>';
}
if($_GET['e']=="t")
{
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Podaj tytuł.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."news WHERE news_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>News usunięty.</b></center></div></div><br>';
}

echo'

<a href="index.php?page=news&action=add" title="Dodaj news"><img src="style/images/add32.png" style="vertical-align: middle;"><b>Dodaj</b></a><br>
<br>
<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="65%" background="style/images/belka.gif" height="24" align="center"><b>Tytuł</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Widoczny</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Zmień</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'news  ORDER by news_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['news_id'].'</td>
<td width="65%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=news&action=view&id='.$row['news_id'].'" title="Zobacz news">'.$row['news_tytul'].'</a></td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['news_wys']=="1"){echo'<img src="style/images/ok16.png" title="Widoczny">';}else{echo'<b title="Ukryty">---</b>';}echo'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=news&action=edit&id='.$row['news_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=news&v=delete&id='.$row['news_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';

}

if($_GET['action']=="add")
{
echo'

<form action="add_news.php" method="POST" name="frmt" onSubmit="return sprt()">

<table>
<tr>
<td><b>Tytuł:</b></td>
<td><input type="text" name="tytul" style="width:250px;"></td>
</tr>
<tr>
<td><b>Autor:</b></td>
<td><input type="text" name="autor" disabled="disabled" value="'.$_SESSION['user_nick'].'"></td>
</tr>
<tr>
<td><b>Widoczny?:</b></td>
<td><input type="checkbox" name="wys" value="1" checked></td>
</tr>
<tr>
<td valign="top"><b>Treść:</b></td>
<td><textarea name="tresc" style="width:500px;height:300px;" id="elm1"></textarea><br>
<a href="javascript:toggleEditor(\'elm1\');">Dodaj/Usuń edytor</a>
</td>
</tr>
</table>
<input type="submit" value="Zapisz" name="addnews">
</form>

';

}


if($_GET['action']=="edit")
{

$Query='SELECT * FROM '.$pre.'news WHERE news_id="'.db_real_escape_string($_GET['id']).'"  ORDER by news_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'

<form action="up_news.php?id='.$row['news_id'].'" method="POST" name="frmt" onSubmit="return sprt()">

<table>
<tr>
<td><b>Tytuł:</b></td>
<td><input type="text" name="tytul" style="width:250px;" value="'.$row['news_tytul'].'"></td>
</tr>
<tr>
<td><b>Widoczny?:</b></td>
<td><input type="checkbox" name="wys" value="1" ';if($row['news_wys']){echo' checked';}echo'></td>
</tr>
<tr>
<td><b>Autor:</b></td>
<td><input type="text" name="autor" disabled="disabled" value="'.$row['news_user'].'"></td>
</tr>
<tr>
<td valign="top"><b>Treść:</b></td>
<td><textarea name="tresc" style="width:500px;height:300px;" id="elm1">'.$row['news_tresc'].'</textarea><br>
<a href="javascript:toggleEditor(\'elm1\');">Dodaj/Usuń edytor</a>
</td>
</tr>
</table>
<input type="submit" value="Zapisz" name="addnews">
</form>

';
$idk=$row['news_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiego newsa!</b></center>';
}

}

if($_GET['action']=="view")
{

$Query='SELECT * FROM '.$pre.'news WHERE news_id="'.db_real_escape_string($_GET['id']).'"  ORDER by news_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<table width="60%">
<tr>
<td><b>'.$row['news_tytul'].'</b></td>
</tr>
<tr>
<td>Autor: '.$row['news_autor'].' Data: '.$row['news_data'].'
</tr>
<tr>
<td>
'.$row['news_tresc'].'
</td>
</tr>
</table>
';
$idk=$row['news_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiego newsa!</b></center>';
}

}
?>