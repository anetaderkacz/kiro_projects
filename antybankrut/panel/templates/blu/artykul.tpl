{include file="$templa/subheader.tpl"} {if $druk!="tak"} {include file="$templa/top.tpl"} {include file="$templa/left.tpl"} {/if}
<div class="post">
    <h1 class="title">{$art_tytul}</h1>
    <div class="entry">
        <p>
            <center>
                <div id="gallery" class="mob_on"> <img src="upload/ogloszenie/{$art_imgg}" width="100%" key="foto" title="{$lang[17]}"> </div>
                <table width="100%" cellspacing="0">
                    <tr>
                        <tr> {if $art_img
                            <>""}
                                <td width="10%" align="left" valign="top" class="mob_off">
                                    <div id="gallery"><img src="upload/ogloszenie/{$art_img}" class="img_mini" key="foto" title="{$lang[17]}"> </div>
                                </td> {else}
                                <td width="10%" align="left" style="margin-right:10px;" valign="top"> <img src="images/bf.jpg" key="foto" title="{$lang[18]}"> </td> {/if}
                                <td width="60%" style="padding-left:10px;" align="left" valign="top">
                                    <!------------------Info------------------->{$lang[19]}: <a href="user/{$art_autorn}/{$art_autorid}">{$art_autor}</a>
                                    <br/>
                                    <br/> {if $art_cena>=1}
                                    <div id="cena">{$lang[22]}:<b> {$art_cena} </b>{$lang[23]}</div>
                                    <br/>{/if} {if $art_bitcoin=="1"}
                                    <div id="bitcoin"><img src="../../images/bitcoin.png"></div>{/if}
                                    <br /> {if $art_woj
                                    <>""}{$lang[24]}: {$art_woj}
                                        <br/>{/if} {if $art_miasto
                                        <>""}{$lang[25]}: {$art_miasto}
                                            <br/>{/if}
                                            <br>{$lang[27]}: {$art_view}
                                            <br />
                                            <br/>{if $user_nick!=""}<a id="wiadomosc1" href="pw/send/{$id}">{$lang[244]}</a>
                                            <br />{/if}
                                            <br/>{if $user_nick==""}<a id="wiadomosc1" href="pw/send/{$id}">{$lang[244]}</a>
                                            <br />
                                            <br />{/if}
                                            <br/> {if $art_tel
                                            <>""}<a id="telefon" onclick="fn1()">Pokaż telefon</a>{/if}
                                                <div id="telefon_pok" style="display:none;">{$art_tel}</div>
                                                <br/> {literal}
                                                <script>
                                                    function fn1() {
                                                        document.getElementById('telefon').style.display = "none";
                                                        document.getElementById('telefon_pok').style.display = "inline";
                                                    }
                                                </script> {/literal}
                                                <!------------------Info------------------->
                                </td>
                                <td width="40%" align="left" height="100%">
                                    <!------------------Ocenienie------------------->
                                    <table height="100%">
                                        <tr>
                                            <td valign="bottom" align="center"> {if $druk!="tak"} {if $ocenianie==1 or ($ocenianie==2 and $user_nick!="")} {include file="$templa/ocenianie.tpl"} <b>{$lang[28]}: {$ocena} {$lang[29]}: {$glosy}</b> {/if} {if $ocenianie==2 and $user_nick==""} <b>{$lang[30]}</b> {/if}{/if} </td>
                                        </tr>
                                    </table>
                                    <!------------------Ocenienie------------------->
                                </td>
                        </tr>
                </table>
                <div style="margin-top:10px;color:black;width:100%;z-index:2001;font-weight:normal;">{if $reklama_d
                    <>""}{$reklama_d}{/if}</div>
            </center> {$art_tresc} {if $druk!="tak"}
            <div style="margin-top:25px;height:60px;">
                <div style="float:left;">
                    <table>
                        <tr> {if $druk!="tak"} {if $gp_like=="1"}
                            <td width="62">
                                <g:plusone size="tall"></g:plusone>
                            </td> {/if} {if $fb_like=="1"}
                            <td width="80" valiggn="top"> {literal}
                                <div id="fb-root"></div>
                                <script>
                                    (function (d, s, id) {
                                        var js, fjs = d.getElementsByTagName(s)[0];
                                        if (d.getElementById(id)) {
                                            return;
                                        }
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = "//connect.facebook.net/pl_PL/all.js#xfbml=1";
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));
                                </script>
                                <div class="fb-like" data-send="false" data-layout="box_count" data-show-faces="false"></div> {/literal} </td> {/if} {if $nk_like=="1"}
                            <td width="80"> {literal}
                                <?php
    include("subheader.php");
    $smarty->display($ust['templates'].'/artykul.tpl');


    
        
    $UZAO =($_GET['ZAP']/$_GET['AO'])*100;
    $UKOM =($_GET['KW']+$_GET['ZD']-$_GET['AT'])/$_GET['AO'];
    $NKON =($_GET['ZAP']+$_GET['NKT'])/2-($_GET['KW']+$_GET['ZD']-$_GET['AT']);
        //zm pomocnicza srednia
        $SRA=($_GET['AO-1']+$_GET['AO'])/2;
        
    $PRMA =($_GET['PN']/$SRA)*100;
    $WFIB =$_GET['WFB']/1000;
    $SZSP=($_GET['PN']-$_GET['PN-1'])/$_GET['PN-1'];
    $SZZA=($_GET['ZO']-$_GET['ZO-1'])/$_GET['ZO-1'];    
        
