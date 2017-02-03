<?php
if($indexphp!="ok"){exit();}
include("../include/pay_set.php");
echo'
<center>
<table width="1000">
<tr>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=podstawowe"><b>Podstawowe</b></a> </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=artykuly"><b>Ogłoszenia</b></a> </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=galerie"><b>Zdjęcia</b></a> </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=rejestracja"><b>Rejestracja</b></a> </td> 
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=news"><b>News</b></a> </td>
</tr><tr>

<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=reklama"><b>Reklama</b></a> </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=kontakt"><b>Kontakt</b></a> </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=regulamin"><b>Regulamin</b></a>  </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=woj"><b>Wojewodztwa</b></a></td>
<td></td>
</tr>
</table>
</center>
';


if($_GET['action']=="reklama" )
{


echo'
<br>
<a name="glowne"></a>
<b>Reklama:</b><br>
<form action="up_reklama.php" method="POST">

<table>
<tr>
<td valign="top">Reklama Góra:</td></tr><tr>
<td><textarea name="r_j" style="width:600px;height:150px;">'.$ust['r_j'].'</textarea></td>
</tr>
<tr>
<td valign="top">Reklama strona ogłoszenia:</td></tr><tr>
<td><textarea name="r_d" style="width:600px;height:150px;">'.$ust['r_d'].'</textarea></td>
</tr>
<tr>
<td valign="top">Reklama stopka:</td></tr><tr>
<td><textarea name="r_t" style="width:600px;height:150px;">'.$ust['r_t'].'</textarea></td>
</tr>
</table>

<input type="submit" name="Zapisz" value="Zapisz">
</form>
';



}


