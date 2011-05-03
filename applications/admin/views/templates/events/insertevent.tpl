<style type="text/css">@import "/assets/css/jquery.datepick.css";</style>       
<script type="text/javascript" src="/assets/js/jquery.datepick.js"></script>
    
{literal}
	<script>
		$(document).ready(function()
		{

			$("#eventDate").datepick({dateFormat: 'yyyy-mm-dd'}); 	
			// photo	
			  $('#event-photo').uploadify({ 
			    'uploader':  '/assets/swf/uploadify.swf', 
			    'script':    '/admin/uploader/events', 
			    'folder':    '/media/events', 
			    'cancelImg': '/assets/gfx/cancel.png',
			    'multi' : false,
			    'auto' : true,
			    'onComplete' : function(event, queueID, fileObj, response, data) {
			    		resp = JSON.parse(response);
   					  	$('#photo-list').html('<img src="'+resp.url+'">');
						$('#EventFlyer').val(resp.file);
				} 
			  });

			  $('#temp-checkbox').click(function(){
                   if($(this).is(':checked')) {
                    $('#edate').hide();
                    $('#etime').hide();
                    $('#eprice').hide();                                                   
                    $('#etemp').val(1);
                   } else {
                    $('#edate').show();
                    $('#etime').show();
                    $('#eprice').show();
                    $('#etemp').val(0);                              
                   }
			  });

			  if($('#temp-checkbox').is(':checked')) {
                    $('#edate').hide();
                    $('#etime').hide();
                    $('#eprice').hide();
                    $('#etemp').val(1);
              }


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
	<div class="form-checkbox">
	    <div class="form-label">Akce na alkohol:</div><input id="temp-checkbox" type="checkbox" 	    {if $eventData.EveTemp}checked{/if}>
	</div>
	<input id="etemp" type="hidden" name="eventData[EveTemp]" value="{$eventData.EveTemp}">

        <div id ="edate" class="form-block">
            <div class="form-label">Datum:</div>
            <div class="form-input"><input type="text" id="eventDate" name='eventData[EveDate]' value="{$eventData.EveDate}"></div>
        </div>
        <div id="etime" class="form-block">
            <div class="form-label">Cas:</div>
            {$hours}
        </div>
    <div class="form-block">
		<div class="form-label">Nazov:</div>
		<div class="form-input"><input type="text" name='eventData[EveTitle]' value="{$eventData.EveTitle}"></div>
	<div>
	<div class="form-block">
		<div class="form-label">Popis:</div>
		<div class="form-textarea"><textarea name="eventData[EveContent]">{$eventData.EveContent}</textarea></div>
	</div>	
        <div id='eprice' class="form-block">
            <div class="form-label">Cena:</div>
            <div class="form-input"><input type="text" name='eventData[EvePrice]' value="{$eventData.EvePrice}"></div>
        </div>

	<div class="form-block">
		<div class="form-label">Plagat:</div>
		<input id="EventFlyer" type="hidden" name='eventData[EvePicture]' value="{$eventData.EvePicture}">
		<div id="event-photo"></div>
		<div id="photo-list">
	{if $eventData.EvePicture}
		<img src="/media/events/sc_{$eventData.EvePicture}">
	{/if}
	</div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>