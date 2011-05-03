<?php /* Smarty version 2.6.26, created on 2010-11-08 21:13:49
         compiled from menu/menublock.tpl */ ?>
<tr>
	<td class="news_title">              
		    <a href="menu/items/<?php echo $this->_tpl_vars['category']['MenId']; ?>
"><?php echo $this->_tpl_vars['category']['MenTitle']; ?>
</a>
	</td>
	<td class="event_price">              
		    <?php echo $this->_tpl_vars['category']['amount']; ?>

	</td>
	<td class="news_tools">
		<a href="menu/edit/<?php echo $this->_tpl_vars['category']['MenId']; ?>
"><img src="/assets/gfx/edit.png"/></a> 
		<a class="delete_category" href="menu/delete/<?php echo $this->_tpl_vars['category']['MenId']; ?>
"><img src="/assets/gfx/delete.png"/></a>
	</td>
</tr>