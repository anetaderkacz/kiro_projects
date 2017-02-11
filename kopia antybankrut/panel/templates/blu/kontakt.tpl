{include file="$templa/subheader.tpl"} {include file="$templa/top.tpl"}
<div class="post">
    <h1 class="title">{$lang[127]}</h1>
    <div class="entry">
        <p> {$kontaktt} {if $fk==1}
            <center> {$lang[128]}
                <br />
                <br/> {if $send=="ok"}
                <div id="ukryj" style="color:green"><b>{$lang[129]}</b></div> {/if} {if $send=="error"}
                <div id="ukryj" style="color:red"><b>{$lang[130]}</b></div>
                <br> {/if} {if $error1=="pemail"}
                <div style="color:red"><b>{$lang[131]}</b></div> {/if} {if $error2=="ppemail"}
                <div style="color:red"><b>{$lang[132]}</b></div> {/if} {if $error3=="pt"}
                <div style="color:red"><b>{$lang[133]}</b></div> {/if} {if $error4=="pw"}
                <div style="color:red"><b>{$lang[134]}</b></div> {/if} {if $error5=="pk"}
                <div style="color:red"><b>{$lang[135]}</b></div> {/if}
                <form action="" method="post" name="submit">
                    <table width="300" border="0">
                        <tr>
                            <td width="30%" valign="top"><b>{$lang[136]}:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" value="{$eemail}" name="email" style="width: 390px;" />
                                <br /> </td>
                        </tr>
                        <tr>
                            <td width="30%" valign="top"><b>{$lang[137]}:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="subject">
                                    <option>{$lang[138]}</option>
                                    <option>{$lang[139]}</option>
                                    <option>{$lang[140]}</option>
                                    <option>{$lang[141]}</option>
                                    <option>{$lang[142]}</option>
                                </select>
                                <br /> </td>
                        </tr>
                        <tr>
                            <td width="30%" valign="top"><b>{$lang[143]}:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <textarea name="text" style="width: 390px; height: 140px;">{$wemail}</textarea>
                                <br /> </td>
                        </tr>
                        <tr>
                            <td width="30%" valign="top"><b>{$lang[144]}:</b></td>
                        </tr>
                        <tr>
                            <td><img src="include/kod.php">
                                <br /> </td>
                        </tr>
                        <tr>
                            <td width="30%" valign="top"><b>{$lang[145]}:</b></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="kod" style="width: 50px;" />
                                <br /> </td>
                        </tr>
                    </table>
                    <input type="submit" name="submit" value="{$lang[146]}" class="button" /> </form>
            </center> {/if} </p>
    </div>
</div> {include file="$templa/right.tpl"} {include file="$templa/footer.tpl"}