<?php
if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';

if($_GET['e']==1)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Strona zapisana.</b></center></div></div><br>';
}
if($_GET['e']==2)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Strona zmieniona.</b></center></div></div><br>';
}
if($_GET['e']=="t")
{
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Podaj nazwe.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."strony WHERE strony_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Strona usunięta.</b></center></div></div><br>';
}

echo'

<a href="index.php?page=strony&action=add" title="Dodaj stronę"><img src="style/images/add32.png" style="vertical-align: middle;"><b>Dodaj</b></a><br>
<br>
<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="65%" background="style/images/belka.gif" height="24" align="center"><b>Nazwa</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Widoczna</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Zmień</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'strony  ORDER by strony_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['strony_id'].'</td>
<td width="65%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=strony&action=view&id='.$row['strony_id'].'" title="Zobacz strone">'.$row['strony_nazwa'].'</a>
<br>
Adres: <textarea name="" style="width:400px;height:20px;">'.$ust['adres'].'page/'.$row['strony_id'].'/'.namen($row['strony_nazwa']).'</textarea>
</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['strony_wys']=="1"){echo'<img src="style/images/ok16.png" title="Widoczna">';}else{echo'<b title="Ukryta">---</b>';}echo'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=strony&action=edit&id='.$row['strony_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=strony&v=delete&id='.$row['strony_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';

}

if($_GET['action']=="add")
{
echo'

<form action="add_strony.php" method="POST" name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Tytuł:</b></td>
<td><input type="text" name="nazwa" style="width:250px;"></td>
</tr>
<tr>
<td><b>Widoczna?:</b></td>
<td><input type="checkbox" name="wys" value="1" checked></td>
</tr>
<tr>
<td valign="top"><b>Treść:</b></td>
<td><textarea name="tresc" style="width:500px;height:300px;" id="elm1"></textarea><br>
<a href="javascript:toggleEditor(\'elm1\');">Dodaj/Usuń edytor</a>
</td>
</tr>
</table>
<input type="submit" value="Zapisz" name="addstrony">
</form>

';

}


if($_GET['action']=="edit")
{

$Query='SELECT * FROM '.$pre.'strony WHERE strony_id="'.db_real_escape_string($_GET['id']).'"  ORDER by strony_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'

<form action="up_strony.php?id='.$row['strony_id'].'" method="POST"  name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Tytuł:</b></td>
<td><input type="text" name="nazwa" style="width:250px;" value="'.$row['strony_nazwa'].'"></td>
</tr>
<tr>
<td><b>Widoczna?:</b></td>
<td><input type="checkbox" name="wys" value="1" ';if($row['strony_wys']){echo' checked';}echo'></td>
</tr>
<tr>
<td valign="top"><b>Treść:</b></td>
<td><textarea name="tresc" style="width:500px;height:300px;" id="elm1">'.$row['strony_tresc'].'</textarea><br>
<a href="javascript:toggleEditor(\'elm1\');">Dodaj/Usuń edytor</a>
</td>
</tr>
</table>
<input type="submit" value="Zapisz" name="addstrony">
</form>

';
$idk=$row['strony_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiej strony!</b></center>';
}

}

if($_GET['action']=="view")
{

$Query='SELECT * FROM '.$pre.'strony WHERE strony_id="'.db_real_escape_string($_GET['id']).'"  ORDER by strony_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<table width="60%">
<tr>
<td><b>'.$row['strony_nazwa'].'</b></td>
</tr>
<tr>
<td>
'.$row['strony_tresc'].'
</td>
</tr>
</table>
';
$idk=$row['strony_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiej strony!</b></center>';
}

}
?>