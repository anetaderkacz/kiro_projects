<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SN</title>
    </head>

    <body>
        <form action="index3.php" method="post" enctype="multipart/form-data">

            <label for="plik_l">Plik LIN:</label>

            <input type="file" name="plik_LIN" id="plik_LIN">

            <input type="submit" name="submit" value="Prześlij">

        </form>

		<hr />
<?php




//Obebranie pliku z kodem z formularza i zapisanie w folderze upload na serwerze. 
//Uwaga: folder musi mieć prawo do zapisu!


	//sprawdzenie czy w tablicy $_FILES jest plik o nazwie pola z formularza
    if(isset($_FILES["plik_l"]["error"])){

        if($_FILES["plik_l"]["error"] > 0){

            echo "Błąd: " . $_FILES["plik_l"]["error"] . "<br />";

        } else{

                // Sprawdzenie czy plik folder upload jest dostępny do zapisu 
				// warto byłoby dodać sprawdzenie czy na serwerze nie istnieje plik o takiej nazwie

                if( !is_writable('upload') ) {

                    echo 'Brak prawa zapisu <br />';

                } else{

					//przeniesienie przeslanego pliku z folderu tymczasowego do pliku w folderze upload pod nazwą "kod.c"
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

foreach($kod as $linia){


	if ($nr >= $linia_zmienne_start && $nr <= $linia_zmienne_stop ) {
	

		//za pomoca wyrazenia regularnego usuwamy wszytskie niealfanumeryczne znaki z odczytanej linijki kodu
		$linia = preg_replace("/[^a-zA-Z0-9]+/", "", $linia);


		// zapisujemy nasza linijke do tablicy zmiennych i ustawiamy wstępnie wartość tego parametru (zmiennej) na zero
		
		$nazwy_zmiennych_c[$linia] = 0;
	}
	$nr++;
}



//teraz mamy nazwy zmiennych w tablicy, mozna je np. zapisac do bazy albo wyswietlic

echo '<pre>';
print_r ($nazwy_zmiennych_c);
echo '</pre>';




//kompilacja pliku z kodem w c do postaci pliku wykonywalnego (uwaga PHP musi miec wylaczony tryb safe mode) 

$kompilacja = system('g++ -o upload/kodl.out upload/kodl.c' , $bledy_kompilacji);

if ( $bledy_kompilacji == 0 ) {
						
	echo 'Kompilacja OK <br />';
}




//w tej czesci kodu nalezaloby zbudowac interfejs uzytkownika, ktory bedzie formularzem pytajacym o wartosci zmiennych
//zapisującym je do bazy MySQL. W tym przykładzie dla uproszczenia kodu zakladamy, ze uzytkownik juz podal wartosci parametrów do sieci 
//i mamy je w gotowej tablicy  UWAGA: proszę zwrócić uwagę na separator miejsca dziesiętnego, to kropka a nie przecinek.


$wartosci_zmiennych_uzyszkodnika = array
										(
											"UZAO" => -7.24,
											"UKOM" => -18.24,
											"NKON" => -0.68,
											"PRMA" => 2.11,
											"WFIB" => -4.47,
											"SZSP" => -1.00,
											"SZZA" => 2.00,
										);




echo '<pre>';
print_r( $wartosci_zmiennych_uzyszkodnika );
echo '</pre>';


//ponieważ wartości parametrów należy podac po pliku wykonywalnym odzielone spacją musimy zmienić tablicę na ciąg znaków oddzielony znakiem spacji;

$parametry = implode(' ', $wartosci_zmiennych_uzyszkodnika);




//tak wygląda wywolanie skompilowanego programu z parametrami:

echo $polecenie = 'upload/kodl.out '.$parametry;

echo '<br />';



// uruchomimy sobie buforowanie wyników do przechwycenia całego wyniku działania polecenia
ob_start();

system( $polecenie );

$wynik = ob_get_contents();

//zwolnienie bufora
ob_end_clean();


echo 'Wynik: '.$wynik.'<br />';


?>




</body></html>