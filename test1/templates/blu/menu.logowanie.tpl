{if $user_id!=""}
<center>
<b>
{$lang[337]}: {$user_nick}<br><br>
<a href="user/panel/">{$lang[147]}</a><br>
<a href="dodaj/">{$lang[148]}</a><br>
<a href="user/panel/ogloszenie/">{$lang[149]}</a><br>
<a href="pw/">{if $newpw>=1}<span style="color:red;">{$lang[150]} ({$newpw})</span>{else}{$lang[150]}{/if}</a><br>
<a href="user/{$user_nickn}/{$user_id}">{$lang[151]}</a><br><br>
{if $user_adm=="adm"}
<a href="admin/">{$lang[336]}</a><br><br>
{/if}
<a href="logout.php">{$lang[152]}</a><br/><br/>
</b>
</center>
{else}
{if $user_adm=="error"}<center><span id="ukryj" style="color:red;">{$lang[153]}</span></center>{/if}
<form action="" method="POST">
<table>
<tr>
<td><b>&nbsp;{$lang[154]}:</b></td></tr><tr>
<td><input type="text" name="login" style="width:130px;"></td>
</tr>
<tr>
<td><b>&nbsp;{$lang[155]}:</b></td></tr><tr>
<td><input type="password" name="haslo"   style="width:130px;"></td>
</tr>
</table>
&nbsp;<input type="submit" value="{$lang[156]}" name="login_user">
</form>
{if $fb_login=="1"}<br><br>
<div style="text-align:center;">
	<a href="fbc.php?login=fb"><img src="{$lang[425]}"></a>
</div><br><br>
{/if}
&nbsp;<a href="register/">{$lang[157]}</a><br>
&nbsp;<a href="zapomniane-haslo/">{$lang[158]}</a><br/><br/>
{/if}