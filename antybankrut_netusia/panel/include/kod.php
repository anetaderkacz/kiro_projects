<?php 

session_start();

$_SESSION['token'] = "";

srand();
$l = rand(1000,9999);

$_SESSION['token'] = $l;

$code = ''.$l.'';

$size_x = 130;
$size_y = 30;

$space_per_char=$size_x/(strlen($code)+1);
$img = ImageCreateTrueColor($size_x,$size_y);
$background=ImageColorAllocate($img,255,255,255);
$border=ImageColorAllocate($img,255,255,255);

$colors[] = ImageColorAllocate($img,34,64,92);
$colors[] = ImageColorAllocate($img,192,64,128);
$colors[] = ImageColorAllocate($img,110,102,104);
ImageFilledrectangle($img,1,1,$size_x-2,$size_y-2,$background);
ImageRectangle($img,0,0,$size_x-1,$size_y-1,$border);

for($i=0; $i < strlen($code); $i++)
{
$color=$colors[$i % count($colors)];
ImageTtfText($img, (12+rand(6,12)), -20+rand(0,45), ($i+0.3) * $space_per_char, 27+rand(0,5), $color, '../include/font/arial.ttf', $code{$i} ); 
}

/*
ImageAntialias($img,true);

for($i=0; $i<300; $i++)
{
$x1=rand(3,$size_x-3);
$y1=rand(3,$size_y-3);

$x2=$x1-8+rand(0,12);
$y2=$y1-8+rand(0,12);

ImageLine($img, $x1, $y1, $x2, $y2, $colors[rand(0,count($colors)-1)]);
}

*/
Header('Content-type: image/jpeg');
ImageJpeg($img);
ImageDestroy($img);
?>
