<?php /* Smarty version 2.6.26, created on 2010-11-09 18:31:10
         compiled from gallery/insertgallery.tpl */ ?>

<?php if ($this->_tpl_vars['update']): ?>
	<?php $this->assign('action', '/admin/gallery/update'); ?>
<?php else: ?>
	<?php $this->assign('action', 'save'); ?>
<?php endif; ?>
<form method="post" action="<?php echo $this->_tpl_vars['action']; ?>
">
	<?php if ($this->_tpl_vars['update']): ?>
		<input type="hidden" name='galleryData[GalID]' value="<?php echo $this->_tpl_vars['galleryData']['GalID']; ?>
">
	<?php endif; ?>
	<div class="form-block">
		<div class="form-label">Nazov:</div>
		<div class="form-input"><input type="text" name='galleryData[GalTitle]' value="<?php echo $this->_tpl_vars['galleryData']['GalTitle']; ?>
"></div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>