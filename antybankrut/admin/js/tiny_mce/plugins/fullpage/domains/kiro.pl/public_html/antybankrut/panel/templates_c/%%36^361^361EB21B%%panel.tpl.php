<?php /* Smarty version 2.6.28, created on 2017-02-06 22:58:03
         compiled from blu/panel.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/subheader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="post">
    <h1 class="title"><?php echo $this->_tpl_vars['lang'][172]; ?>
</h1>
    <div class="entry">
        <p> <?php if ($this->_tpl_vars['user_id'] != ""): ?>
            <h3 style="color:black;"><?php echo $this->_tpl_vars['lang'][173]; ?>
</h3> <?php if ($this->_tpl_vars['stan'] == 1): ?>
            <div id="ukryj">
                <center><b style="color:red;"><?php echo $this->_tpl_vars['lang'][174]; ?>
</b></center>
            </div><?php endif; ?> <?php if ($this->_tpl_vars['stan'] == 2): ?>
            <div id="ukryj">
                <center><b style="color:lime;"><?php echo $this->_tpl_vars['lang'][175]; ?>
</b></center>
            </div><?php endif; ?>
            <form action="wyk/zmien_haslo.php" method="POST">
                <table>
                    <tr>
                        <td><b><?php echo $this->_tpl_vars['lang'][176]; ?>
:</td>
<td><input type="password" name="sh"></td>
</tr>
<tr>
<td><b><?php echo $this->_tpl_vars['lang'][177]; ?>
:</td>
<td><input type="password" name="nh"></td>
</tr>
</table>
<input type="submit" value="<?php echo $this->_tpl_vars['lang'][178]; ?>
" name="zh">
</form>
<br>
<h3  style="color:black;"><?php echo $this->_tpl_vars['lang'][179]; ?>
</h3>
<?php if ($this->_tpl_vars['stan'] == 7): ?><div id="ukryj"><center><b style="color:red;"><?php echo $this->_tpl_vars['lang'][180]; ?>
</b></center>
    </div><?php endif; ?> <?php if ($this->_tpl_vars['stan'] == 6): ?>
    <div id="ukryj">
        <center><b style="color:red;"><?php echo $this->_tpl_vars['lang'][181]; ?>
</b></center>
    </div><?php endif; ?> <?php if ($this->_tpl_vars['stan'] == 5): ?>
    <div id="ukryj">
        <center><b style="color:lime;"><?php echo $this->_tpl_vars['lang'][182]; ?>
</b></center>
    </div><?php endif; ?>
    <form action="" method="POST" enctype="multipart/form-data" name="upf">
        <table>
            <tr>
                <td></td>
                <td> <?php if ($this->_tpl_vars['img'] != ""): ?> <img src="upload/user/<?php echo $this->_tpl_vars['img']; ?>
">
                    <input type="checkbox" name="del" value="1"> <?php echo $this->_tpl_vars['lang'][183]; ?>
 <?php else: ?> <b><?php echo $this->_tpl_vars['lang'][184]; ?>
</b> <?php endif; ?> </td>
            </tr>
            <tr>
                <td valign="top"><?php echo $this->_tpl_vars['lang'][185]; ?>
:</td>
                <td>
                    <input name="plik1" type="file" class="textbox" />
                    <br><small>(JPEG, GIF, PNG)</small></td>
            </tr>
        </table>
        <input type="submit" value="<?php echo $this->_tpl_vars['lang'][178]; ?>
" name="upf"> </form>
    <br>
    <h3 style="color:black;"><?php echo $this->_tpl_vars['lang'][186]; ?>
</h3> <?php if ($this->_tpl_vars['stan'] == 3): ?>
    <div id="ukryj">
        <center><b style="color:red;"><?php echo $this->_tpl_vars['lang'][187]; ?>
</b></center>
    </div><?php endif; ?> <?php if ($this->_tpl_vars['stan'] == 4): ?>
    <div id="ukryj">
        <center><b style="color:lime;"><?php echo $this->_tpl_vars['lang'][188]; ?>
</b></center>
    </div><?php endif; ?>
    <form action="wyk/zmien_dane.php" method="POST">
        <table>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][189]; ?>
:</b></td>
                <td>
                    <input type="text" name="email" value="<?php echo $this->_tpl_vars['email']; ?>
">
                </td>
            </tr>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][190]; ?>
:</b></td>
                <td>
                    <input type="radio" name="ue" value="0" <?php if ($this->_tpl_vars['ue'] == 0): ?> checked<?php endif; ?>><?php echo $this->_tpl_vars['lang'][191]; ?>

                    <input type="radio" name="ue" value="1" <?php if ($this->_tpl_vars['ue'] == 1): ?> checked<?php endif; ?>><?php echo $this->_tpl_vars['lang'][192]; ?>
</td>
            </tr>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][193]; ?>
:</b></td>
                <td>
                    <select name="plec">
                        <option value="">Wybierz</option>
                        <option value="1" <?php if ($this->_tpl_vars['plec'] == 1): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['lang'][194]; ?>
</option>
                        <option value="2" <?php if ($this->_tpl_vars['plec'] == 2): ?> selected="selected" <?php endif; ?>><?php echo $this->_tpl_vars['lang'][195]; ?>
</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][196]; ?>
:</b></td>
                <td>
                    <select name="d">
                        <option value="">DD</option> <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=32) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
                        <option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_sections['foo']['index'] == $this->_tpl_vars['d']): ?> selected="selected" <?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option> <?php endfor; endif; ?> </select>
                    <select name="m">
                        <option value="">MM</option> <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['start'] = (int)1;
$this->_sections['foo']['loop'] = is_array($_loop=13) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['step'] = ((int)1) == 0 ? 1 : (int)1;
$this->_sections['foo']['show'] = true;
$this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
if ($this->_sections['foo']['start'] < 0)
    $this->_sections['foo']['start'] = max($this->_sections['foo']['step'] > 0 ? 0 : -1, $this->_sections['foo']['loop'] + $this->_sections['foo']['start']);
else
    $this->_sections['foo']['start'] = min($this->_sections['foo']['start'], $this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] : $this->_sections['foo']['loop']-1);
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
                        <option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_sections['foo']['index'] == $this->_tpl_vars['m']): ?> selected="selected" <?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option> <?php endfor; endif; ?> </select>
                    <select name="y">
                        <option value="">YYYY</option> <?php unset($this->_sections['foo']);
$this->_sections['foo']['name'] = 'foo';
$this->_sections['foo']['loop'] = is_array($_loop=2010) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['foo']['max'] = (int)109;
$this->_sections['foo']['step'] = ((int)-1) == 0 ? 1 : (int)-1;
$this->_sections['foo']['show'] = true;
if ($this->_sections['foo']['max'] < 0)
    $this->_sections['foo']['max'] = $this->_sections['foo']['loop'];
$this->_sections['foo']['start'] = $this->_sections['foo']['step'] > 0 ? 0 : $this->_sections['foo']['loop']-1;
if ($this->_sections['foo']['show']) {
    $this->_sections['foo']['total'] = min(ceil(($this->_sections['foo']['step'] > 0 ? $this->_sections['foo']['loop'] - $this->_sections['foo']['start'] : $this->_sections['foo']['start']+1)/abs($this->_sections['foo']['step'])), $this->_sections['foo']['max']);
    if ($this->_sections['foo']['total'] == 0)
        $this->_sections['foo']['show'] = false;
} else
    $this->_sections['foo']['total'] = 0;
if ($this->_sections['foo']['show']):

            for ($this->_sections['foo']['index'] = $this->_sections['foo']['start'], $this->_sections['foo']['iteration'] = 1;
                 $this->_sections['foo']['iteration'] <= $this->_sections['foo']['total'];
                 $this->_sections['foo']['index'] += $this->_sections['foo']['step'], $this->_sections['foo']['iteration']++):
$this->_sections['foo']['rownum'] = $this->_sections['foo']['iteration'];
$this->_sections['foo']['index_prev'] = $this->_sections['foo']['index'] - $this->_sections['foo']['step'];
$this->_sections['foo']['index_next'] = $this->_sections['foo']['index'] + $this->_sections['foo']['step'];
$this->_sections['foo']['first']      = ($this->_sections['foo']['iteration'] == 1);
$this->_sections['foo']['last']       = ($this->_sections['foo']['iteration'] == $this->_sections['foo']['total']);
?>
                        <option value="<?php echo $this->_sections['foo']['index']; ?>
" <?php if ($this->_sections['foo']['index'] == $this->_tpl_vars['y']): ?> selected="selected" <?php endif; ?>><?php echo $this->_sections['foo']['index']; ?>
</option> <?php endfor; endif; ?> </select>
                </td>
            </tr>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][197]; ?>
:</b></td>
                <td>
                    <input type="text" name="gg" value="<?php echo $this->_tpl_vars['gg']; ?>
">
                </td>
            </tr>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][198]; ?>
:</b></td>
                <td>
                    <input type="text" name="www" value="<?php echo $this->_tpl_vars['www']; ?>
">
                </td>
            </tr>
            <tr>
                <td><b><?php echo $this->_tpl_vars['lang'][199]; ?>
:</b></td>
                <td>
                    <textarea name="omnie" style="width:300px;height:100px;"><?php echo $this->_tpl_vars['omnie']; ?>
</textarea>
                </td>
            </tr>
        </table>
        <input type="submit" value="<?php echo $this->_tpl_vars['lang'][178]; ?>
" name="zd"> </form> <?php else: ?>
    <center><b style="color:red;"><?php echo $this->_tpl_vars['lang'][200]; ?>
</b></center> <?php endif; ?> </p>
</div>
</div> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/right.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['templa'])."/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>