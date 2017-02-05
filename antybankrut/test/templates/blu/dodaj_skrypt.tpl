{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[50]}</h1>
<div class="entry">

<p>

{if $ust_add_on>=1}

{if $ds_pay==1}

{if $ds_oplacone==1}
<center>
<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td>
<td><center><b>
{$lang[51]}<br/>


</b></center></td></tr></table></div>
</center>
<br>
{else}

<center>
<table width="100%">
<tr>
{if $adnicena>0 or $ds_pr==1}<td width="50%" style="border:1px solid black;"><center><b>{$lang[52]}</b></center></td>{/if}
{if $adnicenasms>0}<td width="50%" style="border:1px solid black;"><center><b>{$lang[53]}</b></center></td>{/if}
</tr>
<tr>{if $adnicena>0 or $ds_pr==1}
<td width="50%" style="border:1px solid black;"  valign="top">
<center><br>
{$lang[54]} {$adnidni} {$lang[55]}: <b>{$adnicena}{$lang[23]}</b><br>
<br>
{if  $ds_pr==1}{$lang[56]}: <b>{$procena}{$lang[23]}</b><br><br>

<b>{$lang[57]}: {$adnicena+$procena}{$lang[23]}<br><br>
{else}
<b>{$lang[57]}: {$adnicena}{$lang[23]}<br><br>
{/if}
<a href="go_pay.php?id={$ds_idp}">{$lang[58]}</a><br><br>
</b>
<br><br>
{$pay_set.p_info}
{$pay_set.p_logo}
<br><br>
</center></td>{/if}{if $adnicenasms>0}
<td width="50%" style="border:1px solid black;"><center>
<br>
{$lang[54]} {$adnidni} {$lang[55]}: <b>{$adnicenasms} {$lang[421]}</b><br>
<br>
{if  $ds_pr==1}{$lang[59]}<br><br>{/if}

<b>{$lang[57]}: {$adnicenasms} {$lang[421]}<br><br></b>

<hr style="border: 1px solid black;">
<br>
{$lang[60]}: <b>{$adninumer}</b> {$lang[61]} <b>{$adnitresc}</b>. {$lang[62]}: <b>{$adnicenasms} {$lang[421]}</b>.

<br><br>
{$pay_set.sms_info}
{$pay_set.sms_logo}
<br><br>
{$lang[68]}
<br><br>

{if $bledny_kod=="1"}<div id="ukryj"><b style="color:red;">{$lang[69]}</b></div>{/if}

<table><tr><td><b>{$lang[70]}:&nbsp;</b></td><td> <form action="" method="POST"><input type="text" name="kod"><input type="submit" value="{$lang[71]}"></form></td></tr></table>
<br><br>
</center></td>{/if}
</tr>
</table>
<center>
<b>

<br>
<br>

</b>
</center>



{/if}

{/if}

{if $ds_add==1}
<center>
<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td>
<td><center><b>
{$lang[72]}<br/>
{if $omod=="0"}{$lang[73]}{/if}
{if $ust_add_on=="2" and $user_id==""}<br>{$lang[74]}{/if}

</b></center></td></tr></table></div>
</center>
<br>
{if $ust_add_on=="1"}
<center>{$lang[75]} <span id="sekundy" style="font-size: 16px"></span> {$lang[76]}
<br>
{$lang[77]} <a  href="{$site_url}user/panel/ogloszenie/"><b>{$lang[78]}</b></a>.
</center>
{literal}
<script type="text/javascript">
o=document.getElementById('sekundy')
function odliczaj(o,sek){
o.innerHTML=sek
if(sek>0)setTimeout(function(){odliczaj(o,--sek)},1e3)
if(sek==0)window.location.href="{/literal}{$site_url}user/panel/ogloszenie/{literal}"
}
odliczaj(document.getElementById('sekundy'),3) // 
</script>

{/literal}
{/if}
{/if}


{if $ds_error==1}
<center>
<div id="error" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:red;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/error.png"></td><td><center>
{if  $ds_nazwa==""}<b >{$lang[79]}</b><br/>{/if}
{if  $ds_cat==""}<b >{$lang[80]}</b><br/>{/if}
{if  $ds_email=="" and $ust_add_on==2}<b >{$lang[81]}</b><br/>{/if}
{if  $ds_dni>="1" and $ds_dni<="90"}{else}<b >{$lang[82]}</b><br/>{/if}
{if  $ds_opis==""}<b >{$lang[83]}</b><br/>{/if}

</center></td></tr></table></div>
</center><br/>
{/if}

{if (($user_id>=1 and $ust_add_on==1) or $ust_add_on==2) and $ds_add!=1 and $ds_pay!=1}

