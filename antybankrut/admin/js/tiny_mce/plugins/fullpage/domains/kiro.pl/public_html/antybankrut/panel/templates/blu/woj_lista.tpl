{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}



<div class="post">
			<h1 class="title">{$cat_nazwa}</a></h1><div class="entry">
		<p>
		{if $a==0}
<center><b>{$lang[312]}</b></center>
{/if}
{include file="$templa/lista.tpl"}
</p>
		
			{if $podstron>1}
			<br>
			<center>
			<table border="0">
			<tr>
			<td class="str_blok" align="center">{if $strona>1}<a href="wojewodztwo/{$cat_id}/{$cat_nazwa}/s1" title="{$lang[363]}"><<</a>{else}<<{/if}</td>
			<td class="str_blok" align="center">{if $page_m>=1}<a href="wojewodztwo/{$cat_id}/{$cat_nazwa}/s{$page_m}" title="{$lang[364]}: {$page_m}"><</a>{else}<{/if}</td>
			{section name=strona start=$page_start loop=$page_end step=1}

			<td class="str_blok" align="center"><a href="wojewodztwo/{$cat_id}/{$cat_nazwa}/s{$smarty.section.strona.index+1}">{if $strona==$smarty.section.strona.index+1}<b>{$smarty.section.strona.index+1}</b>{else}{$smarty.section.strona.index+1}{/if}</a></td>

			{/section}

			<td class="str_blok" align="center">{if $page_p<=$podstron}<a href="wojewodztwo/{$cat_id}/{$cat_nazwa}/s{$page_p}"  title="{$lang[364]}: {$page_p}">></a>{else}>{/if}</td>
			<td class="str_blok" align="center">{if $strona!=$podstron}<a href="wojewodztwo/{$cat_id}/{$cat_nazwa}/s{$podstron}" title="{$lang[365]} ({$podstron})">>></a>{else}>>{/if}</td>
			</tr>
			</table>
			</center>
			{/if}

	
</div></div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}