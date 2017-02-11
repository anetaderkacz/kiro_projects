</div>
</div> {if $g_on=="1"}
<div class="box_ogl">
    <h1 class="title">{$lang[422]}</h1>
    <div style="position: relative; overflow: hidden;height:200px;margin:5px;" id="naj_new"> {section name=id loop=$npart_id} {if $npr_ii++%5==0}
        <div style="margin:5px;">{/if}
            <div style="width:175px;float:left;padding:3px;margin-right:5px;border:1px solid #dddddd;">
                <center>
                    <table cellspacing="0" style="width:150px;">
                        <tr>
                            <td><a href="ogloszenie/{$npart_id[id]}/{$npart_tytuln[id]}" style="font-weight:bold;color:#3184E1;"><img  width="150" src="{if $npart_img[id]<>""}upload/ogloszenie/{$npart_img[id]}{else}images/bf.jpg{/if}"  width="150"></a></td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <div style="margin:5px;word-wrap: break-word;width:145px;height:30px;"> <a href="ogloszenie/{$npart_id[id]}/{$npart_tytuln[id]}" style="font-weight:bold;color:#3184E1;word-wrap: break-word;">{$npart_tytul[id]|substr:0:40}</a> </div> {if $npart_cena[id]
                                <>""}
                                    <div style="font-weight:bold;float:left;margin-left:5px;">{$npart_cena[id]} zł</div>{/if}
                                    <div style="float:right;margin-right:10px;font-weight:bold;">{$npart_data[id]|substr:0:10}</div>
                            </td>
                        </tr>
                    </table>
                </center>
            </div> {if $npr_i++%5==0}</div>{/if} {/section} </div>
</div>
</div> {/if}
<div class="site_footer_all">
    <div class="site_footer">
        <div class="site_footer_left">
            <ul class="footer_menu">
                <li><a href="regulamin/">{$lang[8]}</a></li>
                <li><a href="kontakt/">{$lang[9]}</a></li>
            </ul>
        </div>
        <div class="site_footer_right">&copy; &nbsp;2016 Powered by <a href="//kiro.pl">Kiro.pl</a></div>
    </div>
</div>
</div>
<div class="d_info" id="ukryj"></div> {include file="$templa/cookie-alert.tpl"} </body>

</html>