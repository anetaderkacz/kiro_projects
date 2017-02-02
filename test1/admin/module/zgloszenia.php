<?php 
if($indexphp!="ok"){exit();}


echo'<center>';


if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."zgloszenia WHERE z_id='".db_real_escape_string($_GET['id_del'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Zgloszenie usunięte.</b></center></div></div><br>';
}

//----------------

$k=0;

$Query='SELECT * FROM '.$pre.'zgloszenia left join '.$pre.'artykul ON z_ogl=art_id ORDER by z_id DESC'; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<table>
<tr>
<td><a href="index.php?page=zgloszenia&id_del='.$row['z_id'].'&v=delete">Usun zgloszenia</a></td>
<td></td>
</tr>
<tr>
<td>Kto zgłasza</td>
<td>';if($row['z_user']>=1){echo'<a href="user/'.namen(get_login_user($row['z_user'])).'/'.$row['z_user'].'">'.get_login_user($row['z_user']).'</a>';}else{echo'bez rejestracji';}echo'</td>
</tr>
<tr>
<td>Ogłoszenie</td>
<td><a href="index.php?page=artykuly&action=view&id='.$row['z_ogl'].'">'.$row['art_tytul'].'</a> </td>
</tr>
<tr>
<td>Data</td>
<td>'.date("d-m-Y H:i",$row['z_data']).'</td>
</tr>
<tr>
<td>Tresc</td>
<td>'.$row['z_tresc'].'</td>
</tr>
</table>
<hr>
';
$k++;
}

if($k=="0"){echo'<center><b>Brak zgłoszeń.</b></center>';}


?>