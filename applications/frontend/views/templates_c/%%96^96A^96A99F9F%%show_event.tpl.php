<?php /* Smarty version 2.6.26, created on 2010-12-06 22:16:31
         compiled from events/show_event.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'events/show_event.tpl', 14, false),)), $this); ?>
<div class="event-show">
    <div class="event-show-foto">
        <img src="/media/events/se_<?php echo $this->_tpl_vars['event']['EvePicture']; ?>
" alt="">
        <div class="event-show-title">
            <?php echo $this->_tpl_vars['event']['EveTitle']; ?>

        </div>
        <div class="event-show-full">
            <a href src="/media/events/<?php echo $this->_tpl_vars['event']['EvePicture']; ?>
"><img src="/assets/gfx/resize.png"></a>
        </div>
    </div>
    <?php if (! $this->_tpl_vars['event']['EveTemp']): ?>
    <div class="event-show-data" style="display: block;">
			<div class="data">
				<div><span>Datum:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['event']['EveDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</div>
				<div><span>Cas:</span> <?php echo $this->_tpl_vars['event']['EveTime']; ?>
</div> 		
				<div><span>Cena:</span> <?php echo $this->_tpl_vars['event']['EvePrice']; ?>
,-</div>
			</div>
	</div>
	<?php endif; ?>
	<div class="event-show-desc">
	    <?php echo $this->_tpl_vars['event']['EveContent']; ?>

	</div>
</div>