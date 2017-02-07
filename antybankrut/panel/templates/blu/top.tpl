<div class="container">
    <div class="site_head">
        <div class="site_head_logo">
            <div class="site_head_logo_left"> <a href="" class="site_head_logo_a">{$title}</a>
                <div class="menu_n" id="menu_n"></div>
            </div>
            <div class="site_head_logo_right"> {if $user_id!=""}
                <div style="width:450px;float:left;margin:0px;padding:0px;"> <b>
Witaj: <a href="user/{$user_nickn}/{$user_id}">{$user_nick}</a> |
<a href="user/panel/">{$lang[147]}</a> | 

 | 


<a href="{$site_url}logout.php">{$lang[152]}</a>
</b> </div> {else}
                <div style="width:480px;text-align:right;float:right;">
                    <form action="" method="POST">
                        <table width="420">
                            <tr>
                                <td valign="top">
                                    <input type="text" class="inputt" name="login" placeholder="{$lang[154]}" style="width:160px;"> </td>
                                <td valign="top">
                                    <input type="password" class="inputt" name="haslo" placeholder="{$lang[155]}" style="width:160px;"> </td>
                                <td valign="center">
                                    <input type="submit" value="{$lang[156]}" style="" name="login_user"> </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div style="width:405px;clear:both;float:right;margin-right:70px;"> {if $fb_login=="1"}
                    <div style="float:left;">
                        <a href="fbc.php?login=fb"><img src="{$lang[425]}"></a>
                    </div> {/if}
                    <div style="float:right;padding-top:5px;"> <a href="register/">{$lang[157]}</a> | <a href="zapomniane-haslo/">{$lang[158]}</a> </div>
                </div> {/if} </div>
        </div>
    </div>
</div>
<div style="width:405px;clear:both;float:right;margin-right:70px;"> </div>
</div>
</div>
</div>
<div class="site_menu">
    <div class="site_head_m">
        <div class="site_head_menu">
            <ul class="top_menu">
                <li class="first_li"><a href="{$site_url}">{$lang[5]}</a> </li>
                <li class="next_li mob_on"><a href="user/menu/">{if $user_id>=1}{$lang[331]}{else}{$lang[332]}{/if}</a></li>
                <li class="next_li"><a href="news/">{$lang[6]}</a> </li>
                <li class="next_li"><a href="regulamin/">{$lang[8]}</a></li>
                <li class="next_li"><a href="kontakt/">{$lang[9]}</a></li>
            </ul>
        </div>
    </div>
</div>
<div> {if $reklama_j
    <>""}{$reklama_j}
        <br>{/if}</div> {if $s_on=="1"}
<div class="site_search">
    <center>
        <form action="do-s.php" method="POST" name="dos">
            <div class="szukb">
                <table>
                    <tr>
                        <td bgcolor="">
                            <input type="text" name="q" value="{if $sz_q<>" 0 "}{$sz_q}{/if}" placeholder="{$lang[423]}" class="input" style="width:260px;"> </td>
                        <td align="left"> {$lang[304]}: {$lang[305]}
                            <input type="text" name="od" value="{if $sz_od>0}{$sz_od}{/if}" style="width:50px;" class="input"> {$lang[306]}
                            <input type="text" value="{if $sz_do>0}{$sz_do}{/if}" name="do" style="width:50px;" class="input"> </td>
                        <td align="left">
                            <select name="cat" style="width:150px" class="input">
                                <option value="0" {if $sz_cat=="0" }selected="selected" {/if}>{$lang[307]}</option> {section name=id loop=$fcatidq} {if $fcatpodq[id]=="0"}
                                <option value="{$fcatidq[id]}" {if $fcatidq[id]==$sz_cat}selected="selected" {/if}>{$fcatnazwaq[id]}</option>{/if} {section name=pid loop=$fcatidq} {if $fcatidq[id]==$fcatpodq[pid]}
                                <option value="{$fcatidq[pid]}" style="padding-left:10px;font-weight:none;" {if $fcatidq[pid]==$sz_cat}selected="selected" {/if}>{$fcatnazwaq[pid]}</option>{/if} {/section} {/section} </select>
                        </td>
                        <td style="padding:6px 0 0 0;">
                            <input type="submit" value="{$lang[424]}" class="szuk_but" style="width:120px;margin-left:15px;"> </td>
                    </tr>
                </table>
            </div>
        </form>
    </center>
</div> {/if}
<div class="site_body">