$wartosci_zmiennych_uzyszkodnika = array
										(
											"UZAO" => $UZAO,
											"UKOM" => $UKOM,
											"NKON" => $NKON,
											"PRMA" => $PRMA,
											"WFIB" => $WFIB,
											"SZSP" => $SZSP,
											"SZZA" => $SZZA,
										);




echo '<pre>';
//print_r( $wartosci_zmiennych_uzyszkodnika );
       
       
        echo 'UZAO='.$UZAO;
         echo("<br>");
        echo 'UKOM='.$UKOM;
         echo("<br>");
        echo 'NKON='.$NKON;
         echo("<br>");
        echo 'PRMA='.$PRMA;
         echo("<br>");
         echo 'WFIB='.$WFIB;
        echo("<br>");
        echo 'SZSP='.$SZSP;
         echo("<br>");
        echo 'SZZA='.$SZZA;
echo '</pre>';


//ponieważ wartości parametrów należy podac po pliku wykonywalnym odzielone spacją musimy zmienić tablicę na ciąg znaków oddzielony znakiem spacji;

$parametry = implode(' ', $wartosci_zmiennych_uzyszkodnika);




//tak wygląda wywolanie skompilowanego programu z parametrami:

echo $polecenie = 'upload/kodl.out '.$parametry;

echo '<br />';

    
echo $polecenie1 = 'upload/kodm3.out '.$parametry;

echo '<br />';
    
    echo $polecenie2 = 'upload/kodm4.out '.$parametry;

echo '<br />';

    echo $polecenie3 = 'upload/kod_rbf.out '.$parametry;

echo '<br />';


// uruchomimy sobie buforowanie wyników do przechwycenia całego wyniku działania polecenia
ob_start();

system( $polecenie );

$wynik = ob_get_contents();
    ob_end_clean();
  
    ob_start();    
system( $polecenie1 );
$wynik1 = ob_get_contents();
    ob_end_clean();
    
    ob_start();
system( $polecenie2 );

$wynik2 = ob_get_contents();
    ob_end_clean();
    
        ob_start();
system( $polecenie3 );

$wynik3 = ob_get_contents();
    

//zwolnienie bufora
ob_end_clean();
   echo("<br>");
        echo 'Wynik prognozy LIN: '.$wynik.'<br />';
if ($wynik==1){echo 'BANKRUT';}
if ($wynik==2){echo 'NIE-BANKRUT';}
    
       echo("<br>");
        echo 'Wynik prognozy MLP3: <br />';
if ($wynik1==1){echo 'BANKRUT';}
if ($wynik1==2){echo 'NIE-BANKRUT';}
    
    echo("<br>");
        echo 'Wynik prognozy MLP4: <br />';
if ($wynik2==1){echo 'BANKRUT';}
if ($wynik2==2){echo 'NIE-BANKRUT';}
    
      echo("<br>");
        echo 'Wynik prognozy RBF: <br />';
