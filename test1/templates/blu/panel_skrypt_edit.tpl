{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[222]}</h1><div class="entry">

<p>





{if $user_id>=1 and $ds_edit!=1}

{if $ds_id>=1}

{if $ds_error==1}
<center>
<div id="error" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:red;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/error.png"></td><td><center>
{if  $ds_nazwa==""}<b >{$lang[223]}</b><br/>{/if}
{if  $ds_cat==""}<b >{$lang[224]}</b><br/>{/if}
{if  $ds_opis==""}<b >{$lang[225]}</b><br/>{/if}
</center></td></tr></table></div>
</center><br/>
{/if}
<form action=""  method="POST" enctype="multipart/form-data" name="zmien_skrypt">
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
  <option value="{$rdid[id]}" style="color:black;font-weight:bold;"  {if $ds_cat==$rdid[id]}selected="selected"{/if}>{$rd[id]}</option>

{section name=pid loop=$prdid}

{if $rdid[id]==$prdp[pid]}

  <option value="{$prdid[pid]}" {if $ds_cat==$prdid[id]}selected="selected"{/if}> - {$prd[pid]}</option>

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
<td  valign="top"><b>{$lang[100]}<font color="red">*</font>:</b><br><a href="javascript:toggleEditor('elm1');">{$lang[101]}</a></td>
<td><textarea name="opis" id="elm1" style="width:600px;height:400px;">{$ds_opis}</textarea></td>
</tr>
{if $map_key<>""}
<tr><td  colspan="2" align="left" style="color:#11A6D4;font-size:16px;"><b>{$lang[102]}</b></td></tr>
<tr>
<td valign="top"></td>
<td>
<center>{$lang[103]}</center>
<div id="mapa"  style="width: 600px; height: 400px"><img src="images/loading.gif">{$lang[104]}</div>
<input type="hidden" name="lat" id="lat" value="{$ds_x}">
<input type="hidden" name="lng" id="lng"  value="{$ds_y}">
<input type="hidden" name="zoom" id="zoom"  value="{$ds_zoom}">

</td>
</tr>
{/if}

</table>
<input type="submit"  value="{$lang[226]}"  name="zmien_skrypt_b">
</form>

{else}

<center>
<div id="error" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:red;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/error.png"></td><td><center><b>{$lang[227]}</b></center></td></tr></table></div>
</center>

<br>

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

{elseif $ds_edit!=1}
<center>
<br><img src="images/lock.png"><br><br>
<b>{$lang[217]} <a href="register/">{$lang[218]}</a>. </b>
</center>
{/if}

</p>
		</div>

	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}