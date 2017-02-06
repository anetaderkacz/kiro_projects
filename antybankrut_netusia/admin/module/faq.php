<?php
if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';

if($_GET['e']==1)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>FAQ dodana.</b></center></div></div><br>';
}
if($_GET['e']==2)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>FAQ zmieniona.</b></center></div></div><br>';
}
if($_GET['e']=="t")
{
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Podaj nazwe.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."faq WHERE faq_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);


echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>FAQ usunięta.</b></center></div></div><br>';
}

echo'

<a href="index.php?page=faq&action=faq_add" title="Dodaj kategorie"><img src="style/images/add32.png" style="vertical-align: middle;"><b>Dodaj</b></a><br>
<br>
<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="70%" background="style/images/belka.gif" height="24" align="center"><b>Nazwa</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Zmień</b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'faq  ORDER by faq_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<tr>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['faq_id'].'</td>
<td width="70%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['faq_nazwa'].'</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=faq&action=faq_edit&id='.$row['faq_id'].'"><img src="style/images/edit.gif" title="Zmień"></a></td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=faq&v=delete&id='.$row['faq_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';

}

if($_GET['action']=="faq_add")
{
echo'

<form action="add_faq.php" method="POST" name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Nazwa:</b></td>
<td><input type="text" name="nazwa" style="width:250px;"></td>
</tr>
<tr>
<td valign="top"><b>Treść:</b></td>
<td><textarea name="tresc" style="width:500px;height:200px;" id="elm1"></textarea><br>
<a href="javascript:toggleEditor(\'elm1\');">Dodaj/Usuń edytor</a>
</td>
</tr>
</table>
<input type="submit" value="Dodaj" name="addfaq">
</form>

';

}


if($_GET['action']=="faq_edit")
{

$Query='SELECT * FROM '.$pre.'faq WHERE faq_id="'.db_real_escape_string($_GET['id']).'"  ORDER by faq_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'

<form action="up_faq.php?id='.$row['faq_id'].'" method="POST" name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Nazwa:</b></td>
<td><input type="text" name="nazwa" style="width:250px;" value="'.$row['faq_nazwa'].'"></td>
</tr>
<tr>
<td valign="top"><b>Treść:</b></td>
<td><textarea name="tresc" style="width:500px;height:200px;" id="elm1">'.$row['faq_tresc'].'</textarea><br>
<a href="javascript:toggleEditor(\'elm1\');">Dodaj/Usuń edytor</a>
</td>
</tr>
</table>
<input type="submit" value="Zmień" name="addfaq">
</form>

';
$idk=$row['faq_id'];
}

if($idk=="")
{
echo'<center><b>Brak</b></center>';
}

}
?>