if($_GET['action']=="woj" )
{


echo'
<br>
<a name="glowne"></a>
<b>Wojewodztwa:</b><br>';



echo'
<form action="dodaj_woj.php" method="POST">
Nazwa: <input type="text" name="nazwa"><input type="submit" name="ddd" value="Dodaj"></form>


';
if($_GET['v']=="dodane")
{

echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Dodane.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."woj WHERE w_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Usunięte.</b></center></div></div><br>';
}

echo'<br><br>
<table width="40%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b></b></td>
<td width="90%" background="style/images/belka.gif" height="24" align="center"><b>Nazwa</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'woj  ORDER by w_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$i.'</td>
<td width="90%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['w_nazwa'].'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=ustawienia&action=woj&v=delete&id='.$row['w_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>';

}
if($_GET['action']=="podstawowe" or $_GET['action']=="")
{
echo'<br><form action="ust_up_p.php" method="POST">

<center>

</center>
<a name="glowne"></a>
<b>Podstawowe:</b><br>
';
if($_GET['e']==1)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td>Nazwa strony:</td><td><input type="text" name="nazwa" value="'.$ust['nazwa'].'" style="width:200px;"></td>
</tr>
<tr>
<td>Słowa kluczowe:</td><td><input type="text" name="meta_key" value="'.$ust['meta_key'].'" style="width:200px;"></td>
</tr>
<tr>
<td>Opis strony:</td><td><textarea name="meta_desc" style="width:300px;height:50px;">'.$ust['meta_desc'].'</textarea></td>
</tr>
<tr>
<td valign="top">Adres:</td><td><input type="text" name="adres" value="'.$ust['adres'].'" style="width:200px;"> <br>
<small>Pamietaj o koncowym <b>/</b></small></td>
</tr>
<tr>
<td valign="top">Komunikat cookie:</td><td valign="top"><input type="radio" name="cookie_on" value="1"'; if($ust['cookie_on']==1){echo' checked';} echo'>Tak <input type="radio" name="cookie_on" value="0"'; if($ust['cookie_on']==0){echo' checked';} echo'>Nie</td>
</tr>

<tr>
<td>Templates:</td>
<td><select name="templates">';



$d = dir("../templates/");
while (false !== ($entry = $d->read())) {
   if(is_dir($entry))
{
}
else
{

      echo"<option"; if($entry==$ust['templates']){echo' selected="selected"';} echo" value='".$entry."'>$entry</option>";
}
}

echo'</select>
</td>
</tr>
<tr>
<td>Język domyślny:</td>
<td><select name="lang_d">';



$d = dir("../lang/");
while (false !== ($entry = $d->read())) {
   if(is_dir($entry))
{
}
else
{

      echo"<option"; if($entry==$ust['lang_d']){echo' selected="selected"';} echo" value='".$entry."'>$entry</option>";
}
}

echo'</select>
</td>
</tr>
<tr>
<td valign="top">Zmiana języka:</td><td valign="top"><input type="radio" name="lang_on" value="1"'; if($ust['lang_on']==1){echo' checked';} echo'>Tak <input type="radio" name="lang_on" value="0"'; if($ust['lang_on']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Edytor:</td><td valign="top">
<select name="edytor">
<option value="0"'; if($ust['edytor']=="0"){echo' selected="selected"';}echo'>Wyłączony</option>
<option value="1"'; if($ust['edytor']=="1"){echo' selected="selected"';}echo'>Prosty</option>
<option value="2"'; if($ust['edytor']=="2"){echo' selected="selected"';}echo'>Zaawansowany</option>
</select>
</td>
</tr>

</table>
<input type="submit" value="Zapisz"></form>';

}
if($_GET['action']=="rejestracja")
{

echo'<form action="ust_up_r.php" method="POST">


<center>

</center>
<a name="rejestracja"></a>
<br><b>Rejestracja:</b><br>
';
if($_GET['e']==2)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td valign="top">Rejestracja:</td><td valign="top"><input type="radio" name="rejestracja" value="1"'; if($ust['rejestracja']==1){echo' checked';} echo'>Tak <input type="radio" name="rejestracja" value="0"'; if($ust['rejestracja']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Token:</td><td valign="top"><input type="radio" name="token_r" value="1"'; if($ust['token_r']==1){echo' checked';} echo'>Tak <input type="radio" name="token_r" value="0"'; if($ust['token_r']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Aktywacja przez email:</td><td valign="top"><input type="radio" name="akt_r" value="1"'; if($ust['akt_r']==1){echo' checked';} echo'>Tak <input type="radio" name="akt_r" value="0"'; if($ust['akt_r']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr><td colspan="2"><b>Logowania Facebook</b></td></tr>
<tr>
<td valign="top">Aktywne:</td><td valign="top"><input type="radio" name="fb_on" value="1"'; if($ust['fb_on']==1){echo' checked';} echo'>Tak <input type="radio" name="fb_on" value="0"'; if($ust['fb_on']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td>Facebook ID:</td><td><input type="text" name="fb_id" value="'.$ust['fb_id'].'" style="width:200px;"></td>
</tr>
<tr>
<td>App Secret:</td><td><input type="password" name="fb_se" value="" ';if($ust['fb_se']<>""){echo'placeholder="App Secret podany"';}echo' style="width:200px;"></td>
</tr>
<tr>
<td colspan="2" style="font-size:12px;padding:5px;">
Aby aktywować logowanie poprzez facebook, musisz utworzyć nową aplikacje facebook. <br>Można to zrobić pod tym adresem: <a href="https://developers.facebook.com/apps">https://developers.facebook.com/apps</a>
</td>
</tr>
</table>
<input type="submit" value="Zapisz"></form>
';
echo'
<br><b>Wgraj nowe modele SI:</b><br>
<br/>
    <form action="config.php" method="post" enctype="multipart/form-data">
        <label for="plik_l">Plik LIN:</label>
        <input type="file" name="plik_l" id="plik_l">
        <input type="submit" name="submit" value="Prześlij"> </form>
    
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="plik_m3">Plik MLP3:</label>
        <input type="file" name="plik_m3" id="plik_m3">
        <input type="submit" name="submit" value="Prześlij"> </form>
    
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="plik_m4">Plik MLP4:</label>
        <input type="file" name="plik_m4" id="plik_m4">
        <input type="submit" name="submit" value="Prześlij"> </form>
    
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="plik_rbf">Plik RBF:</label>
        <input type="file" name="plik_rbf" id="plik_rbf">
        <input type="submit" name="submit" value="Prześlij"> </form>
';
}
  //php do obslugi plikow i kompilacji*************start**************
    //Obebranie pliku z kodem z formularza i zapisanie w folderze upload na serwerze. 
//Uwaga: folder musi mieć prawo do zapisu!


	//sprawdzenie czy w tablicy $_FILES jest plik o nazwie pola z formularza
    
    // plik ****LIN********
    if(isset($_FILES["plik_l"]["error"])){

        if($_FILES["plik_l"]["error"] > 0){

            echo "Błąd: " . $_FILES["plik_l"]["error"] . "<br />";

        } else{

                // Sprawdzenie czy plik folder upload jest dostępny do zapisu 
				// warto byłoby dodać sprawdzenie czy na serwerze nie istnieje plik o takiej nazwie

                if( !is_writable('upload') ) {

                    echo 'Brak prawa zapisu <br />';

                } else{

					//przeniesienie przeslanego pliku z folderu tymczasowego do pliku w folderze upload pod nazwą "kodl.c"
                    if ( move_uploaded_file($_FILES["plik_l"]["tmp_name"], 'upload/kodl.c' ) ) {

                    echo "Plik przesłany poprawnie. <br />";


					} else {
					
                    echo "Błąd przeniesienia pliku <br />";

					}

                } 

        }

    } else{

        echo "Nie wybrano pliku <br />";

    }
    // plik ****MLP3********
    if(isset($_FILES["plik_m3"]["error"])){

        if($_FILES["plik_m3"]["error"] > 0){

            echo "Błąd: " . $_FILES["plik_m3"]["error"] . "<br />";

        } else{

                // Sprawdzenie czy plik folder upload jest dostępny do zapisu 
				// warto byłoby dodać sprawdzenie czy na serwerze nie istnieje plik o takiej nazwie

                if( !is_writable('upload') ) {

                    echo 'Brak prawa zapisu <br />';

                } else{

					//przeniesienie przeslanego pliku z folderu tymczasowego do pliku w folderze upload pod nazwą "kodl.c"
                    if ( move_uploaded_file($_FILES["plik_m3"]["tmp_name"], 'upload/kodm3.c' ) ) {

                    echo "Plik przesłany poprawnie. <br />";


					} else {
					
                    echo "Błąd przeniesienia pliku <br />";

					}

                } 

        }

    } else{

        echo "Nie wybrano pliku <br />";

    }
    
        // plik ****MLP4********
    if(isset($_FILES["plik_m4"]["error"])){

        if($_FILES["plik_m4"]["error"] > 0){

            echo "Błąd: " . $_FILES["plik_m4"]["error"] . "<br />";

        } else{

                // Sprawdzenie czy plik folder upload jest dostępny do zapisu 
				// warto byłoby dodać sprawdzenie czy na serwerze nie istnieje plik o takiej nazwie

                if( !is_writable('upload') ) {

                    echo 'Brak prawa zapisu <br />';

                } else{

					//przeniesienie przeslanego pliku z folderu tymczasowego do pliku w folderze upload pod nazwą "kodl.c"
                    if ( move_uploaded_file($_FILES["plik_m4"]["tmp_name"], 'upload/kodm4.c' ) ) {

                    echo "Plik przesłany poprawnie. <br />";


					} else {
					
                    echo "Błąd przeniesienia pliku <br />";

					}

                } 

        }

    } else{

        echo "Nie wybrano pliku <br />";

    }
        // plik ****RBF********
    if(isset($_FILES["plik_rbf"]["error"])){

        if($_FILES["plik_rbf"]["error"] > 0){

            echo "Błąd: " . $_FILES["plik_rbf"]["error"] . "<br />";

        } else{

                // Sprawdzenie czy plik folder upload jest dostępny do zapisu 
				// warto byłoby dodać sprawdzenie czy na serwerze nie istnieje plik o takiej nazwie

                if( !is_writable('upload') ) {

                    echo 'Brak prawa zapisu <br />';

                } else{

					//przeniesienie przeslanego pliku z folderu tymczasowego do pliku w folderze upload pod nazwą "kodl.c"
                    if ( move_uploaded_file($_FILES["plik_rbf"]["tmp_name"], 'upload/kod_rbf.c' ) ) {

                    echo "Plik przesłany poprawnie. <br />";


					} else {
					
                    echo "Błąd przeniesienia pliku <br />";

					}

                } 

        }

    } else{

        echo "Nie wybrano pliku <br />";

    }


//Plik z kodem mamy na serwerze teraz musimy w nim znaleźć jakich parametrów (zmiennych) będzie oczekiwał skompilowany program 


//wrzucamy cały plik z kodem w tablicę, którą będziemy przeszukiwać
$kod = file ( "upload/kodl.c" ); 


//zmienna przechowująca numer aktualnie czytanej w pętli linii kodu. Wstepnie jej wartość = 1
$nr = 1;


//w pętli foreach czytamy wczytany plik linia po linii, szukając interesujacych nas ciagów znaków
foreach($kod as $linia){

		//sprawdzamy czy linia zawiera tekst: "Input variables (Offset)", jesli tak zapisuje numer linii w zmiennej pomocniczej
		if(strpos($linia,"Input variables (Offset)")!==FALSE){
			
			$linia_zmienne_start = $nr;
		}
		
		//sprawdza czy linia zawiera tekst: "Stan", jesli tak zapisuje numer linii w zmiennej pomocniczej
		if(strpos($linia,"Stan")!==FALSE){
			
			$linia_zmienne_stop = $nr;
		}
		
	//zwiększamy numer linii o 1
	$nr++;
}


//poprawiamy pozycję numerów linii początkowej i końcowej, tak aby wybrac tylko te linie gdzie są nazwy zmiennych
$linia_zmienne_start = $linia_zmienne_start+1;
$linia_zmienne_stop	 = $linia_zmienne_stop -3;



// jeszcze raz przeczytamy cały plik od początku do końca tym razem jednak wczytamy do tablicy "nazwy_zmiennych_c" informacje z zakresu linii od - do 
$nr = 1;
$nazwy_zmiennych_c = array();

//foreach($kod as $linia){


//	if ($nr >= $linia_zmienne_start && $nr <= $linia_zmienne_stop ) {
	

		//za pomoca wyrazenia regularnego usuwamy wszytskie niealfanumeryczne znaki z odczytanej linijki kodu
//		$linia = preg_replace("/[^a-zA-Z0-9]+/", "", $linia);


		// zapisujemy nasza linijke do tablicy zmiennych i ustawiamy wstępnie wartość tego //parametru (zmiennej) na zero
		
	//	$nazwy_zmiennych_c[$linia] = 0;
//	}
//	$nr++;
//}



//teraz mamy nazwy zmiennych w tablicy, mozna je np. zapisac do bazy albo wyswietlic

//echo '<pre>';
//print_r ($nazwy_zmiennych_c);
//echo '</pre>';




//kompilacja pliku z kodem w c do postaci pliku wykonywalnego (uwaga PHP musi miec wylaczony tryb safe mode) 

$kompilacja = system('g++ -o upload/kodl.out upload/kodl.c' , $bledy_kompilacji);

if ( $bledy_kompilacji == 0 ) {
						
	echo 'Kompilacja OK <br />';
}

    $kompilacja1 = system('g++ -o upload/kodm3.out upload/kodm3.c' , $bledy_kompilacji);

if ( $bledy_kompilacji == 0 ) {
						
	echo 'Kompilacja OK <br />';
}
       $kompilacja2 = system('g++ -o upload/kodm4.out upload/kodm4.c' , $bledy_kompilacji);

if ( $bledy_kompilacji == 0 ) {
						
	echo 'Kompilacja OK <br />';
}
   
     $kompilacja3 = system('g++ -o upload/kod_rbf.out upload/kod_rbf.c' , $bledy_kompilacji);

if ( $bledy_kompilacji == 0 ) {
						
	echo 'Kompilacja OK <br />';
}
    
    
    
    // php obsluga plikow i kompilacjii ************koniec**********



if($_GET['action']=="news")
{

echo'<form action="ust_up_n.php" method="POST">


<center>

</center>
<a name="news"></a>
<br><b>Newsy:</b><br>
';
if($_GET['e']==2)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td valign="top">Ocenianie:</td>
<td valign="top">
<select name="nocena">
<option value="0" '; if($ust['nocena']==0){echo' selected="selected"';} echo'>Brak</option>
<option value="1" '; if($ust['nocena']==1){echo' selected="selected"';} echo'>Dla wszystkich</option>
<option value="2" '; if($ust['nocena']==2){echo' selected="selected"';} echo'>Dla zarejestrowanych</option>
</select>
</td>
</tr>
<tr>
<td valign="top">Komentowanie:</td>
<td valign="top">
<select name="nkomentowanie">
<option value="0" '; if($ust['nkomentowanie']==0){echo' selected="selected"';} echo'>Brak</option>
<option value="1" '; if($ust['nkomentowanie']==1){echo' selected="selected"';} echo'>Dla wszystkich</option>
<option value="2" '; if($ust['nkomentowanie']==2){echo' selected="selected"';} echo'>Dla zarejestrowanych</option>
</select>
</tr>
<tr>
<td valign="top">Token:</td><td valign="top"><input type="radio" name="nt" value="1"'; if($ust['token_news']==1){echo' checked';} echo'>Tak <input type="radio" name="nt" value="0"'; if($ust['token_news']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Ile news<br>na stronie głównej:</td><td><select name="ilen">
';
for($i=0;$i<=100;$i++)
{
echo'<option value="'.$i.'"'; if($ust['ilen']==$i){echo' selected="selected"';}echo'>'.$i.'</option>';
}
echo'
</select>
<small>0 = Wyłącza newsy.
</td>
</tr>

</table>
<input type="submit" value="Zapisz"></form>';
}
if($_GET['action']=="artykuly")
{

if($_GET['d']=="")
{

echo'<form action="ust_up_a.php" method="POST">

<a name="artykuly"></a>
<br><b>Ogłoszenia:</b><br>
';
if($_GET['e']==3)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td valign="top">Dodawanie:</td>
<td valign="top">
<select name="add_on">
<option value="0" '; if($ust['add_on']==0){echo' selected="selected"';} echo'>Wyłączone</option>
<option value="1" '; if($ust['add_on']==1){echo' selected="selected"';} echo'>Dla zalogowanych</option>
<option value="2" '; if($ust['add_on']==2){echo' selected="selected"';} echo'>Dla zalogowanych oraz nie zalogowanych</option>
</select>
</td>
</tr>
<tr>
<td valign="top">Ocenianie:</td>
<td valign="top">
<select name="aocena">
<option value="0" '; if($ust['aocena']==0){echo' selected="selected"';} echo'>Brak</option>
<option value="1" '; if($ust['aocena']==1){echo' selected="selected"';} echo'>Dla wszystkich</option>
<option value="2" '; if($ust['aocena']==2){echo' selected="selected"';} echo'>Dla zarejestrowanych</option>
</select>
</td>
</tr>
<tr>
<td valign="top">Komentowanie:</td>
<td valign="top">
<select name="akomentowanie">
<option value="0" '; if($ust['akomentowanie']==0){echo' selected="selected"';} echo'>Brak</option>
<option value="1" '; if($ust['akomentowanie']==1){echo' selected="selected"';} echo'>Dla wszystkich</option>
<option value="2" '; if($ust['akomentowanie']==2){echo' selected="selected"';} echo'>Dla zarejestrowanych</option>
</select>
</tr>
<tr>
<td valign="top">Ogłoszeń na stronę:</td>
<td valign="top">
<select name="ile_str">';

for($i=1;$i<=100;$i++)
{
   echo'<option value="'.$i.'" '; if($ust['ile_str']==$i){echo' selected="selected"';} echo'>'.$i.'</option>';
}
echo'
</select>
</tr>
<tr>
<td valign="top">Ile zdjęć:</td>
<td valign="top">
<select name="ileimg">';

for($i=0;$i<=100;$i++)
{
   echo'<option value="'.$i.'" '; if($ust['ileimg']==$i){echo' selected="selected"';} echo'>'.$i.'</option>';
}
echo'
</select>
</tr>
<tr>
<td valign="top">Ulubione:</td><td valign="top"><input type="radio" name="ulubione" value="1"'; if($ust['ulubione']==1){echo' checked';} echo'>Tak <input type="radio" name="ulubione" value="0"'; if($ust['ulubione']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Zglaszanie:</td><td valign="top"><input type="radio" name="zglaszanie" value="1"'; if($ust['zglaszanie']==1){echo' checked';} echo'>Tak <input type="radio" name="zglaszanie" value="0"'; if($ust['zglaszanie']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Typ promowanych:</td><td valign="top"><input type="radio" name="pro_typ" value="1"'; if($ust['pro_typ']==1){echo' checked';} echo'>Nowy <input type="radio" name="pro_typ" value="0"'; if($ust['pro_typ']==0){echo' checked';} echo'>Zwykły</td>
</tr>
<tr>
<td valign="top">Wyszukiwarka górna:</td><td valign="top"><input type="radio" name="s_on" value="1"'; if($ust['s_on']==1){echo' checked';} echo'>Tak <input type="radio" name="s_on" value="0"'; if($ust['s_on']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Najnowsze nad stopką:</td><td valign="top"><input type="radio" name="g_on" value="1"'; if($ust['g_on']==1){echo' checked';} echo'>Tak <input type="radio" name="g_on" value="0"'; if($ust['g_on']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Token:</td><td valign="top"><input type="radio" name="at" value="1"'; if($ust['token_art']==1){echo' checked';} echo'>Tak <input type="radio" name="at" value="0"'; if($ust['token_art']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Moderacja ogłoszeń:</td><td valign="top"><input type="radio" name="mod" value="0"'; if($ust['omod']==0){echo' checked';} echo'>Tak <input type="radio" name="mod" value="1"'; if($ust['omod']==1){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Facebook like:</td><td valign="top"><input type="radio" name="fb_like" value="0"'; if($ust['fb_like']==0){echo' checked';} echo'>Nie <input type="radio" name="fb_like" value="1"'; if($ust['fb_like']==1){echo' checked';} echo'>Tak</td>
</tr>
<tr>
<td valign="top">Google +1:</td><td valign="top"><input type="radio" name="gp_like" value="0"'; if($ust['gp_like']==0){echo' checked';} echo'>Nie <input type="radio" name="gp_like" value="1"'; if($ust['gp_like']==1){echo' checked';} echo'>Tak</td>
</tr>
<tr>
<td valign="top">Twitter:</td><td valign="top"><input type="radio" name="nk_like" value="0"'; if($ust['nk_like']==0){echo' checked';} echo'>Nie <input type="radio" name="nk_like" value="1"'; if($ust['nk_like']==1){echo' checked';} echo'>Tak</td>
</tr>
<tr>
<td valign="top">Wykop:</td><td valign="top"><input type="radio" name="wykop" value="0"'; if($ust['wykop']==0){echo' checked';} echo'>Nie <input type="radio" name="wykop" value="1"'; if($ust['wykop']==1){echo' checked';} echo'>Tak</td>
</tr>
<tr>
<td valign="top">Drukowanie:</td><td valign="top"><input type="radio" name="print" value="0"'; if($ust['print']==0){echo' checked';} echo'>Nie <input type="radio" name="print" value="1"'; if($ust['print']==1){echo' checked';} echo'>Tak</td>
</tr>
<tr>
<td valign="top">Promowane ogłoszenia:</td><td valign="top"><input type="radio" name="proon" value="1"'; if($ust['proon']==1){echo' checked';} echo'>Tak <input type="radio" name="proon" value="0"'; if($ust['proon']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Cena za<br>promowane ogłoszenie:</td><td valign="top"><input type="text" name="procena" value="'.$ust['procena'].'" style="width:50px;">zł</td>
</tr>
<tr>
<td valign="top">Płatność przelew:</td>
<td valign="top">
<select name="pay_typ" onchange="this.form.submit()">
'.$pay_set['pay_typ'].'
</select>
</td>
</tr>
<tr>
<td valign="top">Płatność sms:</td>
<td valign="top">
<select name="pay_typ_sms" onchange="this.form.submit()">
'.$pay_set['pay_typ_sms'].'
</select>
</td>
</tr>
<tr>
<td valign="top">'.$pay_set['lang_pin'].':</td><td><input type="text" name="dotpay_pin" value="'.$ust['dotpay_pin'].'" style="width:200px;"> <br>
</td>
</tr>
<tr>
<td valign="top">'.$pay_set['lang_dotpay'].':</td><td><input type="text" name="dotpay" value="'.$ust['dotpay'].'" style="width:200px;"> <br>
</td>
</tr>'.$pay_set['dod'].'';
if($pay_set['lang_dotpay_sms']<>"")
{
echo'
<tr>
<td valign="top">'.$pay_set['lang_dotpay_sms'].':</td><td><input type="text" name="dotpay_sms" value="'.$ust['dotpay_sms'].'" style="width:200px;"> <br>
</td>
</tr>';
}
echo'
</table>
<input type="submit" value="Zapisz"></form>
<br><br>



<br><b>Czas trwania ogłoszenia:</b><br>
<form action="dodaj_dni.php" method="POST">
<table>
<tr>
<td><b>Dni:</b></td> 
<td><input type="text" name="dni"></td>
</tr>
<tr>
<td><b>Cena przelew:</b></td> 
<td><input type="text" name="cena"><br><small>Pozostawiajac pole puste ogloszenie bedzie darmowe.</small></td>
</tr>
<tr>
<td><b>Cena sms:</b></td> 
<td><input type="text" name="cenasms"><br><small>Pozostawiajac pole puste ogloszenie bedzie darmowe.</small></td>
</tr>
<tr>
<td><b>'.$pay_set['lang_kod'].':</b></td> 
<td><input type="text" name="kod"><br><small>np: asdf</small></td>
</tr>
<tr>
<td><b>Numer:</b></td> 
<td><input type="text" name="numer"><br><small>np: 7123</small></td>
</tr>
<tr>
<td><b>Tresc SMS:</b></td> 
<td><input type="text" name="tresc"><br><small>np: ap.asdf</small></td>
</tr>
</table>
<input type="submit" name="ddd" value="Dodaj"></form>


';
if($_GET['v']=="dodane")
{

echo'<div id="ukryj" ><div id="green" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>Dodane.</b></center></div></div><br>';
}
if($_GET['v']=="delete")
{
$del="DELETE FROM ".$pre."dni WHERE dni_id='".db_real_escape_string($_GET['id'])."'";
db_query($del);
echo'<div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>Usunięte.</b></center></div></div><br>';
}

echo'<br><br>
<table width="70%" cellspacing="0" cellpadding="0" style="border: 1px solid #cccccc;">
<tr>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b></b></td>
<td width="10%" background="style/images/belka.gif" height="24" align="center"><b>Dni</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Cena</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Cena SMS</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Numer</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Kod</b></td>
<td width="15%" background="style/images/belka.gif" height="24" align="center"><b>Tresc SMS</b></td>
<td width="5%" background="style/images/belka.gif" height="24" align="center"><b>Usuń</b></td>
</tr>';

$i=1;
$Query='SELECT * FROM '.$pre.'dni  ORDER by dni_id DESC '; 
$result = db_query($Query) or die(db_error());
while($row=db_fetch($result))
{
echo'<tr>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$i.'</td>
<td width="10%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['dni_dni'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['dni_cena'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['dni_cenasms'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['dni_numer'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['dni_kod'].'</td>
<td width="15%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center">'.$row['dni_tresc'].'</td>
<td width="5%"'; if($i%2==0){echo' bgcolor="#dddddd" ';} echo' align="center"><a href="index.php?page=ustawienia&action=artykuly&v=delete&id='.$row['dni_id'].'" onclick="return(potwierdz())"><img src="style/images/delete.png" title="Usuń"></a></td>
</tr>';
$i++;
}
echo'</table>
<br><br>
<a href="index.php?page=ustawienia&action=artykuly&d=del"><b  style="color:red;">Usuń stare ogłoszenia</b></a>

';

}
if($_GET['d']=="del")
{
echo'
<a name="artykuly"></a>
<br><b>Ogłoszenia:</b><br>
<br>

<center><a href="index.php?page=ustawienia&action=artykuly&d=del&go=go"><b>Rozpocznij usuwanie</b></a><br><br>
';

if($_GET['go']=="go"){include("../del_old.php");}

echo'</center>';
}
}
if($_GET['action']=="galerie")
{
echo'
<form action="ust_up_g.php" method="POST" name="aform">

<a name="galeria"></a>
<br><b>Galerie:</b><br>
';
if($_GET['e']==4)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td valign="top">Ocenianie:</td>
<td valign="top">
<select name="gocena">
<option value="0" '; if($ust['gocena']==0){echo' selected="selected"';} echo'>Brak</option>
<option value="1" '; if($ust['gocena']==1){echo' selected="selected"';} echo'>Dla wszystkich</option>
<option value="2" '; if($ust['gocena']==2){echo' selected="selected"';} echo'>Dla zarejestrowanych</option>
</select>
</td>
</tr>
<tr>
<td valign="top">Komentowanie:</td>
<td valign="top">
<select name="gkomentowanie">
<option value="0" '; if($ust['gkomentowanie']==0){echo' selected="selected"';} echo'>Brak</option>
<option value="1" '; if($ust['gkomentowanie']==1){echo' selected="selected"';} echo'>Dla wszystkich</option>
<option value="2" '; if($ust['gkomentowanie']==2){echo' selected="selected"';} echo'>Dla zarejestrowanych</option>
</select>
</tr>
<tr>
<td valign="top">Token:</td><td valign="top"><input type="radio" name="gtt" value="1"'; if($ust['token_ga']==1){echo' checked';} echo'>Tak <input type="radio" name="gtt" value="0"'; if($ust['token_ga']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Maksymalna wielkość<br>dużej fotki:</td><td valign="top"><input type="text" name="fotd" value="'.$ust['fotd'].'" style="width:50px;">px</td>
</tr>
<tr>
<td valign="top">Wielkosc miniaturki:</td><td valign="top"><input type="text" name="fotm" value="'.$ust['fotm'].'" style="width:50px;">px</td>
</tr>
<tr>
<td valign="top">Jakość dużej<br>fotki:</td><td valign="top"><input type="text" name="fotdj" value="'.$ust['fotdj'].'" style="width:50px;">0-100</td>
</tr>
<tr>
<td valign="top">Jakość miniaturki:</td><td valign="top"><input type="text" name="fotmj" value="'.$ust['fotmj'].'" style="width:50px;">0-100</td>
</tr>
<tr>
<td valign="top">Znak wodny:</td><td valign="top"><input type="radio" name="tekst_on" value="1"'; if($ust['tekst_on']==1){echo' checked';} echo'>Tak <input type="radio" name="tekst_on" value="0"'; if($ust['tekst_on']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Znak wodny<br>tresc:</td><td valign="top"><input type="text" name="tekst" value="'.$ust['tekst'].'" style="width:150px;"></td>
</tr>
<tr>
<td valign="top">Wielkość napisu</td><td valign="top"><select name="tekst_size">';for($i=1;$i<=120;$i++){echo' <option value="'.$i.'"'; if($ust['tekst_size']==$i){echo' selected="selected"';} echo'>'.$i.'</option>';}echo'</select></td>
</tr>
<tr>
<td>Kolor napisu</td>
<td><input type="text" name="text_color" style="width:98px"';if($ust['tekst_color'] != ""){echo 'value="'.$ust['tekst_color'].'"';}else{echo'value="#FFFFFF"';} echo'onblur="isThatAColor(document.aform.text_color.value)"/>
<a href="#" onClick="cp2.select(document.forms[\'aform\'].text_color,\'Pick\');return false;" name="Pick" id="Pick">wybierz</a>
</td>
</tr>
<tr>
<td></td>
<td>
R:<input type="text" name="rt" style="width:30px" value="'.$ust['tekst_r'].'">G:<input type="text" name="gt" value="'.$ust['tekst_g'].'" style="width:30px">B:<input type="text" name="bt" value="'.$ust['tekst_b'].'" style="width:30px">
<div id="result-wrap" style="width:150px;height:10px;"><div style="width:150px;height:10px;background-color: rgb('.$ust['tekst_r'].', '.$ust['tekst_g'].', '.$ust['tekst_b'].');" id="result"></div></div>
</td>
</tr>
</table>
<input type="submit" value="Zapisz"></form>';
?>

<script type="text/javascript">var cp2 = new ColorPicker(); cp2.writeDiv();</script>
<?php
}


if($_GET['action']=="kontakt")
{
echo'<br><form action="ust_up_k.php" method="POST">

<center>

</center>
<a name="kontakt"></a>
<b>Kontakt:</b><br>
';
if($_GET['e']==5)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td>Login:</td><td><input type="text" name="email_login" value="'.$ust['email_login'].'" style="width:200px;"></td>
</tr>
<tr>
<td>Hasło:</td><td><input type="password" name="email_pas" value="'.$ust['email_pas'].'" style="width:200px;"></td>
</tr>
<tr>
<td>Host:</td><td><input type="text" name="email_host" value="'.$ust['email_host'].'" style="width:200px;"></td>
</tr>
<tr>
<td>Port:</td><td><input type="text" name="email_port" value="'.$ust['email_port'].'" style="width:35px;"></td>
</tr>
<tr>
<td>Szyfrowanie:</td><td>
<select name="email_uw">
<option value="ssl"';if($ust['email_uw']=="sll"){echo' selected="selected"';}echo'>sll</option>
<option value="tls"';if($ust['email_uw']=="tls"){echo' selected="selected"';}echo'>tls</option>
<option value=""';if($ust['email_uw']==""){echo' selected="selected"';}echo'>Brak</option>
</select>
</td>
</tr>


<tr>
<td>E-Mail:</td><td><input type="text" name="email" value="'.$ust['email'].'" style="width:200px;"></td>
</tr>
<tr>
<td valign="top">Formularz kontaktowy:</td><td valign="top"><input type="radio" name="fk" value="1"'; if($ust['fk']==1){echo' checked';} echo'>Tak <input type="radio" name="fk" value="0"'; if($ust['fk']==0){echo' checked';} echo'>Nie</td>
</tr>
<tr>
<td valign="top">Treść:</td>
<td><textarea name="kontaktt" style="width:500px;height:150px;">'.$ust['kontaktt'].'</textarea></td>
</tr>
</table>
<input type="submit" value="Zapisz"></form>';

}


if($_GET['action']=="regulamin")
{
echo'<br><form action="ust_up_reg.php" method="POST">

<center>

</center>
<a name="regulamin"></a>
<b>Regulamin:</b><br>
';
if($_GET['e']==5)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>
<tr>
<td valign="top">Treść:</td>
<td><textarea name="regulamin" style="width:500px;height:150px;" id="elm1">'.$ust['regulamin'].'</textarea></td>
</tr>
</table>
<input type="submit" value="Zapisz"></form>';

}
?>
