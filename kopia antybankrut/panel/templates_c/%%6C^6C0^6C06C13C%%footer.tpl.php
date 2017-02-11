<?php /* Smarty version 2.6.28, created on 2017-02-06 22:48:35
         compiled from blu/footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'substr', 'blu/footer.tpl', 20, false),)), $this); ?>

	</div>

</div>
<?php if ($this->_tpl_vars['g_on'] == '1'): ?>

<div class="box_ogl">
	<h1 class="title"><?php echo $this->_tpl_vars['lang'][422]; ?>
</h1>
	<div style="position: relative; overflow: hidden;height:200px;margin:5px;" id="naj_new">
		<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['npart_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($this->_tpl_vars['npr_ii']++%5 == 0): ?><div style="margin:5px;"><?php endif; ?>
				<div style="width:175px;float:left;padding:3px;margin-right:5px;border:1px solid #dddddd;" >
					<center>
					<table cellspacing="0" style="width:150px;">
					<tr>
					<td><a href="ogloszenie/<?php echo $this->_tpl_vars['npart_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['npart_tytuln'][$this->_sections['id']['index']]; ?>
" style="font-weight:bold;color:#3184E1;"><img  width="150" src="<?php if ($this->_tpl_vars['npart_img'][$this->_sections['id']['index']] <> ""): ?>upload/ogloszenie/<?php echo $this->_tpl_vars['npart_img'][$this->_sections['id']['index']]; ?>
<?php else: ?>images/bf.jpg<?php endif; ?>"  width="150"></a></td>
					</tr><tr>
					<td valign="top" >
					<div style="margin:5px;word-wrap: break-word;width:145px;height:30px;">
					<a href="ogloszenie/<?php echo $this->_tpl_vars['npart_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['npart_tytuln'][$this->_sections['id']['index']]; ?>
" style="font-weight:bold;color:#3184E1;word-wrap: break-word;"><?php echo ((is_array($_tmp=$this->_tpl_vars['npart_tytul'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 40) : substr($_tmp, 0, 40)); ?>
</a>
					</div>
			
					<?php if ($this->_tpl_vars['npart_cena'][$this->_sections['id']['index']] <> ""): ?> <div style="font-weight:bold;float:left;margin-left:5px;"><?php echo $this->_tpl_vars['npart_cena'][$this->_sections['id']['index']]; ?>
 zł</div><?php endif; ?>
					<div style="float:right;margin-right:10px;font-weight:bold;"><?php echo ((is_array($_tmp=$this->_tpl_vars['npart_data'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 10) : substr($_tmp, 0, 10)); ?>
</div>

				
					</td>
					</tr>
					</table></center>
				</div>
			<?php if ($this->_tpl_vars['npr_i']++%5 == 0): ?></div ><?php endif; ?>
		<?php endfor; endif; ?>
	</div>
</div>
</div>
<?php endif; ?>
<div class="site_footer_all">
<div class="site_footer">
	<div class="site_footer_left">
		<ul class="footer_menu">
			<li><a href="regulamin/"><?php echo $this->_tpl_vars['lang'][8]; ?>
</a></li>
			<li><a href="kontakt/"><?php echo $this->_tpl_vars['lang'][9]; ?>
</a></li>
			</ul>
			
	</div>
	<div class="site_footer_right">&copy; &nbsp;2016 Powered by <a href="//kiro.pl">Kiro.pl</a></div>
</div>
</div>
<div> <?php if ($this->_tpl_vars['reklama_t'] <> ""): ?><br><?php echo $this->_tpl_vars['reklama_t']; ?>
<?php endif; ?></div>
</div>
<div class="d_info" id="ukryj"></div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/cookie-alert.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>

