{if $kom_ile==0}
<center><div><b>{$lang[116]}</b></div></center>
{/if}


{if $e_n==1}
<center><div style="color:red"><b>{$lang[117]}</b></div></center>
{/if}
{if $t_n==1}
<center><div style="color:red"><b>{$lang[118]}</b></div></center>
{/if}
{if $k_n==1}
<center><div style="color:red"><b>{$lang[119]}</b></div></center>
{/if}
{if $k_add==1}
<center><div id="ukryj" style="color:green"><b>{$lang[120]}</b></div></center>
{/if}
{if $komentowanie==1 or ($komentowanie==2 and $user_nick!="")}
<form action="" method="POST" name="addkom">
<p>
<table>
<tr>
<td>{$lang[121]}</td>
<td>
<input name="nick" {if $user_nick!=""} value="{$user_nick}" disabled="disabled" {/if} type="text" size="30" />
</td>
</tr>
<tr>
<td>{$lang[122]}:</td>
<td>
<textarea style="width:250px;height:50px;" name="tresc">{$t_t}</textarea>
</td>
</tr>
{if $token=="1"}
<tr>
<td>{$lang[123]}</td>
<td>
<img src="include/kod.php">
</td>
</tr>
<tr>
<td>{$lang[124]}:</td>
<td>
<input type="text" name="kod" style="width:50px;">
</td>
</tr>
{/if}
</table>
<br />	<br>
<input class="button" type="submit" value="{$lang[125]}" name="addkom"/>
		
</p>		
</form>	
{/if}
{if $komentowanie==2 and $user_nick==""}
<p><center><b>{$lang[126]}</b></center></p>
{/if}

	