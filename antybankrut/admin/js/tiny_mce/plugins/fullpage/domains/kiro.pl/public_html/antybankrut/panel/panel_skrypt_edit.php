<?php
include("subheader.php");
 $smarty->assign("strona_get","add");
 
$Query='SELECT * FROM '.$pre.'woj ORDER by w_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $p_woj[]=$row['w_nazwa'];
   $p_wojid[]=$row['w_id'];
}


$smarty->assign("pwoj",$p_woj);
$smarty->assign("pwojid",$p_wojid);

if($_SESSION['logadm']=="adm")
{
	$czy_adm='';
	$cz_adm="";
}
else
{
	$czy_adm='art_userid="'.$_SESSION['user_id'].'" and';
	$cz_adm=" and art_userid='".$_SESSION['user_id']."' ";
}
 
$Query='SELECT * FROM '.$pre.'artykul WHERE '.$czy_adm.' art_id="'.db_real_escape_string($_GET['id']).'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{

    $smarty->assign("ds_img",$row['art_img']);
    $s_f=$row['art_img'];
    $s_akt=$row['art_akt'];
    $s_cat=$row['art_cat'];
    $s_id=$row['art_id'];
    $ds_id=$row['art_id'];

}


if(isset($_POST['usun_foto_b']))
{
   $up="UPDATE ".$pre."artykul SET art_img=''  WHERE art_id='".db_real_escape_string($_GET['id'])."' ".$cz_adm."";
   db_query($up);

   @unlink("upload/ogloszenie/d_".$s_f);
   @unlink("upload/ogloszenie/m_".$s_f);

   header("Location:  ".$ust['adres']."inf/del-ef/".$s_id);
}

if(isset($_POST['zmien_foto_b']))
{

   include("include/fotka_skrypt.php");
   $fotu=@imggdas($ust,$s_id);

   if($fotu<>"")
   {
      if($s_akt==1)
      {
          $up="UPDATE ".$pre."cat SET cat_ile=cat_ile-1  WHERE cat_id=".$s_cat;
          db_query($up);
      }
      
      $up="UPDATE ".$pre."artykul SET art_img='".$fotu."', art_akt='".$ust['omod']."'  WHERE art_id=".$s_id;
      db_query($up);
      
      header("Location:  ".$ust['adres']."inf/ef/".$s_id);
   }


}


if(isset($_POST['zmien_skrypt_b']))
{
   if($_POST['nazwa']!=""){$ds_nazwa=htmlspecialchars($_POST['nazwa']);}
   if($_POST['cat']!=""){$ds_cat=htmlspecialchars($_POST['cat']);}
   if($_POST['demo']!=""){$ds_demo=htmlspecialchars($_POST['demo']);}
   if($_POST['cena']!=""){$ds_cena=htmlspecialchars($_POST['cena']);}
   if($_POST['opis']!=""){$ds_opis=$_POST['opis'];}
   if($_POST['woj']!=""){$ds_woj=htmlspecialchars($_POST['woj']);}
   if($_POST['miasto']!=""){$ds_miasto=htmlspecialchars($_POST['miasto']);}
   if($_POST['tel']!=""){$ds_tel=htmlspecialchars($_POST['tel']);}

$Query='SELECT * FROM '.$pre.'artykul WHERE '.$czy_adm.' art_id="'.db_real_escape_string($_GET['id']).'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
    $s_cat=$row['art_cat'];
    $s_id=$row['art_id'];
    $s_f=$row['art_img'];
    $s_akt=$row['art_akt'];
}

