

{section name=id loop=$art_id}
<table width="100%" style="color:black;" id="ogl{$art_id[id]}">
<tr>
<td  style="border-bottom: 1px solid #DEDEDE;">

<table width="100%" >

<tr>

<td align="left" valign="top">
<a href="ogloszenie/{$art_id[id]}/{$art_tytuln[id]}">{if $art_img[id]<>""}


<img src="upload/ogloszenie/{$art_img[id]}" class="img_mini" width="130" alt="{$art_tytul[id]}" >{else}<img src="images/bf.jpg" class="img_mini" class="img_mini" width="130">{/if}</a>
</td>

<td align="left" valign="top" style="padding:5px;" width="65%">
<div style="" class="lis_hei">
<span style="font-size:14px;font-weight:bold;">
<a href="ogloszenie/{$art_id[id]}/{$art_tytuln[id]}" style="color:#3994f5;"><b style="color:#3994f5;">{$art_tytul[id]}</b></a>
</span><br>


{$art_tresc[id]}
</div>


<div style="float:left;">&nbsp;<b>{$art_miasto[id]}</b>  </div>
<div style="float:right;">{$art_data[id]|substr:0:10}</div>
</td>
<td style="width:250px;font-weight:bold;" valign="top" align="right">
{if $art_cena[id]<>""} <b style="color:#3994f5;font-size:16px;">{$art_cena[id]|number_format:0:".":" "}</b> <b style="font-size:12px;">PLN</b>{/if}
<br><br>

{if $ust_ulubione=="1"}

{if $art_del[id]<>""}
<div class="usun" id="u{$art_id[id]}" title="{$lang[367]}" onclick="usun_ul({$art_id[id]},'{$art_del[id]}')"></div>
{else}

	{assign var=art_id_a value=$art_id[id]}
	{if in_array($art_id_a,$ar_ul)}
		<div class="uusun" id="ud{$art_id[id]}" title="{$lang[369]}" ></div>

	{else}
		<div class="ulubione" id="u{$art_id[id]}" title="{$lang[368]}" onclick="add_ul({$art_id[id]})"></div>
		<div class="uusun" id="uu{$art_id[id]}" title="{$lang[369]}" style="display:none;"></div>
	{/if}

{/if}{/if}
</td>
</tr>
</table>

</td>
{if $lii++%1==0}</tr>{/if}
</table>
{/section}

