{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
{if $id>=1}
<div class="post">
			<h1 class="title">{$lang[243]}: {$login}</h1><div class="entry">
		<p>

<table cellspacing="0">
<tr>{if $img!=""}
<td valign="top">

<img src="upload/user/{$img}">

</td>{/if}
<td valign="top">
{if $user_nick!=""}<a id="wiadomosc" href="pw/send/{$id}">{$lang[244]}</a><br>{/if}
{if $ue==0}<b>{$lang[245]}:</b>  {$email}<br>{/if}
{if $wiek>=1}<b>{$lang[246]}:</b>  {$wiek}<br>{/if}
{if $gg!=0 or $gg!=""}<b>{$lang[247]}:</b>  {$gg}<br>{/if}
{if $www!=""}<b>{$lang[248]}:</b>  <a href="re/www/{$id}">{$www}</a><br>{/if}
{if $plec==1 or $plec==2}<b>{$lang[249]}:</b> {if $plec==1}{$lang[194]}{/if} {if $plec==2}{$lang[195]}{/if}<br>{/if}
<b>{$lang[250]}:</b> {$datar}<br>
{if $datao!="0000-00-00 00:00:00"}<b>{$lang[251]}:</b> {$datao}<br>{/if}
</td>
</tr>
</table><br/>
{if $omnie<>""}<b>{$lang[252]}:</b><br>
{$omnie}{/if}

</p>
		</div>
	</div>

<div class="post">
			<h1 class="title">{$lang[253]}</h1>
<div class="entry">
		<p>
{if $ai>=1}
{include file="$templa/lista.tpl"}
{else}
<center><b>{$lang[254]}</b></center>
{/if}


</p>
		</div></div>
{else}
<center><b>{$lang[255]}</b></center>
{/if}
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}