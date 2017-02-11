<?php
    include("subheader.php");
    $smarty->display($ust['templates'].'/subheader.tpl');
    $smarty->display($ust['templates'].'/top.tpl');



    
        
    $UZAO =($_GET['ZAP']/$_GET['AO'])*100;
    $UKOM =($_GET['KW']+$_GET['ZD']-$_GET['AT'])/$_GET['AO'];
    $NKON =($_GET['ZAP']+$_GET['NKT'])/2-($_GET['KW']+$_GET['ZD']-$_GET['AT']);
        //zm pomocnicza srednia
        $SRA=($_GET['AO-1']+$_GET['AO'])/2;
        
    $PRMA =($_GET['PN']/$SRA)*100;
    $WFIB =$_GET['WFB']/1000;
    $SZSP=($_GET['PN']-$_GET['PN-1'])/$_GET['PN-1'];
    $SZZA=($_GET['ZO']-$_GET['ZO-1'])/$_GET['ZO-1'];    
        
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