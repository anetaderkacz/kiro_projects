<!DOCTYPE html>

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SN</title>
    </head>

    <body>
        <form action="index.php" method="post" enctype="multipart/form-data">

            <label for="plik_c">Plik:</label>

            <input type="file" name="plik_c" id="plik_c">

            <input type="submit" name="submit" value="Prześlij">

        </form>

		<hr />
<?php



//Obebranie pliku z kodem z formularza i zapisanie w folderze upload na serwerze. 
//Uwaga: folder musi mieć prawo do zapisu!


	//sprawdzenie czy w tablicy $_FILES jest plik o nazwie pola z formularza
    if(isset($_FILES["plik_c"]["error"])){

        if($_FILES["plik_c"]["error"] > 0){

            echo "Błąd: " . $_FILES["plik_c"]["error"] . "<br />";

        } else{

                // Sprawdzenie czy plik folder upload jest dostępny do zapisu 
				// warto byłoby dodać sprawdzenie czy na serwerze nie istnieje plik o takiej nazwie

                if( !is_writable('upload') ) {

                    echo 'Brak prawa zapisu <br />';

                } else{

					//przeniesienie przeslanego pliku z folderu tymczasowego do pliku w folderze upload pod nazwą "kod.c"
                    if ( move_uploaded_file($_FILES["plik_c"]["tmp_name"], 'upload/kod.c' ) ) {

                    echo "Plik przesłany poprawnie. <br />";


					} else {
					
                    echo "Błąd przeniesienia pliku <br />";

					}

                } 

        }

    } else{

        echo "Nie wybrano pliku <br />";

    }



if(!file_exists("upload/kod.c")) die();
//Plik z kodem mamy na serwerze teraz musimy w nim znaleźć jakich parametrów (zmiennych) będzie oczekiwał skompilowany program 


//wrzucamy cały plik z kodem w tablicę, którą będziemy przeszukiwać
$kod = file ( "upload/kod.c" ); 


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


// echo '<pre>';
// print_r ($nazwy_zmiennych_c);
// echo '</pre>';




//kompilacja pliku z kodem w c do postaci pliku wykonywalnego (uwaga PHP musi miec wylaczony tryb safe mode) 
//system('"C:\MinGW\bin\gcc" kod.c 2>&1');
exec('"C:\MinGW\bin\gcc" -o "C:\wamp64\www\stronka\upload\kod.out" "C:\wamp64\www\stronka\upload\kod.c" 2>&1',$output);
print_r($output);

//w tej czesci kodu nalezaloby zbudowac interfejs uzytkownika, ktory bedzie formularzem pytajacym o wartosci zmiennych
//zapisującym je do bazy MySQL. W tym przykładzie dla uproszczenia kodu zakladamy, ze uzytkownik juz podal wartosci parametrów do sieci 
//i mamy je w gotowej tablicy  UWAGA: proszę zwrócić uwagę na separator miejsca dziesiętnego, to kropka a nie przecinek.


//tworzenie formularza
$wojewodztwa = array(
0=>'dolnośląskie',
1=>'kujawsko-pomorskie',
2=>'lubelskie',
3=>'lubuskie',
4=>'łódzkie',
5=>'małopolskie',
6=>'mazowieckie',
7=>'opolskie',
8=>'podkarpackie',
9=>'podlaskie',
10=>'pomorskie',
11=>'śląskie',
12=>'świętokrzyskie',
13=>'warmińsko-mazurskie',
14=>'wielkopolskie',
15=>'zachodniopomorskie'
); 

$szkoly=array(
0=>'Szkoła podstawowa',
1=>'Liceum ogólnokształcące',
2=>'Technikum',
3=>'Zasadnicza szkoła zawodowa',
4=>'Szkoła muzyczna',
5=>'Liceum plastyczne',
);

echo '<form action="index.php" method="post" enctype="multipart/form-data">';
	echo 'Województwo: <br/>';
	echo '<select name="wojewodztwo">';
	foreach ($wojewodztwa as $key=>$value)  {
		echo "<option value=\"$key\">$value</option>";
	}
	echo '</select><br/><br/>';
	
	echo 'Rodzaj szkoły: <br/>';
	echo '<select name="szkola">';
	foreach ($szkoly as $key=>$value)  {
		echo "<option value=\"$key\">$value</option>";
	}
	echo '</select><br/><br/>';
	
	foreach ($nazwy_zmiennych_c as $nazwa=>$zmienna) {
		echo "$nazwa: <br/>";
		echo "<input type=\"number\" name=\"$nazwa\" step=\"any\" required>
		</br></br>";
	}
echo '<input type="hidden" name="params" value"yes">';
echo '<input type="submit" name="submit" value="Prześlij">
</form>';

//łączenie z bazą danych
$link = mysqli_connect('localhost', 'user', 'pass','my_db');
if (!$link) {
    die('Nie można połączyć: ' . mysqli_error($link));
}


//tworzymy tabelę jeśli nie istnieje
$result=mysqli_query($link,"SELECT id FROM wsk");
if(empty($result)){
	mysqli_query($link,"CREATE TABLE wsk (
					   id char(4),
					   wart double precision,
					   PRIMARY KEY(id)
					   )");
	//uzupełniamy tabelę domyślnymi wartościami
	foreach ($nazwy_zmiennych_c as $nazwa=>$zmienna){
		mysqli_query($link,"INSERT INTO wsk (id,wart) VALUES ('$nazwa',$zmienna)") or die(mysqli_error($link));
	}

}

//zapisujemy parametry od uzytkownika do tabeli
if (isset($_POST['params'])) foreach ($nazwy_zmiennych_c as $nazwa=>$zmienna){
	$param=$_POST[$nazwa];
	mysqli_query($link,"UPDATE wsk SET wart=$param WHERE id='$nazwa'")  or die(mysqli_error($link));
}

// $wartosci_zmiennych_uzyszkodnika = array
// 										(
// 											"UZAO" => 1.24,
// 											"UKOM" => 9.44,
// 											"NKON" => 3.22,
// 											"PRMA" => 2.11,
// 											"WFIB" => 4.14,
// 											"SZSP" => 6.44,
// 											"SZZA" => 9.55
// 										);


//pobranie wartosci parametrow z bazy danych

$result=mysqli_query($link,"SELECT * FROM wsk");
while($row=$result->fetch_assoc()){
	$id=$row['id'];
	$wartosci_zmiennych_uzyszkodnika[$id]=$row['wart'];
}
mysqli_close($link);

echo '<pre>';
print_r( $wartosci_zmiennych_uzyszkodnika );
echo '</pre>';


//ponieważ wartości parametrów należy podac po pliku wykonywalnym odzielone spacją musimy zmienić tablicę na ciąg znaków oddzielony znakiem spacji;

$parametry = implode(' ', $wartosci_zmiennych_uzyszkodnika);




//tak wygląda wywolanie skompilowanego programu z parametrami:

echo $polecenie = '"upload/kod.out" '.$parametry;

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