<?php /* Smarty version 2.6.26, created on 2010-11-02 17:38:42
         compiled from events/eventsblock.tpl */ ?>

<tr>
	<td>
		<?php if ($this->_tpl_vars['event']['EvePicture']): ?>
			<a target="_blank" href="/media/events/<?php echo $this->_tpl_vars['event']['EvePicture']; ?>
"><img src="/media/events/sc_<?php echo $this->_tpl_vars['event']['EvePicture']; ?>
"></a> 	
		<?php else: ?>
			no<BR>picture
		<?php endif; ?>
	</td>
	<td class="news_date">
		    <a href="events/edit/<?php echo $this->_tpl_vars['event']['EveId']; ?>
"><?php echo $this->_tpl_vars['event']['EveDate']; ?>
</a>
	</td>
	<td class="news_date">
		    <?php echo $this->_tpl_vars['event']['EveTime']; ?>

	</td>
	<td class="news_title">              
		    <a href="events/edit/<?php echo $this->_tpl_vars['event']['EveId']; ?>
"><?php echo $this->_tpl_vars['event']['EveTitle']; ?>
</a>
	</td>
	<td class="event_price">              
		    <?php echo $this->_tpl_vars['event']['EvePrice']; ?>
.-
	</td>
	<td class="news_tools">
		<a href="events/edit/<?php echo $this->_tpl_vars['event']['EveId']; ?>
"><img src="/assets/gfx/edit.png"/></a> 
		<a class="delete_events" href="events/delete/<?php echo $this->_tpl_vars['event']['EveId']; ?>
"><img src="/assets/gfx/delete.png"/></a>
	</td>
</tr>