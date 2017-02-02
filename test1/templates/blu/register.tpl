{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[276]}</h1><div class="entry">
		<p>
{if $user_nick=="" and $rejestracja==1 and $regok!=1}
{if $reg_error==1}<center>
<div id="error" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:red;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/error.png"></td><td><center><b>
{if $l==1}<center><b >{$lang[277]}</b></center>{/if}
{if $h==1}<center><b >{$lang[278]}</b></center>{/if}
{if $e==1}<center><b >{$lang[279]}</b></center>{/if}
{if $ej==1}<center><b >{$lang[281]}</b></center>{/if}
{if $reg==1}<center><b >{$lang[280]}</b></center>{/if}
{if $t==1}<center><b >{$lang[282]}</b></center>{/if}
</b></center></td></tr></table></div></center>
{/if}
<br>
<form action="" method="POST">
<table>
<tr>
<td><b>{$lang[283]}:</b></td>
<td><input type="text" name="login" value="{$lt}"></td>
</tr>
<tr>
<td><b>{$lang[284]}:</b></td>
<td><input type="password" name="haslo"></td>
</tr>
<tr>
<td><b>{$lang[285]}:</b></td>
<td><input type="text" name="email" value="{$et}"></td>
</tr>
<tr>
<td><b>{$lang[286]}:</b></td>
<td><input type="checkbox" name="regulamin" value="1" {if $regulamin==1} checked{/if}> {$lang[287]} <b><a href="regulamin/">{$lang[288]}</a></b></td>
</tr>
{if $tokenr==1}
<tr>
<td></td>
<td><img src="include/kod.php"></td>
</tr>
<tr>
<td><b>{$lang[289]}:</b></td>
<td><input type="text" name="token"></td>
</tr>
{/if}
</table>
<input type="submit" value="{$lang[290]}" name="register">
</form>
{/if}

{if $rejestracja==0}<center><b>{$lang[292]}</b></center>{/if}
{if $user_nick!=""}<center><b>{$lang[293]}</b></center>{/if}

{if $regok==1}<center><b style="color:lime;">{$lang[294]}</b></center>{/if}
{if $send==1}<center><b style="color:lime;">{$lang[295]}</b></center>{/if}
{if $send==2}<center><b style="color:lime;">{$lang[296]}</b></center>{/if}
</p>
</div>
	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}