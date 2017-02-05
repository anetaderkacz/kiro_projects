<?php /* Smarty version 2.6.28, created on 2017-02-04 22:59:52
         compiled from blu/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'blu/index.tpl', 17, false),array('modifier', 'number_format', 'blu/index.tpl', 24, false),array('modifier', 'substr', 'blu/index.tpl', 156, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/subheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/left.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>


<?php if ($this->_tpl_vars['par'] >= 1 && $this->_tpl_vars['pro_typ'] == '1'): ?>
<div class="post">


		<p>

<div style="position: relative; overflow: hidden;width:690px;height:250px;" id="s7"> 
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['part_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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


			<?php if ($this->_tpl_vars['pr_ii']++%2 == 0): ?><div style="width:690px;height:250px;margin:0px;"><?php endif; ?>
				<a href="ogloszenie/<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['part_tytuln'][$this->_sections['id']['index']]; ?>
" style="color:#3994f5;"><div style="<?php if ($this->_tpl_vars['pr_ii']%2 == 0): ?>margin-left:5px;<?php endif; ?>float:left;width:340px;height:250px;background:url('upload/ogloszenie/<?php echo ((is_array($_tmp=$this->_tpl_vars['part_img'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('replace', true, $_tmp, 'm_', 'd_') : smarty_modifier_replace($_tmp, 'm_', 'd_')); ?>
');background-size:340px 250px;">
					<div style="background:url('images/pro_big.png');width:117px;height:104px;"></div>
					<div style="background:url('images/ptlo.png');width:330px;height:17px;margin-top:120px;padding:5px;">
	
					
						<div style="float:left;color:#3994f5;font-size:14px;font-weight:bold;"><?php echo $this->_tpl_vars['part_tytul'][$this->_sections['id']['index']]; ?>
</div>
						
						<div style="float:right;color:#3994f5;font-size:14px;font-weight:bold;"><?php if ($this->_tpl_vars['part_cena'][$this->_sections['id']['index']] <> ""): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['part_cena'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ' ') : number_format($_tmp, 2, ".", ' ')); ?>
&nbsp;<b style="font-size:12px;">PLN</b><?php endif; ?></div>
							

					
					</div>
				</div></a>
				
			<?php if ($this->_tpl_vars['pr_i']++%2 == 0): ?></div >
		
			<?php endif; ?>


<?php endfor; endif; ?>
</div>


</p>
	</div>


	<br />
	
	<!-- drugi promowany box -->
	<div class="post">


		<p>

<div style="position: relative; overflow: hidden;width:690px;height:250px;" id="s8"> 
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['part_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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


			<?php if ($this->_tpl_vars['pr_ii']++%2 == 0): ?><div style="width:690px;height:250px;margin:0px;"><?php endif; ?>
				<a href="ogloszenie/<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['part_tytuln'][$this->_sections['id']['index']]; ?>
" style="color:#3994f5;"><div style="<?php if ($this->_tpl_vars['pr_ii']%2 == 0): ?>margin-left:5px;<?php endif; ?>float:left;width:340px;height:250px;background:url('upload/ogloszenie/<?php echo ((is_array($_tmp=$this->_tpl_vars['part_img'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('replace', true, $_tmp, 'm_', 'd_') : smarty_modifier_replace($_tmp, 'm_', 'd_')); ?>
');background-size:340px 250px;">
					<div style="background:url('images/pro_big.png');width:117px;height:104px;"></div>
					<div style="background:url('images/ptlo.png');width:330px;height:17px;margin-top:120px;padding:5px;">
	
					
						<div style="float:left;color:#3994f5;font-size:14px;font-weight:bold;"><?php echo $this->_tpl_vars['part_tytul'][$this->_sections['id']['index']]; ?>
</div>
						
						<div style="float:right;color:#3994f5;font-size:14px;font-weight:bold;"><?php if ($this->_tpl_vars['part_cena'][$this->_sections['id']['index']] <> ""): ?> <?php echo ((is_array($_tmp=$this->_tpl_vars['part_cena'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ' ') : number_format($_tmp, 2, ".", ' ')); ?>
&nbsp;<b style="font-size:12px;">PLN</b><?php endif; ?></div>
							

					
					</div>
				</div></a>
				
			<?php if ($this->_tpl_vars['pr_i']++%2 == 0): ?></div >
		
			<?php endif; ?>


<?php endfor; endif; ?>
</div>



</p>
	</div>
	
	<!-- drugi promowany box -->
	
<?php endif; ?>



<?php echo '
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : \'185895865084898\',
      xfbml      : true,
      version    : \'v2.7\'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, \'script\', \'facebook-jssdk\'));
</script>
'; ?>


<div id="facebook_slider_widget" style="display: none">
<?php echo '
<script type="text/javascript" src="http://webfrik.pl/widget/facebook_slider.html?fb_url=https://www.facebook.com/ogloszeniepl/&amp;fb_width=290&amp;fb_height=590&amp;fb_faces=true&amp;fb_stream=true&amp;fb_header=true&amp;fb_border=true&amp;fb_theme=light&amp;chx=787&amp;speed=FAST&amp;fb_pic=sign&amp;position=LEFT">
</script>
'; ?>

</div>

<?php if ($this->_tpl_vars['par'] >= 1 && ( $this->_tpl_vars['pro_typ'] == '0' || $this->_tpl_vars['pro_typ'] == "" )): ?>
<div class="post">
			<h1 class="title"><?php echo $this->_tpl_vars['lang'][111]; ?>
</h1>
<div class="entry">
		<p>

<div style="position: relative; overflow: hidden;width:690px;height:120px;" id="s7"> 
	
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['part_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div style="width:690px;height:100%;">


<table width="100%" style="color:black;" id="ogl<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
">
<tr>
<td  style="">

<table width="100%" >

<tr>

<td align="left" valign="top">
<a href="ogloszenie/<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['part_tytuln'][$this->_sections['id']['index']]; ?>
"><?php if ($this->_tpl_vars['part_img'][$this->_sections['id']['index']] <> ""): ?>


<img src="upload/ogloszenie/<?php echo $this->_tpl_vars['part_img'][$this->_sections['id']['index']]; ?>
" class="img_mini" width="130" alt="<?php echo $this->_tpl_vars['part_tytul'][$this->_sections['id']['index']]; ?>
" ><?php else: ?><img src="images/bf.jpg" class="img_mini" class="img_mini" width="130"><?php endif; ?></a>
</td>

<td align="left" valign="top" style="padding:5px;" width="65%">
<div style="height:80px">
<span style="font-size:14px;font-weight:bold;">
<a href="ogloszenie/<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['part_tytuln'][$this->_sections['id']['index']]; ?>
" style="color:#3994f5;"><b style="color:#3994f5;"><?php echo $this->_tpl_vars['part_tytul'][$this->_sections['id']['index']]; ?>
</b></a>
</span><br>


<?php echo $this->_tpl_vars['part_tresc'][$this->_sections['id']['index']]; ?>

</div>


<div style="float:left;">&nbsp;<b><?php echo $this->_tpl_vars['part_miasto'][$this->_sections['id']['index']]; ?>
</b>  </div>
<div style="float:right;"><?php echo ((is_array($_tmp=$this->_tpl_vars['part_data'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 10) : substr($_tmp, 0, 10)); ?>
</div>

</td>
<td style="width:250px;font-weight:bold;" valign="top" align="right">
<?php if ($this->_tpl_vars['part_cena'][$this->_sections['id']['index']] <> ""): ?> <b style="color:#3994f5;font-size:16px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['part_cena'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ' ') : number_format($_tmp, 2, ".", ' ')); ?>
</b> <b style="font-size:12px;">PLN</b><?php endif; ?>
<br><br>



<?php if ($this->_tpl_vars['ust_ulubione'] == '1'): ?>
<?php if ($this->_tpl_vars['part_del'][$this->_sections['id']['index']] <> ""): ?>
<div class="usun" id="u<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][367]; ?>
" onclick="usun_ul(<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
,'<?php echo $this->_tpl_vars['part_del'][$this->_sections['id']['index']]; ?>
')"></div>
<?php else: ?>

	<?php $this->assign('art_id_a', $this->_tpl_vars['part_id'][$this->_sections['id']['index']]); ?>
	<?php if (in_array ( $this->_tpl_vars['part_id_a'] , $this->_tpl_vars['ar_ul'] )): ?>
		<div class="uusun" id="ud<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][369]; ?>
" ></div>

	<?php else: ?>
		<div class="ulubione" id="u<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][368]; ?>
" onclick="add_ul(<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
)"></div>
		<div class="uusun" id="uu<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][369]; ?>
" style="display:none;"></div>
	<?php endif; ?>

<?php endif; ?><?php endif; ?>
<?php if ($this->_tpl_vars['art_bitcoin'][$this->_sections['id']['index']] == '1'): ?><div id="bitcoin_mini1"><img src="../images/bitcoin.png"/></div><?php endif; ?>


</td>
</tr>
</table>

</td>

</table>




</div>
<?php endfor; endif; ?>




</div>

	<hr />
	<!-- drugi promowany box -->
<div style="position: relative; overflow: hidden;width:690px;height:120px;" id="s8"> 
	
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['part_id']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
<div style="width:690px;height:100%;">


<table width="100%" style="color:black;" id="ogl<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
">
<tr>
<td  style="">

<table width="100%" >

<tr>

<td align="left" valign="top">
<a href="ogloszenie/<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['part_tytuln'][$this->_sections['id']['index']]; ?>
"><?php if ($this->_tpl_vars['part_img'][$this->_sections['id']['index']] <> ""): ?>


<img src="upload/ogloszenie/<?php echo $this->_tpl_vars['part_img'][$this->_sections['id']['index']]; ?>
" class="img_mini" width="130" alt="<?php echo $this->_tpl_vars['part_tytul'][$this->_sections['id']['index']]; ?>
" ><?php else: ?><img src="images/bf.jpg" class="img_mini" class="img_mini" width="130"><?php endif; ?></a>
</td>

<td align="left" valign="top" style="padding:5px;" width="65%">
<div style="height:80px">
<span style="font-size:14px;font-weight:bold;">
<a href="ogloszenie/<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
/<?php echo $this->_tpl_vars['part_tytuln'][$this->_sections['id']['index']]; ?>
" style="color:#3994f5;"><b style="color:#3994f5;"><?php echo $this->_tpl_vars['part_tytul'][$this->_sections['id']['index']]; ?>
</b></a>
</span><br>


<?php echo $this->_tpl_vars['part_tresc'][$this->_sections['id']['index']]; ?>

</div>


<div style="float:left;">&nbsp;<b><?php echo $this->_tpl_vars['part_miasto'][$this->_sections['id']['index']]; ?>
</b>  </div>
<div style="float:right;"><?php echo ((is_array($_tmp=$this->_tpl_vars['part_data'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 10) : substr($_tmp, 0, 10)); ?>
</div>

</td>
<td style="width:250px;font-weight:bold;" valign="top" align="right">
<?php if ($this->_tpl_vars['part_cena'][$this->_sections['id']['index']] <> ""): ?> <b style="color:#3994f5;font-size:16px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['part_cena'][$this->_sections['id']['index']])) ? $this->_run_mod_handler('number_format', true, $_tmp, 2, ".", ' ') : number_format($_tmp, 2, ".", ' ')); ?>
</b> <b style="font-size:12px;">PLN</b><?php endif; ?>
<br><br>



<?php if ($this->_tpl_vars['ust_ulubione'] == '1'): ?>
<?php if ($this->_tpl_vars['part_del'][$this->_sections['id']['index']] <> ""): ?>
<div class="usun" id="u<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][367]; ?>
" onclick="usun_ul(<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
,'<?php echo $this->_tpl_vars['part_del'][$this->_sections['id']['index']]; ?>
')"></div>
<?php else: ?>

	<?php $this->assign('art_id_a', $this->_tpl_vars['part_id'][$this->_sections['id']['index']]); ?>
	<?php if (in_array ( $this->_tpl_vars['part_id_a'] , $this->_tpl_vars['ar_ul'] )): ?>
		<div class="uusun" id="ud<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][369]; ?>
" ></div>

	<?php else: ?>
		<div class="ulubione" id="u<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][368]; ?>
" onclick="add_ul(<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
)"></div>
		<div class="uusun" id="uu<?php echo $this->_tpl_vars['part_id'][$this->_sections['id']['index']]; ?>
" title="<?php echo $this->_tpl_vars['lang'][369]; ?>
" style="display:none;"></div>
	<?php endif; ?>

<?php endif; ?><?php endif; ?>
<?php if ($this->_tpl_vars['art_bitcoin'][$this->_sections['id']['index']] == '1'): ?><div id="bitcoin_mini1"><img src="../images/bitcoin.png"/></div><?php endif; ?>


</td>
</tr>
</table>

</td>

</table>




</div>
<?php endfor; endif; ?>




</div>
<!--/drugi promowany box -->



























</p>
		</div></div>
<?php endif; ?>


<div class="post">
	<h1 class="title"><?php echo $this->_tpl_vars['lang'][115]; ?>
</h1>
	<div class="entry">
		<p>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/lista.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<?php if ($this->_tpl_vars['podstron'] > 1): ?>
			<br>
			<center>
			<table border="0">
			<tr>
			<td class="str_blok" align="center"><?php if ($this->_tpl_vars['strona'] > 1): ?><a href="s1" title="<?php echo $this->_tpl_vars['lang'][363]; ?>
"><<</a><?php else: ?><<<?php endif; ?></td>
			<td class="str_blok" align="center"><?php if ($this->_tpl_vars['page_m'] >= 1): ?><a href="s<?php echo $this->_tpl_vars['page_m']; ?>
" title="<?php echo $this->_tpl_vars['lang'][364]; ?>
: <?php echo $this->_tpl_vars['page_m']; ?>
"><</a><?php else: ?><<?php endif; ?></td>
			<?php unset($this->_sections['strona']);
$this->_sections['strona']['name'] = 'strona';
$this->_sections['strona']['start'] = (int)$this->_tpl_vars['page_start'];
$this->_sections['strona']['loop'] = is_array($_loop=$this->_tpl_vars['page_end']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['strona']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['strona']['show'] = true;
$this->_sections['strona']['max'] = $this->_sections['strona']['loop'];
if ($this->_sections['strona']['start'] < 0)
    $this->_sections['strona']['start'] = max($this->_sections['strona']['step'] > 0 ? 0 : -1, $this->_sections['strona']['loop'] + $this->_sections['strona']['start']);
else
    $this->_sections['strona']['start'] = min($this->_sections['strona']['start'], $this->_sections['strona']['step'] > 0 ? $this->_sections['strona']['loop'] : $this->_sections['strona']['loop']-1);
if ($this->_sections['strona']['show']) {
    $this->_sections['strona']['total'] = min(ceil(($this->_sections['strona']['step'] > 0 ? $this->_sections['strona']['loop'] - $this->_sections['strona']['start'] : $this->_sections['strona']['start']+1)/abs($this->_sections['strona']['step'])), $this->_sections['strona']['max']);
    if ($this->_sections['strona']['total'] == 0)
        $this->_sections['strona']['show'] = false;
} else
    $this->_sections['strona']['total'] = 0;
if ($this->_sections['strona']['show']):

            for ($this->_sections['strona']['index'] = $this->_sections['strona']['start'], $this->_sections['strona']['iteration'] = 1;
                 $this->_sections['strona']['iteration'] <= $this->_sections['strona']['total'];
                 $this->_sections['strona']['index'] += $this->_sections['strona']['step'], $this->_sections['strona']['iteration']++):
$this->_sections['strona']['rownum'] = $this->_sections['strona']['iteration'];
$this->_sections['strona']['index_prev'] = $this->_sections['strona']['index'] - $this->_sections['strona']['step'];
$this->_sections['strona']['index_next'] = $this->_sections['strona']['index'] + $this->_sections['strona']['step'];
$this->_sections['strona']['first']      = ($this->_sections['strona']['iteration'] == 1);
$this->_sections['strona']['last']       = ($this->_sections['strona']['iteration'] == $this->_sections['strona']['total']);
?>

			<td class="str_blok" align="center"><a href="s<?php echo $this->_sections['strona']['index']+1; ?>
"><?php if ($this->_tpl_vars['strona'] == $this->_sections['strona']['index']+1): ?><b><?php echo $this->_sections['strona']['index']+1; ?>
</b><?php else: ?><?php echo $this->_sections['strona']['index']+1; ?>
<?php endif; ?></a></td>

			<?php endfor; endif; ?>

			<td class="str_blok" align="center"><?php if ($this->_tpl_vars['page_p'] <= $this->_tpl_vars['podstron']): ?><a href="s<?php echo $this->_tpl_vars['page_p']; ?>
"  title="<?php echo $this->_tpl_vars['lang'][364]; ?>
: <?php echo $this->_tpl_vars['page_p']; ?>
">></a><?php else: ?>><?php endif; ?></td>
			<td class="str_blok" align="center"><?php if ($this->_tpl_vars['strona'] != $this->_tpl_vars['podstron']): ?><a href="s<?php echo $this->_tpl_vars['podstron']; ?>
" title="<?php echo $this->_tpl_vars['lang'][365]; ?>
 (<?php echo $this->_tpl_vars['podstron']; ?>
)">>></a><?php else: ?>>><?php endif; ?></td>
			</tr>
			</table>
			</center>
			<?php endif; ?>
		</p>
	</div>
</div>
		
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>