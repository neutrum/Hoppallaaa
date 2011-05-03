<?php /* Smarty version 2.6.26, created on 2010-11-30 14:33:47
         compiled from events.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'events.tpl', 20, false),)), $this); ?>
<script>
<?php echo '
	$(document).ready(function() {
		$(\'.event-title\').mouseover(function() {
			$(\'.event-block\').children(\'.event-data\').slideToggle(\'fast\');
		}).mouseout(function() {
			$(\'.event-block\').children(\'.event-data\').slideToggle(\'fast\');
		});
	});
'; ?>

</script>
<div class="section-title">
    <img class="intitle" src="/assets/gfx/Akce.png" alt="">
</div>
<div class="clear"></div>
<?php $_from = $this->_tpl_vars['events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['event']):
?>
	<div class="event-block">
		<div class="event-data">
			<div class="data">
				<div><span>Datum:</span> <?php echo ((is_array($_tmp=$this->_tpl_vars['event']['EveDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
</div>  
				<div><span>Cas:</span> <?php echo $this->_tpl_vars['event']['EveTime']; ?>
</div> 		
				<div><span>Cena:</span> <?php echo $this->_tpl_vars['event']['EvePrice']; ?>
 CZK</div> 
			</div>
		</div>
		<div class="event-title">
			<a href="/events/show/<?php echo $this->_tpl_vars['event']['EveId']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['event']['EveDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%d/%m/%Y") : smarty_modifier_date_format($_tmp, "%d/%m/%Y")); ?>
 <?php echo $this->_tpl_vars['event']['EveTitle']; ?>
</a>
		</div>
		<img src="/media/events/fesc_<?php echo $this->_tpl_vars['event']['EvePicture']; ?>
">
	</div>
<?php endforeach; endif; unset($_from); ?>