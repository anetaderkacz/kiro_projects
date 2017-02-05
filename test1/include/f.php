<?php 

function gen_kod($f_ile,$f_typ="")
{

	if($f_typ=="s")
	{
		$znaki = array_merge(range('a','z'),  range(0,9)); 
	}
	else
	{
		$znaki = array_merge(range('a','z'), range('A','Z'), range(0,9)); 
	}
	
	$ile=count($znaki);
	
	$ret="";
	
	for($i=1;$i<=$f_ile;$i++)
	{
		$ret=$ret.$znaki[rand(0,($ile-1))];
	}
	
	return $ret;

}

function imgfff($ust,$anons_id,$nrfff,$pre)
{

	@mkdir ("upload/ogloszenie/".$anons_id."", 0755);
	
	$folder="upload/ogloszenie/".$anons_id."/"; //Adres folderu z fotkami

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

	$plik_tmp = $_FILES['plik'.$nrfff.'']['tmp_name'];
	$plik_nazwa = $_FILES['plik'.$nrfff.'']['name'];
	$plik_rozmiar = $_FILES['plik'.$nrfff.'']['size'];
	$dai=@getimagesize($plik_tmp);
	$plik_typ=$dai['mime'];
	
	if($plik_tmp!="")
	{
		$name2x = gen_kod(15);

		$namenowa = $name2x.".jpg"; //Nowa nazwa z rozszerzeniem 

		if($plik_typ=="image/jpeg" or $plik_typ=="image/gif" or $plik_typ=="image/png")
		{
			if(is_uploaded_file($plik_tmp)) 
			{
				move_uploaded_file($plik_tmp, "".$folder."".$d_przed."".$namenowa."");
				chmod("".$folder."d_".$namenowa."", 0644);
			}
			
			if($plik_typ=="image/jpeg")
			{
				$orgg = imagecreatefromjpeg("".$folder."".$d_przed."".$namenowa."");
			}
			else if($plik_typ=="image/gif")
			{
				$orgg = imagecreatefromgif("".$folder."".$d_przed."".$namenowa."");
			}
			else if($plik_typ=="image/png")
			{
				$orgg = imagecreatefrompng("".$folder."".$d_przed."".$namenowa."");
			}
			
			$s_org = imagesx($orgg);
			$w_org = imagesy($orgg);
			
			$org = ImageCreateTrueColor( $s_org, $w_org );
			$whit=imagecolorallocate($org,255,255,255); 
			imagefill($org,0,0,$whit); 
			imagecopyresampled($org, $orgg, 0, 0, 0, 0, $s_org, $w_org, $s_org, $w_org);
		
			
			$width=$s_org;
			$height=$w_org;

			$x = 0;
			$y = 0;
			if($width < $height)
			{
				$newwidth = $width;
				$newheight = 3/4 * $width;
				$x = 0;
				$y = $height/2 - $newheight/2;
			}
			else
			{
				$newheight = $height;
				$newwidth = 4/3 * $height;
				$x=$width/2 - $newwidth/2;
				$y=0;

			}

			$targ_w = 200; 
			$targ_h = 151; 


			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
			$white=imagecolorallocate($dst_r,255,255,255); 
			imagefill($dst_r,0,0,$white); 


			imagecopyresampled($dst_r,$org,0,0,$x,$y,$targ_w,$targ_h,$newwidth,$newheight);
			imagefill($dst_r,0,0,$white); 
			imagefill($dst_r,190,0,$white); 
			imagejpeg($dst_r,"".$folder."".$m_przed."".$namenowa."", $m_jakos); 

			if($s_org >= ($xd+1))
			{
			   $w_big = floor(($xd * $w_org) / $s_org);
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
			
			$fotm = $anons_id."/".$m_przed."".$namenowa;
			$fotd = $anons_id."/".$d_przed."".$namenowa;

			if($nrfff=="1")
			{
				$imgg="1";
			}
			else
			{
				$imgg="0";
			}


			$ins="INSERT INTO ".$pre."fotki (`f_d`, `f_m`, `f_a`)VALUE('".$fotd."','".$fotm."','".$anons_id."')";
			db_query($ins);
			
			return $fotm;

		}
		else
		{
		}


		
	}
}

?>