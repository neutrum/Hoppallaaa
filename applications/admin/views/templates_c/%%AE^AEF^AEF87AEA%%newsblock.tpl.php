<?php /* Smarty version 2.6.26, created on 2010-11-01 19:25:42
         compiled from news/newsblock.tpl */ ?>

<tr>
	<td class="news_date">
		    <a href="news/edit/<?php echo $this->_tpl_vars['new']['NwsId']; ?>
"><?php echo $this->_tpl_vars['new']['NwsDate']; ?>
</a>
	</td>
	<td class="news_title">
		    <a href="news/edit/<?php echo $this->_tpl_vars['new']['NwsId']; ?>
"><?php echo $this->_tpl_vars['new']['NwsTitle']; ?>
</a>
	</td>
	<td class="news_tools">
				<a href="news/edit/<?php echo $this->_tpl_vars['new']['NwsId']; ?>
"><img src="/assets/gfx/edit.png"/></a> 
		<a class="delete_news" href="news/delete/<?php echo $this->_tpl_vars['new']['NwsId']; ?>
"><img src="/assets/gfx/delete.png"/></a>
	</td>
</tr>