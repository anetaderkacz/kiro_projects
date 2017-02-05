{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}

<div class="post">
			<h1 class="title">{$lang[370]}</h1><div class="entry">
		<p>
{if $art_id>=1}

{if $pod=="2" or $pod=="3" or $akt_ok==1}
		

{if $akt_ok==1 or $pod=="2"}
	<center>
	<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td><td><center><b>{$lang[371]}{if $art_promowane==1}<br>{$lang[372]}{else}<br>{$lang[373]}{/if}</b></center></td></tr></table></div>
	</center>
{/if}
<br>

{else}

	{if $dni_id>=1}
		{section name=id loop=$dniid}
			<center>
				<table width="100%">
				<tr>
				{if $dnicena[id]>0 or $pay_dar=="1"}<td width="50%" style="border:1px solid black;"><center><b>{$lang[374]}</b></center></td>{/if}
				{if $dnicenasms[id]>0}<td width="50%" style="border:1px solid black;"><center><b>{$lang[375]}</b></center></td>{/if}
				</tr>
				<tr>{if $dnicena[id]>0 or $ds_pr=="1"  or $pay_dar=="1"}
				<td width="50%" style="border:1px solid black;"  valign="top">
				<center><br>
				<b>{$lang[376]} {$dnidni[id]} {$lang[377]} - {if $dnicena[id]>0}{$dnicena[id]}{else}0{/if}{$lang[378]}</b><br>
				<br>

				
				
						{if $dnicena[id]>0 or $pay_dar=="1"}<form action="" method="POST"><input type="submit" value="{$lang[379]}" name="pay_b"><br><br></form>{/if}
				<form action="" method="POST">
					{if $proon=="1"}<input type="checkbox" name="pro" value="1"> <b>{$lang[380]} + {$procena}{$lang[378]}</b><br><br>{/if}
				
						<input type="submit" value="{$lang[381]}" name="pay_p">
				</form>
				
				<br><br>

				</b>
				<br><br>
				{$pay_set.p_info}
				{$pay_set.p_logo}
				<br><br>
				</center></td>{/if}{if $dnicenasms[id]>0}
				<td width="50%" style="border:1px solid black;"><center>
				<br>
				{$lang[382]} {$dnidni[id]} {$lang[377]}: <b>{$dnicenasms[id]}{$lang[378]}</b><br>
				<br>
				{if  $ds_pr==1}{$lang[383]}<br><br>{/if}

				<b>{$lang[384]}: {$dnicenasms[id]}{$lang[378]}<br><br></b>

				<hr style="border: 1px solid black;">
				<br>
				{$lang[385]}: <b>{$dninumer[id]}</b> {$lang[386]} <b>{$adnitresc[id]}</b>. {$lang[387]}: <b>{$dnicenasms[id]}{$lang[378]}</b>.

				<br><br>
				{$pay_set.sms_info}
				{$pay_set.sms_logo}
				<br><br>
				{$lang[388]}
				<br><br>

				{if $bledny_kod=="1"}<div id="ukryj"><b style="color:red;">{$lang[390]}</b></div>{/if}

				<table><tr><td><b>{$lang[389]}:&nbsp;</b></td><td> <form action="" method="POST"><input type="text" name="kod"><input type="submit" value="{$lang[391]}"></form></td></tr></table>
				<br><br>
				</center></td>{/if}
				</tr>
				</table>
			<center>
		{/section}
	{else}
		<center>
			<b>{$lang[392]}: {$art_nazwa}</b><br><br>
			
			<table>
				<tr>
					<td style="border:1px solid #dddddd;padding:5px;"><center><b>{$lang[393]}</b></center></td>
					<td style="border:1px solid #dddddd;padding:5px;"><center><b>{$lang[374]}</b></center></td>
					<td style="border:1px solid #dddddd;padding:5px;"><center><b>{$lang[375]}</b></center></td>
					<td><center><b></b></center></td>
				</tr>
				{section name=id loop=$dniid}
				<tr>
					<td style="border:1px solid #dddddd;padding:5px;"><center><b>{$dnidni[id]}</b></center></td>
					{if $dnicena[id]>0 or $dnicenasms[id]>0}
						<td style="border:1px solid #dddddd;padding:5px;"><center><b>{if $dnicena[id]>0}{$dnicena[id]} {$lang[378]}{else}{$lang[394]}{/if}</b></center></td>
						<td style="border:1px solid #dddddd;padding:5px;"><center><b>{if $dnicenasms[id]>0}{$dnicenasms[id]} {$lang[378]}{else}{$lang[394]}{/if}</b></center></td>
					{else}
						<td style="border:1px solid #dddddd;padding:5px;" colspan="2"><center><b>{$lang[395]}</b></center></td>
					{/if}
					<td style="border:1px solid #dddddd;padding:5px;"><center><b><a href="przedluz/{$art_del}/{$dniid[id]}">{$lang[396]}</a></b></center></td>
				</tr>
				{/section}
			</table>
		</center>
	{/if}

{/if}

{else}
	<center>
		<b>
			{$lang[397]}
		</b>
	</center>

{/if}
</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}