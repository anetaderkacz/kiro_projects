<?php
include("../templates/".$ust['templates']."/config.php");

if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';

if($_GET['e']==1)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Menu dodane.</b></center></div></div><br>';
}
if($_GET['e']==2)
{
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Menu zmienione.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{

$del="DELETE FROM ".$pre."menu WHERE menu_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);

   $Query='SELECT * FROM '.$pre.'menu WHERE menu_s="'.db_real_escape_string($_GET['s']).'" AND menu_nr>"'.db_real_escape_string($_GET['nr']).'" ORDER by menu_id DESC'; 
   $result = db_query($Query) or die(db_error());
   while ($row = db_fetch($result)) 
   {
      $up="UPDATE ".$pre."menu SET menu_nr=menu_nr-1 WHERE menu_id='".$row['menu_id']."'";
      db_query($up);
   }

echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Menu usunięte.</b></center></div></div><br>';
}

echo'
<a href="index.php?page=menu&action=add" title="Dodaj menu"><img src="style/images/add32.png" style="vertical-align: middle;"><b>Dodaj</b></a><br>
<br>

<table width="80%">
<tr>';
if($t_conf_menu=="1" or $t_conf_menu=="3")
{
echo'
<td width="50%" style="border: 1px solid rgb(204, 204, 204);">
<center><b>Menu Lewe 34</b></center>
</td>';
}
if($t_conf_menu=="2" or $t_conf_menu=="3")
{
echo'
<td width="50%" style="border: 1px solid rgb(204, 204, 204);">
<center><b>Menu Prawe</b></center>
</td>';
}
echo'
</tr>
<tr>';
if($t_conf_menu=="1" or $t_conf_menu=="3")
{
echo'
<td valign="top" align="left" style="border: 1px solid rgb(204, 204, 204);">

<table width="100%">';

$ileml=db_query("SELECT * FROM ".$pre."menu WHERE menu_s='1'");
$ilel=db_num_rows($ileml);

$nrl=1;
$Query='SELECT * FROM '.$pre.'menu WHERE menu_s=1  ORDER by menu_nr ASC'; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<tr>
<td width="5%"  align="left" ';if($nrl!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
'.$row['menu_nr'].'
</td>
<td width="70%"  align="left" ';if($nrl!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
';if($row['menu_wys']=="1"){echo'<b style="color:green;" title="Widoczne">'.$row['menu_nazwa'].'</b>';}else{echo'<b style="color:orange;" title="Ukryte">'.$row['menu_nazwa'].'</b>';}echo'
</td>
<td width="5%" align="left" ';if($nrl!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
<a href="index.php?page=menu&action=edit&id='.$row['menu_id'].'" title="Zmień"><img src="style/images/edit.gif"></a>
</td>
<td width="5%" align="left" ';if($nrl!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
<a href="index.php?page=menu&action=&v=delete&id='.$row['menu_id'].'&s='.$row['menu_s'].'&nr='.$row['menu_nr'].'" title="Usuń" onclick="return(potwierdz())"><img src="style/images/delete.png"></a>
</td>
<td width="5%"  align="left"  ';if($nrl!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
';if($nrl==1){echo'';}else{echo'<a href="menu_edit.php?id='.$row['menu_id'].'&typ=top&s=1"><img src="style/images/up16.png" title=""></a>';}echo'<br>
';if($ilel==$nrl){echo'<br>';}else{echo'<a href="menu_edit.php?id='.$row['menu_id'].'&typ=down&s=1"><img src="style/images/down16.png" title="">';}echo'</a>
</td>';
if($t_conf_menu=="3")
{
echo'
<td width="5%" align="left"  ';if($nrl!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
<a href="menu_edit.php?id='.$row['menu_id'].'&typ=z&s=1"><img src="style/images/forward16.png" title=""></a>
</td>';
}
echo'
</tr>';
$nrl++;
}
echo'</table>

</td>';}
if($t_conf_menu=="2" or $t_conf_menu=="3")
{
echo'
<td valign="top" align="left" style="border: 1px solid rgb(204, 204, 204);">

<table width="100%">';

$ilemp=db_query("SELECT * FROM ".$pre."menu WHERE menu_s='2'");
$ilep=db_num_rows($ilemp);

$nrp=1;
$Query='SELECT * FROM '.$pre.'menu WHERE menu_s=2  ORDER by menu_nr ASC'; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<tr>
';
if($t_conf_menu=="3")
{
echo'
<td width="5%" align="left"  ';if($nrp!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
<a href="menu_edit.php?id='.$row['menu_id'].'&typ=z&s=2"><img src="style/images/back16.png" title=""></a>
</td>';
}echo'
<td width="5%"  align="left"  ';if($nrp!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
';if($nrp==1){echo'';}else{echo'<a href="menu_edit.php?id='.$row['menu_id'].'&typ=top&s=2"><img src="style/images/up16.png" title=""></a>';}echo'<br>
';if($ilep==$nrp){echo'<br>';}else{echo'<a href="menu_edit.php?id='.$row['menu_id'].'&typ=down&s=2"><img src="style/images/down16.png" title="">';}echo'</a>
</td>
<td width="5%" align="left" ';if($nrp!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
<a href="index.php?page=menu&action=edit&id='.$row['menu_id'].'" title="Zmień"><img src="style/images/edit.gif"></a>
</td>
<td width="5%" align="left" ';if($nrp!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
<a href="index.php?page=menu&action=&v=delete&id='.$row['menu_id'].'&s='.$row['menu_s'].'&nr='.$row['menu_nr'].'" title="Usuń" onclick="return(potwierdz())"><img src="style/images/delete.png"></a>
</td>
<td width="70%"  align="left" ';if($nrp!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
';if($row['menu_wys']=="1"){echo'<b style="color:green;" title="Widoczne">'.$row['menu_nazwa'].'</b>';}else{echo'<b style="color:orange;" title="Ukryte">'.$row['menu_nazwa'].'</b>';}echo'
</td>
<td width="5%"  align="left" ';if($nrp!=1){echo'style="border-top: 1px solid rgb(204, 204, 204);"';}echo'>
'.$row['menu_nr'].'
</td>
</tr>';
$nrp++;
}
echo'</table>


</td>';}
echo'
</tr>
</table>
<br>
<center>
<b style="color:green;">TXT</b> - <b>Menu widoczne</b> | <b style="color:orange;">TXT</b> - <b>Menu ukryte</b>
</center>

';
}


