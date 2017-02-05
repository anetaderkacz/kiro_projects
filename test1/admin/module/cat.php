<?php
if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';

if($_GET['e']==1)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Kategoria dodana.</b></center></div></div><br>';
}
if($_GET['e']==2)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Kategoria zmieniona.</b></center></div></div><br>';
}
if($_GET['e']=="t")
{
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Podaj nazwe.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."cat WHERE cat_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);

$Query='SELECT * FROM '.$pre.'artykul WHERE art_cat="'.db_real_escape_string($_GET['id']).'"'; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
  $del="DELETE FROM ".$pre."artykul WHERE art_id='".db_real_escape_string($row['art_id'])."'";
  db_query($del);
}

echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Kategoria usunięta.</b></center></div></div><br>';
}

echo'

<a href="index.php?page=cat&action=cat_add" title="Dodaj kategorie"><img src="style/images/add32.png" style="vertical-align: middle;"><b>Dodaj</b></a><br>
<br>
<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>

<td width="70%" background="style/images/belka.gif" height="24" align="center"><b>Nazwa</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Zmień</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$ii=1;
$Query='SELECT * FROM '.$pre.'cat WHERE cat_pod="0" ORDER by cat_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<tr>
<td width="70%" bgcolor="#dddddd"  align="left">'.$row['cat_nazwa'].'</td>
<td width="10%" bgcolor="#dddddd"  align="center"><a href="index.php?page=cat&action=cat_edit&id='.$row['cat_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="10%" bgcolor="#dddddd"  align="center"><a href="index.php?page=cat&v=delete&id='.$row['cat_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';

$Query1='SELECT * FROM '.$pre.'cat WHERE cat_pod="'.$row['cat_id'].'"  ORDER by cat_id DESC '; 
$result1 = db_query($Query1) or die(db_error());
while($row1=db_fetch($result1))
{
echo'<tr>
<td width="70%"  align="center">'.$row1['cat_nazwa'].'</td>
<td width="10%"  align="center"><a href="index.php?page=cat&action=cat_edit&id='.$row1['cat_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="10%"  align="center"><a href="index.php?page=cat&v=delete&id='.$row1['cat_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$ii++;
}

$i++;
}
echo'</table>';

}

if($_GET['action']=="cat_add")
{
echo'

<form action="add_cat.php" method="POST" name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Główna:</b></td>
<td><select name="pod">
<option value="0">Główna kategoria</option>
';
$Query='SELECT * FROM '.$pre.'cat WHERE cat_pod="0"  ORDER by cat_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<option value="'.$row['cat_id'].'">'.$row['cat_nazwa'].'</option>';
}
echo';
</select>
</td>
</tr>
<tr>
<td><b>Nazwa:</b></td>
<td><input type="text" name="nazwa" style="width:250px;"></td>
</tr>
</table>
<input type="submit" value="Dodaj" name="addcat">
</form>

';

}


if($_GET['action']=="cat_edit")
{

$Query='SELECT * FROM '.$pre.'cat WHERE cat_id="'.db_real_escape_string($_GET['id']).'"  ORDER by cat_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'

<form action="up_cat.php?id='.$row['cat_id'].'" method="POST" name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Główna:</b></td>
<td><select name="pod">
<option value="0">Główna kategoria</option>
';
$Query1='SELECT * FROM '.$pre.'cat WHERE cat_pod="0"  ORDER by cat_id DESC '; 
$result1 = db_query($Query1) or die(db_error());
while($row1=db_fetch($result1))
{
echo'<option value="'.$row1['cat_id'].'"';if($row1['cat_id']==$row['cat_pod']){echo' selected="selected"';}echo'>'.$row1['cat_nazwa'].'</option>';
}
echo';
</select>
</td>
</tr>
<tr>
<td><b>Nazwa:</b></td>
<td><input type="text" name="nazwa" style="width:250px;" value="'.$row['cat_nazwa'].'"></td>
</tr>
</table>
<input type="submit" value="Zmień" name="addcat">
</form>

';
$idk=$row['cat_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiej kategorii!</b></center>';
}

}
?>