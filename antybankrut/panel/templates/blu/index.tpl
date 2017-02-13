{include file="$templa/subheader.tpl"} {include file="$templa/top.tpl"} {literal}
<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '185895865084898'
            , xfbml: true
            , version: 'v2.7'
        });
    };
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script> {/literal}
<div class="post">
    <p> {if $user_id==""}
        <h1 class="title">{$lang[200]}</h1> {/if} </div>
<div class="entry"> {if $user_id!=""}
    <h1>Wskaźniki Przedsiębiorstwa</h1>
    <div class="entry">
        <p>
            <form class="form-horizontal">
                <fieldset class="ramka">
                    <!-- Form Name -->
                    <legend>Wskaźniki Twojego przedsiębiorstwa</legend>
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="AO_1">Aktywa ogółem stan na poczatku roku(tys.zł) </label>
                        <div class="col-md-4">
                            <input id="AO_1" name="AO_1" placeholder="podaj wartość AO_1" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="AO">Aktywa ogółem stan na koniec roku(tys.zł) </label>
                        <div class="col-md-4">
                            <input id="AO" name="AO" placeholder="podaj wartość AO" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="AT">Aktywa trwałe stan na koniec roku(tys.zł) </label>
                        <div class="col-md-4">
                            <input id="AT" name="AT" placeholder="podaj wartość AT" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ZAP">Zapasy stan na koniec roku(tys.zł)</label>
                        <div class="col-md-4">
                            <input id="ZAP" name="ZAP" placeholder="Podaj wartość ZAP" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="NKT">Należności krótkoterminowe(tys.zł)</label>
                        <div class="col-md-4">
                            <input id="NKT" name="NKT" placeholder="Podaj wartość NKT" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="KW">Kapitał własny(tys.zł)</label>
                        <div class="col-md-4">
                            <input id="KW" name="KW" placeholder="Podaj wartość KW" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ZD">Zobowiązania długoterminowe(tys.zł)</label>
                        <div class="col-md-4">
                            <input id="ZD" name="ZD" placeholder="Podaj wartość ZD" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="PN_1">Przychody netto ze sprzedaży w roku poprzednim (tys.zł)</label>
                        <div class="col-md-4">
                            <input id="PN_1" name="PN_1" placeholder="Podaj wartość PN_1" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="PN">Przychody netto ze sprzedaży za rok bieżący (tys.zł)</label>
                        <div class="col-md-4">
                            <input id="PN" name="PN" placeholder="Podaj wartość PN" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ZO_1">Zatrudnienie-stan na koniec poprzedniego roku (liczba osób)</label>
                        <div class="col-md-4">
                            <input id="ZO_1" name="ZO_1" placeholder="Podaj wartość ZO_1" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="ZO">Zatrudnienie-stan na koniec bieżącego roku (liczba osób)</label>
                        <div class="col-md-4">
                            <input id="ZO" name="ZO" placeholder="Podaj wartość ZO" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="WFB">Wynik finansowy brutto bieżącego roku (tys.zł)</label>
                        <div class="col-md-4">
                            <input id="WFB" name="WFB" placeholder="Podaj wartość WFB" class="form-control input-md" required="" type="text"> <span class="help-block"></span> </div>
                    </div>
                    <br />
                    <br />
                    <!-- wybór danych -->
                    <form class="form-horizontal">
                        <fieldset>
                            <!-- Form Name -->
                            <legend>Wybierz dane</legend>
                            <!-- Multiple Radios -->
                            <div class="radio-group">
                                <label class="col-md-4 control-label" for="radios">Typ Danych</label>
                                <div class="col-md-4">
                                    <div class="radio">
                                        <label for="radio2">
                                            <input type="radio" name="radios" id="radio2" value="0"checked="checked"> Dane testowe </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio1">
                                            <input type="radio" name="radios" id="radio1" value="1"> Dane prawdziwe <font color="red">*</font></label>
                                        <p><strong> <font color="red"> *Upewnij się że wprowadzone dane są prawdziwe służą do ulepszania modelu!  </font>  </strong> </p>
                                    </div>
                                </div>
                        </fieldset>
                    </form>
                    <br />
                    <!-- Button -->
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="prognozuj"></label>
                        <div class="col-md-4">
                            <button id="prognozuj" name="prognozuj" formaction="prognoza.php" class="btn btn-primary">Prześlij</button>
                        </div>
                    </div>
                </fieldset> {/if} </p>
        </div>
    </div>
</div> {include file="$templa/footer.tpl"}