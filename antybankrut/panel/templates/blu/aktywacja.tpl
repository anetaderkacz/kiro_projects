{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
		<div class="post">
			<h1 class="title">{$lang[11]}</h1>
<div class="entry">
		<p>

{if $akt==1}<center><b style="color:lime;">{$lang[12]} {$login}<br>{$lang[13]}</b></center>{/if}

{if $akt==0}

{if $akt_u==1}
<center><b style="color:lime;">{$lang[14]} {$login} {$lang[15]}.</b></center>
{else}
<center><b style="color:red;">{$lang[16]}</b></center>
{/if}

{/if}

</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}