<?
$url = "localhost"; //adres bazy danych
$login = ""; //nazwa u¿ytkownika bazy danych
$haslo = ""; //has³o u¿ytkownika bazy danych
$dbname = "download"; //nazwa bazy danych

mysql_connect($url,$login,$haslo);
mysql_select_db($dbname);

function view_search_form() {
   echo "<span class=\"tekst\"><FORM ACTION=\"szukaj.php\" METHOD=GET>\n"
   ."Szukaj pliku: <INPUT TYPE=\"text\" NAME=\"q\" SIZE=20> <INPUT TYPE=\"submit\" VALUE=\"Szukaj\">\n"
   ."</FORM></span>\n";
}
?>
