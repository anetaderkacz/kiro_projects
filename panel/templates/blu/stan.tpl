{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<div class="entry">
		<p>



{if $stan=="ef"}
<center>
<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td><td><center><b>{$lang[298]}{if $omod==0}<br/>{$lang[299]}{/if}</b></center></td></tr></table></div>
</center>

<br>

<center>{$lang[75]} <span id="sekundy" style="font-size: 16px"></span> {$lang[76]}
<br>
{$lang[77]} <a  href="{$site_url}user/panel/edit/{$stan_id}"><b>{$lang[78]}</b></a>.
</center>
{literal}
<script type="text/javascript">
o=document.getElementById('sekundy')
function odliczaj(o,sek){
o.innerHTML=sek
if(sek>0)setTimeout(function(){odliczaj(o,--sek)},1e3)
if(sek==0)window.location.href="{/literal}{$site_url}user/panel/edit/{$stan_id}{literal}"
}
odliczaj(document.getElementById('sekundy'),3) // 
</script>

{/literal}

{/if}


{if $stan=="del-ef"}
<center>
<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td><td><center><b>{$lang[300]}</b></center></td></tr></table></div>
</center>

<br>

<center>{$lang[75]} <span id="sekundy" style="font-size: 16px"></span> {$lang[76]}
<br>
{$lang[77]} <a  href="{$site_url}user/panel/edit/{$stan_id}"><b>{$lang[78]}</b></a>.
</center>
{literal}
<script type="text/javascript">
o=document.getElementById('sekundy')
function odliczaj(o,sek){
o.innerHTML=sek
if(sek>0)setTimeout(function(){odliczaj(o,--sek)},1e3)
if(sek==0)window.location.href="{/literal}{$site_url}user/panel/edit/{$stan_id}{literal}"
}
odliczaj(document.getElementById('sekundy'),3) // 
</script>

{/literal}

{/if}


{if $stan=="edit"}
<center>
<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td><td><center><b>{$lang[301]}{if $omod==0}<br/>{$lang[299]}{/if}</b></center></td></tr></table></div>
</center>

<br>

<center>{$lang[75]} <span id="sekundy" style="font-size: 16px"></span> {$lang[76]}
<br>
{$lang[77]} <a  href="{$site_url}user/panel/edit/{$stan_id}"><b>{$lang[78]}</b></a>.
</center>
{literal}
<script type="text/javascript">
o=document.getElementById('sekundy')
function odliczaj(o,sek){
o.innerHTML=sek
if(sek>0)setTimeout(function(){odliczaj(o,--sek)},1e3)
if(sek==0)window.location.href="{/literal}{$site_url}user/panel/edit/{$stan_id}{literal}"
}
odliczaj(document.getElementById('sekundy'),3) // 
</script>

{/literal}

{/if}

</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}