<form action=""  method="POST" enctype="multipart/form-data" name="dodaj_skrypt">
<table width="100%">
<tr>
<td><b>{$lang[84]}<font color="red">*</font>:</b></td>
<td><input type="text" name="nazwa" style="width:250px;" value="{$ds_nazwa}"></td>
</tr>{if $ust_add_on==2 and $user_id==""}
<tr>
<td><b>{$lang[85]}<font color="red">*</font>:</b></td>
<td><input type="text" name="email" style="width:250px;" value="{$ds_email}"><br><small>Na ten adres email zostną wysłane dane do edycji ogłoszenia</small></td>
</tr>{/if}
<tr>
<td><b>{$lang[86]}</b></td>
<td>
<select name="woj">
 <option value="">{$lang[87]}</option>
{section name=id loop=$pwojid}
  <option value="{$pwojid[id]}" {if $ds_woj==$pwojid[id]} selected="selected"{/if}>{$pwoj[id]}</option>
{/section}

</select>
</td>
</tr>
<tr>
<td valign="top"><b>{$lang[88]}:</b></td>
<td><input type="text" name="miasto"  value="{$ds_miasto}" style="width:250px;"></td>
</tr>
<tr>
<td valign="top"><b>{$lang[89]}:</b></td>
<td><input type="text" name="tel"  value="{$ds_tel}" style="width:250px;"></td>
</tr>
<tr>
<td><b>{$lang[90]}<font color="red">*</font>:</b></td>
<td><select name="cat">

{section name=id loop=$rdid}
  <option value="{$rdid[id]}" style="color:black;font-weight:bold;">{$rd[id]}</option>

{section name=pid loop=$prdid}

{if $rdid[id]==$prdp[pid]}

  <option value="{$prdid[pid]}" > - {$prd[pid]}</option>

{/if}

{/section}

{/section}
</select>
</td>
</tr>

<tr>
<td><b>{$lang[91]}:</b></td>
<td><input type="text" name="cena" style="width:50px;"   value="{$ds_cena}">&nbsp;{$lang[23]}</td>
</tr>
<tr>
<td><b>{$lang[92]}:<font color="red">*</font>:</b></td>
<td>
<select name="dni">

{section name=id loop=$dniid}
<option value="{$dniid[id]}" {if $ds_dni==$dniid[id]}selected="selected"{/if}> {$dnidni[id]}{$lang[93]}  {if $dnicena[id]>="0" or $dnicenasms[id]>="0"}- {if $dnicena[id]>0}{$lang[94]}: {$dnicena[id]}{$lang[23]}{/if} {if $dnicenasms[id]>0} {$lang[95]}: {$dnicenasms[id]} {$lang[421]}{/if}{else}- {$lang[96]}{/if} </option>
{/section}

</select></td>
</tr>
{if $proon=="1"}
<tr>
<td valign="top"><b>{$lang[97]}:</b></td>
<td><input type="checkbox" name="pro" value="1" {if $ds_pro=="1"}checked="checked"{/if}>  Tak<br/>
{$lang[98]}: {$procena}{$lang[23]} - {$lang[99]}
</td>
</tr>
{/if}
<tr>
<td  valign="top"><b>{$lang[100]}<font color="red">*</font>:</b><br><a href="javascript:toggleEditor('elm1');">{$lang[101]}</a></td>
<td><textarea name="opis" id="elm1" style="width:100%;height:400px;">{$ds_opis}</textarea></td>
</tr>
{if $map_key<>""}
<tr><td  colspan="2" align="left" style="color:#11A6D4;font-size:16px;"><b>{$lang[102]}</b></td></tr>
<tr>
<td valign="top"></td>
<td>
<center>{$lang[103]}</center>
<div id="mapa"  style="width: 100%; height: 400px"><img src="images/loading.gif">{$lang[104]}</div>
<input type="hidden" name="lat" id="lat" >
<input type="hidden" name="lng" id="lng" >
<input type="hidden" name="zoom" id="zoom" >

</td>
</tr>
{/if}
{section name=strona start=1 loop=$ileimg+1 step=1}
<tr>
<td valign="top"><b>{$lang[105]} {$smarty.section.strona.index}:</b></td>
<td><input name="plik{$smarty.section.strona.index}" type="file" class="textbox"/> <br/><small>(jpeg, gif, png)</small></td>
</tr>
{/section}

</table><br>
<input type="submit"  value="{$lang[106]}"  name="dodaj_skrypt_b">
</form>

{elseif $ds_add!=1  and $ds_pay!=1}
<center>
<br><img src="images/lock.png"><br><br>
<b>{$lang[107]} <a href="register/">{$lang[108]}</a>. </b>
</center>
{/if}
{else}
<center>
<br><img src="images/lock.png"><br><br>
<b>{$lang[109]}</b>
</center>
{/if}
</p>
		</div>

	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}