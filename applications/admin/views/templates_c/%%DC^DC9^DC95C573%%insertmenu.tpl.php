<?php /* Smarty version 2.6.26, created on 2010-11-09 18:33:31
         compiled from menu/insertmenu.tpl */ ?>

<?php if ($this->_tpl_vars['update']): ?>
	<?php $this->assign('action', '/admin/menu/update'); ?>
<?php else: ?>
	<?php $this->assign('action', 'save'); ?>
<?php endif; ?>
<form method="post" action="<?php echo $this->_tpl_vars['action']; ?>
">
	<?php if ($this->_tpl_vars['update']): ?>
		<input type="hidden" name='catData[MenId]' value="<?php echo $this->_tpl_vars['catData']['MenId']; ?>
">
	<?php endif; ?>
	<div class="form-block">
			<div class="form-label">Nazov kategorie:</div>
	</div>
	<div class="form-block"> 
			<div class="form-input"><input type="text" name='catData[MenTitle]' value="<?php echo $this->_tpl_vars['catData']['MenTitle']; ?>
"></div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>