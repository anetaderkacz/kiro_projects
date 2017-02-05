{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
		<div class="post">


{section name=id loop=$news_id}
	
<h1 class="title"><a href="news/{$news_id[id]}/{$news_tytul_n[id]}">{$news_tytul[id]}</a></h1>
<div class="entry">
<p>
{$news_tresc[id]}
</p>
		
		</div>

{/section}

	</div>
	
	{if $podstron>1}
		<div class="post"><div class="entry">
<center>
<table border="0">
<tr>
<td style="border: 1px solid #dddddd;width:20px;height:20px;" align="center">{if $strona>1}<a href="news/s-1" title="Pierwsza strona"><<</a>{else}<<{/if}</td>
<td style="border: 1px solid #dddddd;width:20px;height:20px;" align="center">{if $page_m>=1}<a href="news/s-{$page_m}" title="Strona: {$page_m}"><</a>{else}<{/if}</td>
{section name=strona start=$page_start loop=$page_end step=1}

<td style="border: 1px solid #dddddd;width:20px;height:20px;" align="center"><a href="news/s-{$smarty.section.strona.index+1}">{if $strona==$smarty.section.strona.index+1}<b>{$smarty.section.strona.index+1}</b>{else}{$smarty.section.strona.index+1}{/if}</a></td>

{/section}

<td style="border: 1px solid #dddddd;width:20px;height:20px;" align="center">{if $page_p<=$podstron}<a href="news/s-{$page_p}"  title="Strona: {$page_p}">></a>{else}>{/if}</td>
<td style="border: 1px solid #dddddd;width:20px;height:20px;" align="center">{if $strona!=$podstron}<a href="news/s-{$podstron}" title="Ostatnia strona({$podstron})">>></a>{else}>>{/if}</td>
</tr>
</table>
</center>
	</div></div>
{/if}
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}