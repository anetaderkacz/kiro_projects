{include file="$templa/subheader.tpl"}
{include file="$templa/top.tpl"}
{include file="$templa/left.tpl"}
<div class="post">
			<h1 class="title">{$lang[426]}</h1>
			<div class="entry"><p id="reklama_p">
<b>Portal miastobilgoraj.pl z darmowymi ogłoszeniami lokalnymi cieszy się bardzo dużą popularnością</b>
<br /><br />
Umieszczenie reklamy w serwisie pomoże w dotarciu do jak najszerszego grona odbiorców
oraz pozwoli na skuteczne zareklamowanie różnych usług i produktów.
<br /><br />
W naszej ofercie posiadamy reklamę bannerową (graficzną), jaką jest <b> banner poziomy </b> znajdujący się na górze strony.
<b>Banner poziomy</b> to reklama umieszczana rotacyjnie na górze każdej podstrony, jego wymiary to
<b>800px/250px (szerokość/wysokość)</b>
<br />
Banner może być przesłany w jednym z wymienionych formatów: GIF, JPG, PNG. Waga reklamy ma być nie większa
niż 100kb.
<br /><br />
Koszt wyświetlania reklamy przez 30 dni wynosi <b>30 zł netto</b>.
<br /><br />
W celu poprawnego wysłania zgłoszenia reklamy, należy pobrać plik, umieszczony 
<a id ="reklama_tu" href="pdf/reklama_bil.pdf">TUTAJ</a>, wydrukować, wypełnić, a następnie wysłać plik ze skanem w formacie PDF, JPG lub PNG.
Na wysłanie tego pliku pozwala formularz. W polu treść formularza proszę wpisać adres witryny, na jaką ewentualnie
banner ma przenosić.



		</p>
		</div>



	</div>



		<p>

{$kontaktt}

{if $fk==1}
<center>

{$lang[427]} <br /><br/>

{if $send=="ok"}
<div id="ukryj" style="color:green"><b>{$lang[129]}</b></div>
{/if}

{if $send=="error"}
<div id="ukryj" style="color:red"><b>{$lang[130]}</b></div><br>
{/if}

{if $error1=="pemail"}
<div style="color:red"><b>{$lang[131]}</b></div>
{/if}

{if $error2=="ppemail"}
<div  style="color:red"><b>{$lang[132]}</b></div>
{/if}

{if $error3=="pt"}
<div  style="color:red"><b>{$lang[133]}</b></div>
{/if}

{if $error4=="pw"}
<div  style="color:red"><b>{$lang[134]}</b></div>
{/if}

{if $error5=="pk"}
<div  style="color:red"><b>{$lang[135]}</b></div>
{/if}


	<form action="" method="post" name="submit" enctype="multipart/form-data">
		<table width="300" border="0">
			<tr>
			<td width="30%" valign="top"><b>{$lang[136]}:</b></td></tr><tr>
			<td><input type="text"  value="{$eemail}" name="email" style="width: 390px;" /><br />	
			

			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b>{$lang[137]}:</b></td></tr><tr>
			<td><select name="subject">
<option>{$lang[426]}</option>
</select><br />


			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b>{$lang[143]}:</b></td></tr><tr>
			<td><textarea name="text" style="width: 390px; height: 140px;">{$wemail}</textarea><br />

			
		
			<tr>
			<td width="30%" valign="top"><b>{$lang[144]}:</b></td></tr><tr>
			<td><img src="include/kod.php"><br />	
			

			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b>{$lang[145]}:</b></td></tr><tr>
			<td><input type="text" name="kod" style="width: 50px;" /><br />	
			

			</td>
			</tr>



		</table>
			<input type="submit" name="submit" value="{$lang[146]}" class="button"/>
	</form>
</center>

{/if}
</p>
		</div>



{include file="$templa/right.tpl"}
{include file="$templa/footer.tpl"}