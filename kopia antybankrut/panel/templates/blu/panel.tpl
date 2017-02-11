{include file="$templa/subheader.tpl"} {include file="$templa/top.tpl"}
<div class="post">
    <h1 class="title">{$lang[172]}</h1>
    <div class="entry">
        <p> {if $user_id!=""}
            <h3 style="color:black;">{$lang[173]}</h3> {if $stan==1}
            <div id="ukryj">
                <center><b style="color:red;">{$lang[174]}</b></center>
            </div>{/if} {if $stan==2}
            <div id="ukryj">
                <center><b style="color:lime;">{$lang[175]}</b></center>
            </div>{/if}
            <form action="wyk/zmien_haslo.php" method="POST">
                <table>
                    <tr>
                        <td><b>{$lang[176]}:</td>
<td><input type="password" name="sh"></td>
</tr>
<tr>
<td><b>{$lang[177]}:</td>
<td><input type="password" name="nh"></td>
</tr>
</table>
<input type="submit" value="{$lang[178]}" name="zh">
</form>
<br>

{if $stan==7}<div id="ukryj"><center><b style="color:red;">{$lang[180]}</b></center>
    </div>{/if} {if $stan==6}
    <div id="ukryj">
        <center><b style="color:red;">{$lang[181]}</b></center>
    </div>{/if} {if $stan==5}
    <div id="ukryj">
        <center><b style="color:lime;">{$lang[182]}</b></center>
    </div>{/if}
    <br>
    <h3 style="color:black;">{$lang[186]}</h3> {if $stan==3}
    <div id="ukryj">
        <center><b style="color:red;">{$lang[187]}</b></center>
    </div>{/if} {if $stan==4}
    <div id="ukryj">
        <center><b style="color:lime;">{$lang[188]}</b></center>
    </div>{/if}
    <form action="wyk/zmien_dane.php" method="POST">
        <table>
            <tr>
                <td><b>{$lang[189]}:</b></td>
                <td>
                    <input type="text" name="email" value="{$email}"> </td>
            </tr>
            <tr>
                <td><b>{$lang[190]}:</b></td>
                <td>
                    <input type="radio" name="ue" value="0" {if $ue==0} checked{/if}>{$lang[191]}
                    <input type="radio" name="ue" value="1" {if $ue==1} checked{/if}>{$lang[192]}</td>
            </tr>
            <tr>
                <td><b>{$lang[193]}:</b></td>
                <td>
                    <select name="plec">
                        <option value="">Wybierz</option>
                        <option value="1" {if $plec==1} selected="selected" {/if}>{$lang[194]}</option>
                        <option value="2" {if $plec==2} selected="selected" {/if}>{$lang[195]}</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b>{$lang[196]}:</b></td>
                <td>
                    <select name="d">
                        <option value="">DD</option> {section name=foo start=1 loop=32 step=1}
                        <option value="{$smarty.section.foo.index}" {if $smarty.section.foo.index==$d} selected="selected" {/if}>{$smarty.section.foo.index}</option> {/section} </select>
                    <select name="m">
                        <option value="">MM</option> {section name=foo start=1 loop=13 step=1}
                        <option value="{$smarty.section.foo.index}" {if $smarty.section.foo.index==$m} selected="selected" {/if}>{$smarty.section.foo.index}</option> {/section} </select>
                    <select name="y">
                        <option value="">YYYY</option> {section name=foo loop=2010 max=109 step=-1}
                        <option value="{$smarty.section.foo.index}" {if $smarty.section.foo.index==$y} selected="selected" {/if}>{$smarty.section.foo.index}</option> {/section} </select>
                </td>
            </tr>
            <tr>
                <td><b>{$lang[198]}:</b></td>
                <td>
                    <input type="text" name="www" value="{$www}"> </td>
            </tr>
            <tr>
                <td><b>{$lang[199]}:</b></td>
                <td>
                    <textarea name="omnie" style="width:300px;height:100px;">{$omnie}</textarea>
                </td>
            </tr>
        </table>
        <input type="submit" value="{$lang[178]}" name="zd"> </form> {else}
    <center><b style="color:red;">{$lang[200]}</b></center> {/if} </p>
</div>
</div> {include file="$templa/right.tpl"} {include file="$templa/footer.tpl"}