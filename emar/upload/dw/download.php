<?
require "config.php";

function viewfiles($kategoria, $sort="nazwa") {
   $title = "Dzia³ download";
   include "top.inc";
   $query = "SELECT nazwa FROM kategorie WHERE id='$kategoria'";
   $wynik = mysql_query($query);
   $row = mysql_fetch_array($wynik);
   
   echo "<div ALIGN=\"center\" class=\"tytul\"><b>$title</b><br> Kategoria:  " . $row['nazwa'] . "</div><BR>";
   
   $query = "SELECT * FROM pliki WHERE kategoria='$kategoria' ORDER BY $sort";
   $wynik = mysql_query($query);
   
   if(mysql_num_rows($wynik)==0) {
      echo "<div align=\"center\">";
      
      view_search_form();
      
      echo "<span class=\"tytul\"><br><br>W tej kategorii nie ma jeszcze ¿adnych plików!!!<br><a href=\"javascript:history.back()\"><<< Powrót</a></span></div>";
      exit();
   }  
   
   echo "<span class=\"tekst\"><FORM>Sortuj wed³ug: <SELECT NAME=\"str\" OnChange=\"przenies(this)\">\n"
   ."<OPTION VALUE=\"nazwa\"> nazwy </OPTION>\n"
   ."<OPTION VALUE=\"wielkosc\"> wielko¶ci </OPTION>\n"
   ."<OPTION VALUE=\"ilosc_pobran\"> ilo¶ci pobrañ </OPTION>\n"
   ."<OPTION VALUE=\"opis\"> opisu </OPTION>\n"
   ."<OPTION VALUE=\"data_dodania\"> daty dodania </OPTION>\n"
   ."</SELECT>\n"
   ."</form></span> ";
   
   view_search_form();
   
   echo "<span class=\"tekst\">";
   
   
   while($row = mysql_fetch_array($wynik)) {
      echo "<br><b>Plik:</b> <a href=\"download.php?op=getit&id=" . $row['id'] . "\">" . $row['nazwa'] . "</a>\n";
      echo "<br><b>Wielko¶æ:</b> " . $row['wielkosc'] . " kb\n";
      echo "<br><b>Pobrañ:</b> " . $row['ilosc_pobran'];
      echo "<br><b>Data dodania:</b> " . $row['data_dodania'];
      echo "<br><b>Opis:</b> " . $row['opis'] . "<br>\n";
   }
   echo "</span><br><div class=\"kategorie\">Wszystkie kategorie:<br> | ";
   $query = "SELECT * FROM kategorie ORDER BY nazwa";
   $wynik = mysql_query($query);
   
   while($row = mysql_fetch_array($wynik)) {
      echo "<a href=\"download.php?op=view&kat=" . $row['id'] . "\">" . $row['nazwa'] . "</a> | ";
   }
   
   echo "</div>";
}

function getit($id) {
   $query = "SELECT url FROM pliki WHERE id='$id'";
   $wynik = mysql_query($query);
   $row = mysql_fetch_array($wynik);
   
   Header("Location: ".$row['url']);
   
   $query = "UPDATE pliki SET ilosc_pobran=ilosc_pobran+1 WHERE id='$id'";
   $wynik = mysql_query($query);
   exit();
}

function index() {
   include "top.inc";
   $query = "SELECT * FROM kategorie ORDER BY nazwa";
   $wynik = mysql_query($query);
   
   echo "<div ALIGN=\"center\" class=\"tytul\"><b>Dzia³ download</b></div><BR><BR>\n";
   view_search_form();
   
   echo "<span class=\"kategorie\"><b>Kategorie:</b></span><BR><BR>\n";   
   
   while($row = mysql_fetch_array($wynik)) {
      echo "<a href=\"download.php?op=view&kat=" . $row['id'] . "\">" . $row['nazwa'] . "</a><br>\n";
      echo "<span class=\"tekst\">" . $row['opis'] . "</span><BR><BR>\n";
   }
   
}

switch($op) {
   case "view":
   if($sort=="") { $sort="nazwa"; }
   viewfiles($kat, $sort);
   break;
   case "getit":
   getit($id);
   break;
   default:
   index();
   break;
}
?>

</BODY>
</HTML>

