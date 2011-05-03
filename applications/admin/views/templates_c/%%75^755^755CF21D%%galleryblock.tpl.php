<?php /* Smarty version 2.6.26, created on 2010-11-09 18:11:40
         compiled from gallery/galleryblock.tpl */ ?>

<tr>
	<td class="front-photo">
		<?php if ($this->_tpl_vars['gallery']['PhoFile']): ?>
			<a target="_blank" href="/media/gallery/<?php echo $this->_tpl_vars['gallery']['GalDir']; ?>
/<?php echo $this->_tpl_vars['gallery']['PhoFile']; ?>
"><img src="/media/gallery/<?php echo $this->_tpl_vars['gallery']['GalDir']; ?>
/sc_<?php echo $this->_tpl_vars['gallery']['PhoFile']; ?>
"></a>
		<?php else: ?>
			no<BR>picture
		<?php endif; ?>
	</td>
	<td class="news_title">              
		    <a href="gallery/edit/<?php echo $this->_tpl_vars['gallery']['GalID']; ?>
"><?php echo $this->_tpl_vars['gallery']['GalTitle']; ?>
</a>
	</td>
	<td class="news_tools">
			<a href="gallery/upload/<?php echo $this->_tpl_vars['gallery']['GalID']; ?>
"><img src="/assets/gfx/upload.png"/></a> 
		<a href="gallery/edit/<?php echo $this->_tpl_vars['gallery']['GalID']; ?>
"><img src="/assets/gfx/edit.png"/></a> 
		<a class="delete_gallery" href="gallery/delete/<?php echo $this->_tpl_vars['gallery']['GalID']; ?>
"><img src="/assets/gfx/delete.png"/></a>
	</td>
</tr>