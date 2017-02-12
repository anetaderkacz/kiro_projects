<?php
    include("db_connect.php");
    include("subheader.php");
    

    $smarty->display($ust['templates'].'/subheader.tpl');
    $smarty->display($ust['templates'].'/top.tpl');

if($_SESSION['user_nick']=="")
{ 
   $nick=$_POST['nick'];
}
else
{
  $nick=$_SESSION['user_nick'];
}



    
        
    $UZAO =($_GET['ZAP']/$_GET['AO'])*100;
    $UKOM =($_GET['KW']+$_GET['ZD']-$_GET['AT'])/$_GET['AO'];
    $NKON =($_GET['ZAP']+$_GET['NKT'])/2-($_GET['KW']+$_GET['ZD']-$_GET['AT']);
        //zm pomocnicza srednia
        $SRA=($_GET['AO_1']+$_GET['AO'])/2;
        
    $PRMA =($_GET['PN']/$SRA)*100;
    $WFIB =$_GET['WFB']/1000;
    $SZSP=($_GET['PN']-$_GET['PN_1'])/$_GET['PN_1'];
    $SZZA=($_GET['ZO']-$_GET['ZO_1'])/$_GET['ZO_1']; 

$AO_1 =$_GET['AO_1'];
$AO =$_GET['AO'];
$AT =$_GET['AT'];
$ZAP =$_GET['ZAP'];
$NKT=$_GET['NKT'];
$KW=$_GET['KW'];
$ZD=$_GET['ZD'];
$PN_1=$_GET['PN_1'];
$ZO_1=$_GET['ZO_1']; 
$ZO=$_GET['ZO']; 
$WFB=$_GET['WFB']; 

$DANE_TEST=$_GET['radios'];
echo $DANE_TEST;


        
$wartosci_zmiennych_uzyszkodnika = array
										(
											"UZAO" => $UZAO,
											"UKOM" => $UKOM,
											"NKON" => $NKON,
											"PRMA" => $PRMA,
											"WFIB" => $WFIB,
											"SZSP" => $SZSP,
											"SZZA" => $SZZA,
										);
// **************** zapis danych do bazy *****************************

//if($_SESSION['logadm']=="adm")
//{
//$up="INSERT INTO `".$pre."dane` `//dane_data`=NOW(),`dane_AO1`='".htmlspecialchars($UZAO)."'";

$up="
INSERT INTO `ban_dane` (`dane_data`, `dane_user`, `AO_1`, `AO`, `AT`, `ZAP`, `NKT`, `KW`, `ZD`, `PN_1`, `PN`, `ZO_1`, `ZO`, `WFB`, `UZAO`, `UKOM`, `NKON`, `PRMA`, `WFIB`, `SZSP`, `SZZA`, `DANE_TEST`, `DANE_PR`) VALUES (NOW(), '$nick', '$AO_1', '$AO', '$AT', '$ZAP', '$NKT', '$KW', '$ZD', '$PN_1', '$PN', '$ZO_1', '$ZO', '$WFB', '$UZAO', '$UKOM', '$NKON', '$PRMA', '$WFIB', '$SZSP', '$SZZA', '1', '1')";

db_query($up);

//}





// ****************   koniec  zapisu danych do bazy *****************************


echo '<pre>';
//print_r( $wartosci_zmiennych_uzyszkodnika );
       
       
        echo 'UZAO='.$UZAO;
         echo("<br>");
        echo 'UKOM='.$UKOM;
         echo("<br>");
        echo 'NKON='.$NKON;
         echo("<br>");
        echo 'PRMA='.$PRMA;
         echo("<br>");
         echo 'WFIB='.$WFIB;
        echo("<br>");
        echo 'SZSP='.$SZSP;
         echo("<br>");
        echo 'SZZA='.$SZZA;
echo '</pre>';


//ponieważ wartości parametrów należy podac po pliku wykonywalnym odzielone spacją musimy zmienić tablicę na ciąg znaków oddzielony znakiem spacji;

$parametry = implode(' ', $wartosci_zmiennych_uzyszkodnika);




//tak wygląda wywolanie skompilowanego programu z parametrami:

 $polecenie = 'upload/kodl.out '.$parametry;

echo '<br />';

    
 $polecenie1 = 'upload/kodm3.out '.$parametry;

echo '<br />';
    
     $polecenie2 = 'upload/kodm4.out '.$parametry;


     $polecenie3 = 'upload/kod_rbf.out '.$parametry;

echo '<br />';


// uruchomimy sobie buforowanie wyników do przechwycenia całego wyniku działania polecenia
ob_start();

system( $polecenie );

$wynik = ob_get_contents();
    ob_end_clean();
  
    ob_start();    
system( $polecenie1 );
$wynik1 = ob_get_contents();
    ob_end_clean();
    
    ob_start();
system( $polecenie2 );

$wynik2 = ob_get_contents();
    ob_end_clean();
    
        ob_start();
system( $polecenie3 );

$wynik3 = ob_get_contents();
    

//zwolnienie bufora
ob_end_clean();
   echo("<br>");
        echo 'Wynik prognozy LIN: '.$wynik.'<br />';
if ($wynik==1){echo 'BANKRUT';}
if ($wynik==2){echo 'NIE-BANKRUT';}
    
       echo("<br>");
        echo 'Wynik prognozy MLP3: <br />';
if ($wynik1==1){echo 'BANKRUT';}
if ($wynik1==2){echo 'NIE-BANKRUT';}
    
    echo("<br>");
        echo 'Wynik prognozy MLP4: <br />';
if ($wynik2==1){echo 'BANKRUT';}
if ($wynik2==2){echo 'NIE-BANKRUT';}
    
      echo("<br>");
        echo 'Wynik prognozy RBF: <br />';
if ($wynik3==1){echo 'BANKRUT';}
if ($wynik3==2){echo 'NIE-BANKRUT';}

    $smarty->display($ust['templates'].'/footer.tpl');
?> </body>

    </html>