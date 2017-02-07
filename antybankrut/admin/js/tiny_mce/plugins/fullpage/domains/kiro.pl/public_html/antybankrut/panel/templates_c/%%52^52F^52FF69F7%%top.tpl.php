<?php /* Smarty version 2.6.28, created on 2017-02-06 22:48:35
         compiled from blu/top.tpl */ ?>
<div class="container">
<div class="site_head">

	<div class="site_head_logo">
	
		<div class="site_head_logo_left">
		<a href="" class="site_head_logo_a"><?php echo $this->_tpl_vars['title']; ?>
</a>
		
			<div class="menu_n" id="menu_n"></div>
		</div>
		<div class="site_head_logo_right">
<?php if ($this->_tpl_vars['user_id'] != ""): ?>
<div style="width:450px;float:left;margin:0px;padding:0px;">
<b>
Witaj: <a href="user/<?php echo $this->_tpl_vars['user_nickn']; ?>
/<?php echo $this->_tpl_vars['user_id']; ?>
"><?php echo $this->_tpl_vars['user_nick']; ?>
</a> |
<a href="user/panel/"><?php echo $this->_tpl_vars['lang'][147]; ?>
</a> | 
<a href="pw/"><?php if ($this->_tpl_vars['newpw'] >= 1): ?><span style="color:red;"><?php echo $this->_tpl_vars['lang'][150]; ?>
 (<?php echo $this->_tpl_vars['newpw']; ?>
)</span><?php else: ?><?php echo $this->_tpl_vars['lang'][150]; ?>
<?php endif; ?></a> | 
<a href="user/panel/ogloszenie/"><?php echo $this->_tpl_vars['lang'][149]; ?>
</a> | 


<a href="<?php echo $this->_tpl_vars['site_url']; ?>
logout.php"><?php echo $this->_tpl_vars['lang'][152]; ?>
</a>
</b>
</div>
<?php else: ?>
<div style="width:480px;text-align:right;float:right;">
<form action="" method="POST" >
<table width="420">
<tr>

<td valign="top"><input type="text" class="inputt" name="login" placeholder="<?php echo $this->_tpl_vars['lang'][154]; ?>
" style="width:160px;" ></td>

<td valign="top"><input type="password" class="inputt" name="haslo" placeholder="<?php echo $this->_tpl_vars['lang'][155]; ?>
" style="width:160px;"  ></td>
<td valign="center"><input type="submit" value="<?php echo $this->_tpl_vars['lang'][156]; ?>
" style="" name="login_user"></td>
</tr>
</table>
</form>
</div>
<div style="width:405px;clear:both;float:right;margin-right:70px;">
<?php if ($this->_tpl_vars['fb_login'] == '1'): ?>
<div style="float:left;">
	<a href="fbc.php?login=fb"><img src="<?php echo $this->_tpl_vars['lang'][425]; ?>
"></a>
</div>
<?php endif; ?>
<div style="float:right;padding-top:5px;">
<a href="register/"><?php echo $this->_tpl_vars['lang'][157]; ?>
</a> |
<a href="zapomniane-haslo/"><?php echo $this->_tpl_vars['lang'][158]; ?>
</a>
</div></div>

<?php endif; ?>
		</div>
		</div>
</div>

</div>
<div style="width:405px;clear:both;float:right;margin-right:70px;">
</div>
		</div>
	</div>
</div>
<div class="site_menu">
	<div class="site_head_m">
	<div class="site_head_menu">
		<ul class="top_menu">
          	<li class="first_li"><a href="<?php echo $this->_tpl_vars['site_url']; ?>
" ><?php echo $this->_tpl_vars['lang'][5]; ?>
</a> </li>
			<li class="next_li mob_on"><a href="user/menu/"><?php if ($this->_tpl_vars['user_id'] >= 1): ?><?php echo $this->_tpl_vars['lang'][331]; ?>
<?php else: ?><?php echo $this->_tpl_vars['lang'][332]; ?>
<?php endif; ?></a></li>
			<li class="next_li"><a href="news/" ><?php echo $this->_tpl_vars['lang'][6]; ?>
</a> </li>
			<li  class="next_li"><a href="regulamin/" ><?php echo $this->_tpl_vars['lang'][8]; ?>
</a></li>
			<li  class="next_li"><a href="kontakt/" ><?php echo $this->_tpl_vars['lang'][9]; ?>
</a></li>
			<li  class="next_li"><a href="reklama/" ><?php echo $this->_tpl_vars['lang'][426]; ?>
</a></li>
			<li  class="next_li"><a href="katalog/" >Katalog firm</a></li>
		</ul>
			<div style="text-align:right;">
			<a href="dodaj/"><div class="dodaj">	<?php echo $this->_tpl_vars['lang'][10]; ?>
</div></a>
		</div>
	</div>

	
	</div>
</div>
  <div> <?php if ($this->_tpl_vars['reklama_j'] <> ""): ?><?php echo $this->_tpl_vars['reklama_j']; ?>
