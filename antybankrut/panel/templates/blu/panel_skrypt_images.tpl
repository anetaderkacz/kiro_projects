{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[228]}</h1><div class="entry">

<p>




{if $user_id!=""}

<h3 style="color:black;">{$lang[229]}</h3>
{if $stan==19}<div id="ukryj"><center><b style="color:red;">{$lang[230]}</b></center></div>{/if}
{if $stan==6}<div id="ukryj"><center><b style="color:red;">{$lang[231]}</b></center></div>{/if}
{if $stan==5}<div id="ukryj"><center><b style="color:lime;">{$lang[232]}</b></center></div>{/if}

{if $img_iles>=$imgile}
<center><b>{$lang[233]}</b></center>
{else}
<form action="" method="POST" enctype="multipart/form-data" name="upf">

<table>
<tr>
<td valign="top">{$lang[234]}:</td><td><input name="plik1" type="file" class="textbox"/> <br><small>(jpeg, gif, png)</small></td>
</tr>

</table>

<input type="submit" value="{$lang[235]}" name="upf">
</form>
{/if}
<br>
<h3>Zdjęcia:</h3>
{if $stan==7}<div id="ukryj"><center><b style="color:red;">{$lang[236]}</b></center></div>{/if}
{if $stan==8}<div id="ukryj"><center><b style="color:green;">{$lang[237]}</b></center></div>{/if}
{if $stan==9}<div id="ukryj"><center><b style="color:green;">{$lang[238]}</b></center></div>{/if}
{section name=id loop=$img_id}

<table width="100%">
<tr>

<td valign="top" width="5%">
<img src="upload/ogloszenie/{$img_file[id]}">
</td>
<td valign="top" align="left">
{$fo_opis[id]}
</td>
<td colspan="2" align="left">
<a href="panel_skrypt_images.php?v=del&idf={$img_id[id]}&id={$img_o[id]}">{$lang[239]}</a>  | {if $img_file[id]==$art_img}{$lang[240]}{else}<a href="panel_skrypt_images.php?v=g&idf={$img_id[id]}&id={$img_o[id]}">{$lang[241]}</a>{/if}
</td>

</tr>
</table>
<hr>
{/section}

<br>

{else}
<center><b style="color:red;">{$lang[242]}</b></center>
{/if}

</p>
		</div>

	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}