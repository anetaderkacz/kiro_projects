
{section name=id loop=$c_id}
{if $c_pod[id]=="0"}

&nbsp;&bull; <b><a href="kategoria/{$c_id[id]}/{$c_nazwan[id]}/">{$c_nazwa[id]}</a> [{$c_count[id]}]</b><br/>


{section name=idd loop=$c_id}

{if $c_pod[idd]==$c_id[id] }

&nbsp;&nbsp;&nbsp;- <a href="kategoria/{$c_id[idd]}/{$c_id[id]}/{$c_nazwan[idd]}/">{$c_nazwa[idd]}</a> [{$c_count[idd]}]<br/>

{/if}

{/section}
{/if}

{/section}


