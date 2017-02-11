<?php /* Smarty version 2.6.28, created on 2017-02-06 23:15:31
         compiled from blu/kontakt.tpl */ ?>
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
<div class="post">
			<h1 class="title"><?php echo $this->_tpl_vars['lang'][127]; ?>
</h1><div class="entry">
		<p>

<?php echo $this->_tpl_vars['kontaktt']; ?>


<?php if ($this->_tpl_vars['fk'] == 1): ?>
<center>

<?php echo $this->_tpl_vars['lang'][128]; ?>
 <br /><br/>

<?php if ($this->_tpl_vars['send'] == 'ok'): ?>
<div id="ukryj" style="color:green"><b><?php echo $this->_tpl_vars['lang'][129]; ?>
</b></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['send'] == 'error'): ?>
<div id="ukryj" style="color:red"><b><?php echo $this->_tpl_vars['lang'][130]; ?>
</b></div><br>
<?php endif; ?>

<?php if ($this->_tpl_vars['error1'] == 'pemail'): ?>
<div style="color:red"><b><?php echo $this->_tpl_vars['lang'][131]; ?>
</b></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['error2'] == 'ppemail'): ?>
<div  style="color:red"><b><?php echo $this->_tpl_vars['lang'][132]; ?>
</b></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['error3'] == 'pt'): ?>
<div  style="color:red"><b><?php echo $this->_tpl_vars['lang'][133]; ?>
</b></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['error4'] == 'pw'): ?>
<div  style="color:red"><b><?php echo $this->_tpl_vars['lang'][134]; ?>
</b></div>
<?php endif; ?>

<?php if ($this->_tpl_vars['error5'] == 'pk'): ?>
<div  style="color:red"><b><?php echo $this->_tpl_vars['lang'][135]; ?>
</b></div>
<?php endif; ?>


	<form action="" method="post" name="submit">
		<table width="300" border="0">
			<tr>
			<td width="30%" valign="top"><b><?php echo $this->_tpl_vars['lang'][136]; ?>
:</b></td></tr><tr>
			<td><input type="text"  value="<?php echo $this->_tpl_vars['eemail']; ?>
" name="email" style="width: 390px;" /><br />	
			

			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b><?php echo $this->_tpl_vars['lang'][137]; ?>
:</b></td></tr><tr>
			<td><select name="subject">
<option><?php echo $this->_tpl_vars['lang'][138]; ?>
</option>
<option><?php echo $this->_tpl_vars['lang'][139]; ?>
</option>
<option><?php echo $this->_tpl_vars['lang'][140]; ?>
</option>
<option><?php echo $this->_tpl_vars['lang'][141]; ?>
</option>
<option><?php echo $this->_tpl_vars['lang'][142]; ?>
</option>
</select><br />


			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b><?php echo $this->_tpl_vars['lang'][143]; ?>
:</b></td></tr><tr>
			<td><textarea name="text" style="width: 390px; height: 140px;"><?php echo $this->_tpl_vars['wemail']; ?>
</textarea><br />

			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b><?php echo $this->_tpl_vars['lang'][144]; ?>
:</b></td></tr><tr>
			<td><img src="include/kod.php"><br />	
			

			</td>
			</tr>
			<tr>
			<td width="30%" valign="top"><b><?php echo $this->_tpl_vars['lang'][145]; ?>
:</b></td></tr><tr>
			<td><input type="text" name="kod" style="width: 50px;" /><br />	
			

			</td>
			</tr>



		</table>
			<input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang'][146]; ?>
" class="button"/>
	</form>
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