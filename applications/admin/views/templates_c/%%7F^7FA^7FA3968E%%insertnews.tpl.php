<?php /* Smarty version 2.6.26, created on 2010-11-09 17:40:42
         compiled from news/insertnews.tpl */ ?>
<div class="form-news">
<?php if ($this->_tpl_vars['update']): ?>
	<?php $this->assign('action', '/admin/news/update'); ?>
<?php else: ?>
	<?php $this->assign('action', 'save'); ?>
<?php endif; ?>
<form method="post" action="<?php echo $this->_tpl_vars['action']; ?>
">
	<?php if ($this->_tpl_vars['update']): ?>
		<input type="hidden" name='newsData[NwsId]' value="<?php echo $this->_tpl_vars['newsData']['NwsId']; ?>
">
	<?php endif; ?>
	<div class="form-block">
		<span class="form-label">Nazov:</span>
		<div class="form-input"><input type="text" name='newsData[NwsTitle]' value="<?php echo $this->_tpl_vars['newsData']['NwsTitle']; ?>
"></div>
    </div>
	<div class="form-block">
		<span class="form-label">Obsah:</span>
		<div class="form-textarea"> <textarea name="newsData[NwsContent]"><?php echo $this->_tpl_vars['newsData']['NwsContent']; ?>
</textarea></div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>
</form>