<style type="text/css">@import "/assets/css/jquery.datepick.css";</style>       
<script type="text/javascript" src="/assets/js/jquery.datepick.js"></script>
    
{literal}
	<script>
		$(document).ready(function()
		{
			// photo	
			  $('#event-photo').uploadify({ 
			    'uploader':  '/assets/swf/uploadify.swf', 
			    'script':    '/admin/uploader/photos', 
			    'folder':    '/media/gallery/', 
			    'cancelImg': '/assets/gfx/cancel.png',
			    'multi' : false,
			    'auto' : true,
			    'onComplete' : function(event, queueID, fileObj, response, data) {
			    		resp = JSON.parse(response);
   					  	$('#photo-list').html('<img src="'+resp.url+'">');
						$('#EventFlyer').val(resp.file);
				} 
			  });
		});		
	</script>
{/literal}
{if $update}
	{assign var='action' value='/admin/events/update'}
{else}
	{assign var='action' value='save'}
{/if}
<form method="post" action="{$action}">
	{if $update}
		<input type="hidden" name='eventData[EveId]' value="{$eventData.EveId}">
	{/if}
	Datum:
	<input type="text" id="eventDate" name='eventData[EveDate]' value="{$eventData.EveDate}">
	<BR>
	Cas:
	{$hours}	
	<BR>
	Nazov:
	<input type="text" name='eventData[EveTitle]' value="{$eventData.EveTitle}">
	<BR>
	Popis:
	<textarea name="eventData[EveContent]">{$eventData.EveContent}</textarea>
	<BR>
	Cena:
	<input type="text" name='eventData[EvePrice]' value="{$eventData.EvePrice}">
	<BR>
	<Br>
	Plagat:
	<input id="EventFlyer" type="hidden" name='eventData[EvePicture]' value="{$eventData.EvePicture}">
	<div id="event-photo"></div>
	<div id="photo-list">
	{if $eventData.EvePicture}
		<img src="/media/events/sc_{$eventData.EvePicture}">
	{/if}
	</div>
	<BR>
	
	<input type="submit" name="submit" value="uloz">
</form>