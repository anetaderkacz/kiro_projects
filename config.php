<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>SN</title>
</head>

<body>
    <h2>Panel admina</h2>
    <form action="config.php" method="post" enctype="multipart/form-data">
        <label for="plik_l">Plik LIN:</label>
        <input type="file" name="plik_l" id="plik_l">
        <input type="submit" name="submit" value="Prześlij"> </form>
    <hr />
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="plik_m3">Plik MLP3:</label>
        <input type="file" name="plik_m3" id="plik_m3">
        <input type="submit" name="submit" value="Prześlij"> </form>
    <hr />
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="plik_m4">Plik MLP4:</label>
        <input type="file" name="plik_m4" id="plik_m4">
        <input type="submit" name="submit" value="Prześlij"> </form>
    <hr />
    <form action="index.php" method="post" enctype="multipart/form-data">
        <label for="plik_rbf">Plik RBF:</label>
        <input type="file" name="plik_rbf" id="plik_rbf">
        <input type="submit" name="submit" value="Prześlij"> </form>
    <hr />
    <?php




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





?>
</body>

</html>