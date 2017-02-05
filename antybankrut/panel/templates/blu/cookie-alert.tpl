{if $cookie_on=="1" and $cookie_get<>"1"}
{literal}
<script>


</script>
{/literal}
<div id="cookie_alert" style="z-index: 1030;position: fixed;bottom: 0px;background: #ffffff;border-top: 1px solid #aaaaaa;padding: 10px;text-align: center;font-size: 13px;line-height: 16px;width: 100%;">
<div style="width:1020px;margin: 0px auto;background: #ffffff;">
<div style="float:left;width:850px;text-align: left;line-height: 20px;color:black;font-size:12px;background: #ffffff;">
{$lang[38]}
<br>
{$lang[39]}
</div>
<div style="float:left;background: #ffffff;text-align:center;">
<a href="{$site_url}coff.php" onclick="return(hide_cookie_alert())" title=""><div style="-webkit-border-top-left-radius:4px; -moz-border-radius-topleft:4px; border-top-left-radius:4px;-webkit-border-top-right-radius:4px; -moz-border-radius-topright:4px; border-top-right-radius:4px;-webkit-border-bottom-left-radius:4px; -moz-border-radius-bottomleft:4px; border-bottom-left-radius:4px;-webkit-border-bottom-right-radius:4px; -moz-border-radius-bottomright:4px; border-bottom-right-radius:4px;background:#252425;font-weight:bold;color:white;padding:5px 5px 5px 5px;width:60px;margin:5px 0 0 0;">{$lang[40]}</div></a>
</div>
</div>
</div>
{/if}