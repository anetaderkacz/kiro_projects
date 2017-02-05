{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[261]}</h1><div class="entry">
		<p>{if $user_id!=""}
<table><tr><td style="border: 1px solid rgb(204, 204, 204);height:;"><a href="pw/send/"><b>{$lang[262]}</b></a></td><td style="border: 1px solid rgb(204, 204, 204);"> <a href="pw/wyslane/"><b>{$lang[263]}</b></a></td></tr></table><br>
{if $del=="ok"}<center><div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#fde1e1;"><center><b>{$lang[264]}</b></center></div></div></center>{/if}
{if $wyslano=="ok"}<center><div id="ukryj" ><div id="red" style="border-style:solid;border-width:thin;width:400px;height:30px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:#e9ffd3;"><center><b>{$lang[265]}</b></center></div></div></center>{/if}

{if $ilepw>=1}

<table width="100%">
<tr>
<td width="60%"><b>{$lang[257]}</b></td><td  align="center"><b>{$lang[266]}</b></td><td  align="center"><b>{$lang[267]}</b></td><td  align="center"><b>{$lang[271]}</b></td>
</tr>
{section name=id loop=$pw_id}
<tr>
<td>{if $czyt[id]==0}<a href="pw/view/{$pw_id[id]}"><b>{$temat[id]}</b></a>{else}<a href="pw/view/{$pw_id[id]}">{$temat[id]}</a>{/if}</td>
<td  align="center"><a href="user/{$od_loginn[id]}/{$od[id]}">{$od_login[id]}</a></td>
<td  align="center">{$data[id]}</td>
<td  align="center"><a href="pw/{$pw_id[id]}/del">{$lang[268]}</a></td>
</tr>
{/section}
</table>

{else}
<center><b>{$lang[269]}</b></center>
{/if}

{else}
<center><b style="color:red;">{$lang[242]}</b></center>
{/if}
</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}