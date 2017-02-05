<?php



$wynik4=0;
 
$SZSP=0.3;
$SZZA=0.1;
$NKON=-1.2;


//reguła1
if (
        $SZSP>=-0.439
&&      $SZSP<0.122
&&      $SZZA>=-0.092
&&      $SZZA<0.135
&&      $NKON>=-2.520
&&      $NKON<-0.744
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła2
if (
        $SZSP>=0.122
&&      $SZSP<0.683
&&      $SZZA>=-0.092
&&      $SZZA<0.135
&&      $NKON>=-2.520
&&      $NKON<-0.744
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła3
if (
        $SZSP>=-1.000
&&      $SZSP<-0.439
&&      $SZZA>=-1.000
&&      $SZZA<-0.773
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=1;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła4
if (
        $SZSP>=-0.439
&&      $SZSP<0.122
&&      $SZZA>=-1.000
&&      $SZZA<-0.773
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=1;
    echo "wynik=".$wynik4."<br />";
    
}
    else {
  echo "nie znaleziono: $zm<br />";
}
//reguła5
if (
        $SZSP>=-0.439
&&      $SZSP<0.122
&&      $SZZA>=-0.773
&&      $SZZA<-0.546
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła6
if (
        $SZSP>=-1.000
&&      $SZSP<-0.439
&&      $SZZA>=-0.546
&&      $SZZA<-0.319
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=1;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła7
if (
        $SZSP>=-1.000
&&      $SZSP<-0.439
&&      $SZZA>=-0.319
&&      $SZZA<-0.092
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=1;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła8
if (
        $SZSP>=0.122
&&      $SZSP<0.683
&&      $SZZA>=-0.092
&&      $SZZA<0.135
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła9
if (
        $SZSP>=0.683
&&      $SZSP<1.244
&&      $SZZA>=-0.092
&&      $SZZA<0.135
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła10
if (
        $SZSP>=4.049
&&      $SZSP<=4.610
&&      $SZZA>=-0.092
&&      $SZZA<0.135
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła11
if (
        $SZSP>=-0.439
&&      $SZSP<0.122
&&      $SZZA>=0.135
&&      $SZZA<0.362
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
//reguła12
if (
        $SZSP>=0.122
&&      $SZSP<0.683
&&      $SZZA>=0.135
&&      $SZZA<0.362
&&      $NKON>=-0.744
&&      $NKON<1.032
    ){
    //bankrut 1
    //nie bankrut 2
    $wynik4=2;
    echo "wynik=".$wynik4."<br />";
    
}
?>