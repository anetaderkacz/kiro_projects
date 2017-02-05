{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}


{if $par>=1 and $pro_typ=="1"}
<div class="post">


		<p>

<div style="position: relative; overflow: hidden;width:690px;height:250px;" id="s7"> 
{section name=id loop=$part_id}


			{if $pr_ii++%2==0}<div style="width:690px;height:250px;margin:0px;">{/if}
				<a href="ogloszenie/{$part_id[id]}/{$part_tytuln[id]}" style="color:#3994f5;"><div style="{if $pr_ii%2==0}margin-left:5px;{/if}float:left;width:340px;height:250px;background:url('upload/ogloszenie/{$part_img[id]|replace:'m_':'d_'}');background-size:340px 250px;">
					<div style="background:url('images/pro_big.png');width:117px;height:104px;"></div>
					<div style="background:url('images/ptlo.png');width:330px;height:17px;margin-top:120px;padding:5px;">
	
					
						<div style="float:left;color:#3994f5;font-size:14px;font-weight:bold;">{$part_tytul[id]}</div>
						
						<div style="float:right;color:#3994f5;font-size:14px;font-weight:bold;">{if $part_cena[id]<>""} {$part_cena[id]|number_format:2:".":" "}&nbsp;<b style="font-size:12px;">PLN</b>{/if}</div>
							

					
					</div>
				</div></a>
				
			{if $pr_i++%2==0}</div >
		
			{/if}


{/section}
</div>



</p>
	</div>
{/if}



{literal}
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '185895865084898',
      xfbml      : true,
      version    : 'v2.7'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
{/literal}

<div id="facebook_slider_widget" style="display: none">
{literal}
<script type="text/javascript" src="http://webfrik.pl/widget/facebook_slider.html?fb_url=https://www.facebook.com/ogloszeniepl/&amp;fb_width=290&amp;fb_height=590&amp;fb_faces=true&amp;fb_stream=true&amp;fb_header=true&amp;fb_border=true&amp;fb_theme=light&amp;chx=787&amp;speed=FAST&amp;fb_pic=sign&amp;position=LEFT">
</script>
{/literal}
</div>

{if $par>=1 and ($pro_typ=="0" or $pro_typ=="")}
<div class="post">
			<h1 class="title">{$lang[111]}</h1>
<div class="entry">
		<p>

<div style="position: relative; overflow: hidden;width:690px;height:120px;" id="s7"> 
	
{section name=id loop=$part_id}
<div style="width:690px;height:100%;">


<table width="100%" style="color:black;" id="ogl{$part_id[id]}">
<tr>
<td  style="">

<table width="100%" >

<tr>

<td align="left" valign="top">
<a href="ogloszenie/{$part_id[id]}/{$part_tytuln[id]}">{if $part_img[id]<>""}


<img src="upload/ogloszenie/{$part_img[id]}" class="img_mini" width="130" alt="{$part_tytul[id]}" >{else}<img src="images/bf.jpg" class="img_mini" class="img_mini" width="130">{/if}</a>
</td>

<td align="left" valign="top" style="padding:5px;" width="65%">
<div style="height:80px">
<span style="font-size:14px;font-weight:bold;">
<a href="ogloszenie/{$part_id[id]}/{$part_tytuln[id]}" style="color:#3994f5;"><b style="color:#3994f5;">{$part_tytul[id]}</b></a>
</span><br>


{$part_tresc[id]}
</div>


<div style="float:left;">&nbsp;<b>{$part_miasto[id]}</b>  </div>
<div style="float:right;">{$part_data[id]|substr:0:10}</div>

</td>
<td style="width:250px;font-weight:bold;" valign="top" align="right">
{if $part_cena[id]<>""} <b style="color:#3994f5;font-size:16px;">{$part_cena[id]|number_format:2:".":" "}</b> <b style="font-size:12px;">PLN</b>{/if}
<br><br>



{if $ust_ulubione=="1"}
{if $part_del[id]<>""}
<div class="usun" id="u{$part_id[id]}" title="{$lang[367]}" onclick="usun_ul({$part_id[id]},'{$part_del[id]}')"></div>
{else}

	{assign var=art_id_a value=$part_id[id]}
	{if in_array($part_id_a,$ar_ul)}
		<div class="uusun" id="ud{$part_id[id]}" title="{$lang[369]}" ></div>

	{else}
		<div class="ulubione" id="u{$part_id[id]}" title="{$lang[368]}" onclick="add_ul({$part_id[id]})"></div>
		<div class="uusun" id="uu{$part_id[id]}" title="{$lang[369]}" style="display:none;"></div>
	{/if}
{if $art_bitcoin[id]=="1"}<div id="bitcoin_mini1"><img src="../images/bitcoin.png"/></div>{/if}

{/if}{/if}


</td>
</tr>
</table>

</td>

</table>




</div>
{/section}
</div>



</p>
		</div></div>
{/if}


<div class="post">
	<h1 class="title">{$lang[115]}</h1>
	<div class="entry">
		<p>
			{include file="$templa/lista.tpl"}

			{if $podstron>1}
			<br>
			<center>
			<table border="0">
			<tr>
			<td class="str_blok" align="center">{if $strona>1}<a href="s1" title="{$lang[363]}"><<</a>{else}<<{/if}</td>
			<td class="str_blok" align="center">{if $page_m>=1}<a href="s{$page_m}" title="{$lang[364]}: {$page_m}"><</a>{else}<{/if}</td>
			{section name=strona start=$page_start loop=$page_end step=1}

			<td class="str_blok" align="center"><a href="s{$smarty.section.strona.index+1}">{if $strona==$smarty.section.strona.index+1}<b>{$smarty.section.strona.index+1}</b>{else}{$smarty.section.strona.index+1}{/if}</a></td>

			{/section}

			<td class="str_blok" align="center">{if $page_p<=$podstron}<a href="s{$page_p}"  title="{$lang[364]}: {$page_p}">></a>{else}>{/if}</td>
			<td class="str_blok" align="center">{if $strona!=$podstron}<a href="s{$podstron}" title="{$lang[365]} ({$podstron})">>></a>{else}>>{/if}</td>
			</tr>
			</table>
			</center>
			{/if}
		</p>
	</div>
</div>
		
{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}