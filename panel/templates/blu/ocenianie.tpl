{if $oceniono==""}
<center>
<div id="oceniono" {if $oceniono>=1}title="Oddałeś już głos"{else}onmouseout="rating_res('1','1','6');"{/if}>
<table align="center">
<tr>
</td><td style="width:30px;height:30px;padding:0px;margin:0px;">
<a href="ocen.php?id={$id_gal}&t={$t}&ocena=1" rel="nofollow">
<div class="rating0" style="width:30px;height:30px;" id="6"  onmouseover="rating('1','1','6');" onclick="rating_send('1','1','6');">
<div id="b1" style="display:none;width:30px;height:30px;padding:0px;margin:0px;"></div></div>
</a>
</td>
</td><td style="width:30px;height:30px;padding:0px;margin:0px;">
<a href="ocen.php?id={$id_gal}&t={$t}&ocena=2" rel="nofollow">
<div class="rating0" style="width:30px;height:30px;" id="6"  onmouseover="rating('1','2','6');" onclick="rating_send('1','2','6');">
<div id="b2" style="display:none;width:30px;height:30px;padding:0px;margin:0px;"></div></div>
</a>
</td>
</td><td style="width:30px;height:30px;padding:0px;margin:0px;">
<a href="ocen.php?id={$id_gal}&t={$t}&ocena=3" rel="nofollow">
<div class="rating0" style="width:30px;height:30px;" id="6"  onmouseover="rating('1','3','6');" onclick="rating_send('1','3','6');">
<div id="b3" style="display:none;width:30px;height:30px;padding:0px;margin:0px;"></div></div>
</a>
</td>
</td><td style="width:30px;height:30px;padding:0px;margin:0px;">
<a href="ocen.php?id={$id_gal}&t={$t}&ocena=4" rel="nofollow">
<div class="rating0" style="width:30px;height:30px;" id="6"  onmouseover="rating('1','4','6');" onclick="rating_send('1','4','6');">
<div id="b4" style="display:none;width:30px;height:30px;padding:0px;margin:0px;"></div></div>
</a>
</td><td style="width:30px;height:30px;padding:0px;margin:0px;">
<a href="ocen.php?id={$id_gal}&t={$t}&ocena=5" rel="nofollow">
<div class="rating0" style="width:30px;height:30px;" id="6"  onmouseover="rating('1','5','6');" onclick="rating_send('1','5','6');">
<div id="b5" style="display:none;width:30px;height:30px;padding:0px;margin:0px;"></div></div>
</a>
</td><td style="width:30px;height:30px;padding:0px;margin:0px;">
<a href="ocen.php?id={$id_gal}&t={$t}&ocena=6" rel="nofollow">
<div class="rating0" style="width:30px;height:30px;" id="6"  onmouseover="rating('1','6','6');" onclick="rating_send('1','6','6');">
<div id="b6" style="display:none;width:30px;height:30px;padding:0px;margin:0px;"></div></div>
</a>
</td></tr>
</table>
</div>
</center>
{else}
<center><b>{$lang[171]}</b></center>
{/if}
