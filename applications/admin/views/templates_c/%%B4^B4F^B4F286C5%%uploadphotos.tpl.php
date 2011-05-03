<?php /* Smarty version 2.6.26, created on 2010-12-06 14:40:59
         compiled from gallery/uploadphotos.tpl */ ?>
<?php echo '
	<script>
		$(document).ready(function()
		{
			// photo	
			  $(\'#upload-photos\').uploadify({ 
			    \'uploader\':  \'/assets/swf/uploadify.swf\', 
			    \'script\':    \'/admin/uploader/photos/'; ?>
<?php echo $this->_tpl_vars['galId']; ?>
<?php echo '\', 
			    \'folder\':    \'/media/gallery/'; ?>
<?php echo $this->_tpl_vars['galDir']; ?>
<?php echo '\', 
			    \'cancelImg\': \'/assets/gfx/cancel.png\',
			    \'multi\' : true,
			    \'auto\' : true,
			    \'onComplete\' : function(event, queueID, fileObj, response, data) {
			    		resp = JSON.parse(response);
   					  	$(\'#photo-list\').append(\'<img src="\'+resp.url+\'">\');
				},
				\'onError\': function (a, b, c, d) {
				    alert("Error: "+d.type+"      Info: "+d.info);
				}
			  });
			  $(\'.delete-photo\').bind(\'click\', function (){
			  	    var phoId = $(this).find(\'img\').attr(\'id\');
			  	    $.post(\'/admin/gallery/deletepic\', {id: phoId}, function(data){
			  	    		$(\'#frame\'+phoId).remove();
			  	    });
			  });
		});		
	</script>
'; ?>

	<BR>
	Upload photos:
	<BR>
	<div id="upload-photos"></div>
	<div id="photo-list" style="width: 600px;">
	 <?php if ($this->_tpl_vars['photos']): ?>
	 	<?php $_from = $this->_tpl_vars['photos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['photo']):
?>
	 	<div id="frame<?php echo $this->_tpl_vars['photo']['PhoId']; ?>
" style="position: relative; float: left;">	
	 		<img src="/media/gallery/<?php echo $this->_tpl_vars['galDir']; ?>
/sc_<?php echo $this->_tpl_vars['photo']['PhoFile']; ?>
">
	 	<div class="delete-photo" style="position: absolute; z-index: 10;right: 0px;bottom: 0px;">
	 		<img id="<?php echo $this->_tpl_vars['photo']['PhoId']; ?>
" src="/assets/gfx/deletebutt.png"/>
	 	</div>
	 	</div>
	 	<?php endforeach; endif; unset($_from); ?>
	 <?php endif; ?>
	</div>
	<div style="clear: both;"></div>
	<div style="margin: 50px;">
	[<a href="/admin/gallery"><img src="/assets/gfx/back.png">Zpet na vypis</a>]
	</div>