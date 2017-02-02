<?php

function imggd1($cat,$ust,$pre){

/*
Function by piotrek-d1
e-mail:piotrek-d1@o2.pl
*/

//---------USTAWIENIA-POCZATEK---------

$folder="../upload/img/"; //Adres folderu z fotkami

$xd=$ust['fotd']; //Maksymalna szerokosc duzej fotki

$s_min = $ust['fotm']; //Szerokosc miniaturki

$m_jakos=$ust['fotmj']; //Jakos miniaturki

$d_jakos=$ust['fotdj']; //Jakos duzej fotki

$m_przed="m_"; //Przedrostek miniaturek

$d_przed="d_"; //Przedrostek duzych

//Kolor tekstu
$c_r = $ust['tekst_r']; //RED
$c_g = $ust['tekst_g']; //GREN
$c_b = $ust['tekst_b']; //BLUE

$font = "include/font/arial.ttf"; //Czcionka

$tekst=$ust['tekst']; //Tekst na obrazku

$txt_size=$ust['tekst_size']; //Wielkosc napisu

$txt_on=$ust['tekst_on']; //Napis naobrazku ON=1 OFF=0

//---------USTAWIENIA-KONIEC---------

$plik_tmp = $_FILES['plik1']['tmp_name'];
$plik_nazwa = $_FILES['plik1']['name'];
$plik_rozmiar = $_FILES['plik1']['size'];




$sp = explode(".",$plik_nazwa); //wyciaganie rozszerzenia 

srand();

$l = rand(10,255); // Losowanie Liczby

$name2x = time() * $l; //Generowanie Nazwy czas * liczba

$namenowa = "$name2x.$sp[1]"; //Nowa nazwa z rozszerzeniem 
$fotm="".$m_przed."".$namenowa."";
$fotd="".$d_przed."".$namenowa."";

  $in="INSERT INTO ".$pre."img(`img_cat`, `img_fm`, `img_fd`, `img_data`)VALUE('".$cat."', '".$fotm."', '".$fotd."', NOW())";
  db_query($in);

  $up="UPDATE ".$pre."gallery SET ga_ilef=ga_ilef+1 WHERE ga_id='".db_real_escape_string($cat)."'";
  db_query($up);

//Upload fotek
if(is_uploaded_file($plik_tmp)) 
{

    move_uploaded_file($plik_tmp, "".$folder."d_".$namenowa."");
    chmod("".$folder."d_".$namenowa."", 0644);
}

//---------POCZATEK-JPG---------
if($sp[1] == "jpg" or $sp[1]== "jpeg" or $sp[1] == "JPG" or $sp[1]== "JPEG")
{
    header("Content-type: image/jpeg");
    $org = imagecreatefromjpeg("".$folder."".$d_przed."".$namenowa."");
    $s_org = imagesx($org);
    $w_org = imagesy($org);
    if(($w_min = floor(($s_min * $w_org) / $s_org)) > 150) $w_min = 150;
    $min = ImageCreateTrueColor($s_min, $w_min);
    imagecopyresampled($min, $org, 0, 0, 0, 0, $s_min, $w_min, $s_org, $w_org);

    imagejpeg($min,"".$folder."".$m_przed."".$namenowa."", $m_jakos); 


    if($s_org >= ($xd+1))
    {
       if(($w_big = floor(($xd * $w_org) / $s_org)) > 648) $w_big = 648;
       $big = ImageCreateTrueColor($xd, $w_big);
       imagecopyresampled($big, $org, 0, 0, 0, 0, $xd, $w_big, $s_org, $w_org);

       if($txt_on==1)
       {  
          $txt_kolor = ImageColorAllocate($big, $c_r, $c_g, $c_b);
          ImageTtfText($big, $txt_size, 0, 10, ($txt_size+10), $txt_kolor, $font, $tekst);
       }
  
       imagejpeg($big,"".$folder."".$d_przed."".$namenowa."", $d_jakos); 
    }
    else
    {
       if($txt_on==1)
       { 
          $txt_kolor = ImageColorAllocate($org, $c_r, $c_g, $c_b);
          ImageTtfText($org, $txt_size, 0, 10, ($txt_size+10), $txt_kolor, $font, $tekst);
       }

       imagejpeg($org,"".$folder."".$d_przed."".$namenowa."", $d_jakos); 
    }

}
//---------KONIEC-JPG---------

//---------POCZATEK-GIF---------
else if($sp[1] == "gif" or $sp[1] == "GIF")
{
    header("Content-type: image/gif");
    $org = imagecreatefromgif("".$folder."".$d_przed."".$namenowa."");
    $s_org = imagesx($org);
    $w_org = imagesy($org);
    if(($w_min = floor(($s_min * $w_org) / $s_org)) > 150) $w_big = 150;
    $min = ImageCreateTrueColor($s_min, $w_min);
    imagecopyresampled($min, $org, 0, 0, 0, 0, $s_min, $w_min, $s_org, $w_org);

    imagegif($min,"".$folder."".$m_przed."".$namenowa."", $m_jakos); 


    if($s_org >= ($xd+1))
    {
       if(($w_big = floor(($xd * $w_org) / $s_org)) > 648) $w_big = 648;
       $big = ImageCreateTrueColor($xd, $w_big);
       imagecopyresampled($big, $org, 0, 0, 0, 0, $xd, $w_big, $s_org, $w_org);
       
       if($txt_on==1)
       { 
          $txt_kolor = ImageColorAllocate($big, $c_r, $c_g, $c_b);
          ImageTtfText($big, $txt_size, 0, 10, ($txt_size+10), $txt_kolor, $font, $tekst);
       }
  
       imagegif($big,"".$folder."".$d_przed."".$namenowa."", $d_jakos); 
    }
    else
    {
       if($txt_on==1)
       { 
          $txt_kolor = ImageColorAllocate($org, $c_r, $c_g, $c_b);
          ImageTtfText($org, $txt_size, 0, 10, ($txt_size+10), $txt_kolor, $font, $tekst);
       }

       imagegif($org,"".$folder."".$d_przed."".$namenowa."", $d_jakos); 
    }

}
//---------KONIEC-GIF---------

//---------POCZATEK-PNG---------
else if($sp[1] == "png" or $sp[1] == "PNG")
{
    header("Content-type: image/png");
    $org = imagecreatefrompng("".$folder."".$d_przed."".$namenowa."");
    $s_org = imagesx($org);
    $w_org = imagesy($org);
    if(($w_min = floor(($s_min * $w_org) / $s_org)) > 150) $w_big = 150;
    $min = ImageCreateTrueColor($s_min, $w_min);
    imagecopyresampled($min, $org, 0, 0, 0, 0, $s_min, $w_min, $s_org, $w_org);

    imagepng($min,"".$folder."".$m_przed."".$namenowa."", $m_jakos); 


    if($s_org >= ($xd+1))
    {
       if(($w_big = floor(($xd * $w_org) / $s_org)) > 648) $w_big = 648;
       $big = ImageCreateTrueColor($xd, $w_big);
       imagecopyresampled($big, $org, 0, 0, 0, 0, $xd, $w_big, $s_org, $w_org);

       if($txt_on==1)
       { 
          $txt_kolor = ImageColorAllocate($big, $c_r, $c_g, $c_b);
          ImageTtfText($big, $txt_size, 0, 10, ($txt_size+10), $txt_kolor, $font, $tekst);
       }
  
       imagepng($big,"".$folder."".$d_przed."".$namenowa."", $d_jakos); 
    }
    else
    {
       if($txt_on==1)
       { 
          $txt_kolor = ImageColorAllocate($org, $c_r, $c_g, $c_b);
          ImageTtfText($org, $txt_size, 0, 10, ($txt_size+10), $txt_kolor, $font, $tekst);
       }

       imagepng($org,"".$folder."".$d_przed."".$namenowa."", $d_jakos); 
    }

}
//---------KONIEC-PNG---------







   }





?>