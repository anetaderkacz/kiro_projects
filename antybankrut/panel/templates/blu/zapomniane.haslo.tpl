{include file="$templa/subheader.tpl"} {include file="$templa/top.tpl"}
<div class="post">
    <h1 class="title">{$lang[313]}</h1>
    <div class="entry">
        <p> {if $user_id>=1}
            <center><b style="color:lime;">{$lang[362]}</b></center> {else} {if $akt==1}
            <center><b style="color:lime;">{$lang[319]}</b></center>
            <br>{/if} {if $akt==3}
            <center><b style="color:lime;">{$lang[314]}</b></center>
            <br>{/if} {if $akt==2}
            <center><b style="color:red;">{$lang[315]}</b></center>
            <br>{/if}
            <center> <b>{$lang[316]}</b>
                <br>
                <br>
                <form action="" method="POST"> <b>{$lang[317]}: </b>
                    <input type="text" name="login">
                    <input type="submit" value="{$lang[318]}" name="nhzi"> </form>
            </center> {/if} </p>
    </div>
</div> {include file="$templa/right.tpl"} {include file="$templa/footer.tpl"}