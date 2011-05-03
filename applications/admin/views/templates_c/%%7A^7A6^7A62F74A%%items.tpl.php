<?php /* Smarty version 2.6.26, created on 2010-11-09 18:43:56
         compiled from menu/items.tpl */ ?>
<script>
	<?php echo '
		$(document).ready(function() {
			$(\'.add_new\').live(\'click\', function() {
				// little hack to get the html with wapping element 
				var html = $(\'<div>\').append(buildBox().clone()).remove().html();
				$(this).parent().parent().parent().after(\'<tr><td>\'+html+\'</tr></td>\');
				return false;
			});
			
			$(\'.remove\').live(\'click\', function() {
			   $(this).parent().parent().parent().remove();
			});
			
			$(\'.move_down,.move_up\').live(\'click\', function() {
			   	var row = $(this).parents("tr:first");
        		if ($(this).is(".move_up")) {
            		row.insertBefore(row.prev());
        		} else {
            		row.insertAfter(row.next());
        		}
			});
			
			$(\'.item\').live(\'mouseover mouseout\',function(event){
				if (event.type == \'mouseover\') {
					$(this).addClass(\'hovered\');
				} else if (event.type == \'mouseout\') {
					$(this).removeClass(\'hovered\');			
				}
			});
			
			function buildBox()
			{
				var currentCount = $(\'#cntTotal\').val();
				currentCount++;
				var newDiv = $(\'<div class="item"></div>\');
				newDiv.append(\'<div class="item_name">Nazov polozky:<input type="text" name="itemData[\'+currentCount+\'][ItmTitle]"></div>\');
				newDiv.append(\'<div class="item_price">Cena polozky:<input type="text" name="itemData[\'+currentCount+\'][ItmPrice]"></div>\');
				newDiv.append(\'<div class="item_desc">Popis polozky (nepovinne):<input type="text" name="itemData[\'+currentCount+\'][ItmDesc]"></div>\');
				newDiv.append(\'<div class="item_tool"><span><img class="add_new" src="/assets/gfx/new.png"></span> <span><img class="remove" src="/assets/gfx/remove.png"></span> <span><img class="move_up" src="/assets/gfx/arrup.png"></span> <span><img class="move_down" src="/assets/gfx/arrdown.png"></span></div>\');
				$(\'#cntTotal\').val(currentCount);
				return newDiv;
			}
		});
	'; ?>

</script>
<div class="category_name">
	<b>Nazov kategorie: </b><?php echo $this->_tpl_vars['catData']['MenTitle']; ?>

</div>
<div class="category_items">
<form action="/admin/menu/saveitems" method="post">
<input type="hidden" name="category_id" value="<?php echo $this->_tpl_vars['catData']['MenId']; ?>
">
<table id="item_list">
<?php $this->assign('countTotal', 0); ?>                         
<?php if ($this->_tpl_vars['items']): ?>

 	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['itempool'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['itempool']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['itempool']['iteration']++;
?>
		<tr><td>
		<div id="item_<?php echo ($this->_foreach['itempool']['iteration']-1); ?>
" class="item">
			 <div class="item_name">
		 		Nazov polozky:<input type="text" name="itemData[<?php echo ($this->_foreach['itempool']['iteration']-1); ?>
][ItmTitle]" value="<?php echo $this->_tpl_vars['item']['ItmTitle']; ?>
">
			 </div>
			 <div class="item_price">
		 		Cena polozky:<input type="text" name="itemData[<?php echo ($this->_foreach['itempool']['iteration']-1); ?>
][ItmPrice]" value="<?php echo $this->_tpl_vars['item']['ItmPrice']; ?>
">
			 </div>
			 <div class="item_desc">
		 		Popis polozky (nepovinne):<input type="text" name="itemData[<?php echo ($this->_foreach['itempool']['iteration']-1); ?>
][ItmDesc]" value="<?php echo $this->_tpl_vars['item']['ItmDesc']; ?>
">
			 </div>
			 <div class="item_tool">
			 			 	<span><img class="add_new" src="/assets/gfx/new.png"></span>
			 				<span><img class="remove" src="/assets/gfx/remove.png"></span>
			 				<span><img class="move_up" src="/assets/gfx/arrup.png"></span>
			 				<span><img class="move_down" src="/assets/gfx/arrdown.png"></span>	
			 </div>
		</div>
	</td></tr>
	<?php $this->assign('nextItem', ($this->_tpl_vars['nextItem']+1)); ?>
	<?php endforeach; endif; unset($_from); ?>
<?php else: ?>
<?php $this->assign('nextItem', ($this->_tpl_vars['countTotal']+1)); ?>
<tr>
 <td>
	<div id="item_<?php echo $this->_tpl_vars['nextItem']; ?>
" class="item">
				 <div class="item_name">
		 			Nazov polozky:<input type="text" name="itemData[<?php echo $this->_tpl_vars['nextItem']; ?>
][ItmTitle]" value="<?php echo $this->_tpl_vars['item']['ItmTitle']; ?>
">
				 </div>
				 <div class="item_price">
		 			Cena polozky:<input type="text" name="itemData[<?php echo $this->_tpl_vars['nextItem']; ?>
][ItmPrice]" value="<?php echo $this->_tpl_vars['item']['ItmPrice']; ?>
">
				 </div>
				 <div class="item_desc">
		 			Popis polozky (nepovinne):<input type="text" name="itemData[<?php echo $this->_tpl_vars['nextItem']; ?>
][ItmDesc]" value="<?php echo $this->_tpl_vars['item']['ItmDesc']; ?>
">
				 </div>
				 <div class="item_tool">
			 		<span><img class="add_new" src="/assets/gfx/new.png"></span>
			 		<span><img class="remove" src="/assets/gfx/remove.png"></span>
			 		<span><img class="move_up" src="/assets/gfx/arrup.png"></span>
			 		<span><img class="move_down" src="/assets/gfx/arrdown.png"></span>	
				 </div>
	</div>
 </td>
</tr>
<?php endif; ?>
</table>
   <input id="cntTotal" type="hidden" value="<?php echo $this->_tpl_vars['nextItem']; ?>
">		
   <div class="submit-button">
   	<input type="submit" name="submit" value="Uloz">
   </div>
</form>
</div>