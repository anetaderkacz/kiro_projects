{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}



		<div class="post">
			<h1 class="title">{$lang[302]}</h1>
<div class="entry">
		<p>


<br/>
{if $szukaj_on==1}

{if $ai>=1}

{include file="$templa/lista.tpl"}

			{if $podstron>1}
			<br>
			<center>
			<table border="0">
			<tr>
			<td class="str_blok" align="center">{if $strona>1}<a href="szukaj/{$sz_od}/{$sz_do}/{$sz_cat}/{$sz_q}/s1" title="{$lang[363]}"><<</a>{else}<<{/if}</td>
			<td class="str_blok" align="center">{if $page_m>=1}<a href="szukaj/{$sz_od}/{$sz_do}/{$sz_cat}/{$sz_q}/s{$page_m}" title="{$lang[364]}: {$page_m}"><</a>{else}<{/if}</td>
			{section name=strona start=$page_start loop=$page_end step=1}

			<td class="str_blok" align="center"><a href="szukaj/{$sz_od}/{$sz_do}/{$sz_cat}/{$sz_q}/s{$smarty.section.strona.index+1}">{if $strona==$smarty.section.strona.index+1}<b>{$smarty.section.strona.index+1}</b>{else}{$smarty.section.strona.index+1}{/if}</a></td>

			{/section}

			<td class="str_blok" align="center">{if $page_p<=$podstron}<a href="szukaj/{$sz_od}/{$sz_do}/{$sz_cat}/{$sz_q}/s{$page_p}"  title="{$lang[364]}: {$page_p}">></a>{else}>{/if}</td>
			<td class="str_blok" align="center">{if $strona!=$podstron}<a href="szukaj/{$sz_od}/{$sz_do}/{$sz_cat}/{$sz_q}/s{$podstron}" title="{$lang[365]} ({$podstron})">>></a>{else}>>{/if}</td>
			</tr>
			</table>
			</center>
			{/if}


{else}
<center><b>{$lang[311]}</b></center>
{/if}

{/if}
</p>
		</div></div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}