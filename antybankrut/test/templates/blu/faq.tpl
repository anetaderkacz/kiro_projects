{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
		<div class="post">
			<h1 class="title">{$lang[110]}</h1>
<div class="entry">
		<p>
{section name=id loop=$faq_nazwa}
<b>{$faq_nazwa[id]}</b><br>
{$faq_tresc[id]}<br><br>
{/section}
</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}