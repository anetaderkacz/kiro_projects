<?
require "config.php";
include "top.inc";

echo "<div ALIGN=\"center\" class=\"tytul\"><b>Dzia³ download</b><br>Wyszukiwarka plików</div><BR>";


if(isset($q) && $q<>"") {
   $query = "SELECT * FROM pliki WHERE nazwa LIKE '%$q%' OR opis LIKE '%$q%'";
   $wynik = mysql_query($query);
   $ilosc = mysql_num_rows($wynik);
   if($ilosc==0) {
      
      echo "<div align=\"center\">";
      
      view_search_form();
      
      echo "<span class=\"tytul\"><br><br>Nie odnaleziono ¿adnych plików pasuj±cych do wyra¿enia: <b>$q</b><br><a href=\"javascript:history.back()\"><<< Powrót</a></span></div>";
      exit();
   }  
   
   echo "<span class=\"tekst\">";
   if($ilosc>4) {
      echo "Odnaleziono $ilosc plików pazuj±cych do wyra¿enia: <b>$q</b><br>";
   }
   elseif($ilosc==1) {
      echo "Odnaleziono 1 plik pasuj±cy do wyra¿enia: <b>$q</b><br>";
   }
   else {
      echo "Odnaleziono $ilosc pliki pasuj±ce do wyra¿enia: <b>$q</b><br>";
   }   
   while($row = mysql_fetch_array($wynik)) {
      echo "<br><b>Plik:</b> <a href=\"download.php?op=give&id=" . $row['id'] . "\">" . $row['nazwa'] . "</a>";
      echo "<br><b>Wielko¶æ:</b> " . $row['wielkosc'] . " kb";
      echo "<br><b>Pobrañ:</b> " . $row['ilosc_pobran'];
      echo "<br><b>Data dodania:</b> " . $row['data_dodania'];
      echo "<br><b>Opis:</b> " . $row['opis'] . "<br>";
   }
   
   view_search_form();
   
}
else {
   echo "<div align=\"center\">";
   
   view_search_form();
   
   echo "<span class=\"tytul\"><br><br>Nie poda³e¶ co skrypt ma wyszukiwaæ!<br><a href=\"javascript:history.back()\"><<< Powrót</a></span></div>";
   
}
?>

</body>
</html>




