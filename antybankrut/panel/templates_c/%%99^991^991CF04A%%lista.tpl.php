<?php /* Smarty version 2.6.28, created on 2017-02-04 22:59:52
         compiled from blu/lista.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'blu/lista.tpl', 31, false),array('modifier', 'number_format', 'blu/lista.tpl', 34, false),)), $this); ?>


<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['art_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<table width="100%" style="color:black;" id="ogl<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
">
<tr>
<td  style="border-bottom: 1px solid #DEDEDE;">

<table width="100%" >

<tr>

<td align="left" valign="top">
<a href="ogloszenie/<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['art_tytuln'][$this->_sections['id']['index']]; ?>
"><?php if ($this->_tpl_vars['art_img'][$this->_sections['id']['index']] <> ""): ?>


<img src="upload/ogloszenie/<?php echo $this->_tpl_vars['art_img'][$this->_sections['id']['index']]; ?>
" class="img_mini" width="130" alt="<?php echo $this->_tpl_vars['art_tytul'][$this->_sections['id']['index']]; ?>
" ><?php else: ?><img src="images/bf.jpg" class="img_mini" class="img_mini" width="130"><?php endif; ?></a>
</td>

<td align="left" valign="top" style="padding:5px;" width="65%">
<div style="" class="lis_hei">
<span style="font-size:14px;font-weight:bold;">
<a href="ogloszenie/<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['art_tytuln'][$this->_sections['id']['index']]; ?>
" style="color:#3994f5;"><b style="color:#3994f5;"><?php echo $this->_tpl_vars['art_tytul'][$this->_sections['id']['index']]; ?>
</b></a>
</span><br>


<?php echo $this->_tpl_vars['art_tresc'][$this->_sections['id']['index']]; ?>

</div>


<div style="float:left;">&nbsp;<b><?php echo $this->_tpl_vars['art_miasto'][$this->_sections['id']['index']]; ?>
</b>  </div>
<div style="float:right;"><?php echo ((is_array($_tmp=$this->_tpl_vars['art_data'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 10) : substr($_tmp, 0, 10)); ?>
</div>
</td>
<td style="width:250px;font-weight:bold;" valign="top" align="right">
<?php if ($this->_tpl_vars['art_cena'][$this->_sections['id']['index']] <> ""): ?> <b style="color:#3994f5;font-size:16px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['art_cena'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('number_format', true, $_tmp, 0, ".", ' ') : number_format($_tmp, 0, ".", ' ')); ?>
</b> <b style="font-size:12px;">PLN</b><?php endif; ?>
<br><br>

<?php if ($this->_tpl_vars['ust_ulubione'] == '1'): ?>

<?php if ($this->_tpl_vars['art_del'][$this->_sections['id']['index']] <> ""): ?>
<div class="usun" id="u<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][367]; ?>
" onclick="usun_ul(<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
,'<?php echo $this->_tpl_vars['art_del'][$this->_sections['id']['index']]; ?>
')"></div>
<?php else: ?>

	<?php $this->assign('art_id_a', $this->_tpl_vars['art_id'][$this->_sections['id']['index']]); ?>
	<?php if (in_array ( $this->_tpl_vars['art_id_a'] , $this->_tpl_vars['ar_ul'] )): ?>
		<div class="uusun" id="ud<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][369]; ?>
" ></div>

	<?php else: ?>
		<div class="ulubione" id="u<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][368]; ?>
" onclick="add_ul(<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
)"></div>
		<div class="uusun" id="uu<?php echo $this->_tpl_vars['art_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][369]; ?>
" style="display:none;"></div>
	<?php endif; ?>

<?php endif; ?><?php endif; ?>
</td>
</tr>
</table>

</td>
<?php if ($this->_tpl_vars['lii']++%1 == 0): ?></tr><?php endif; ?>
</table>
<?php endfor; endif; ?>
