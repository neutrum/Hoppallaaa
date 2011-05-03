{literal}
	<script>
		$(document).ready(function()
		{
			// photo	
			  $('#upload-photos').uploadify({ 
			    'uploader':  '/assets/swf/uploadify.swf', 
			    'script':    '/admin/uploader/photos/{/literal}{$galId}{literal}', 
			    'folder':    '/media/gallery/{/literal}{$galDir}{literal}', 
			    'cancelImg': '/assets/gfx/cancel.png',
			    'multi' : true,
			    'auto' : true,
			    'onComplete' : function(event, queueID, fileObj, response, data) {
			    		resp = JSON.parse(response);
   					  	$('#photo-list').append('<img src="'+resp.url+'">');
				},
				'onError': function (a, b, c, d) {
				    alert("Error: "+d.type+"      Info: "+d.info);
				}
			  });
			  $('.delete-photo').bind('click', function (){
			  	    var phoId = $(this).find('img').attr('id');
			  	    $.post('/admin/gallery/deletepic', {id: phoId}, function(data){
			  	    		$('#frame'+phoId).remove();
			  	    });
			  });
		});		
	</script>
{/literal}
	<BR>
	Upload photos:
	<BR>
	<div id="upload-photos"></div>
	<div id="photo-list" style="width: 600px;">
	 {if $photos}
	 	{foreach from=$photos item=photo}
	 	<div id="frame{$photo.PhoId}" style="position: relative; float: left;">	
	 		<img src="/media/gallery/{$galDir}/sc_{$photo.PhoFile}">
	 	<div class="delete-photo" style="position: absolute; z-index: 10;right: 0px;bottom: 0px;">
	 		<img id="{$photo.PhoId}" src="/assets/gfx/deletebutt.png"/>
	 	</div>
	 	</div>
	 	{/foreach}
	 {/if}
	</div>
	<div style="clear: both;"></div>
	<div style="margin: 50px;">
	[<a href="/admin/gallery"><img src="/assets/gfx/back.png">Zpet na vypis</a>]
	</div>