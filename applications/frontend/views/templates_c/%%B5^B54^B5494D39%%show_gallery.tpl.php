<?php /* Smarty version 2.6.26, created on 2010-11-23 00:58:28
         compiled from gallery/show_gallery.tpl */ ?>
<script type="text/javascript">
<?php echo '
    $(document).ready(function() {
        $(\'#gallery a\').lightBox({
                imageLoading: \'/assets/gfx/lightbox/lightbox_loading.gif\',
	            imageBtnClose: \'/assets/gfx/lightbox/lightbox_close.gif\',
	            imageBtnPrev: \'/assets/gfx/lightbox/lightbox_prev.gif\',
	            imageBtnNext: \'/assets/gfx/lightbox/lightbox_next.gif\'
        });
    });
'; ?>

</script>
<div class="ingallery-date">
    <span class="point">p</span><span class="date"><?php echo $this->_tpl_vars['gallery_data']['GalPosted']; ?>
</span>
</div>
<div class="ingallery-title">
    <?php echo $this->_tpl_vars['gallery_data']['GalTitle']; ?>

</div>
<div id="gallery">
	<?php $_from = $this->_tpl_vars['gallery_data']['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
		<a href="/media/gallery/<?php echo $this->_tpl_vars['gallery_data']['GalDir']; ?>
/<?php echo $this->_tpl_vars['photo']['PhoFile']; ?>
">
		    <img src="/media/gallery/<?php echo $this->_tpl_vars['gallery_data']['GalDir']; ?>
/sc_<?php echo $this->_tpl_vars['photo']['PhoFile']; ?>
">
	    </a>
	<?php endforeach; endif; unset($_from); ?>
</div>