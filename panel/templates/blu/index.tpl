{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}


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




<div class="post">
	<h1>Wskaźniki Przedsiębiorstwa</h1>
	<div class="entry">
		<p>
		<form class="form-horizontal">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Wskaźniki Twojego przedsiębiorstwa</legend>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="AO-1">Aktywa ogółem stan na poczatku roku(tys.zł) </label>
                                <div class="col-md-4">
                                    <input id="AO-1" name="AO-1" placeholder="podaj wartość AO-1" class="form-control input-md" required="" type="text"> <span class="help-block">Aktywa ogółem stan na poczatku roku(tys.zł) Tutaj można rozwinąć opis</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="AO">Aktywa ogółem stan na koniec roku(tys.zł) </label>
                                <div class="col-md-4">
                                    <input id="AO" name="AO" placeholder="podaj wartość AO" class="form-control input-md" required="" type="text"> <span class="help-block">Aktywa ogółem stan na koniec roku(tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="AT">Aktywa trwałe stan na koniec roku(tys.zł) </label>
                                <div class="col-md-4">
                                    <input id="AT" name="AT" placeholder="podaj wartość AT" class="form-control input-md" required="" type="text"> <span class="help-block">Aktywa trwałe stan na koniec roku(tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ZAP">Zapasy stan na koniec roku(tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="ZAP" name="ZAP" placeholder="Podaj wartość ZAP" class="form-control input-md" required="" type="text"> <span class="help-block">Zapasy stan na koniec roku(tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="NKT">Należności krótkoterminowe(tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="NKT" name="NKT" placeholder="Podaj wartość NKT" class="form-control input-md" required="" type="text"> <span class="help-block">Należności krótkoterminowe (tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="KW">Kapitał własny(tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="KW" name="KW" placeholder="Podaj wartość KW" class="form-control input-md" required="" type="text"> <span class="help-block">Kapitał własny (tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ZD">Zobowiązania długoterminowe(tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="ZD" name="ZD" placeholder="Podaj wartość ZD" class="form-control input-md" required="" type="text"> <span class="help-block">Zobowiązania długoterminowe (tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="PN-1">Przychody netto ze sprzedaży w roku poprzednim (tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="PN-1" name="PN-1" placeholder="Podaj wartość PN-1" class="form-control input-md" required="" type="text"> <span class="help-block">Przychody netto ze sprzedaży w roku poprzednim (tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="PN">Przychody netto ze sprzedaży za rok bieżący (tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="PN" name="PN" placeholder="Podaj wartość PN" class="form-control input-md" required="" type="text"> <span class="help-block">Przychody netto ze sprzedaży za rok bieżący (tys.zł)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ZO-1">Zatrudnienie-stan na koniec poprzedniego roku (liczba osób)</label>
                                <div class="col-md-4">
                                    <input id="ZO-1" name="ZO-1" placeholder="Podaj wartość ZO-1" class="form-control input-md" required="" type="text"> <span class="help-block">Zatrudnienie-stan na koniec poprzedniego roku (liczba osób)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="ZO">Zatrudnienie-stan na koniec bieżącego roku (liczba osób)</label>
                                <div class="col-md-4">
                                    <input id="ZO" name="ZO" placeholder="Podaj wartość ZO" class="form-control input-md" required="" type="text"> <span class="help-block">Zatrudnienie-stan na koniec bieżącego roku (liczba osób)</span> </div>
                            </div>
                            <!-- Text input-->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="WFB">Wynik finansowy brutto bieżącego roku (tys.zł)</label>
                                <div class="col-md-4">
                                    <input id="WFB" name="WFB" placeholder="Podaj wartość WFB" class="form-control input-md" required="" type="text"> <span class="help-block">Wynik finansowy brutto bieżącego roku (tys.zł)</span> </div>
                            </div>
                            <!-- wybór danych -->
                            <form class="form-horizontal">
                                <fieldset>
                                    <!-- Form Name -->
                                    <legend>Wybierz dane</legend>
                                    <!-- Multiple Radios -->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="radios">Typ Danych</label>
                                        <div class="col-md-4">
                                            <div class="radio">
                                                <label for="radios-0">
                                                    <input type="radio" name="radios" id="radios-0" value="1" checked="checked"> Dane testowe </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radios-1">
                                                    <input type="radio" name="radios" id="radios-1" value="2"> Dane prawdziwe <font color="red">*</font></label>
                                                <p><strong> <font color="red"> *Upewnij się że wprowadzone dane są prawdziwe -służą do ulepszania modelu!  </font>  </strong> </p>
                                            </div>
                                        </div>
                                </fieldset>
                            </form>
                            <!-- Button -->
                            <div class="form-group">
                                <label class="col-md-4 control-label" for="prognozuj"></label>
                                <div class="col-md-4">
                                    <button id="prognozuj" name="prognozuj" formaction="index2.php" class="btn btn-primary">Prześlij</button>
                                </div>
                            </div>
                        </fieldset>
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