<br><?php endif; ?></div>
 <?php if ($this->_tpl_vars['s_on'] == '1'): ?>
<div class="site_search">
<center>
<form action="do-s.php" method="POST" name="dos">
<div class="szukb">
<table>
<tr>
<td bgcolor="">
<input type="text" name="q" value="<?php if ($this->_tpl_vars['sz_q'] <> '0'): ?><?php echo $this->_tpl_vars['sz_q']; ?>
<?php endif; ?>" placeholder="<?php echo $this->_tpl_vars['lang'][423]; ?>
" class="input" style="width:260px;">
</td>
<td align="left">
<?php echo $this->_tpl_vars['lang'][304]; ?>
:
<?php echo $this->_tpl_vars['lang'][305]; ?>
 <input type="text" name="od"  value="<?php if ($this->_tpl_vars['sz_od'] > 0): ?><?php echo $this->_tpl_vars['sz_od']; ?>
<?php endif; ?>" style="width:50px;" class="input">  <?php echo $this->_tpl_vars['lang'][306]; ?>
 <input type="text" value="<?php if ($this->_tpl_vars['sz_do'] > 0): ?><?php echo $this->_tpl_vars['sz_do']; ?>
<?php endif; ?>" name="do" style="width:50px;" class="input"> 
</td>
<td  align="left">
<select name="cat" style="width:150px" class="input">
<option value="0" <?php if ($this->_tpl_vars['sz_cat'] == '0'): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['lang'][307]; ?>
</option>
<?php unset($this->_sections['id']);
$this->_sections['id']['name'] = 'id';
$this->_sections['id']['loop'] = is_array($_loop=$this->_tpl_vars['fcatidq']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

<?php if ($this->_tpl_vars['fcatpodq'][$this->_sections['id']['index']] == '0'): ?><option value="<?php echo $this->_tpl_vars['fcatidq'][$this->_sections['id']['index']]; ?>
" <?php if ($this->_tpl_vars['fcatidq'][$this->_sections['id']['index']] == $this->_tpl_vars['sz_cat']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['fcatnazwaq'][$this->_sections['id']['index']]; ?>
</option><?php endif; ?>

<?php unset($this->_sections['pid']);
$this->_sections['pid']['name'] = 'pid';
$this->_sections['pid']['loop'] = is_array($_loop=$this->_tpl_vars['fcatidq']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pid']['show'] = true;
$this->_sections['pid']['max'] = $this->_sections['pid']['loop'];
$this->_sections['pid']['step'] = 1;
$this->_sections['pid']['start'] = $this->_sections['pid']['step'] > 0 ? 0 : $this->_sections['pid']['loop']-1;
if ($this->_sections['pid']['show']) {
    $this->_sections['pid']['total'] = $this->_sections['pid']['loop'];
    if ($this->_sections['pid']['total'] == 0)
        $this->_sections['pid']['show'] = false;
} else
    $this->_sections['pid']['total'] = 0;
if ($this->_sections['pid']['show']):

            for ($this->_sections['pid']['index'] = $this->_sections['pid']['start'], $this->_sections['pid']['iteration'] = 1;
                 $this->_sections['pid']['iteration'] <= $this->_sections['pid']['total'];
                 $this->_sections['pid']['index'] += $this->_sections['pid']['step'], $this->_sections['pid']['iteration']++):
$this->_sections['pid']['rownum'] = $this->_sections['pid']['iteration'];
$this->_sections['pid']['index_prev'] = $this->_sections['pid']['index'] - $this->_sections['pid']['step'];
$this->_sections['pid']['index_next'] = $this->_sections['pid']['index'] + $this->_sections['pid']['step'];
$this->_sections['pid']['first']      = ($this->_sections['pid']['iteration'] == 1);
$this->_sections['pid']['last']       = ($this->_sections['pid']['iteration'] == $this->_sections['pid']['total']);
?>

<?php if ($this->_tpl_vars['fcatidq'][$this->_sections['id']['index']] == $this->_tpl_vars['fcatpodq'][$this->_sections['pid']['index']]): ?><option value="<?php echo $this->_tpl_vars['fcatidq'][$this->_sections['pid']['index']]; ?>
" style="padding-left:10px;font-weight:none;" <?php if ($this->_tpl_vars['fcatidq'][$this->_sections['pid']['index']] == $this->_tpl_vars['sz_cat']): ?>selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['fcatnazwaq'][$this->_sections['pid']['index']]; ?>
</option><?php endif; ?>

<?php endfor; endif; ?>

<?php endfor; endif; ?>
</select>

</td>
<td style="padding:6px 0 0 0;">
<input type="submit" value="<?php echo $this->_tpl_vars['lang'][424]; ?>
" class="szuk_but" style="width:120px;margin-left:15px;">
</td>
</tr>
</table>
</div>



</form>
</center>
</div>
<?php endif; ?>


<div class="site_body">




        


		