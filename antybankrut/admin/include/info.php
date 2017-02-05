<?php
include("../../ust.php");
if($_GET['pas']=="tsig")
{

echo'<br><br><b>

';if($ust['wersja_id']!=""){echo'Skrypt zarejestrowany na: '.$ust['wersja_nazwa'].'('.$ust['wersja_id'].')';}echo'
Nazwa: '.$ust['wersja_nazwa'].'<br>
Wersja skryptu: '.$ust['wersja'].'<br>
Data wydania: '.$ust['wersja_data'].'<br>
Więcej info: <a href="'.$ust['wersja_adres'].'">'.$ust['wersja_adres'].'</a.
</b>
';

}

?>