
<center>
<table align="center">
<tr>
<td>
<?php 


if($strona>1)

echo "<a href=$link".($strona-1)."><img src=\"style/images/left.gif\" border=\"0\" ></a>"; else echo "<img src=\"style/images/left.gif\" border=\"0\" >";


               echo '</td><td>';

               if($podstron<=10)
                 {
                 for ($s=1; $s<=$podstron; $s++){ 
                 if ($s==$strona) echo "$s"; 
                 else echo "<a href=".$link."".$s."> $s </a>";}
                 }  
                //jeżeli podstron więcej niż 10 
              elseif($podstron>10)
                 {
                 if($strona>=6 && $strona<=$podstron-5){
                 $wr=$strona-4;
                 $wz=$strona+5;
                 for ($s=$wr; $s<=$wz; $s++){ 
                   if ($s==$strona) echo "$s"; 
                   else echo "<a href=".$link."".$s."> $s </a>";
                   }
                   }
                  else if($strona>=$podstron-5){
                  for ($s=$podstron-9; $s<=$podstron; $s++){ 
                   if ($s==$strona) echo "$s"; 
                   else echo "<a href=".$link."".$s."> $s </a>";
                   }              
                   }
                 else{
                 for ($s=1; $s<=10; $s++){ 
                 if ($s==$strona) echo "$s"; 
                 else echo "<a href=".$link."".$s."> $s </a>";}
                 }
                 }              echo '</td><td width="" align="center">';  

if($strona<$podstron) echo"<a href=$link".($strona+1)."><img src=\"style/images/right.gif\" border=\"0\" ></a>"; else echo"<img src=\"style/images/right.gif\" border=\"0\" >";




?>

</td>
</tr>
</table>
</center>
