<?php /* Smarty version 2.6.26, created on 2010-12-06 19:19:50
         compiled from home.tpl */ ?>
<div class="clear"></div>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'homebox.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="opening-hours">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'opening.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>
<div class="section-title">
    <img src="/assets/gfx/Home.png" alt="">
</div>
<div class="clear"></div>
<?php $_from = $this->_tpl_vars['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['new']):
?>
	<div class="news-block">
		<div class="news-date">
		    <span class="point">p</span><span class="date"><?php echo $this->_tpl_vars['new']['NwsDate']; ?>
</span>
		</div>
		<div class="news-title">
			<?php echo $this->_tpl_vars['new']['NwsTitle']; ?>

		</div>
		<div class="news-desc">
		    <?php echo $this->_tpl_vars['new']['NwsContent']; ?>

				<div class="clear"></div>
		    <div class="news-by">administrator</div>
		</div>
		<div class="news-footer">
		
		</div>
	</div>
<?php endforeach; endif; unset($_from); ?> 