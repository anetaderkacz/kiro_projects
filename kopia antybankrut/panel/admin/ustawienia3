<?php
if($indexphp!="ok"){exit();}
include("../include/pay_set.php");
echo'
<center>
<table width="1000">
<tr>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=podstawowe"><b>Podstawowe</b></a> </td>
<td style="border: 1px solid #DEDEDE;font-size:12px;" class="td_hover" align="center" width="20%" height="25"><a href="index.php?page=ustawienia&action=artykuly"><b>Ogłoszenia</b></a> </td>

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
<input type="submit" value="Zapisz"></form>';
}

if($_GET['action']=="artykuly")
{

if($_GET['d']=="")
{

echo'<form action="ust_up_a.php" method="POST">

<a name="artykuly"></a>
<br><b>Ustawienia MODELI SI:</b><br>
';
if($_GET['e']==3)
{
echo'<div id="ukryj" style="color:green"><b>Zapisano.</b></div>';
}
echo'
<table>

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






?>
    <script type="text/javascript">
        var cp2 = new ColorPicker();
        cp2.writeDiv();
    </script>
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