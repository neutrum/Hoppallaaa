<?php /* Smarty version 2.6.26, created on 2010-11-09 18:19:19
         compiled from gallery.tpl */ ?>
<script type="text/javascript" src="/assets/js/ui.admin.js"></script>
<script>
	<?php echo '
	$(document).ready(function() 
	{
		$(\'.delete_gallery\').click(function (){
			 var answer = confirm(\'Vazne chcete polozku zmazat?\');
  			 return answer // answer is a boolean
		});
	});
	'; ?>

</script>
<div class="add-new">
<a href="gallery/insert"><img src="/assets/gfx/new.png"/> <span class="add-new-link">pridaj galeriu</span></a>
</div>

<BR>
<table class="news_table" width="600">
<tr>
	<td clas="table_header">
		
	</td> 
	<td class="table_header">
		Nazov
	</td>
	<td  class="table_header">
		Tools
	</td>
</tr>
<?php $_from = $this->_tpl_vars['galleries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['gallery']):
?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'gallery/galleryblock.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endforeach; endif; unset($_from); ?>
</table>