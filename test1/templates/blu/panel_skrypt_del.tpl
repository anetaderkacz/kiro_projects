{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[219]}</h1><div class="entry">
		<p>

{if $user_id!=""}

{if $del==1}
<center>
<div id="ok" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:lime;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/ok.png"></td><td><center><b>{$lang[220]}</b></center></td></tr></table></div>
</center>
{else}
<center>
<div id="error" style="color:white;border-style:solid;border-width:thin;width:400px;height:50px;text-align:center;display:table-cell;vertical-align:middle;border-color:black;background-color:red;"><table  width="100%"><tr><td width="15%" align="right"><img src="images/error.png"></td><td><center><b>{$lang[221]}</b></center></td></tr></table></div>
</center>
{/if}
<br>

<center>{$lang[75]} <span id="sekundy" style="font-size: 16px"></span> {$lang[76]}
<br>
{$lang[77]} <a  href="{$site_url}user/panel/ogloszenie/"><b>{$lang[78]}</b></a>.
</center>
{literal}
<script type="text/javascript">
o=document.getElementById('sekundy')
function odliczaj(o,sek){
o.innerHTML=sek
if(sek>0)setTimeout(function(){odliczaj(o,--sek)},1e3)
if(sek==0)window.location.href="{/literal}{$site_url}user/panel/ogloszenie/{literal}"
}
odliczaj(document.getElementById('sekundy'),3) // 
</script>

{/literal}


{else}
<center>
<br><img src="images/lock.png"><br><br>
<b>{$lang[217]} <a href="register/">{$lang[218]}</a>. </b>
</center>
{/if}

</p>
		</div>



	</div>
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}