if($_GET['action']=="add")
{
echo'

<form action="add_menu.php" method="POST" name="frmn" onSubmit="return sprn();">

<table>
<tr>
<td><b>Nazwa:</b></td>
<td><input type="text" name="nazwa" style="width:250px;"></td>
</tr>
<tr>
<td><b>Widoczny?:</b></td>
<td><input type="checkbox" name="wys" value="1" checked></td>
</tr>
<tr>
<td><b>Strona:</b></td>
<td><select name="s"><option value="1">Lewa</a><option value="2">Prawa</option></select></td>
</tr>
<tr>
<td><b>Funkcja:</b></td>
<td><select name="tf" id="tf" onchange="panel_f();"><option value="">Własna treść</option>';



$d = dir("../panele/");
while (false !== ($entry = $d->read())) {
   if(is_dir($entry))
{
}
else
{

      echo"<option value='".$entry."'>$entry</option>";
}
}

echo'</select>
</td>
</tr>
<div id="paneltresc">
<tr>
<td valign="top"><b>Treśc:</b></td>
<td><textarea name="tresc" style="width:300px;height:100px;" ></textarea></td>
</tr>
</div>
</table>
<input type="submit" value="Dodaj" name="addcat">
</form>

';

}


if($_GET['action']=="edit")
{

$Query='SELECT * FROM '.$pre.'menu WHERE menu_id="'.db_real_escape_string($_GET['id']).'" limit 1'; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'
<center>
<form action="up_menu.php?id='.$row['menu_id'].'" method="POST" name="frmn" onSubmit="return sprn()">

<table>
<tr>
<td><b>Nazwa:</b></td>
<td><input type="text" name="nazwa" style="width:250px;" value="'.$row['menu_nazwa'].'"></td>
</tr>
<tr>
<td><b>Widoczny?:</b></td>
<td><input type="checkbox" name="wys" value="1" ';if($row['menu_wys']){echo' checked';}echo'></td>
</tr>
<tr>
<td><b>Funkcja:</b></td>
<td><select name="tf" id="tf" onchange="panel_f();"><option value="">Własna treść</option>';



$d = dir("../panele/");
while (false !== ($entry = $d->read())) {
   if(is_dir($entry))
{
}
else
{

      echo"<option"; if($row['menu_t']==$entry){echo' selected="selected"';}echo" value='".$entry."'>$entry</option>";
}
}

echo'</select>
</td>
</tr>
<div id="paneltresc">
<tr>
<td valign="top"><b>Treśc:</b></td>
<td><textarea name="tresc" style="width:300px;height:100px;" >'.$row['menu_tresc'].'</textarea></td>
</tr>
</div>
</table>

<input type="submit" value="Zmień" name="addcat">
</form>
</center>
';
$idk=$row['menu_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiego menu</b></center>';
}

}
?>