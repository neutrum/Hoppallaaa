<?php /* Smarty version 2.6.26, created on 2010-10-27 11:21:08
         compiled from example.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'example.tpl', 6, false),array('modifier', 'date_format', 'example.tpl', 16, false),array('modifier', 'upper', 'example.tpl', 26, false),array('function', 'ci_config', 'example.tpl', 13, false),array('function', 'html_select_date', 'example.tpl', 67, false),array('function', 'html_select_time', 'example.tpl', 73, false),array('function', 'ci_language', 'example.tpl', 79, false),array('function', 'ci_form_validation', 'example.tpl', 83, false),array('function', 'html_options', 'example.tpl', 105, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array('title' => 'Example Smarty Page','name' => ($this->_tpl_vars['Name']))));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<h1>
<?php if ($this->_tpl_vars['bold']): ?><b><?php endif; ?>
Title: <?php echo ((is_array($_tmp=$this->_tpl_vars['title'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

<?php if ($this->_tpl_vars['bold']): ?></b><?php endif; ?>
</h1>

<?php if ($this->_tpl_vars['error'] != ''): ?><p class="error"><?php echo $this->_tpl_vars['error']; ?>
</p><?php endif; ?>
<?php if ($this->_tpl_vars['message'] != ''): ?><p class="message"><?php echo $this->_tpl_vars['message']; ?>
</p><?php endif; ?>

<?php echo smarty_function_ci_config(array('name' => 'base_url'), $this);?>

<p>The configuration value of base_url is <em><?php echo $this->_tpl_vars['base_url']; ?>
</em></p>

<p>The current date and time is <em><?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %H:%M:%S") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %H:%M:%S")); ?>
</em></p>

<p>The value of global assigned variable $SCRIPT_NAME is <em><?php echo $this->_tpl_vars['SCRIPT_NAME']; ?>
</em></p>

<p>The value of server environment variable SERVER_NAME is <em><?php echo $_SERVER['SERVER_NAME']; ?>
</em></p>

<p>The value of your IP address is: <em><?php echo $this->_tpl_vars['ip_address']; ?>
</em></p>

<p>The value of {$Name} is <em><?php echo $this->_tpl_vars['Name']; ?>
</em></p>

<p>The value of {$Name|upper} is <em><?php echo ((is_array($_tmp=$this->_tpl_vars['Name'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</em></p>

<h2>An example of a section loop:</h2>
<ul>
<?php unset($this->_sections['outer']);
$this->_sections['outer']['name'] = 'outer';
$this->_sections['outer']['loop'] = is_array($_loop=$this->_tpl_vars['FirstName']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['outer']['show'] = true;
$this->_sections['outer']['max'] = $this->_sections['outer']['loop'];
$this->_sections['outer']['step'] = 1;
$this->_sections['outer']['start'] = $this->_sections['outer']['step'] > 0 ? 0 : $this->_sections['outer']['loop']-1;
if ($this->_sections['outer']['show']) {
    $this->_sections['outer']['total'] = $this->_sections['outer']['loop'];
    if ($this->_sections['outer']['total'] == 0)
        $this->_sections['outer']['show'] = false;
} else
    $this->_sections['outer']['total'] = 0;
if ($this->_sections['outer']['show']):

            for ($this->_sections['outer']['index'] = $this->_sections['outer']['start'], $this->_sections['outer']['iteration'] = 1;
                 $this->_sections['outer']['iteration'] <= $this->_sections['outer']['total'];
                 $this->_sections['outer']['index'] += $this->_sections['outer']['step'], $this->_sections['outer']['iteration']++):
$this->_sections['outer']['rownum'] = $this->_sections['outer']['iteration'];
$this->_sections['outer']['index_prev'] = $this->_sections['outer']['index'] - $this->_sections['outer']['step'];
$this->_sections['outer']['index_next'] = $this->_sections['outer']['index'] + $this->_sections['outer']['step'];
$this->_sections['outer']['first']      = ($this->_sections['outer']['iteration'] == 1);
$this->_sections['outer']['last']       = ($this->_sections['outer']['iteration'] == $this->_sections['outer']['total']);
?>
<?php if ((1 & ($this->_sections['outer']['index'] / 2))): ?>
	<li><?php echo $this->_sections['outer']['rownum']; ?>
 . <?php echo $this->_tpl_vars['FirstName'][$this->_sections['outer']['index']]; ?>
 <?php echo $this->_tpl_vars['LastName'][$this->_sections['outer']['index']]; ?>
</li>
<?php else: ?>
	<li><?php echo $this->_sections['outer']['rownum']; ?>
 * <?php echo $this->_tpl_vars['FirstName'][$this->_sections['outer']['index']]; ?>
 <?php echo $this->_tpl_vars['LastName'][$this->_sections['outer']['index']]; ?>
</li>
<?php endif; ?>
<?php endfor; else: ?>
	<li>none</li>
<?php endif; ?>
</ul>

<h2>An example of section looped key values:</h2>
<?php unset($this->_sections['sec1']);
$this->_sections['sec1']['name'] = 'sec1';
$this->_sections['sec1']['loop'] = is_array($_loop=$this->_tpl_vars['contacts']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['sec1']['show'] = true;
$this->_sections['sec1']['max'] = $this->_sections['sec1']['loop'];
$this->_sections['sec1']['step'] = 1;
$this->_sections['sec1']['start'] = $this->_sections['sec1']['step'] > 0 ? 0 : $this->_sections['sec1']['loop']-1;
if ($this->_sections['sec1']['show']) {
    $this->_sections['sec1']['total'] = $this->_sections['sec1']['loop'];
    if ($this->_sections['sec1']['total'] == 0)
        $this->_sections['sec1']['show'] = false;
} else
    $this->_sections['sec1']['total'] = 0;
if ($this->_sections['sec1']['show']):

            for ($this->_sections['sec1']['index'] = $this->_sections['sec1']['start'], $this->_sections['sec1']['iteration'] = 1;
                 $this->_sections['sec1']['iteration'] <= $this->_sections['sec1']['total'];
                 $this->_sections['sec1']['index'] += $this->_sections['sec1']['step'], $this->_sections['sec1']['iteration']++):
$this->_sections['sec1']['rownum'] = $this->_sections['sec1']['iteration'];
$this->_sections['sec1']['index_prev'] = $this->_sections['sec1']['index'] - $this->_sections['sec1']['step'];
$this->_sections['sec1']['index_next'] = $this->_sections['sec1']['index'] + $this->_sections['sec1']['step'];
$this->_sections['sec1']['first']      = ($this->_sections['sec1']['iteration'] == 1);
$this->_sections['sec1']['last']       = ($this->_sections['sec1']['iteration'] == $this->_sections['sec1']['total']);
?></li>
<ul>
	<li>phone: <?php echo $this->_tpl_vars['contacts'][$this->_sections['sec1']['index']]['phone']; ?>
</li>
	<li>fax: <?php echo $this->_tpl_vars['contacts'][$this->_sections['sec1']['index']]['fax']; ?>
</li>
	<li>cell: <?php echo $this->_tpl_vars['contacts'][$this->_sections['sec1']['index']]['cell']; ?>
</li>
</ul>
<?php endfor; endif; ?>

<h2>An example testing strip tags:</h2>
<?php echo '<table border=0><tr><td><a HREF="'; ?><?php echo $this->_tpl_vars['SCRIPT_NAME']; ?><?php echo '"><font color="red">This is a  test     </font></a></td></tr></table>'; ?>



<h2>An example of the html_select_date function:</h2>

<form>
<?php echo smarty_function_html_select_date(array('start_year' => 1998,'end_year' => 2010), $this);?>

</form>

<h2>An example of the html_select_time function:</h2>

<form>
<?php echo smarty_function_html_select_time(array('use_24_hours' => false), $this);?>

</form>

<h2>An example using form_validation:</h2>

<?php echo smarty_function_ci_language(array('file' => 'label','lang' => ($this->_tpl_vars['lang'])), $this);?>

<form action="#" method="post">
<fieldset>
	<label for="username"><?php echo smarty_function_ci_language(array('line' => 'username'), $this);?>
:</label>
	<input type="text" name="username" id="username" value="<?php echo smarty_function_ci_form_validation(array('field' => 'username'), $this);?>
" /><br />
	<?php echo smarty_function_ci_form_validation(array('field' => 'username','error' => 'true'), $this);?>


	<label for="password"><?php echo smarty_function_ci_language(array('line' => 'password'), $this);?>
:</label>
	<input type="password" name="password" id="password" value="" /><br />
	<?php echo smarty_function_ci_form_validation(array('field' => 'password','error' => 'true'), $this);?>


	<label for="passconf"><?php echo smarty_function_ci_language(array('line' => 'passconf'), $this);?>
:</label>
	<input type="password" name="passconf" id="passconf" value="" /><br />
	<?php echo smarty_function_ci_form_validation(array('field' => 'passconf','error' => 'true'), $this);?>


	<label for="email"><?php echo smarty_function_ci_language(array('line' => 'email'), $this);?>
:</label>
	<input type="text" name="email" id="email" value="<?php echo smarty_function_ci_form_validation(array('field' => 'email'), $this);?>
" /><br />
	<?php echo smarty_function_ci_form_validation(array('field' => 'email','error' => 'true'), $this);?>


	<?php echo smarty_function_ci_form_validation(array('field' => 'state','assign' => 'selected_state'), $this);?>

	<label for="state"><?php echo smarty_function_ci_language(array('line' => 'state'), $this);?>
:</label>
	<select name='state'>
	<?php echo smarty_function_html_options(array('values' => ($this->_tpl_vars['state_values']),'output' => ($this->_tpl_vars['state_output']),'selected' => ($this->_tpl_vars['selected_state'])), $this);?>

	</select><br />
	<?php echo smarty_function_ci_form_validation(array('field' => 'states','error' => 'true'), $this);?>


	<input type="submit" name="action" value="submit" />
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>