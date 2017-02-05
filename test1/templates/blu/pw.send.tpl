{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[256]}</h1><div class="entry">
		<p>{if $user_id!=""}
<form action="" method="POST">
<table>
<tr>
<td><b>{$lang[257]}:</b></td>
<td><input type="text" name="temat" {if $temat!=""}value="RE: {$temat}"{/if} style="width:250px;"></td>
</tr>
<tr>
<td><b>{$lang[258]}:</b></td>
<td><input type="text" name="do" {if $od_login!=""}value="{$od_login}"{/if}  style="width:150px;"></td>
</tr>
<tr>
<td valign="top"><b>{$lang[259]}</b></td>
<td><textarea name="tresc" style="width:300px;height:100px;"></textarea></td>
</tr>
</table>
<input type="submit" value="{$lang[260]}" name="send">
</form>

{else}
<center><b style="color:red;">{$lang[242]}</b></center>
{/if}
</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}