if ($wynik3==1){echo 'BANKRUT';}
if ($wynik3==2){echo 'NIE-BANKRUT';}

<?
	
{/literal}
</td>
{/if}


{if $wykop=="1"}
<td width="90">
{literal}

<script language="javascript">
// wykopywarka wersja standardowa (59x60)
var wykop_url=location.href;// Link do strony
var wykop_title=encodeURIComponent(document.title); // Tytuł strony (pobierany z <title>)
var wykop_desc=encodeURIComponent('Przykładowy opis');
var widget_bg='FFFFFF';
var widget_type='normal2';
var widget_url='http://www.wykop.pl/dataprovider/diggerwidget/?url='+encodeURIComponent(wykop_url)+'&title='+(wykop_title)+'&desc='+(wykop_desc)+'&bg='+(widget_bg)+'&type='+(widget_type);
document.write('<div><iframe src="'+widget_url+'" style="border:none;width:56px;height:60px;overflow:hidden;margin:0;padding:0;" frameborder="0" border="0"></iframe></div>');</script>

{/literal}
{/if}
</td>
{/if}

</tr></table>
	</div>
	<div style="float:right;margin-top:40px;">
		{if $ust_zglaszanie==1}<div id="zglos">{$lang[405]}</div>{/if}
		{if $print=="1"}<div id="drukuj"><a href="{$site_url}druk/{$art_id}" style="color:#6f6f6f;text-decoration:none;" target="_blank">{$lang[406]}</a></div>{/if}
	</div>
</div>
{if $ust_zglaszanie==1}
<div id="form_all">
	<div id="form_tlo">
		<div id="form_title">{$lang[407]} - <a href="{$site_url}regulamin/">{$lang[408]}</a></div>
		<div id="form_close" title="{$lang[409]}"></div>

		<div id="form_txt">
			<div id="form_info"></div>
			<input type="hidden" id="add_id" value="{$art_id}">
			<textarea name="zgloszenie" id="zgloszenie_txt" style="width:380px;height:100px;"></textarea>
			{if $user_id>=1}
			{else}
			<div id="token" style="float:left;">
				<div id="token_img" style="float:left;"></div>
				<input type="text" id="add_kod" placeholder="{$lang[410]}" style="width:70px;" style="float:left;margin-top:5px;">
			</div>
			{/if}
			<input type="submit" id="wyslij_zgloszenie" value="{$lang[411]}" style="float:right;">
		</div>
		
	</div>
</div>{/if}{/if}

</p></div></div>
{if $druk!="tak"}{else}<script>window.print();</script>{/if}
{if $druk!="tak"}

{if $fo_ile>=1}
<div class="post" style="clear:both;">
			<h1 class="title">{$lang[33]}</h1><div class="entry">
		<p>
		<div id="gallery">
{section name=ile loop=$fo_fm}
<a href="upload/ogloszenie/{$fo_fd[ile]}"  rel="lightbox[zdjecia]" title="{$art_tytul}"><img class="img_mini" width="130" src="upload/ogloszenie/{$fo_fm[ile]}"  key="foto"  title="{$lang[17]}"></a>
{/section}
</div>
</p>
</div></div>
{/if}


{if $ds_x!="" and $ds_y!="" and $map_key<>""}
<div class="post" style="clear:both;">
			<h1 class="title">{$lang[31]}</h1><div class="entry"><p>
<center>
<div id="mapa"  style="width: 100%; height: 400px"><img src="images/loading.gif"> {$lang[32]}</div>
</center>
</p></div></div>
{/if}



{if $komentowanie>=1}

	<div class="post">
			<h1 class="title">{$lang[34]}</h1><div class="entry">
		<p>
{section name=ile loop=$kom_nick}

{$lang[35]}: <b>{if $kom_idu[ile]==""}{$kom_nick[ile]}{else}<a href="user/{$kom_nickn[ile]}/{$kom_idu[ile]}">{$kom_nick[ile]}</a>{/if}</b> {$lang[36]}: {$kom_data[ile]}<br>
{$kom_tresc[ile]}<br><br>

{/section}

<center>
{include file="$templa/komentarze.tpl"}
</center>

</p>
		</div>

	</div>

{/if}


{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}{/if}