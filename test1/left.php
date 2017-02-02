<?php
if($t_conf_menu=="1" or $t_conf_menu=="3")
{
	$Query='SELECT * FROM '.$pre.'menu WHERE menu_s="1" and menu_wys="1" ORDER by menu_nr ASC'; 
	$result = db_query($Query) or die(db_error());
	while ($row = db_fetch($result)) 
	{
		$inc="";
		$tresc="";

			if($row['menu_t']!="")
			{
				$blok_nazwa="";
				ob_start();
				
					include("panele/".$row['menu_t']."/index.php");
				
				$tresc = ob_get_clean();
				$menu_nazwa_l[]=$blok_nazwa;
				$menu_tresc_l[]=$tresc;
			}
			else
			{
				$menu_nazwa_l[]=$row['menu_nazwa'];
				$menu_tresc_l[]=$row['menu_tresc'];
			}
	}

	$smarty->assign("menu_nazwa_l",$menu_nazwa_l);
	$smarty->assign("menu_tresc_l",$menu_tresc_l);
}
?>