if($ds_nazwa!="" and $ds_cat!="" and $ds_opis!="")
{
 
   if($s_cat>=1 and $s_id>=1)
   {
       if($s_akt==1)
       {
          $up="UPDATE ".$pre."cat SET cat_ile=cat_ile-1  WHERE cat_id=".$s_cat;
          db_query($up);
       }

     
       $up="UPDATE ".$pre."artykul SET art_x='".htmlspecialchars($_POST['lat'])."',art_y='".htmlspecialchars($_POST['lng'])."',art_zoom='".htmlspecialchars($_POST['zoom'])."',art_akt='".$ust['omod']."', art_miasto='".htmlspecialchars($_POST['miasto'])."', art_tel='".htmlspecialchars($_POST['tel'])."', art_woj='".htmlspecialchars($_POST['woj'])."', art_tytul='".htmlspecialchars($_POST['nazwa'])."',  art_cena='".htmlspecialchars($_POST['cena'])."', art_demo='".htmlspecialchars($_POST['demo'])."',art_tresc='".strip_tags($ds_opis,'<a><p><span><img><br><b><strong><em><i><u><hr><font>')."',art_cat='".htmlspecialchars($_POST['cat'])."'  WHERE art_id='".db_real_escape_string($_GET['id'])."' ".$cz_adm."";
       db_query($up);

       header("Location:  ".$ust['adres']."inf/edit/".$s_id);
   }
   else
   {


   }
}
else
{
    $smarty->assign("ds_error","1");
}

$smarty->assign("ds_isset","1");
$smarty->assign("ds_dni",$ds_dni);
$smarty->assign("ds_nazwa",str_rep("amp",$ds_nazwa));
$smarty->assign("ds_cat",$ds_cat);
$smarty->assign("ds_cena",$ds_cena);
$smarty->assign("ds_opis",$ds_opis);
$smarty->assign("ds_woj",$ds_woj);
$smarty->assign("ds_tel",$ds_tel);
$smarty->assign("ds_miasto",$ds_miasto);

}else{


$Query='SELECT * FROM '.$pre.'artykul WHERE '.$czy_adm.' art_id="'.db_real_escape_string($_GET['id']).'"  ORDER by art_id DESC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
    $smarty->assign("ds_id",$row['art_id']);
    $smarty->assign("ds_nazwa",str_rep("amp",$row['art_tytul']));
    $smarty->assign("ds_cat",$row['art_cat']);
    $smarty->assign("ds_img",$row['art_img']);
    $smarty->assign("ds_demo",$row['art_demo']);
    $smarty->assign("ds_woj",$row['art_woj']);
    $smarty->assign("ds_tel",$row['art_tel']);
    $smarty->assign("ds_miasto",$row['art_miasto']);
    $smarty->assign("ds_cena",$row['art_cena']);
    $smarty->assign("ds_opis",$row['art_tresc']);
    $smarty->assign("ds_end",date("Y.m.d H:i",$row['art_end'])); 
    $smarty->assign("ds_id",$row['art_']);

if($row['art_x']!="" and $row['art_y']!="")
{
    $smarty->assign("ds_x",$row['art_x']);
    $smarty->assign("ds_y",$row['art_y']);
}
else
{
$smarty->assign("ds_x","51.919438");
$smarty->assign("ds_y","19.145136");

}
if($row['art_zoom']!="")
{
    $smarty->assign("ds_zoom",$row['art_zoom']);
}
else
{
    $smarty->assign("ds_zoom","6");
}
}

}

$Query='SELECT * FROM '.$pre.'cat WHERE cat_pod="0" ORDER by cat_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $p_rd[]=$row['cat_nazwa'];
   $p_rdid[]=$row['cat_id'];
   $p_rdp[]=$row['cat_pod'];
}


$smarty->assign("rd",$p_rd);
$smarty->assign("rdid",$p_rdid);
$smarty->assign("rdp",$p_rdp);

$Query='SELECT * FROM '.$pre.'cat ORDER by cat_nazwa ASC'; 
$result = db_query($Query) or die(db_error());
while ($row = db_fetch($result)) 
{
   $pp_rd[]=$row['cat_nazwa'];
   $pp_rdid[]=$row['cat_id'];
   $pp_rdp[]=$row['cat_pod'];
}


$smarty->assign("prd",$pp_rd);
$smarty->assign("prdid",$pp_rdid);
$smarty->assign("prdp",$pp_rdp);

$smarty->assign("ds_id",$ds_id);

$smarty->assign("stan",$_GET['stan']);

$smarty->assign("title",$lang[343].' - '.$ust['nazwa']);

$smarty->display($ust['templates'].'/panel_skrypt_edit.tpl');

?>
