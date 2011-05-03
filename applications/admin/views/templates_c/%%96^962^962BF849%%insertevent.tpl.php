<?php /* Smarty version 2.6.26, created on 2010-12-06 22:13:39
         compiled from events/insertevent.tpl */ ?>
<style type="text/css">@import "/assets/css/jquery.datepick.css";</style>       
<script type="text/javascript" src="/assets/js/jquery.datepick.js"></script>
    
<?php echo '
	<script>
		$(document).ready(function()
		{

			$("#eventDate").datepick({dateFormat: \'yyyy-mm-dd\'}); 	
			// photo	
			  $(\'#event-photo\').uploadify({ 
			    \'uploader\':  \'/assets/swf/uploadify.swf\', 
			    \'script\':    \'/admin/uploader/events\', 
			    \'folder\':    \'/media/events\', 
			    \'cancelImg\': \'/assets/gfx/cancel.png\',
			    \'multi\' : false,
			    \'auto\' : true,
			    \'onComplete\' : function(event, queueID, fileObj, response, data) {
			    		resp = JSON.parse(response);
   					  	$(\'#photo-list\').html(\'<img src="\'+resp.url+\'">\');
						$(\'#EventFlyer\').val(resp.file);
				} 
			  });

			  $(\'#temp-checkbox\').click(function(){
                   if($(this).is(\':checked\')) {
                    $(\'#edate\').hide();
                    $(\'#etime\').hide();
                    $(\'#eprice\').hide();                                                   
                    $(\'#etemp\').val(1);
                   } else {
                    $(\'#edate\').show();
                    $(\'#etime\').show();
                    $(\'#eprice\').show();
                    $(\'#etemp\').val(0);                              
                   }
			  });

			  if($(\'#temp-checkbox\').is(\':checked\')) {
                    $(\'#edate\').hide();
                    $(\'#etime\').hide();
                    $(\'#eprice\').hide();
                    $(\'#etemp\').val(1);
              }


		});		
	</script>
'; ?>

<?php if ($this->_tpl_vars['update']): ?>
	<?php $this->assign('action', '/admin/events/update'); ?>
<?php else: ?>
	<?php $this->assign('action', 'save'); ?>
<?php endif; ?>
<form method="post" action="<?php echo $this->_tpl_vars['action']; ?>
">
	<?php if ($this->_tpl_vars['update']): ?>
		<input type="hidden" name='eventData[EveId]' value="<?php echo $this->_tpl_vars['eventData']['EveId']; ?>
">
	<?php endif; ?>
	<div class="form-checkbox">
	    <div class="form-label">Akce na alkohol:</div><input id="temp-checkbox" type="checkbox" 	    <?php if ($this->_tpl_vars['eventData']['EveTemp']): ?>checked<?php endif; ?>>
	</div>
	<input id="etemp" type="hidden" name="eventData[EveTemp]" value="<?php echo $this->_tpl_vars['eventData']['EveTemp']; ?>
">

        <div id ="edate" class="form-block">
            <div class="form-label">Datum:</div>
            <div class="form-input"><input type="text" id="eventDate" name='eventData[EveDate]' value="<?php echo $this->_tpl_vars['eventData']['EveDate']; ?>
"></div>
        </div>
        <div id="etime" class="form-block">
            <div class="form-label">Cas:</div>
            <?php echo $this->_tpl_vars['hours']; ?>

        </div>
    <div class="form-block">
		<div class="form-label">Nazov:</div>
		<div class="form-input"><input type="text" name='eventData[EveTitle]' value="<?php echo $this->_tpl_vars['eventData']['EveTitle']; ?>
"></div>
	<div>
	<div class="form-block">
		<div class="form-label">Popis:</div>
		<div class="form-textarea"><textarea name="eventData[EveContent]"><?php echo $this->_tpl_vars['eventData']['EveContent']; ?>
</textarea></div>
	</div>	
        <div id='eprice' class="form-block">
            <div class="form-label">Cena:</div>
            <div class="form-input"><input type="text" name='eventData[EvePrice]' value="<?php echo $this->_tpl_vars['eventData']['EvePrice']; ?>
"></div>
        </div>

	<div class="form-block">
		<div class="form-label">Plagat:</div>
		<input id="EventFlyer" type="hidden" name='eventData[EvePicture]' value="<?php echo $this->_tpl_vars['eventData']['EvePicture']; ?>
">
		<div id="event-photo"></div>
		<div id="photo-list">
	<?php if ($this->_tpl_vars['eventData']['EvePicture']): ?>
		<img src="/media/events/sc_<?php echo $this->_tpl_vars['eventData']['EvePicture']; ?>
">
	<?php endif; ?>
	</div>
	</div>
	<div class="submit-button">
		<input type="submit" name="submit" value="uloz">
	</div>
</form>