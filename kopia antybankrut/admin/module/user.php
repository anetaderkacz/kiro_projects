<?php
if($indexphp!="ok"){exit();}

if($_GET['action']=="")
{

echo'<center>';


if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."user WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Użytkownik usunięty.</b></center></div></div><br>';
}
if($_GET['v']=="addadm")
{
$del="UPDATE ".$pre."user SET user_t='3' WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Nadano range administratora użytkownikowi.</b></center></div></div><br>';
}
if($_GET['v']=="akt")
{
$del="UPDATE ".$pre."user SET user_akt='1' WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Aktywowano.</b></center></div></div><br>';
}
if($_GET['v']=="readm")
{
$del="UPDATE ".$pre."user SET user_t='1' WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>usunięto range administratora użytkownikowi.</b></center></div></div><br>';
}
echo'

<table width="90%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>id</b></td>
<td width="35%" background="style/images/belka.gif" height="24" align="center"><b>Nick</b></td>
<td width="30%" background="style/images/belka.gif" height="24" align="center"><b>Email</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Akt</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Admin</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Zobacz</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$zapytanie ='SELECT * FROM '.$pre.'user  ORDER by user_id DESC '; 
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

$link="index.php?page=user&strona=";


while($row=db_fetch($final))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['user_id'].'</td>
<td width="35%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['user_t']=="3"){echo'<span style="color:green;" title="Admin"><b>'.$row['user_login'].'</b></span>';}else if($row['user_akt']=="0"){echo'<span style="color:red;" title="Nie aktywny"><b>'.$row['user_login'].'</b></span>';}else{echo''.$row['user_login'].'';}echo'</td>
<td width="30%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['user_email'].'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['user_akt']!="1"){echo'<a href="index.php?page=user&v=akt&id='.$row['user_id'].'"><img src="style/images/ok16.png" title="Aktywuj"></a>';}echo'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">';if($row['user_t']=="3"){echo'<a href="index.php?page=user&v=readm&id='.$row['user_id'].'"><img src="style/images/reuser16.png" title="Usuń range Administrator"></a>';}else{echo'<a href="index.php?page=user&v=addadm&id='.$row['user_id'].'"><img src="style/images/adduser16.png" title="Nadaj range Administrator"></a>';}echo'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=user&action=view&id='.$row['user_id'].'"><img src="style/images/2user16.png" title="Zobacz"></a></td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=user&v=delete&id='.$row['user_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';
include("include/podzial.php");
}



if($_GET['action']=="view")
{


if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."user WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Użytkownik usunięty.</b></center></div></div><br>';
}
if($_GET['v']=="addadm")
{
$del="UPDATE ".$pre."user SET user_t='3' WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Nadano range administratora użytkownikowi.</b></center></div></div><br>';
}
if($_GET['v']=="readm")
{
$del="UPDATE ".$pre."user SET user_t='1' WHERE user_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>usunięto range administratora użytkownikowi.</b></center></div></div><br>';
}

$Query='SELECT * FROM '.$pre.'user WHERE user_id="'.db_real_escape_string($_GET['id']).'" '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
if($row['user_t']=="3"){echo'<a href="index.php?page=user&action=view&v=readm&id='.$row['user_id'].'"><img src="style/images/reuser16.png" title="Usuń range Administrator"></a>';}else{echo'<a href="index.php?page=user&action=view&v=addadm&id='.$row['user_id'].'"><img src="style/images/adduser16.png" title="Nadaj range Administrator"></a>';}echo' | 
<a href="index.php?page=user&action=view&v=delete&id='.$row['user_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a><br><br>';
if($row['user_fotka']!=""){echo'<img src="../upload/user/'.$row['user_fotka'].'">';}

echo'
<table>
<tr>
<td><b>Login:</b></td>
<td>';if($row['user_t']=="3"){echo'<span style="color:green;" title="Admin"><b>'.$row['user_login'].'</b></span>';}else if($row['user_akt']=="0"){echo'<span style="color:red;" title="Nie aktywny"><b>'.$row['user_login'].'</b></span>';}else{echo''.$row['user_login'].'';}echo'</td>
</tr>
<tr>
<td><b>Email:</b></td>
<td>'.$row['user_email'].'</td>
</tr>
<tr>
<td><b>Płeć:</b></td>
<td>'; if($row['user_plec']==1){echo'Kobieta';}if($row['user_plec']==2){echo'Mężczyzna';}echo'</td>
</tr>
<tr>
<td><b>Data urodzenia:</b></td>
<td>'.$row['user_d'].'.'.$row['user_m'].'.'.$row['user_y'].'<br><small>DD.MM.YYYY</small></td>
</tr>
<tr>
<td><b>Rejestracja z IP:</b></td>
<td>'.$row['user_rip'].'</td>
</tr>
<tr>
<td><b>Ostatnie logowasnie z IP:</b></td>
<td>'.$row['user_lip'].'</td>
</tr>
<tr>
<td><b>GG:</b></td>
<td>'.$row['user_GG'].'</td>
</tr>
<tr>
<td><b>Strona:</b></td>
<td>'.$row['user_strona'].'</td>
</tr>
<tr>
<td><b>Data rejestracji:</b></td>
<td>'.$row['user_data_r'].'</td>
</tr>
<tr>
<td><b>Ostatnia wizyta:</b></td>
<td>'.$row['user_data_o'].'</td>
</tr>
<tr>
<td><b>O Mnie:</b></td>
<td>'.$row['user_omnie'].'</td>
</tr>
</table>
<br>
';if($row['user_t']=="3"){echo'<a href="index.php?page=user&action=view&v=readm&id='.$row['user_id'].'"><img src="style/images/reuser16.png" title="Usuń range Administrator"></a>';}else{echo'<a href="index.php?page=user&action=view&v=addadm&id='.$row['user_id'].'"><img src="style/images/adduser16.png" title="Nadaj range Administrator"></a>';}echo' | 
<a href="index.php?page=user&action=view&v=delete&id='.$row['user_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a>
';

$idk=$row['user_id'];
}

if($idk=="")
{
echo'<center><b>Brak takiego użytkownika!</b></center>';
}

}
?>