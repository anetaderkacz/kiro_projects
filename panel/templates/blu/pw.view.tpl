{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[270]}</h1><div class="entry">
		<p>{if $user_id!=""}
<table>
{section name=id loop=$pw_id}
<tr>
<td><b>{$lang[257]}:</b></td>
<td>{$temat[id]} - <a href="pw/{$pw_id[id]}/del" title="{$lang[271]}"><img src="templates/blu/images/delete.png" width="14"  style="vertical-align: middle;"></a> - <a href="pw/send/{$pw_id[id]}/odp" title="{$lang[272]}"><img src="templates/blu/images/edit.gif" width="14"  style="vertical-align: middle;"></a></td>
</tr>
<tr>
<td><b>{$lang[266]}:</b></td>
<td ><a href="user/{$od_loginn[id]}/{$od[id]}">{$od_login[id]}</a></td>
</tr>
<tr>
<td><b>{$lang[267]}:</b></td>
<td  align="center">{$data[id]}</td>
</tr>
<tr>
<td><b>{$lang[259]}</b></td>
<td>{$tresc[id]}</td>
</tr>
{/section}
</table>

{else}
<center><b style="color:red;">{$lang[242]}</b></center>
{/if}
</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}