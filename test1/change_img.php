<?
include("db_connect.php");

$Query='SELECT * FROM '.$pre.'artykul'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

	if($row['art_img']<>"")
	{
		$orgg = imagecreatefromjpeg("upload/ogloszenie/".str_replace("m_","d_",$row['art_img']));
		
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
		imagejpeg($dst_r,"upload/ogloszenie/".$row['art_img'], "100"); 
	}

}


?>