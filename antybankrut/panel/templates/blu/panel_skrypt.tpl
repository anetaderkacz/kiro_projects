{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[201]}</h1><div class="entry">
		<p>
{if $pay_o=="pay_o"}
	<div class="ukryj"><center><b style="color:green;">Gdy tylko otrzymamy potwierdzenie wpłaty Twoje ogłoszenie zostanie aktywowane</b></center></div>
{/if}

{if $user_id!=""}

<table width="100%">

<tr>
<td width="70%" align="center" bgcolor="#dddddd"><b>{$lang[202]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[203]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[204]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[205]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[206]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[207]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[208]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[209]}</b></td>
<td align="center" bgcolor="#dddddd"><b>{$lang[210]}</b></td>
</tr>
{section name=id loop=$s_id}
<tr onmouseout="this.style.background='none'"; onmouseover="this.style.backgroundColor='#DDDDDD'";>
<td align="center">{if $s_oplacone[id]==1 and $s_akt[id]==1}<a href="ogloszenie/{$s_id[id]}/{$s_nazwan[id]}/"  title="{$lang[211]}">{$s_nazwa[id]}</a>{else}  {$s_nazwa[id]}  {/if}</td>
<td align="center">{$s_end[id]}</td>
<td align="center">{$s_ocena[id]}</td>
<td align="center">{$s_view[id]}</td>
<td align="center">{if $s_akt[id]==1}<img src="{$site_url}images/ok16.png"  key="tak"  title="{$lang[212]}">{else}<img src="{$site_url}images/ok16r.png"  key="nie"  title="{$lang[213]}">{/if}</td>
<td align="center">{if $s_oplacone[id]==1}<img src="{$site_url}images/ok16.png"  key="tak"  title="{$lang[214]}">{else}<a href="dodaj/pay:{$s_id[id]}">{$lang[215]}</a>{/if}</td>
<td align="center"><a href="user/panel/images/{$s_id[id]}"><img src="{$site_url}images/img16.png"  key="{$lang[216]}"  title="{$lang[216]}"></a></td>
<td align="center"><a href="user/panel/edit/{$s_id[id]}"><img src="{$site_url}images/edit.gif"  key=""  title="{$lang[209]}"></a></td>
<td align="center"><a href="user/panel/del/{$s_id[id]}"><img src="{$site_url}images/delete.png"  onclick="return(potwierdz())"  key=""  title="{$lang[210]}"></a></td>
</tr>
{/section}
</table>

{else}
{if $pay_o=="pay_o"}
{else}
<center>
<br><img src="{$site_url}images/lock.png"><br><br>
<b>{$lang[217]} <a href="register/">{$lang[218]}</a>. </b>
</center>
{/if}{/if}

</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}