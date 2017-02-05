{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
		<div class="post">

			<h1 class="title"><a href="news/{$news_id}/{$news_tytul_n}">{$news_tytul}</a></h1>
<div class="entry">
		<p>
<small>{$lang[164]}: <a href="user/{$news_autorn}/{$news_autorid}">{$news_autor}</a> {$lang[165]}: {$news_data}</small><br>
{$news_tresc}
</p>
		

{if $ocenianie==1 or ($ocenianie==2 and $user_nick!="")}

<div id="welcome">

<p>
<center>
{include file="$templa/ocenianie.tpl"}
<b>{$lang[166]}: {$ocena} {$lang[167]}: {$glosy}</b>
</center>
</p>

</div>

{/if}
{if $ocenianie==2 and $user_nick==""}
<div id="welcome"><p><center><b>{$lang[168]}</b></center></p></div>
{/if}

{if $komentowanie>=1}

<div id="example">

<p>

{section name=ile loop=$kom_nick}

{$lang[169]}: <b>{if $kom_idu[ile]==""}{$kom_nick[ile]}{else}<a href="user/{$kom_nickn[ile]}/{$kom_idu[ile]}">{$kom_nick[ile]}</a>{/if}</b> {$lang[170]}: {$kom_data[ile]}<br>
{$kom_tresc[ile]}<br><br>

{/section}

<center>
{include file="$templa/komentarze.tpl"}
</center>
</p>

</div>

{/if}
</div>

	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}