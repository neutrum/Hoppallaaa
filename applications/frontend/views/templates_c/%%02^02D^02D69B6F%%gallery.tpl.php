<?php /* Smarty version 2.6.26, created on 2010-11-23 13:41:26
         compiled from gallery.tpl */ ?>
<script>
<?php echo '
	
'; ?>

</script>
<div class="section-title">
    <img src="/assets/gfx/Galerie.png" alt="">
</div>
<div class="clear"></div>
<?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallery']):
?>
	<div class="gallery-block">
		   <div class="gallery-frontphoto">
		   		<a href="/gallery/show/<?php echo $this->_tpl_vars['gallery']['GalID']; ?>
"><img src="/media/gallery/<?php echo $this->_tpl_vars['gallery']['GalDir']; ?>
/fesc_<?php echo $this->_tpl_vars['gallery']['PhoFile']; ?>
"></a>
		   </div>
		   
		   <div class="gallery-data">
		   		<div class="gallery-title"><a href="/gallery/show/<?php echo $this->_tpl_vars['gallery']['GalID']; ?>
"><?php echo $this->_tpl_vars['gallery']['GalTitle']; ?>
</a></div>
		   		<div class="gallery-date"><?php echo $this->_tpl_vars['gallery']['GalPosted']; ?>
</div>
		   </div>
		   <div class="gallery-data-bottom">
		        <div class="gallery-views">Viewed: <?php echo $this->_tpl_vars['gallery']['GalViews']; ?>
</div>
		   </div>
	</div>
	<div class="clear"></div>
<?php endforeach; endif; unset($_from); ?>