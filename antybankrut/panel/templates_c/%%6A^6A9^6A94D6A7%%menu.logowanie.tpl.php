<?php /* Smarty version 2.6.28, created on 2017-02-05 11:22:42
         compiled from blu/menu.logowanie.tpl */ ?>
<?php if ($this->_tpl_vars['user_id'] != ""): ?>
<center>
<b>
<?php echo $this->_tpl_vars['lang'][337]; ?>
: <?php echo $this->_tpl_vars['user_nick']; ?>
<br><br>
<a href="user/panel/"><?php echo $this->_tpl_vars['lang'][147]; ?>
</a><br>
<a href="dodaj/"><?php echo $this->_tpl_vars['lang'][148]; ?>
</a><br>
<a href="user/panel/ogloszenie/"><?php echo $this->_tpl_vars['lang'][149]; ?>
</a><br>
<a href="pw/"><?php if ($this->_tpl_vars['newpw'] >= 1): ?><span style="color:red;"><?php echo $this->_tpl_vars['lang'][150]; ?>
 (<?php echo $this->_tpl_vars['newpw']; ?>
)</span><?php else: ?><?php echo $this->_tpl_vars['lang'][150]; ?>
<?php endif; ?></a><br>
<a href="user/<?php echo $this->_tpl_vars['user_nickn']; ?>
/<?php echo $this->_tpl_vars['user_id']; ?>
"><?php echo $this->_tpl_vars['lang'][151]; ?>
</a><br><br>
<?php if ($this->_tpl_vars['user_adm'] == 'adm'): ?>
<a href="admin/"><?php echo $this->_tpl_vars['lang'][336]; ?>
</a><br><br>
<?php endif; ?>
<a href="logout.php"><?php echo $this->_tpl_vars['lang'][152]; ?>
</a><br/><br/>
</b>
</center>
<?php else: ?>
<?php if ($this->_tpl_vars['user_adm'] == 'error'): ?><center><span id="ukryj" style="color:red;"><?php echo $this->_tpl_vars['lang'][153]; ?>
</span></center><?php endif; ?>
<form action="" method="POST">
<table>
<tr>
<td><b>&nbsp;<?php echo $this->_tpl_vars['lang'][154]; ?>
:</b></td></tr><tr>
<td><input type="text" name="login" style="width:130px;"></td>
</tr>
<tr>
<td><b>&nbsp;<?php echo $this->_tpl_vars['lang'][155]; ?>
:</b></td></tr><tr>
<td><input type="password" name="haslo"   style="width:130px;"></td>
</tr>
</table>
&nbsp;<input type="submit" value="<?php echo $this->_tpl_vars['lang'][156]; ?>
" name="login_user">
</form>
<?php if ($this->_tpl_vars['fb_login'] == '1'): ?><br><br>
<div style="text-align:center;">
	<a href="fbc.php?login=fb"><img src="<?php echo $this->_tpl_vars['lang'][425]; ?>
"></a>
</div><br><br>
<?php endif; ?>
&nbsp;<a href="register/"><?php echo $this->_tpl_vars['lang'][157]; ?>
</a><br>
&nbsp;<a href="zapomniane-haslo/"><?php echo $this->_tpl_vars['lang'][158]; ?>
</a><br/><br/>
<?php endif; ?>