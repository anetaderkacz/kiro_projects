<?
require "config.php";
$title = "Administracja dzia³em download";
include "top.inc";

echo "<div ALIGN=\"center\" class=\"tytul\"><b>$title</b></div><BR>";

function del($id, $co="pliki") {
   
   $query = "DELETE FROM $co WHERE id='$id'";
   $wynik = mysql_query($query);
   view_all();
   
}

function new_file($nazwa, $opis, $data, $url, $wielkosc, $kategoria) {
   $query = "INSERT INTO pliki (nazwa, url, opis, wielkosc, data_dodania, kategoria) VALUES ('$nazwa', '$url', '$opis', '$wielkosc', '$data', '$kategoria')";
   $wynik = mysql_query($query);
   view_all();
   
}

function new_kat($nazwa, $opis) {
   $query = "INSERT INTO kategorie (nazwa, opis) VALUES ('$nazwa', '$opis')";
   $wynik = mysql_query($query);
   view_all();
   
}

function view_all($sort="nazwa") {
   
?>
<div align="center" class="kategorie"><b>Wszystkie kategorie:</b></div>
<TABLE WIDTH=95% BORDER=1 ALIGN="CENTER" CELLSPACING=1 BORDERCOLOR="#000000">

    <TR>
      <TD align=center>ID</TD>
      <TD align=center>Nazwa</TD>
      <TD align=center>Opis</TD>
      <TD>&nbsp;</TD>
    </TR>
<?
   
   $query = "SELECT * FROM kategorie ORDER BY nazwa";
   $wynik = mysql_query($query);
   
   while($row = mysql_fetch_array($wynik)) {
      $$row['id'] = $row['nazwa'];
      
      echo "<TR>\n"
      ."<TD align=center>".$row['id']."</TD>\n"
      ."<TD align=center>".$row['nazwa']."</TD>\n"
      ."<TD align=center>".$row['opis']."</TD>\n"
      ."<TD align=center><a href=admin.php?op=del_k&id=".$row['id'].">Usuñ</a></TD>\n"
      ."</TR>\n";
      
   }
   echo "</table>";
?>
<br>
<div align="center" class="kategorie"><b>Wszystkie pliki:</b></div>
<TABLE WIDTH=95% BORDER=1 ALIGN="CENTER" CELLSPACING=1 BORDERCOLOR="#000000">

    <TR>
      <TD align=center><A HREF="admin.php?sort=id">ID</a></TD>
      <TD align=center><A HREF="admin.php?sort=nazwa">Nazwa</a></TD>
      <TD align=center><A HREF="admin.php?sort=url">Adres</a></TD>
      <TD align=center><A HREF="admin.php?sort=wielkosc">Wielko¶æ</a></TD>
      <TD align=center><A HREF="admin.php?sort=ilosc_pobran">Ilo¶æ pobrañ</a></TD>
      <TD align=center><A HREF="admin.php?sort=data_dodania">Data dodania</a></TD>
      <TD align=center><A HREF="admin.php?sort=opis">Opis</a></TD>
      <TD align=center><A HREF="admin.php?sort=kategoria">Kategoria</a></TD>
      <TD>&nbsp;</TD>
	</TR>
<?
   
   $query = "SELECT * FROM pliki ORDER BY $sort";
   $wynik = mysql_query($query);
   
   while($row = mysql_fetch_array($wynik)) {
      
      echo "<TR>\n"
      ."<TD align=center>".$row['id']."</TD>\n"
      ."<TD align=center>".$row['nazwa']."</TD>\n"
      ."<TD align=center>".$row['url']."</TD>\n"
      ."<TD align=center>".$row['wielkosc']."</TD>\n"
      ."<TD align=center>".$row['ilosc_pobran']."</TD>\n"
      ."<TD align=center>".$row['data_dodania']."</TD>\n"
      ."<TD align=center>".$row['opis']."</TD>\n"
      ."<TD align=center>".$$row['kategoria']."</TD>\n"
      ."<TD align=center><a href=admin.php?op=del_p&id=".$row['id'].">Usuñ</a></TD>\n"
      ."</TR>\n";
      
   }
   echo "</TABLE>";
}

switch($op) {
   case "del_p":
   del($id);
   break;
   case "del_k":
   del($id, "kategorie");
   break;
   case "new_file":
   new_file($nazwa, $opis, $data, $url, $wielkosc, $kategoria);
   break;
   case "new_kat":
   new_kat($nazwa, $opis);
   break;
   default:
   if(isset($sort)) view_all($sort);
   if(!isset($sort)) view_all();
   break;
}
?>
<div class="tekst" align="center"> 
<br>Dodaj nowy plik:<br>
<FORM ACTION="admin.php?op=new_file" METHOD=POST>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 ALIGN="CENTER">

    <TR>
      <TD ALIGN="RIGHT">Nazwa pliku:</TD>
      <TD><INPUT TYPE="text" NAME="nazwa" SIZE=20 MAXLENGTH=40></TD>
    </TR>
    <TR>
      <TD ALIGN="RIGHT">Adres pliku:</TD>
      <TD><INPUT TYPE="text" NAME="url" SIZE=20 MAXLENGTH=40></TD>
    </TR>
    <TR>
      <TD ALIGN="RIGHT">Wielko¶æ pliku (w kb):</TD>
      <TD><INPUT TYPE="text" NAME="wielkosc" SIZE=20 MAXLENGTH=40></TD>
    </TR>
    <TR>
      <TD ALIGN="RIGHT">Opis:</TD>
      <TD><TEXTAREA NAME="opis" COLS=20 ROWS=2></TEXTAREA></TD>
    </TR>
    <TR>
      <TD ALIGN="RIGHT">Data dodania:</TD>
      <TD><INPUT TYPE="text" NAME="data" VALUE="<?=date('Y-m-d')?>" SIZE=20 MAXLENGTH=40></TD>
    </TR>
    <TR>
      <TD ALIGN="RIGHT">Kategoria:</TD>
      <TD><SELECT NAME="kategoria">
<?
$query = "SELECT id, nazwa FROM kategorie ORDER BY nazwa";
$wynik = mysql_query($query);

while($row = mysql_fetch_array($wynik)) {
   
   echo "<OPTION VALUE=\"". $row['id'] ."\">" . $row['nazwa'];
   
}

?>
</SELECT></TD>
    </TR>
    <TR>
      <TD COLSPAN=2 ALIGN="CENTER"><INPUT TYPE="submit" VALUE="Wy¶lij"></TD>
    </TR>
</TABLE>

</FORM>

<br>Dodaj now± kategoriê:<br>
<FORM ACTION="admin.php?op=new_kat" METHOD=POST>

<TABLE BORDER=0 CELLPADDING=0 CELLSPACING=0 ALIGN="CENTER">

    <TR>
      <TD ALIGN="RIGHT">Nazwa kategorii:</TD>
      <TD><INPUT TYPE="text" NAME="nazwa" SIZE=20 MAXLENGTH=40></TD>
    </TR>
    <TR>
    <TR>
      <TD ALIGN="RIGHT">Opis:</TD>
      <TD><TEXTAREA NAME="opis" COLS=20 ROWS=2></TEXTAREA></TD>
    </TR>
    <TR>
      <TD COLSPAN=2 ALIGN="CENTER"><INPUT TYPE="submit" VALUE="Wy¶lij"></TD>
    </TR>
</TABLE>

</FORM>
</div>

</body>
</html>
