<?php /* Smarty version 2.6.28, created on 2017-02-06 23:15:24
         compiled from blu/left.tpl */ ?>

<div class="site_body_left">
		<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['menu_nazwa_l']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['id']['show'] = true;
$this->_sections['id']['max'] = $this->_sections['id']['loop'];
$this->_sections['id']['step'] = 1;
$this->_sections['id']['start'] = $this->_sections['id']['step'] > 0 ? 0 : $this->_sections['id']['loop']-1;
if ($this->_sections['id']['show']) {
    $this->_sections['id']['total'] = $this->_sections['id']['loop'];
    if ($this->_sections['id']['total'] == 0)
        $this->_sections['id']['show'] = false;
} else
    $this->_sections['id']['total'] = 0;
if ($this->_sections['id']['show']):

            for ($this->_sections['id']['index'] = $this->_sections['id']['start'], $this->_sections['id']['iteration'] = 1;
                 $this->_sections['id']['iteration'] <= $this->_sections['id']['total'];
                 $this->_sections['id']['index'] += $this->_sections['id']['step'], $this->_sections['id']['iteration']++):
$this->_sections['id']['rownum'] = $this->_sections['id']['iteration'];
$this->_sections['id']['index_prev'] = $this->_sections['id']['index'] - $this->_sections['id']['step'];
$this->_sections['id']['index_next'] = $this->_sections['id']['index'] + $this->_sections['id']['step'];
$this->_sections['id']['first']      = ($this->_sections['id']['iteration'] == 1);
$this->_sections['id']['last']       = ($this->_sections['id']['iteration'] == $this->_sections['id']['total']);
?>
		<div class="site_body_left_blok">
			<div class="m_title"><?php echo $this->_tpl_vars['menu_nazwa_l'][$this->_sections['id']['index']]; ?>
</div>
			<div class="m_text"> <?php echo $this->_tpl_vars['menu_tresc_l'][$this->_sections['id']['index']]; ?>
</div>
		</div>
		<?php endfor; endif; ?>
			<div id="reklama_bok">
			<p></p>
			<p>Miejsce na Twoją reklamę</p>
			<p><b>37zł brutto/msc</b></p>
		</div>
		
		<br />
		
		<div id="PogodaNetWidget" style="width:200px">
<a href="http://pogoda.net" rel="nofollow">pogoda.net</a>
</div>
<script type="text/javascript" charset="utf-8" src="http://pogoda.net/widgets/js_v2?format=vertical&width=200&limit=3&pid=161" async="async"></script>
		
		
		
			<div id="reklama_bok">
			<p></p>
			<p>Miejsce na Twoją reklamę</p>
			<p><b>37zł brutto/msc</b></p>
		</div>
		
		
		<br />
		
		<div id="404wa">trwa inicjalizacja, prosze czekac... </div><script type="text/javascript" src="http://404bajery.pl/waluty/waluty.php?ramka=999999&czcionka=595959&pasek=D3E7F5&wartosci=F4FAFD&nazwy=E7F2FA&szer=150"></script>
		
	
		</div>
	

<div class="site_body_content">